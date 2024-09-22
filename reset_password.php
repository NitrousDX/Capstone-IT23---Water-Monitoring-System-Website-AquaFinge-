<?php
session_start();
require_once("../dbcomms/dbcon.php");

$message = '';

// Check if user is trying to access this page directly
if (!isset($_SESSION['email'])) {
    header("Location: ../login_page.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = trim($_POST['new_password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Validate password
    if (empty($new_password) || empty($confirm_password)) {
        $message = "Please fill in all fields.";
    } elseif ($new_password !== $confirm_password) {
        $message = "Passwords do not match.";
    } else {
        // Update password in the database
        $email = $_SESSION['email']; // Use the email stored in session
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        
        $stmt = $pdoConnect->prepare("UPDATE registered_users SET userPassword = :password WHERE userEmail = :email");
        $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        
        if ($stmt->execute()) {
            // Clear OTP and email session
            unset($_SESSION['otp']);
            unset($_SESSION['email']);

            $message = "Password has been successfully reset.";
            // Redirect to login or another page
            header("Location: ../login_page.php");
            exit();
        } else {
            $message = "Failed to reset password. Please try again.";
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
                Password Reset
                <div class="login-title-sub">
                    Change your password
                </div>
            </div>

            <div class="login-form">
                <form method="POST" action="">
                    <div class="box">
                        <input type="password" name="new_password" placeholder="New Password" required>
                    </div>
                    <div class="box">
                        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                    </div>
                    <input class="form-button" type="submit" value="Change Password">
                    <?php if ($message): ?>
                    <div class="message"><?= htmlspecialchars($message) ?></div>
                <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
