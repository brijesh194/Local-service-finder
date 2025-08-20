<?php
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/helpers.php';

if ($_SERVER['REQUEST_METHOD']!=='POST') { header('Location: '.url('s.php')); exit; }

$pid = (int)($_POST['provider_id'] ?? 0);
$customer_name = sanitize($_POST['customer_name']);
$customer_email = sanitize($_POST['customer_email']);
$customer_phone = sanitize($_POST['customer_phone']);
$message = sanitize($_POST['message'].' (Preferred: '.($_POST['preferred_time']??'').')');

$prov = db()->prepare("SELECT * FROM providers WHERE id=:id");
$prov->execute([':id'=>$pid]);
$p = $prov->fetch();
if(!$p){ die('Invalid provider'); }


$stmt = db()->prepare("INSERT INTO bookings (provider_id, customer_name, customer_email, customer_phone, message) VALUES (:pid,:n,:e,:ph,:m)");
$stmt->execute([':pid'=>$pid, ':n'=>$customer_name, ':e'=>$customer_email, ':ph'=>$customer_phone, ':m'=>$message]);

$body = "<h2>New Booking Request</h2>
<p><b>Provider:</b> ".sanitize($p['name'])." (".sanitize($p['service']).")</p>
<p><b>Customer:</b> {$customer_name} ({$customer_email}, {$customer_phone})</p>
<p><b>Message:</b> ".nl2br($message)."</p>";

send_email($p['contact_email'], "New Booking Request for ".SITE_NAME, $body);
send_email(ADMIN_EMAIL, "Booking Request Copy", $body);

echo "<body style='background:#0f1115;color:#dbeafe;font-family:Inter;padding:40px'>
<h2>Request sent!</h2>
<p>The provider has received your request. They will contact you soon.</p>
<p><a style='color:#22ccff' href='".url('provider.php?id='.$pid)."'>Back to Provider</a> | <a style='color:#22ccff' href='".url('s.php')."'>Home</a></p>
</body>";
