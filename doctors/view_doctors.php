<?php
require_once '../config/db.php';
$res = $mysqli->query("SELECT * FROM doctors ORDER BY doctor_id DESC");
?>
<?php include '../includes/navbar.php'; ?>
<main class="container">
  <div class="card">
    <h2>Doctors <a class="btn" href="add_doctor.php" style="float:right">Add Doctor</a></h2>
    <div class="controls">
      <input class="input" data-search-target="#doctors-table" placeholder="Live search doctors...">
      <a class="btn" href="add_doctor.php">New Doctor</a>
    </div>
    <table id="doctors-table" class="table">
      <tr><th>ID</th><th>Name</th><th>Specialization</th><th>Phone</th><th>Email</th><th>Actions</th></tr>
      <?php while($r = $res->fetch_assoc()): ?>
        <tr>
          <td><?php echo $r['doctor_id']; ?></td>
          <td><?php echo htmlspecialchars($r['name']); ?></td>
          <td><?php echo htmlspecialchars($r['specialization']); ?></td>
          <td><?php echo htmlspecialchars($r['phone']); ?></td>
          <td><?php echo htmlspecialchars($r['email']); ?></td>
          <td class="actions">
            <a href="edit_doctor.php?id=<?php echo $r['doctor_id']; ?>">Edit</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </table>
  </div>
</main>
