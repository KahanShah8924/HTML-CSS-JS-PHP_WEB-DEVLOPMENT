<?php
$host = 'localhost';
$db   = 'healthcare_db';
$user = 'root';
$pass = '';
$mysqli = new mysqli($host, $user, $pass, $db);
if ($mysqli->connect_error) {
    die('DB Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
$mysqli->set_charset("utf8mb4");
?>