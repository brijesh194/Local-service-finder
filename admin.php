<?php
// admin.php - admin panel (simple password form + pending list)
session_start();
$config = require __DIR__ . '/config.php';
$db = new PDO('sqlite:' . $config->db_path);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// login
if(isset($_POST['admin_pass'])){
  if($_POST['admin_pass'] === $config->admin_password){
    $_SESSION['admin'] = true;
  } else {
    $err = "Invalid password";
  }
}

if(isset($_GET['logout'])){ session_destroy(); header('Location: admin.php'); exit; }

if(!isset($_SESSION['admin']) || !$_SESSION['admin']){
  // show login
  ?>
  <!doctype html><html><head><meta charset="utf-8"><title>Admin Login</title></head><body style="font-family:Arial">
  <h2>Admin Login</h2>
  <?php if(!empty($err)) echo "<div style='color:red'>$err</div>"; ?>
  <form method="post"><input type="password" name="admin_pass" placeholder="Admin password"><button>Login</button></form>
  </body></html>
  <?php exit;
}

// admin authenticated: show pending providers
$rows = $db->query("SELECT * FROM providers ORDER BY created_at DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html><head><meta charset="utf-8"><title>Admin Panel</title>
<style>
body{font-family:Arial;background:#111;color:#fff;padding:20px}
.card{background:#222;padding:12px;border-radius:8px;margin-bottom:12px}
button{padding:8px 10px;border-radius:6px;border:0;cursor:pointer}
.approve{background:green} .reject{background:#b33}
a{color:#8cf}
</style>
</head><body>
<h1>Admin Panel</h1>
<p><a href="admin.php?logout=1">Logout</a> | <a href="s.php">Open Site</a></p>

<?php foreach($rows as $r): ?>
  <div class="card">
    <strong><?php echo htmlspecialchars($r['name']) ?></strong> — <?php echo htmlspecialchars($r['service']) ?> — <em><?php echo htmlspecialchars($r['status']) ?></em><br>
    Location: <?php echo htmlspecialchars($r['location']) ?> | Contact: <?php echo htmlspecialchars($r['contact']) ?><br>
    <div style="margin-top:8px">
      <img src="uploads/photos/<?php echo htmlspecialchars($r['photo']) ?>" style="height:80px;border-radius:6px;margin-right:8px">
      <img src="uploads/ids/<?php echo htmlspecialchars($r['id_proof']) ?>" style="height:80px;border-radius:6px">
    </div>
    <div style="margin-top:10px">
      <form style="display:inline" method="post" action="api.php?action=admin_action">
        <input type="hidden" name="id" value="<?php echo (int)$r['id'] ?>">
        <input type="hidden" name="op" value="approve">
        <input type="hidden" name="password" value="<?php echo htmlspecialchars($config->admin_password) ?>">
        <button class="approve">Approve</button>
      </form>

      <form style="display:inline" method="post" action="api.php?action=admin_action">
        <input type="hidden" name="id" value="<?php echo (int)$r['id'] ?>">
        <input type="hidden" name="op" value="reject">
        <input type="hidden" name="password" value="<?php echo htmlspecialchars($config->admin_password) ?>">
        <button class="reject">Reject</button>
      </form>
    </div>
  </div>
<?php endforeach; ?>

</body></html>
