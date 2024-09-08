<?php
$file = 'data.txt';
$data = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$latestData = end($data);
$dataArray = json_decode($latestData, true);

header('Content-Type: application/json');
echo json_encode($dataArray);
?>
