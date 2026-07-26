<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>HealthCare Management System (Lite)</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <script defer src="assets/js/script.js"></script>
</head>
<body>
<?php include 'includes/navbar.php'; ?>
<main class="container">
  <section class="hero">
    <h1>HealthCare Management System (Lite)</h1>
    <p class="lead">Simple hospital/clinic management — Patients, Doctors, Appointments & Inventory.</p>
    <div class="cta-row">
      <a class="btn" href="patients/view_patients.php">Manage Patients</a>
      <a class="btn" href="doctors/view_doctors.php">Manage Doctors</a>
      <a class="btn" href="appointments/view_appointments.php">Appointments</a>
      <a class="btn" href="inventory/view_inventory.php">Inventory</a>
      <a class="btn outline" href="admin/login.php">Admin Login</a>
    </div>
  </section>
</main>
<?php include 'includes/footer.php'; ?>
</body>
</html>
