<?php
session_start();
require_once('dbcomms/dbcon.php');

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['register'])) {
    $user_register = htmlspecialchars(trim($_POST['register_username']));
    $password_register = trim($_POST['register_password']);
    $email_register = filter_var(trim($_POST['register_email']), FILTER_SANITIZE_EMAIL);
    $device_register = htmlspecialchars(trim($_POST['register_device']));
    $otp_generator = rand(100000, 999999);
    $userDefaultState = 0;

    $hashed_register_password = password_hash($password_register, PASSWORD_BCRYPT);
    $pdoQueryCount = "SELECT COUNT(userEmail) AS email_count FROM registered_users WHERE userEmail = :email";
    $pdoResultCount = $pdoConnect->prepare($pdoQueryCount);
    $pdoResultCount->execute([":email" => $email_register]);

    $if_counted = $pdoResultCount->fetch(PDO::FETCH_ASSOC)['email_count'];

    if ($if_counted > 0) {
        header("location: AccountExisting.php");
    } else if (empty($user_register) || empty($password_register)) {
        //optional error handling
    } else {
        $pdoQuery = "INSERT INTO registered_users (userName, userEmail, userPassword, userDeviceSerial, userOTP, userValidationStatus) 
        VALUES (:user, :email, :pass, :device, :otp, :valid)";
        $pdoResult = $pdoConnect->prepare($pdoQuery);
        $pdoResult->execute([
            ":user" => $user_register,
            ":email" => $email_register,
            ":pass" => $hashed_register_password,
            ":device" => $device_register,
            ":otp" => $otp_generator,
            ":valid" => $userDefaultState
        ]);

        // $pdoQueryCreateDeviceTable = "CREATE TABLE $device_register (
        //     id INT AUTO_INCREMENT PRIMARY KEY,
        //     temperature FLOAT NOT NULL,
        //     tds FLOAT NOT NULL,
        //     ph FLOAT NOT NULL,
        //     timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        // )";
    
        // $pdoQueryCreateDeviceTableResult = $pdoConnect->prepare($pdoQueryCreateDeviceTable);
        // $pdoQueryCreateDeviceTableResult->execute();

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'fajardoneil8@gmail.com';
            $mail->Password   = 'jhfn ublv gobs xlxa';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            $mail->setFrom('fajardoneil8@gmail.com', 'No Reply');
            $mail->addAddress($email_register);

            $mail->isHTML(true);
            $mail->Subject = 'Your OTP Code';
            $mail->Body    = "Hello $user_register,<br>Your OTP code is: <b>$otp_generator</b>";

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        header("location: validate_page.php");
        $_SESSION['user_to_verify'] = $user_register;
        $_SESSION["device_validation"] = $device_register; 
        exit();
    }
}
$pdoConnect = null;
