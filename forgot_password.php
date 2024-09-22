<?php
session_start();
require_once("../dbcomms/dbcon.php");
require '../vendor/autoload.php'; // Include the PHPMailer library

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);

    // Validate email
    if (empty($email)) {
        $message = "Please enter your email.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email format.";
    } else {
        // Check if email exists in the database
        $stmt = $pdoConnect->prepare("SELECT userEmail FROM registered_users WHERE userEmail = :email");
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Generate a unique OTP
            $otp = rand(100000, 999999);
            $_SESSION['otp'] = $otp;
            $_SESSION['email'] = $email; // Store email for later use

            // Send email with OTP
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
                $mail->addAddress($email);

                $mail->isHTML(true);
                $mail->Subject = 'Your OTP Code';
                $mail->Body    = "Hello,<br>Your OTP code is: <b>$otp</b>";

                $mail->send();

                header("Location: verify_otp.php");
                exit();
            } catch (Exception $e) {
                $message = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            $message = "No account found with that email.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AquaFinge</title>
    <link rel="stylesheet" href="../styles/index.css">
    <link rel="icon" type="image/x-icon" href="images/AquaFinge.png">
</head>

<body>
    <div class="header">
        <div class="header-title">
            <a href="./">AquaFinge</a>
        </div>
    </div>

    <div class="main">
        <div class="login-container">
            <div class="login-title">
                Password reset
                <div class="login-title-sub">
                    Enter Registered Email
                </div>
                <div class="notifier" id="notif">
                    Account Doesn't Exist.
                </div>
            </div>

            <div class="login-form">
            <form method="POST" action="">
                    <div class="box">
                        <input type="email" name="email" placeholder="Email Address" required>
                    </div>
                    <input class="form-button" type="submit" name="login" value="Submit OTP">
                </form>
            </div>
            <div class="info" draggable="false">Signup/Register <a href="../login_page.php"><b>Click Here.</b></a></div>
            <?php if ($message): ?>
        <div class="message"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>
        </div>
    </div>
</body>

</html>
