<?php
session_start();
require_once('dbcomms/dbcon.php');

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['deviceSerial'])) {
    $deviceSerial = $data['deviceSerial'];
    $tempMin = $data['tempMin'];
    $tempMax = $data['tempMax'];
    $phMin = $data['phMin'];
    $phMax = $data['phMax'];
    $tdsMin = $data['tdsMin'];
    $tdsMax = $data['tdsMax'];

    // Check if the parameters already exist
    $checkQuery = "SELECT * FROM device_parameters WHERE userDeviceSerial = :deviceSerial";
    $checkStmt = $pdoConnect->prepare($checkQuery);
    $checkStmt->execute([':deviceSerial' => $deviceSerial]);
    $existingParameters = $checkStmt->fetch(PDO::FETCH_ASSOC);

    if ($existingParameters) {
        // Update existing parameters
        $updateQuery = "UPDATE device_parameters SET
            temp_min = :tempMin,
            temp_max = :tempMax,
            ph_min = :phMin,
            ph_max = :phMax,
            tds_min = :tdsMin,
            tds_max = :tdsMax
            WHERE userDeviceSerial = :deviceSerial";

        $updateStmt = $pdoConnect->prepare($updateQuery);
        $updateStmt->execute([
            ':tempMin' => $tempMin,
            ':tempMax' => $tempMax,
            ':phMin' => $phMin,
            ':phMax' => $phMax,
            ':tdsMin' => $tdsMin,
            ':tdsMax' => $tdsMax,
            ':deviceSerial' => $deviceSerial,
        ]);
    } else {
        // Optionally, you can insert new parameters if they don't exist
        $insertQuery = "INSERT INTO device_parameters (userDeviceSerial, temp_min, temp_max, ph_min, ph_max, tds_min, tds_max)
            VALUES (:deviceSerial, :tempMin, :tempMax, :phMin, :phMax, :tdsMin, :tdsMax)";

        $insertStmt = $pdoConnect->prepare($insertQuery);
        $insertStmt->execute([
            ':deviceSerial' => $deviceSerial,
            ':tempMin' => $tempMin,
            ':tempMax' => $tempMax,
            ':phMin' => $phMin,
            ':phMax' => $phMax,
            ':tdsMin' => $tdsMin,
            ':tdsMax' => $tdsMax,
        ]);
    }

    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
}
?>
