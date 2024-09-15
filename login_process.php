<?php
session_start();
require_once("dbcomms/dbcon.php");

$pdoConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST["login"])) {
    $email_login = filter_var(trim($_POST["email_login"]), FILTER_SANITIZE_EMAIL);
    $password_login = trim($_POST["password_login"]);

    $pdoQuery = "SELECT userPassword, userValidationStatus, userDeviceSerial FROM registered_users WHERE userEmail = :email";
    $pdoResult = $pdoConnect->prepare($pdoQuery);
    $pdoResult->execute([':email' => $email_login]);

    $user_details_fetch = $pdoResult->fetch(PDO::FETCH_ASSOC);

    if ($user_details_fetch && password_verify($password_login, $user_details_fetch["userPassword"])) {
        if ((int)$user_details_fetch["userValidationStatus"] === 1) {
            $_SESSION['logged_in_user'] = $email_login; //current in session
            $_SESSION['logged_in_device'] = $user_details_fetch["userDeviceSerial"];
            header("location: sensors.php");
        } else {
            header("location: validate_page.php");
        }
    } else {
        echo "Account Does not Exist.";
    }
} else {
    echo "wher tf is yo account?";
}