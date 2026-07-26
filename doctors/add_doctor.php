<?php
require_once '../config/db.php';
if($_SERVER['REQUEST_METHOD']==='POST'){
  $name=$mysqli->real_escape_string($_POST['name']);
  $special=$mysqli->real_escape_string($_POST['specialization']);
  $phone=$mysqli->real_escape_string($_POST['phone']); $email=$mysqli->real_escape_string($_POST['email']);
  $stmt=$mysqli->prepare("INSERT INTO doctors (name, specialization, phone, email) VALUES (?, ?, ?, ?)");
  $stmt->bind_param('ssss',$name,$special,$phone,$email); $stmt->execute();
  header('Location: view_doctors.php'); exit;
}
?>
<?php include '../includes/navbar.php'; ?>
<main class="container">
  <div class="card">
    <h2>Add Doctor</h2>
    <form method="post" onsubmit="return this.name.value.trim().length>=2">
      <div class="form-row"><label>Name</label><input name="name" required></div>
      <div class="form-row"><label>Specialization</label><input name="specialization"></div>
      <div class="form-row"><label>Phone</label><input name="phone"></div>
      <div class="form-row"><label>Email</label><input name="email" type="email"></div>
      <button class="btn" type="submit">Save</button>
      <a class="btn outline" href="view_doctors.php">Cancel</a>
    </form>
  </div>
</main>
