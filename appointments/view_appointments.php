<?php
require_once '../config/db.php';
$res = $mysqli->query("SELECT a.*, p.name AS patient_name, d.name AS doctor_name FROM appointments a JOIN patients p ON a.patient_id=p.patient_id JOIN doctors d ON a.doctor_id=d.doctor_id ORDER BY appt_id DESC");
?>
<?php include '../includes/navbar.php'; ?>
<main class="container">
  <div class="card">
    <h2>Appointments <a class="btn" href="book_appointment.php" style="float:right">Book Appointment</a></h2>
    <div class="controls">
      <input class="input" data-search-target="#appts-table" placeholder="Live search appointments...">
    </div>
    <table id="appts-table" class="table">
      <tr><th>ID</th><th>Patient</th><th>Doctor</th><th>Date & Time</th><th>Issue</th><th>Actions</th></tr>
      <?php while($r=$res->fetch_assoc()): ?>
        <tr>
          <td><?php echo $r['appt_id']; ?></td>
          <td><?php echo htmlspecialchars($r['patient_name']); ?></td>
          <td><?php echo htmlspecialchars($r['doctor_name']); ?></td>
          <td><?php echo $r['appt_date']; ?></td>
          <td><?php echo htmlspecialchars($r['issue']); ?></td>
          <td class="actions"><a href="cancel_appointment.php?id=<?php echo $r['appt_id']; ?>" data-confirm="Cancel this appointment?">Cancel</a></td>
        </tr>
      <?php endwhile; ?>
    </table>
  </div>
</main>
