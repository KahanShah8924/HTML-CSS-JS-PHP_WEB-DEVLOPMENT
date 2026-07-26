<?php
require_once '../config/db.php';
if(!isset($_GET['id'])){ header('Location: view_patients.php'); exit; }
$id = intval($_GET['id']);
$stmt = $mysqli->prepare("DELETE FROM patients WHERE patient_id = ?");
$stmt->bind_param('i',$id); $stmt->execute();
header('Location: view_patients.php'); exit;
?>