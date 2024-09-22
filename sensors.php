<?php
session_start();
$dev = $_SESSION['logged_in_device'];
if (!isset($_SESSION['logged_in_user'])) {
    header("location: ./");
    exit();
}

// Database connection
require_once("dbcomms/dbcon.php");

// Fetch current readings
$currentReadings = $pdoConnect->query("SELECT temperature, ph, tds FROM `$dev` ORDER BY timestamp DESC LIMIT 1")->fetch(PDO::FETCH_ASSOC);

// Fetch parameters
$parameters = $pdoConnect->prepare("SELECT * FROM device_parameters WHERE userDeviceSerial = :serial");
$parameters->execute([':serial' => $dev]);
$paramData = $parameters->fetch(PDO::FETCH_ASSOC);

// Warnings
$warnings = [];
if ($currentReadings['temperature'] < $paramData['temp_min']) {
    $warnings[] = "Warning: Temperature is too low; it is below the minimum of {$paramData['temp_min']} degrees.";
}
if ($currentReadings['temperature'] > $paramData['temp_max']) {
    $warnings[] = "Warning: Temperature is too high; it exceeds the maximum of {$paramData['temp_max']} degrees.";
}
if ($currentReadings['ph'] < $paramData['ph_min']) {
    $warnings[] = "Warning: pH is too low; it is below the minimum of {$paramData['ph_min']}.";
}
if ($currentReadings['ph'] > $paramData['ph_max']) {
    $warnings[] = "Warning: pH is too high; it exceeds the maximum of {$paramData['ph_max']}.";
}
if ($currentReadings['tds'] < $paramData['tds_min']) {
    $warnings[] = "Warning: TDS is too low; it is below the minimum of {$paramData['tds_min']}.";
}
if ($currentReadings['tds'] > $paramData['tds_max']) {
    $warnings[] = "Warning: TDS is too high; it exceeds the maximum of {$paramData['tds_max']}.";
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
    <script src="Scripts/UpdateAvgValues.js" defer></script>
    <script src="Scripts/UpdateGauge.js" defer></script>
    <script src="Scripts/UpdateTable.js" defer></script>
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
        
        <div class="main-content">
            <div class="title-wrapper">
                <div class="title">
                    AquaFinge
                    <div class="title-sub">
                        For Artificial Pond Environments (RAS)
                    </div>
                </div>

             <!-- Warnings Display -->
            <?php if (!empty($warnings)): ?>
                <div class="warnings">
                    <?php foreach ($warnings as $warning): ?>
                        <div class="warning-message"><?php echo $warning; ?></div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            
            </div>

            <div class="data-history">
                <div class="data-history-title"> Data History
                    <div class="data-history-title-sub">
                        Live data from <b><?php echo $dev; ?></b> Water Monitoring Device
                    </div>
                </div>

                <div class="data-history-table">
                    <div class="average-counter">
                        Average Temperature
                        <div class="avg-value" id="avg-temp">0</div>
                    </div>
                    <div class="average-counter">
                        Average TDS
                        <div class="avg-value" id="avg-tds">0</div>
                    </div>
                    <div class="average-counter">
                        Average pH
                        <div class="avg-value" id="avg-ph">0</div>
                    </div>
                </div>
            </div>

            <div class="sensor-gauges">
                <div class="sensor-gauges-title"> Sensor Gauges
                    <div class="sensor-gauges-title-sub">
                        Live data received from device.
                    </div>
                </div>

                <div class="sensor-gauges-container">
                    <div class="sensor-bar">
                        <div class="gauge-title">Temperature</div>
                        <div class="gauge-container">
                            <div id="temperature-gauge" style="width: 400px; height: auto;"></div>
                        </div>
                        <div class="gauge-table">
                            <table>
                                <thead>
                                    <th>TEMP</th>
                                    <th>Timestamp</th>
                                </thead>
                                <tbody id="temp-table-body">
                                    <td>0</td>
                                    <td>0</td>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="sensor-bar">
                        <div class="gauge-title">Total Dissolved Solids</div>
                        <div class="gauge-container">
                            <div id="tds-gauge" style="width: 400px; height: auto;"></div>
                        </div>
                        <div class="gauge-table">
                            <table>
                                <thead>
                                    <th>TDS</th>
                                    <th>Timestamp</th>
                                </thead>
                                <tbody id="tds-table-body">
                                    <td>0</td>
                                    <td>0</td>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="sensor-bar">
                        <div class="gauge-title">Potential of Hydrogen</div>
                        <div class="gauge-container">
                            <div id="ph-gauge" style="width: 400px; height: auto;"></div>
                        </div>
                        <div class="gauge-table">
                            <table>
                                <thead>
                                    <th>PH</th>
                                    <th>Timestamp</th>
                                </thead>
                                <tbody id="ph-table-body">
                                    <td>0</td>
                                    <td>0</td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
