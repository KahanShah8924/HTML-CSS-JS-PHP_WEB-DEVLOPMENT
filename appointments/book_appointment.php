<?php
require_once '../config/db.php';
$patients = $mysqli->query("SELECT patient_id, name FROM patients ORDER BY name");
$doctors = $mysqli->query("SELECT doctor_id, name FROM doctors ORDER BY name");
if($_SERVER['REQUEST_METHOD']==='POST'){
  $pid=intval($_POST['patient_id']); $did=intval($_POST['doctor_id']);
  $date=$mysqli->real_escape_string($_POST['date']); $issue=$mysqli->real_escape_string($_POST['issue']);
  $stmt=$mysqli->prepare("INSERT INTO appointments (patient_id, doctor_id, appt_date, issue) VALUES (?, ?, ?, ?)");
  $stmt->bind_param('iiss',$pid,$did,$date,$issue); $stmt->execute();
  header('Location: view_appointments.php'); exit;
}
?>
<?php include '../includes/navbar.php'; ?>
<main class="container">
  <div class="card">
    <h2>Book Appointment</h2>
    <form method="post">
      <div class="form-row"><label>Patient</label><select name="patient_id" required><?php while($p=$patients->fetch_assoc()): ?><option value="<?php echo $p['patient_id']; ?>"><?php echo htmlspecialchars($p['name']); ?></option><?php endwhile; ?></select></div>
      <div class="form-row"><label>Doctor</label><select name="doctor_id" required><?php while($d=$doctors->fetch_assoc()): ?><option value="<?php echo $d['doctor_id']; ?>"><?php echo htmlspecialchars($d['name']); ?></option><?php endwhile; ?></select></div>
      <div class="form-row"><label>Date & Time</label><input name="date" type="datetime-local" required></div>
      <div class="form-row"><label>Issue</label><input name="issue"></div>
      <button class="btn" type="submit">Book</button>
      <a class="btn outline" href="view_appointments.php">Cancel</a>
    </form>
  </div>
</main>
