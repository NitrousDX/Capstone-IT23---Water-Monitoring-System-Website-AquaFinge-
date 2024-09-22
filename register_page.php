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
                        <input type="text" name="register_username" placeholder="Username" value="<?php echo isset($_GET['username']) ? htmlspecialchars($_GET['username']) : ''; ?>" required>
                    </div>
                    <div class="box">
                        <input type="email" name="register_email" placeholder="Email Address" value="<?php echo isset($_GET['email']) ? htmlspecialchars($_GET['email']) : ''; ?>" required>
                    </div>
                    <div class="box">
                        <input type="text" name="register_device" placeholder="Device Serial Number" value="<?php echo isset($_GET['device']) ? htmlspecialchars($_GET['device']) : ''; ?>" required>
                    </div>
                    <div class="box">
                        <input type="password" name="register_password" placeholder="Password" required>
                    </div>
                    <input type="submit" class="form-button" name="register" value="Create Account">
                </form>
                <?php if (isset($_GET['warning'])): ?>
                    <div class="warning" style="color: red;">
                        <?php
                        switch ($_GET['warning']) {
                            case 'email_exists':
                                echo 'An account with this email already exists.';
                                break;
                            case 'username_exists':
                                echo 'This username is already taken.';
                                break;
                            case 'missing_fields':
                                echo 'Username and password are required.';
                                break;
                            default:
                                echo 'An unknown error occurred.';
                        }
                        ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="info" draggable="false">Already have an account? <a href="login_page.php"><b>Login Here.</b></a></div>
        </div>
    </div>
</body>

</html>