<?php
session_start();
require('dbcomms/dbcon.php');
$current_user = $_SESSION['logged_in_user'];
$current_device = $_SESSION["logged_in_device"];

$sql = "SELECT * FROM $current_device ORDER BY id DESC";
$stmt = $pdoConnect->query($sql);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($results);
