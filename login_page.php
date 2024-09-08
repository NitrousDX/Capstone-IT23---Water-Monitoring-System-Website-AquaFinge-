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
                Login
                <div class="login-title-sub">
                    Login your exising account.
                </div>
                <div class="notifier" id="notif">
                    Account Doesn't Exist.
                </div>
            </div>

            <div class="login-form">
                <form action="login_process.php" method="POST">
                    <div class="box">
                        <input type="email" name="email_login" placeholder="Email Address" required>
                    </div>
                    <div class="box">
                        <input type="password" name="password_login" placeholder="Password" required>
                    </div>
                    <input class="form-button" type="submit" name="login" value="Login Account">
                </form>
            </div>
            <div class="info" draggable="false">Don't Have Account? <a href="register_page.php"><b>Create Here.</b></a></div>
        </div>
    </div>
</body>

</html>