<?php
require_once '../config/db.php';
session_start();
$error='';
if($_SERVER['REQUEST_METHOD']==='POST'){
  $username = $_POST['username']; $password = $_POST['password'];
  $stmt = $mysqli->prepare("SELECT * FROM admins WHERE username=? LIMIT 1");
  $stmt->bind_param('s',$username); $stmt->execute(); $res = $stmt->get_result();
  if($res->num_rows){
    $row = $res->fetch_assoc();
    if(password_verify($password, $row['password_hash'])){
      $_SESSION['admin'] = $row['username'];
      header('Location: dashboard.php'); exit;
    } else $error = 'Invalid credentials';
  } else $error = 'Invalid credentials';
}
?>
<?php include '../includes/navbar.php'; ?>
<main class="container">
  <div class="card" style="max-width:480px;margin:auto">
    <h2>Admin Login</h2>
    <?php if($error) echo '<p class="small" style="color:#b00020">'.$error.'</p>'; ?>
    <form method="post">
      <div class="form-row"><label>Username</label><input name="username" required></div>
      <div class="form-row"><label>Password</label><input name="password" type="password" required></div>
      <button class="btn" type="submit">Login</button>
    </form>
    <p class="small">Default admin: <strong>admin</strong> / <strong>admin123</strong></p>
  </div>
</main>
