<?php
require_once '../config/db.php';
if(!isset($_GET['id'])){ header('Location: view_appointments.php'); exit; }
$id=intval($_GET['id']);
$stmt=$mysqli->prepare("DELETE FROM appointments WHERE appt_id=?"); $stmt->bind_param('i',$id); $stmt->execute();
header('Location: view_appointments.php'); exit;
?>