<?php
require_once '../dbcomms/dbcon.php';

$dataFile = 'latest_data.json';
$timeoutDuration = 60;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = file_get_contents('php://input');
    $dataArray = json_decode($data, true);

    $deviceSerial = $dataArray['deviceSerial'];

    $dataArray['timestamp'] = time();

    $sql = "INSERT INTO $deviceSerial (temperature, tds, ph)
            VALUES (:tempData, :tdsData, :phData)";

    $stmt = $pdoConnect->prepare($sql);
    $stmt->execute([
        ':tempData' => $dataArray['tempData'],
        ':tdsData' => $dataArray['tdsData'],
        ':phData' => $dataArray['phData']
    ]);

    file_put_contents($dataFile, json_encode($dataArray));
} else {
    $sql = "SELECT * FROM $deviceSerial ORDER BY id DESC LIMIT 1";
    $stmt = $pdoConnect->query($sql);
    $latestData = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($latestData) {
        $currentTime = time();
        $dataAge = $currentTime - $latestData['timestamp'];

        if ($dataAge > $timeoutDuration) {
            echo json_encode([
                'tempData' => 0.0,
                'tdsData' => 0.0,
                'phData' => 0.0,
            ]);
        } else {
            header('Content-Type: application/json');
            echo json_encode($latestData);
        }
    } else {
        // No data found in the database, return default values
        echo json_encode([
            'tempData' => 0.0,
            'tdsData' => 0.0,
            'phData' => 0.0,
        ]);
    }
}
