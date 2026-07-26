<?php
require_once '../config/db.php';
if(!isset($_GET['id'])){ header('Location: view_doctors.php'); exit; }
$id=intval($_GET['id']);
if($_SERVER['REQUEST_METHOD']==='POST'){
  $name=$mysqli->real_escape_string($_POST['name']); $special=$mysqli->real_escape_string($_POST['specialization']);
  $phone=$mysqli->real_escape_string($_POST['phone']); $email=$mysqli->real_escape_string($_POST['email']);
  $stmt=$mysqli->prepare("UPDATE doctors SET name=?, specialization=?, phone=?, email=? WHERE doctor_id=?");
  $stmt->bind_param('ssssi',$name,$special,$phone,$email,$id); $stmt->execute();
  header('Location: view_doctors.php'); exit;
}
$stmt=$mysqli->prepare("SELECT * FROM doctors WHERE doctor_id=?"); $stmt->bind_param('i',$id); $stmt->execute(); $row=$stmt->get_result()->fetch_assoc();
?>
<?php include '../includes/navbar.php'; ?>
<main class="container">
  <div class="card">
    <h2>Edit Doctor</h2>
    <form method="post">
      <div class="form-row"><label>Name</label><input name="name" required value="<?php echo htmlspecialchars($row['name']); ?>"></div>
      <div class="form-row"><label>Specialization</label><input name="specialization" value="<?php echo htmlspecialchars($row['specialization']); ?>"></div>
      <div class="form-row"><label>Phone</label><input name="phone" value="<?php echo htmlspecialchars($row['phone']); ?>"></div>
      <div class="form-row"><label>Email</label><input name="email" type="email" value="<?php echo htmlspecialchars($row['email']); ?>"></div>
      <button class="btn" type="submit">Update</button>
      <a class="btn outline" href="view_doctors.php">Cancel</a>
    </form>
  </div>
</main>
