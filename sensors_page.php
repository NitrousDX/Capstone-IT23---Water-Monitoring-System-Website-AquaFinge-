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
    <script src="gauge/GaugeMeter.js"></script>
    <script src="Scripts/FetchData.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/locales/de_DE.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/germanyLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/fonts/notosans-sc.js"></script>
</head>

<body>
    <div class="main-content">
        <div class="sidebar">
            <div class="sensor-icons" id="sensorIcons">
                <div class="sensor-icon">
                    <i class="fa fa-bars" aria-hidden="true"></i> <!-- bars -->
                </div>
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

                        </div>

                        <div class="sensor-text-data">
                            <div class="sensor-text-sub">Temperature:
                                <div class="sensor-read-values" id="temperature"></div>
                            </div>
                        </div>
                    </div>
                    <div class="sensor-bar">
                        <div class="gauge-container">

                        </div>

                        <div class="sensor-text-data">
                            <div class="sensor-text-sub">Total Dissolved Solids:
                                <div class="sensor-read-values" id="tds"></div>
                            </div>
                        </div>
                    </div>
                    <div class="sensor-bar">
                        <div class="gauge-container">

                        </div>

                        <div class="sensor-text-data">
                            <div class="sensor-text-sub">Potential of Hydrogen:
                                <div class="sensor-read-values" id="ph"></div>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>
</body>

</html>