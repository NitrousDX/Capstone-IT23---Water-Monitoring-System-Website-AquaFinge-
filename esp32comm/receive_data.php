<?php
require_once('../dbcomms/dbcon.php');

$json = file_get_contents('php://input');
$data = json_decode($json, true);

$deviceSerial = $data['deviceSerial'];
$temperature = $data['tempData'];
$tds = $data['tdsData'];
$ph = $data['phData'];

$deviceSerial = htmlspecialchars($deviceSerial, ENT_QUOTES, 'UTF-8');

$findDeviceTableQuery = "SHOW TABLES LIKE :tableName";
$findDeviceTableQueryResult = $pdoConnect->prepare($findDeviceTableQuery);
$findDeviceTableQueryResult->execute(['tableName' => $deviceSerial]);

if ($findDeviceTableQueryResult->rowCount() > 0) {
    $pdoQuery = "INSERT INTO $deviceSerial (temperature, tds, ph) VALUES (:temp, :tds, :ph)";
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    $pdoResult->execute([
        ":temp" => $temperature,
        ":tds" => $tds,
        ":ph" => $ph
    ]);
    echo json_encode(["status" => "success", "message" => "Data inserted successfully"]);
} else {
    echo json_encode(["status" => "failure", "message" => "Table does not exist"]);
}
