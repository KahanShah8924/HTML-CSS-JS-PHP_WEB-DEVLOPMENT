<?php
require_once '../config/db.php';
if(!isset($_GET['id'])){ header('Location: view_patients.php'); exit; }
$id = intval($_GET['id']);
if($_SERVER['REQUEST_METHOD']==='POST'){
  $name=$mysqli->real_escape_string($_POST['name']); $age=intval($_POST['age']);
  $gender=$mysqli->real_escape_string($_POST['gender']); $contact=$mysqli->real_escape_string($_POST['contact']);
  $address=$mysqli->real_escape_string($_POST['address']); $issue=$mysqli->real_escape_string($_POST['issue']);
  $stmt=$mysqli->prepare("UPDATE patients SET name=?, age=?, gender=?, contact=?, address=?, issue=? WHERE patient_id=?");
  $stmt->bind_param('sissssi',$name,$age,$gender,$contact,$address,$issue,$id);
  $stmt->execute();
  header('Location: view_patients.php'); exit;
}
$stmt = $mysqli->prepare("SELECT * FROM patients WHERE patient_id=?");
$stmt->bind_param('i',$id); $stmt->execute(); $res=$stmt->get_result(); $row=$res->fetch_assoc();
?>
<?php include '../includes/navbar.php'; ?>
<main class="container">
  <div class="card">
    <h2>Edit Patient</h2>
    <form method="post">
      <div class="form-row"><label>Name</label><input name="name" required value="<?php echo htmlspecialchars($row['name']); ?>"></div>
      <div class="form-row"><label>Age</label><input name="age" type="number" required value="<?php echo $row['age']; ?>"></div>
      <div class="form-row"><label>Gender</label><select name="gender"><option <?php if($row['gender']=='Male') echo 'selected'; ?>>Male</option><option <?php if($row['gender']=='Female') echo 'selected'; ?>>Female</option><option <?php if($row['gender']=='Other') echo 'selected'; ?>>Other</option></select></div>
      <div class="form-row"><label>Contact</label><input name="contact" value="<?php echo htmlspecialchars($row['contact']); ?>"></div>
      <div class="form-row"><label>Address</label><textarea name="address"><?php echo htmlspecialchars($row['address']); ?></textarea></div>
      <div class="form-row"><label>Issue</label><input name="issue" value="<?php echo htmlspecialchars($row['issue']); ?>"></div>
      <button class="btn" type="submit">Update</button>
      <a class="btn outline" href="view_patients.php">Cancel</a>
    </form>
  </div>
</main>
