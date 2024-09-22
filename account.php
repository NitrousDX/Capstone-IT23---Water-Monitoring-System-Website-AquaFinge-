<?php
session_start();
if (!isset($_SESSION['logged_in_user'])) {
    header("location: ./");
    exit();
}

require_once("dbcomms/dbcon.php");

// Fetch user information from the database
$userEmail = $_SESSION['logged_in_user'];
$query = "SELECT userName, userEmail, userDeviceSerial FROM registered_users WHERE userEmail = :userEmail";
$stmt = $pdoConnect->prepare($query);
$stmt->bindParam(':userEmail', $userEmail, PDO::PARAM_STR);
$stmt->execute();
$userData = $stmt->fetch(PDO::FETCH_ASSOC);

// Update user information
$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newUserName = trim($_POST['username']);
    $newEmail = trim($_POST['email']);
    $newDeviceSerial = trim($_POST['deviceSerial']);
    $newPassword = trim($_POST['password']);

    // Validate inputs
    if (empty($newUserName) || empty($newEmail) || empty($newDeviceSerial)) {
        $message = "Username, Email, and Device Serial cannot be empty.";
    } elseif (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email format.";
    } else {
        // Prepare update statement
        $updateQuery = "UPDATE registered_users SET userName = :username, userEmail = :email, userDeviceSerial = :deviceSerial";

        if (!empty($newPassword)) {
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $updateQuery .= ", userPassword = :password"; // Add password to update
        }

        $updateQuery .= " WHERE userEmail = :oldEmail";
        
        $updateStmt = $pdoConnect->prepare($updateQuery);
        $updateStmt->bindParam(':username', $newUserName, PDO::PARAM_STR);
        $updateStmt->bindParam(':email', $newEmail, PDO::PARAM_STR);
        $updateStmt->bindParam(':deviceSerial', $newDeviceSerial, PDO::PARAM_STR);
        $updateStmt->bindParam(':oldEmail', $userEmail, PDO::PARAM_STR);
        
        if (!empty($newPassword)) {
            $updateStmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        }

        // Execute the update
        if ($updateStmt->execute()) {
            $message = "Account updated successfully.";
            // Update session with new email if it changed
            if ($newEmail !== $userEmail) {
                $_SESSION['logged_in_user'] = $newEmail;
            }
        } else {
            $message = "Error updating account.";
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
    <link rel="icon" type="image/x-icon" href="images/AquaFinge.png">
    <link rel="stylesheet" href="styles/test.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <div class="up">
                <div class="icon-container-flex" onclick="window.location.href='sensors.php'">
                    <img class="home-icon" src="images/home.png" draggable="false">
                    <div class="icon-name home-name">Home</div>
                </div>
                <div class="icon-container-flex" onclick="window.location.href='datalog.php'">
                    <img class="home-icon" src="images/data.png" draggable="false">
                    <div class="icon-name">Data</div>
                </div>
                <div class="icon-container-flex" onclick="window.location.href='account.php'">
                    <img class="accounts-icon" src="images/accounts.webp" draggable="false">
                    <div class="icon-name account-name">Accounts</div>
                </div>
                <div class="icon-container-flex" onclick="window.location.href='settings.php'">
                    <img class="settings-icon" src="images/settings.png" draggable="false">
                    <div class="icon-name">Settings</div>
                </div>
            </div>

            <div class="down">
                <div class="icon-container-flex" onclick="window.location.href='logout_process.php'">
                    <img class="logout-icon" src="images/logout.png" draggable="false">
                    <div class="icon-name logout-name">Log out</div>
                </div>
            </div>
        </div>

        <div>
            <div class="name">
                Account Information
            </div>
            <div class="main">
                <div class="info">
                    <p><strong>Username:</strong> <?= htmlspecialchars($userData['userName']) ?></p>
                    <p><strong>Email:</strong> <?= htmlspecialchars($userData['userEmail']) ?></p>
                    <p><strong>Device Serial#:</strong> <?= htmlspecialchars($userData['userDeviceSerial']) ?></p>
                    <hr>

                    <h3>Edit Account Information</h3>
                    <?php if ($message): ?>
                        <div class="message"><?= htmlspecialchars($message) ?></div>
                    <?php endif; ?>
                    <form method="POST" action="">







                    <div>
                        <div class="form-flex-yes">
                            <div class="form-flex">
                                <label for="username">New Username:</label>
                                <input type="text" name="username" id="username" value="<?= htmlspecialchars($userData['userName']) ?>" required>
                            </div>
                            <div class="form-flex">
                                <label for="email">New Email:</label>
                                <input type="email" name="email" id="email" value="<?= htmlspecialchars($userData['userEmail']) ?>" required>
                            </div>
                        </div>

                        <div class="form-flex-yes">
                            <div class="form-flex">
                                <label for="deviceSerial">New Device Serial:</label>
                                <input type="text" name="deviceSerial" id="deviceSerial" value="<?= htmlspecialchars($userData['userDeviceSerial']) ?>" required>
                            </div>

                            <div class="form-flex">
                                <label for="password">New Password:</label>
                                <input type="password" name="password" id="password" placeholder="leave blank if not changing">
                            </div>
                        </div>
                        <button class="update-account-btn" type="submit">Update Account</button>
                    </div>
                    </form>







                </div>
            </div>
        </div> 
    </div>
</body>

</html>
