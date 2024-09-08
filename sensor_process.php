<?php
require_once("dbcomms/dbcon.php");

if (isset($_SESSION["logged_in_device"])) {
    $loggedDevice = $_SESSION["logged_in_device"];

    $pdoQuery = "SELECT temperature, tds, ph FROM $loggedDevice ORDER BY timestamp DESC LIMIT 1";
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    $pdoResult->execute();
    $sensorData = $pdoResult->fetch(PDO::FETCH_ASSOC);
    
}
