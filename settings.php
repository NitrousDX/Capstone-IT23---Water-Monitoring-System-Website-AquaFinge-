<?php
session_start();
$_SESSION['logged_in_user'];
$dev = $_SESSION['logged_in_device'];

require_once("dbcomms/dbcon.php");

if (!isset($_SESSION['logged_in_user'])) {
    header("location: ./");
    exit();
}

// Handle the form submission for saving gauge settings
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Fetch parameters from POST
    $tempMin = $_POST['tempMin'];
    $tempMax = $_POST['tempMax'];
    $phMin = $_POST['phMin'];
    $phMax = $_POST['phMax'];
    $tdsMin = $_POST['tdsMin'];
    $tdsMax = $_POST['tdsMax'];

    // Prepare and execute your database insert/update here
    try {
        $pdoQuery = "INSERT INTO device_parameters (userDeviceSerial, temp_min, temp_max, ph_min, ph_max, tds_min, tds_max)
                     VALUES (:serial, :tempMin, :tempMax, :phMin, :phMax, :tdsMin, :tdsMax)
                     ON DUPLICATE KEY UPDATE
                     temp_min = :tempMin, temp_max = :tempMax, ph_min = :phMin, ph_max = :phMax, tds_min = :tdsMin, tds_max = :tdsMax";

        $stmt = $pdoConnect->prepare($pdoQuery);
        $stmt->execute([
            ':serial' => $dev,
            ':tempMin' => $tempMin,
            ':tempMax' => $tempMax,
            ':phMin' => $phMin,
            ':phMax' => $phMax,
            ':tdsMin' => $tdsMin,
            ':tdsMax' => $tdsMax,
        ]);
    } catch (Exception $e) {
        echo "Error saving settings: " . htmlspecialchars($e->getMessage());
    }
}

// Fetch current parameters
try {
    $parametersQuery = $pdoConnect->prepare("SELECT * FROM device_parameters WHERE userDeviceSerial = :serial");
    $parametersQuery->execute([':serial' => $dev]);
    $currentParams = $parametersQuery->fetch(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Error fetching current settings: " . htmlspecialchars($e->getMessage());
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
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.4/raphael-min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/justgage/1.2.9/justgage.min.js"></script>
    <!-- <script src="Scripts/UpdateAvgValues.js" defer></script>
    <script src="Scripts/UpdateGauge.js" defer></script>
    <script src="Scripts/UpdateTable.js" defer></script> -->
    <script src="Scripts/gaugeSettings.js" defer></script>
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

        <div >
            <div class="name">
                Set Gauge Parameters for Serial: <?php echo htmlspecialchars($dev); ?>
            </div>

            <div class="main">
                <form id="gauge-settings-form" method="POST">

                    <div class="form-flex-yes">
                        <div class="form-flex">
                            <label for="tempMin">Temperature Min:</label>
                            <input type="number" id="tempMin" name="tempMin" value="<?= htmlspecialchars($currentParams['temp_min'] ?? '') ?>" required>
                        </div>
                        
                        <div class="form-flex">
                            <label for="tempMax">Temperature Max:</label>
                            <input type="number" id="tempMax" name="tempMax" value="<?= htmlspecialchars($currentParams['temp_max'] ?? '') ?>" required>
                        </div>
                    </div>

                    <div class="form-flex-yes">
                        <div class="form-flex">
                            <label for="phMin">pH Min:</label>
                            <input type="number" id="phMin" name="phMin" value="<?= htmlspecialchars($currentParams['ph_min'] ?? '') ?>" required>
                        </div>
                    
                        <div class="form-flex">
                            <label for="phMax">pH Max:</label>
                            <input type="number" id="phMax" name="phMax" value="<?= htmlspecialchars($currentParams['ph_max'] ?? '') ?>" required>
                        </div>
                    </div>
                    
                    <div class="form-flex-yes">
                        <div class="form-flex">
                            <label for="tdsMin">TDS Min:</label>
                            <input type="number" id="tdsMin" name="tdsMin" value="<?= htmlspecialchars($currentParams['tds_min'] ?? '') ?>" required>
                        </div>

                        <div class="form-flex">
                            <label for="tdsMax">TDS Max:</label>
                            <input type="number" id="tdsMax" name="tdsMax" value="<?= htmlspecialchars($currentParams['tds_max'] ?? '') ?>" required>
                        </div>
                    </div>
                    <input class="setting-btn" type="submit" value="Save Settings">
                </form>
            </div>
        </div>
    </div>
</body>

</html>
