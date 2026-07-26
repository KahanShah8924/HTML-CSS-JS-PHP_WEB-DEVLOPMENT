<?php
require_once '../config/db.php';
$res = $mysqli->query("SELECT * FROM patients ORDER BY patient_id DESC");
?>
<?php include '../includes/navbar.php'; ?>
<main class="container">
  <div class="card">
    <h2>Patients <a class="btn" href="add_patient.php" style="float:right">Add Patient</a></h2>
    <div class="controls">
      <input class="input" data-search-target="#patients-table" placeholder="Live search patients by any column...">
      <a class="btn" href="add_patient.php">New Patient</a>
    </div>
    <table id="patients-table" class="table">
      <tr><th>ID</th><th>Name</th><th>Age</th><th>Gender</th><th>Contact</th><th>Issue</th><th>Actions</th></tr>
      <?php while($r = $res->fetch_assoc()): ?>
        <tr>
          <td><?php echo $r['patient_id']; ?></td>
          <td><?php echo htmlspecialchars($r['name']); ?></td>
          <td><?php echo $r['age']; ?></td>
          <td><?php echo $r['gender']; ?></td>
          <td><?php echo htmlspecialchars($r['contact']); ?></td>
          <td><?php echo htmlspecialchars($r['issue']); ?></td>
          <td class="actions">
            <a href="edit_patient.php?id=<?php echo $r['patient_id']; ?>">Edit</a>
            <a href="delete_patient.php?id=<?php echo $r['patient_id']; ?>" data-confirm="Delete this patient?">Delete</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </table>
  </div>
</main>
