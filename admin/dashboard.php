<?php
session_start();
if(!isset($_SESSION['admin'])){ header('Location: login.php'); exit; }
include '../includes/navbar.php';
?>
<main class="container">
  <div class="card">
    <h2>Admin Dashboard</h2>
    <p>Welcome, <?php echo htmlspecialchars($_SESSION['admin']); ?>. Use links below to manage the system.</p>
    <ul>
      <li><a href="../patients/view_patients.php">Manage Patients</a></li>
      <li><a href="../doctors/view_doctors.php">Manage Doctors</a></li>
      <li><a href="../appointments/view_appointments.php">Manage Appointments</a></li>
      <li><a href="../inventory/view_inventory.php">Manage Inventory</a></li>
    </ul>
  </div>
</main>
