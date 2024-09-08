<?php
session_start();
if (!isset($_SESSION['user_to_verify'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Validation</title>
    <link rel="stylesheet" href="styles/login.css">
</head>

<body>
    <div class="img-box">
        <div class="website-title">AquaFinge
            <div class="website-title-sub">
                Innovating IoT Devices to Agriculture
            </div>
        </div>
    </div>

    <div class="login-container">
        <div class="login-title">
            Validate OTP
            <div class="login-title-sub">
                Check OTP Code in your Email.
            </div>
        </div>

        <div class="login-form">
            <form action="otp_process.php" method="POST">
                <div class="box">
                    <input type="text" name="register_otp" placeholder="OTP Code (6-Digit Code)" required>
                </div>
                <input type="submit" name="validate_otp" value="Validate Account"> <!-- button -->
            </form>
        </div>
        <div class="info" draggable="false">Don't Have Account? <a href="register.php">Create Here</a></div>
    </div>
</body>

</html>