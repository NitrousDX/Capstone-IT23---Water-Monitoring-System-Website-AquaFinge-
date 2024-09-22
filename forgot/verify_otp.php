<?php
session_start();

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_otp = trim($_POST['otp']);

    if ($input_otp == $_SESSION['otp']) {
        header("Location: reset_password.php");
        exit();
    } else {
        $message = "Invalid OTP. Please try again.";
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
                    Enter received OTP
                </div>
                <div class="notifier" id="notif">
                    Account Doesn't Exist.
                </div>
            </div>

            <div class="login-form">
            <form method="POST" action="">
                    <div class="box">
                    <input type="text" name="otp" id="otp" required>
                    </div>
                    <input class="form-button" type="submit" name="login" value="Verify OTP">
                </form>
            </div>
            <div class="info" draggable="false">Re-enter email <a href="forgot_password.php"><b>Click Here.</b></a></div>
            <?php if ($message): ?>
        <div class="message"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>
        </div>
    </div>
</body>

</html>
