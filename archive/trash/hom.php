<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index.css">
    <title>(Beta) Water Monitoring System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="header">
        <div class="inner-header">
            <div class="header-title">
                Water Monitoring System
            </div>
            <div class="ul-nav">
                <!-- space -->
            </div>
        </div> <!-- inner-header -->
    </div> <!-- header -->

    <div class="page-body">
        <div class="sensor-panel-data">
            <div class="sensor-panel-data-padding">
                <div class="sensor-icons" id="sensorIcons">
                    <div class="sensor-icon" onclick="togglePanel()">
                        <i class="fa fa-bars" aria-hidden="true"></i> <!-- bars -->
                    </div>
                    <div class="sensor-icon" onclick="togglePanel()">
                        <i class="fa fa-thermometer-half"></i> <!-- Temperature -->
                    </div>
                    <div class="sensor-icon" onclick="togglePanel()">
                        <i class="fa fa-tint"></i> <!-- TDS -->
                    </div>
                    <div class="sensor-icon" onclick="togglePanel()">
                        <i class="fa fa-filter"></i> <!-- Turbidity -->
                    </div>
                    <div class="sensor-icon" onclick="togglePanel()">
                        <i class="fa fa-flask"></i> <!-- pH -->
                    </div>
                    <div class="sensor-icon" onclick="togglePanel()">
                        <i class="fa fa-cloud"></i> <!-- Ammonia -->
                    </div>
                </div>

                <div class="ul-sensor" id="sensorPanel">
                    <div class="sensor-tab">Temperature Sensor
                        <div class="sensor-indicator"></div>
                    </div>
                    <div class="sensor-tab">TDS Sensor
                        <div class="sensor-indicator"></div>
                    </div>
                    <div class="sensor-tab">Turbidity Sensor
                        <div class="sensor-indicator"></div>
                    </div>
                    <div class="sensor-tab">pH Sensor
                        <div class="sensor-indicator"></div>
                    </div>
                    <div class="sensor-tab">Ammonia Gas Sensor
                        <div class="sensor-indicator"></div>
                    </div>
                </div>

                <div class="sensor-status-guide">

                </div>
            </div><!-- sensor-panel-data-padding -->
        </div><!-- sensor-panel-data -->

        <div class="sensor-gauges">

        </div>
    </div><!-- page-body -->

    <script>
        function togglePanel() {
            var panel = document.getElementById("sensorPanel");
            var icons = document.getElementById("sensorIcons");
            if (panel.style.display === "none" || panel.style.display === "") {
                panel.style.display = "block";
                icons.style.display = "none";
            } else if (window.innerWidth <= 768 && icons.style.display === "none") {
                icons.style.display = "flex";
            }
        }
    </script>
</body>

</html>