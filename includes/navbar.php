<?php
if (session_status() === PHP_SESSION_NONE) session_start();
$logged = isset($_SESSION['admin']);
?>
<header class="site-header">
  <div class="wrap">
    <a class="brand" href="/index.php">HMS-Lite</a>
    <nav class="nav">
      <a href="/patients/view_patients.php">Patients</a>
      <a href="/doctors/view_doctors.php">Doctors</a>
      <a href="/appointments/view_appointments.php">Appointments</a>
      <a href="/inventory/view_inventory.php">Inventory</a>
      <?php if($logged): ?>
        <a href="/admin/dashboard.php">Dashboard</a>
        <a href="/admin/logout.php" class="danger">Logout</a>
      <?php else: ?>
        <a href="/admin/login.php">Admin</a>
      <?php endif; ?>
    </nav>
  </div>
</header>