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

    // Check if email exists
    $pdoQueryEmailCount = "SELECT COUNT(userEmail) AS email_count FROM registered_users WHERE userEmail = :email";
    $pdoResultEmailCount = $pdoConnect->prepare($pdoQueryEmailCount);
    $pdoResultEmailCount->execute([":email" => $email_register]);
    $email_count = $pdoResultEmailCount->fetch(PDO::FETCH_ASSOC)['email_count'];

    // Check if username exists
    $pdoQueryUsernameCount = "SELECT COUNT(userName) AS username_count FROM registered_users WHERE userName = :username";
    $pdoResultUsernameCount = $pdoConnect->prepare($pdoQueryUsernameCount);
    $pdoResultUsernameCount->execute([":username" => $user_register]);
    $username_count = $pdoResultUsernameCount->fetch(PDO::FETCH_ASSOC)['username_count'];

    // Check for duplicate email or username
    if ($email_count > 0) {
        $warning_message = "email_exists";
    } else if ($username_count > 0) {
        $warning_message = "username_exists";
    } else if (empty($user_register) || empty($password_register)) {
        $warning_message = "missing_fields";
    } else {
        // Proceed with registration if no duplicates found
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

        // Send OTP email
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

        // Redirect to OTP validation page
        header("location: validate_page.php");
        $_SESSION['user_to_verify'] = $user_register;
        $_SESSION["device_validation"] = $device_register;
        exit();
    }

    // Redirect back with warning and form data
    header("location: register_page.php?warning=$warning_message&username=$user_register&email=$email_register&device=$device_register");
    exit();
}
?>
