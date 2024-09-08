<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>
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
            Login
            <div class="login-title-sub">
                Login your exising account.
            </div>
        </div>

        <div class="login-form">
            <form action="processes/login_process.php" method="POST">
                <div class="box">
                    <input type="email" name="email_login" placeholder="Email" required>
                </div>
                <div class="box">
                    <input type="password" name="password_login" placeholder="Password" required>
                </div>
                <input type="submit" name="login" value="Login Account">
            </form>
        </div>
        <div class="info" draggable="false">Don't Have Account? <a href="register_page.php">Create Here</a></div>
    </div>
</body>
</html>