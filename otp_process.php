<?php
session_start();
require_once('dbcomms/dbcon.php');

$device = $_SESSION["device_validation"];
$otp_to_set = $_POST['register_otp'];
$user_to_verify = filter_var($_SESSION['user_to_verify'], FILTER_SANITIZE_STRING); // neil

if (isset($user_to_verify) && isset($_POST["validate_otp"])) {
    $pdoQuery = "SELECT userOTP FROM registered_users WHERE userName = :username";
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    $pdoResult->execute([":username" => $user_to_verify]);

    $look_for_otp = $pdoResult->fetch(PDO::FETCH_ASSOC);
    if ($look_for_otp && $look_for_otp['userOTP'] == $otp_to_set) {
        $pdoQueryOTP = "UPDATE registered_users SET userValidationStatus = 1 WHERE userName = :user";
        $pdoResultOTP = $pdoConnect->prepare($pdoQueryOTP);
        $pdoResultOTP->execute([':user' => $user_to_verify]);

        $pdoQueryCreateDeviceTable = "CREATE TABLE $device (
            id INT AUTO_INCREMENT PRIMARY KEY,
            temperature FLOAT NOT NULL,
            tds FLOAT NOT NULL,
            ph FLOAT NOT NULL,
            timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";

        $pdoQueryCreateDeviceTableResult = $pdoConnect->prepare($pdoQueryCreateDeviceTable);
        $pdoQueryCreateDeviceTableResult->execute();

        header("location: validated_page.php");
        unset($_SESSION["user_to_verify"]);
        unset($_SESSION["device_validation"]);
        exit();
    } else {
        header("location: validate_otp.php");
    }
} else {
}
$pdoConnect = null;
