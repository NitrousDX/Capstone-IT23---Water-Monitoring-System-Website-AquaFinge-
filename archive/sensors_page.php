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
    <title>AquaFinge - Sensor Data</title>
    <link rel="stylesheet" href="styles/lemon.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.4/raphael-min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/justgage/1.2.9/justgage.min.js"></script>
    <script src="Scripts/UpdateGauge.js" defer></script>
    <script src="Scripts/UpdateTable.js" defer></script>
</head>

<body>
    <div class="main-content">
        <div class="sidebar">
            <div class="sensor-icons" id="sensorIcons">
                <div class="sensor-icon">
                    <i class="fa fa-thermometer-half"></i> <!-- Temperature -->
                    <div class="active-indicator" id="temp-indicator"></div>
                </div>
                <div class="sensor-icon">
                    <i class="fa fa-tint"></i> <!-- TDS -->
                    <div class="active-indicator" id="tds-indicator"></div>
                </div>
                <div class="sensor-icon">
                    <i class="fa fa-flask"></i> <!-- pH -->
                    <div class="active-indicator" id="ph-indicator"></div>
                </div>
            </div>
        </div>

        <div class="sensor-gauges">
            <div class="header-things">
                <div class="website-title">
                    <div class="title">
                        AquaFinge
                    </div>
                    <div class="sub-text">
                        <div id="temperature-display"></div>
                        For Artificial Pond Environments
                    </div>
                </div>

                <!-- <div class="options">
                    <a href="profile_page.php" class="buttons">User Profile</a>
                    <a href="logout_process.php" class="buttons">Logout</a>
                </div> -->
            </div>

            <div class="data-history">
                <div class="title">
                    Data History
                </div>
                <div class="sub-text">
                    Recorded Data for the past 24 Hours.
                </div>
                <div class="table-data">
                    <table>
                        <thead>
                            <tr class="table-header">
                                <th>Temperature</th>
                                <th>Total Dissolved Solids</th>
                                <th>Potential of Hydrogen</th>
                                <th>Timestamp</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="sensor-meters">
                <div class="sticky-header"> <!-- unused -->
                    <div class="title">
                        Sensors
                    </div>
                    <div class="sub-text">
                        Live Sensor Monitoring
                    </div>
                </div>

                <div class="vertical-orientation">
                    <div class="sensor-bar">
                        <div class="gauge-container">
                            <div id="temperature-gauge" style="width: 200px; height: auto;"></div>
                        </div>
                    </div>
                    <div class="sensor-bar">
                        <div class="gauge-container">
                            <div id="tds-gauge" style="width: 200px; height: auto;"></div>
                        </div>
                    </div>
                    <div class="sensor-bar">
                        <div class="gauge-container">
                            <div id="ph-gauge" style="width: 200px; height: auto;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>