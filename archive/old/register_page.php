<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
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
            Create Account
            <div class="login-title-sub">
                Create your account along with your device.
            </div>
        </div>

        <div class="login-form">
            <form action="processes/register_process.php" method="POST">
                <div class="box">
                    <input type="text" name="register_username" placeholder="Username" required>
                </div>
                <div class="box">
                    <input type="email" name="register_email" placeholder="Email" required>
                </div>
                <div class="box">
                    <input type="text" name="register_device" placeholder="Device Serial No." required>
                </div>
                <div class="box">
                    <input type="password" name="register_password" placeholder="Password" required>
                </div>
                <input type="submit" name="register" value="Create Account">
            </form>
        </div>
        <div class="info" draggable="false">Have Account? <a href="login_page.php">Login Here</a></div>
    </div>
</body>

</html>