<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AquaFinge</title>
    <link rel="stylesheet" href="styles/index.css">
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
                Create Account
                <div class="login-title-sub">
                    Create your account along with your device.
                </div>
            </div>

            <div class="login-form">
                <form action="register_process.php" method="POST">
                    <div class="box">
                        <input type="text" name="register_username" placeholder="Username" required>
                    </div>
                    <div class="box">
                        <input type="email" name="register_email" placeholder="Email Address" required>
                    </div>
                    <div class="box">
                        <input type="text" name="register_device" placeholder="Device Serial Number" required>
                    </div>
                    <div class="box">
                        <input type="password" name="register_password" placeholder="Password" required>
                    </div>
                    <input type="submit" class="form-button" name="register" value="Create Account">
                </form>
            </div>
            <div class="info" draggable="false">Already have account? <a href="login_page.php"><b>Login Here.</b></a></div>
        </div>
    </div>
</body>

</html>