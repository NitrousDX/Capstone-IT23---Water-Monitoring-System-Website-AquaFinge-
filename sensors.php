<?php
session_start();
$_SESSION['logged_in_user'];
$dev = $_SESSION['logged_in_device'];
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
    <title>Document</title>
    <link rel="stylesheet" href="styles/test.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.4/raphael-min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/justgage/1.2.9/justgage.min.js"></script>
    <script src="Scripts/UpdateAvgValues.js" defer></script>
    <script src="Scripts/UpdateGauge.js" defer></script>
    <script src="Scripts/UpdateTable.js" defer></script>
</head>

<body>
    <div class="container">
        <div class="sidebar">
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
        <div class="main-content">
            <div class="title-wrapper">
                <div class="title">
                    AquaFinge
                    <div class="title-sub">
                        For Artificial Pond Environments (RAS)
                    </div>
                </div>
                <div class="logout-btn">
                    <a href="logout_process.php">Logout</a>
                </div>
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
                        <div class="gauge-title">
                            Temperature
                        </div>
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
                        <div class="gauge-title">
                            Total Dissolved Solids
                        </div>
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
                        <div class="gauge-title">
                            Potential of Hydrogen
                        </div>
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