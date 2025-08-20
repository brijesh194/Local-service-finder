<?php
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/helpers.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: '.url('create-profile.php')); exit; }

$name = sanitize($_POST['name']);
$service = sanitize($_POST['service']);
$price = (int)$_POST['price'];
$exp = (int)($_POST['experience_years'] ?? 0);
$location = sanitize($_POST['location']);
$availability = sanitize($_POST['availability'] ?? 'This Week');
$contact_email = sanitize($_POST['contact_email']);
$contact_phone = sanitize($_POST['contact_phone']);
$tags = sanitize($_POST['tags']);
$short_desc = sanitize($_POST['short_desc']);
$long_desc = sanitize($_POST['long_desc']);

// Basic validation
if (!$name || !$service || !$price || !$location || !$contact_email || !$contact_phone) {
  die('Missing required fields.');
}

// Handle uploads
@mkdir(__DIR__.'/uploads/providers',0777,true);
@mkdir(__DIR__.'/uploads/ids',0777,true);

$photo_path = '';
if (!empty($_FILES['photo']['name'])) {
  $ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
  $fname = 'prov_'.time().'_'.mt_rand(1000,9999).'.'.strtolower($ext);
  $dest = __DIR__.'/uploads/providers/'.$fname;
  move_uploaded_file($_FILES['photo']['tmp_name'], $dest);
  $photo_path = 'uploads/providers/'.$fname;
}

$id_doc_path = '';
if (!empty($_FILES['id_doc']['name'])) {
  $ext = pathinfo($_FILES['id_doc']['name'], PATHINFO_EXTENSION);
  $fname = 'id_'.time().'_'.mt_rand(1000,9999).'.'.strtolower($ext);
  $dest = __DIR__.'/uploads/ids/'.$fname;
  move_uploaded_file($_FILES['id_doc']['tmp_name'], $dest);
  $id_doc_path = 'uploads/ids/'.$fname;
}

// // Insert as pending
// $sql = "INSERT INTO providers (name, service, price, rating, verified, experience_years, tags, location, availability, contact_email, contact_phone, short_desc, long_desc, photo_path, id_doc_path, status)
//         VALUES (:name,:service,:price,4.5,0,:exp,:tags,:loc,:avail,:email,:phone,:sdesc,:ldesc,:photo,:id,'active')";
// $stmt = db()->prepare($sql);
// $stmt->execute([
//   ':name'=>$name, ':service'=>$service, ':price'=>$price, ':exp'=>$exp, ':tags'=>$tags, ':loc'=>$location, ':avail'=>$availability,
//   ':email'=>$contact_email, ':phone'=>$contact_phone, ':sdesc'=>$short_desc, ':ldesc'=>$long_desc, ':photo'=>$photo_path, ':id'=>$id_doc_path
// ]);
// $pid = db()->lastInsertId();
// Insert provider directly as verified
$sql = "INSERT INTO providers 
        (name, service, price, rating, verified, experience_years, tags, location, availability, contact_email, contact_phone, short_desc, long_desc, photo_path, id_doc_path, status)
        VALUES 
        (:name, :service, :price, 4.5, 1, :exp, :tags, :loc, :avail, :email, :phone, :sdesc, :ldesc, :photo, :id, 'active')";

$stmt = db()->prepare($sql);
$stmt->execute([
  ':name'   => $name,
  ':service'=> $service,
  ':price'  => $price,
  ':exp'    => $exp,
  ':tags'   => $tags,
  ':loc'    => $location,
  ':avail'  => $availability,
  ':email'  => $contact_email,
  ':phone'  => $contact_phone,
  ':sdesc'  => $short_desc,
  ':ldesc'  => $long_desc,
  ':photo'  => $photo_path,
  ':id'     => $id_doc_path
]);

$pid = db()->lastInsertId();

// Email admin with approve/reject links
$approve = url('admin/action.php?action=approve&id='.$pid);
$reject  = url('admin/action.php?action=reject&id='.$pid);
$dash    = url('admin/dashboard.php');

$body = "<h2>New Provider Pending Verification</h2>
<p><b>Name:</b> {$name}<br><b>Service:</b> {$service}<br><b>Location:</b> {$location}<br><b>Price:</b> ₹{$price}</p>
<p><a href='{$approve}'>Approve</a> | <a href='{$reject}'>Reject</a> | <a href='{$dash}'>Open Dashboard</a></p>";

send_email(ADMIN_EMAIL, "New Provider Waiting for Approval", $body);

// Confirmation
header('Content-Type:text/html; charset=utf-8');
echo "<body style='background:#0f1115;color:#dbeafe;font-family:Inter,Arial;padding:40px'>
<h2>Thanks, {$name}!</h2>
<p>Your profile was submitted successfully. We’ll notify once verified by admin.</p>
<p><a style='color:#22ccff' href='s.php'>Back to Home</a></p>
</body>";
