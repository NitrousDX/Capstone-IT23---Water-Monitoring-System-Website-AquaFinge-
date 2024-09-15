<?php
session_start();
require_once("dbcomms/dbcon.php");

$avg = $_SESSION["logged_in_device"];

//Temperature
$AvgSqlTemp = "SELECT AVG(temperature) AS avgTemp FROM $avg";
$AvgTempResult = $pdoConnect->prepare($AvgSqlTemp);
$AvgTempResult->execute();
$AvgTempGET = $AvgTempResult->fetch(PDO::FETCH_ASSOC);

$AvgTempGET_Show = $AvgTempGET["avgTemp"];
$temp = number_format((float)$AvgTempGET_Show, 2, '.', '');

//TDS
$AvgSqlTDS = "SELECT AVG(tds) AS avgTds FROM $avg";
$AvgTDSResult = $pdoConnect->prepare($AvgSqlTDS);
$AvgTDSResult->execute();
$AvgTDSGET = $AvgTDSResult->fetch(PDO::FETCH_ASSOC);

$AvgTDSGET_Show = $AvgTDSGET["avgTds"];
$tds = number_format((float)$AvgTDSGET_Show, 2, '.', '');

//pH
$AvgPH = "SELECT AVG(ph) AS avgPH FROM $avg";
$AvgPHResult = $pdoConnect->prepare($AvgPH);
$AvgPHResult->execute();
$AvgPHGET = $AvgPHResult->fetch(PDO::FETCH_ASSOC);

$AvgPHGET_Show = $AvgPHGET["avgPH"];
$ph = number_format((float)$AvgPHGET_Show, 2, '.', '');

$counters = array(
    'temp' => $temp,
    'tds' => $tds,
    'ph' => $ph
);

header('Content-Type: application/json');
echo json_encode($counters);
