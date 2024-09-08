<?php
session_start();
if (!isset($_SESSION['user_to_verify'])) {
    header("location: ./");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AquaFinge</title>
    <link rel="stylesheet" href="styles/landing_page.css">
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
                Enter OTP
                <div class="login-title-sub">
                    Check your OTP in your Email Account.
                </div>
            </div>

            <div class="login-form">
                <form action="otp_process.php" method="POST">
                    <div class="box">
                        <input type="text" name="register_otp" placeholder="OTP Code (6-Digit)" required>
                    </div>
                    <input class="form-button" type="submit" name="validate_otp" value="Verify Account">
                </form>
            </div>
        </div>
    </div>
</body>

</html>