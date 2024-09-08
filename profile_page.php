<?php
session_start();

$_SESSION['logged_in_user'];
if (!isset($_SESSION['logged_in_user'])) {
    header("location: ./");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
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
        <div class="user-profile-container">
            <div class="user-profile-container-title">
                Personal Profile
                <div class="user-profile-container-sub">
                    Modify your account details.
                </div>
            </div>

            <div class="user-profile-form">
                <form action="" method="POST">
                    <div class="profile-box-wrapper">
                        <div class="profile-box">
                            <div class="p-box">
                                <input type="text" placeholder="Username" required>
                            </div>

                            <div class="p-box">
                                <input type="email" placeholder="Email" value="<?php echo $_SESSION['logged_in_user']?>" required>
                            </div>
                        </div>

                        <div class="profile-box">
                            <div class="p-box">
                                <input type="text" placeholder="Device Serial Number" required>
                            </div>

                            <div class="p-box">
                                <input type="password" placeholder="Password" required>
                            </div>
                        </div>
                    </div>

                </form>

                <form action="">
                    <input type="submit" class="form-button" value="Delete Data History">
                </form>
            </div>
        </div>
    </div>
</body>

</html>