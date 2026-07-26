<?php
require_once '../config/db.php';
if($_SERVER['REQUEST_METHOD']==='POST'){
  $name=$mysqli->real_escape_string($_POST['name']);
  $age=intval($_POST['age']);
  $gender=$mysqli->real_escape_string($_POST['gender']);
  $contact=$mysqli->real_escape_string($_POST['contact']);
  $address=$mysqli->real_escape_string($_POST['address']);
  $issue=$mysqli->real_escape_string($_POST['issue']);
  $stmt = $mysqli->prepare("INSERT INTO patients (name, age, gender, contact, address, issue) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param('sissss',$name,$age,$gender,$contact,$address,$issue);
  $stmt->execute();
  header('Location: view_patients.php'); exit;
}
?>
<?php include '../includes/navbar.php'; ?>
<main class="container">
  <div class="card">
    <h2>Add Patient</h2>
    <form method="post" onsubmit="return validatePatientForm(this)">
      <div class="form-row"><label>Name</label><input name="name" required></div>
      <div class="form-row"><label>Age</label><input name="age" type="number" required min="0"></div>
      <div class="form-row"><label>Gender</label><select name="gender"><option>Male</option><option>Female</option><option>Other</option></select></div>
      <div class="form-row"><label>Contact</label><input name="contact"></div>
      <div class="form-row"><label>Address</label><textarea name="address"></textarea></div>
      <div class="form-row"><label>Issue</label><input name="issue"></div>
      <button class="btn" type="submit">Save</button>
      <a class="btn outline" href="view_patients.php">Cancel</a>
    </form>
  </div>
</main>
<script>
function validatePatientForm(f){
  if(f.name.value.trim().length < 2){ alert('Enter valid name'); f.name.focus(); return false; }
  return true;
}
</script>
