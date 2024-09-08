<!DOCTYPE html>
<html lang="en">

<head>
    <title>(PRE-ALPHA) Water Monitoring System</title>
    <link rel="stylesheet" href="styles/lime.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="gauge/gaugeMeter.js"></script>
    <script src="Scripts/TempReadStatus.js"></script>
    <script src="Scripts/TDSReadStatus.js"></script>
    <script src="Scripts/SensorConnectionStatus.js"></script>
    <script src="Scripts/TurbidityReadStatus.js"></script>
    <script src="Scripts/ConnectionStatus.js"></script>
    <script src="Scripts/pHReadStatus.js"></script>
    <script src="Scripts/AmmoniaReadStatus.js"></script>
</head>

<body>
    <div class="body-wrapper">
        <div class="header">
            <div class="logo-header">Water Monitoring System</div>
            <div class="connection-bar-indicator" id="connection-status">Reading Data...</div>
        </div>

        <div class="sidepanel"> <!-- padded -->
            <div class="sidepanel-icons">
                <div class="sensor-icons" id="sensorIcons">
                    <div class="sensor-container">
                        <div class="sensor-icon" onclick="togglePanel()">
                            <i class="fa fa-microchip" aria-hidden="true"></i></i> <!-- logo -->
                        </div>

                        <div class="close-button" onclick="closeSidePanel()">
                            <i class="fa fa-window-close" aria-hidden="true"></i>
                        </div>
                    </div>

                    <div class="thin-line"></div>

                    <div class="sensor-container">
                        <div class="sensor-icon">
                            <i class="fa fa-thermometer-half"></i> <!-- Temperature -->
                            <div class="active-dot-indicator" id="temp-indicator"></div>
                        </div>
                        <div class="sensor-info">
                            <div class="temp-side"></div>
                        </div>
                    </div>

                    <div class="sensor-container">
                        <div class="sensor-icon">
                            <i class="fa fa-tint"></i> <!-- TDS -->
                            <div class="active-dot-indicator" id="tds-indicator"></div>
                        </div>
                        <div class="sensor-info">
                            <p>TDS Values</p>
                        </div>
                    </div>

                    <div class="sensor-container">
                        <div class="sensor-icon">
                            <i class="fa fa-filter"></i>
                            <div class="active-dot-indicator"></div>
                        </div>
                        <div class="sensor-info">
                            <p>Turbidity</p>
                        </div>
                    </div>

                    <div class="sensor-container">
                        <div class="sensor-icon">
                            <i class="fa fa-flask"></i>
                            <div class="active-dot-indicator"></div>
                        </div>
                        <div class="sensor-info">
                            <p>pH Levels</p>
                        </div>
                    </div>

                    <div class="sensor-container">
                        <div class="sensor-icon">
                            <i class="fa fa-cloud"></i>
                            <div class="active-dot-indicator"></div>
                        </div>
                        <div class="sensor-info">
                            <p>Ammonia</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="user-container">
                <div class="user-icon">
                    <i class="fa-solid fa-user"></i> <!-- User -->
                </div>
            </div>
        </div>

        <div class="main-content">
            <div class="sensor-contents">
                <div class="sensor-title">
                    <div class="s-t">
                        <div class="temp-sensor-s-t">
                            Temperature Sensor
                        </div>
                    </div>
                    <div class="sub-s-t">
                        Current Temperature
                    </div>
                </div>

                <div class="sensor-gauge">
                    <div class="GaugeMeter" id="tempGauge" data-percent=""></div>
                </div>
                <div class="sensor-information">
                    <div class="sen-info-container">
                        <div class="sensor-information-text">Current Temperature:</div>
                        <div class="sensor-information-text" id="temperature"></div>
                    </div>
                    <div class="sen-info-container">
                        <div class="sensor-information-text">Analog Sensor Value:</div>
                        <div class="sensor-information-text">0</div>
                    </div>
                    <div class="sen-info-container">
                        <div class="sensor-information-text">Sensor Voltage:</div>
                        <div class="sensor-information-text">0</div>
                    </div>
                </div>
            </div>

            <div class="sensor-contents">
                <div class="sensor-title">
                    <div class="s-t">
                        <div class="temp-sensor-s-t">
                            TDS Sensor
                        </div>
                    </div>
                    <div class="sub-s-t">
                        Total Dissolved Solids
                    </div>
                </div>

                <div class="sensor-gauge">
                    <div class="GaugeMeter" id="tdsGauge" data-percent=""></div>
                </div>
                <div class="sensor-information">
                    <div class="sen-info-container">
                        <div class="sensor-information-text">Current TDS Amount:</div>
                        <div class="sensor-information-text" id="tds">0</div>
                    </div>
                    <div class="sen-info-container">
                        <div class="sensor-information-text">Analog Sensor Value:</div>
                        <div class="sensor-information-text">0</div>
                    </div>
                    <div class="sen-info-container">
                        <div class="sensor-information-text">Sensor Voltage:</div>
                        <div class="sensor-information-text">0</div>
                    </div>
                </div>
            </div>

            <div class="sensor-contents">
                <div class="sensor-title">
                    <div class="s-t">
                        <div class="temp-sensor-s-t">
                            Turbidity Sensor
                        </div>
                    </div>
                    <div class="sub-s-t">
                        Particle Levels
                    </div>
                </div>

                <div class="sensor-gauge">
                    <div class="GaugeMeter" id="turbidityGauge" data-percent=""></div>
                </div>
                <div class="sensor-information">
                    <div class="sen-info-container">
                        <div class="sensor-information-text">Current Turbidity Level:</div>
                        <div class="sensor-information-text" id="turbidity">0</div>
                    </div>
                    <div class="sen-info-container">
                        <div class="sensor-information-text">Analog Sensor Value:</div>
                        <div class="sensor-information-text">0</div>
                    </div>
                    <div class="sen-info-container">
                        <div class="sensor-information-text">Sensor Voltage:</div>
                        <div class="sensor-information-text">0</div>
                    </div>
                </div>
            </div>

            <div class="sensor-contents">
                <div class="sensor-title">
                    <div class="s-t">
                        <div class="temp-sensor-s-t">
                            pH Sensor
                        </div>
                    </div>
                    <div class="sub-s-t">
                        Water Alkalinity
                    </div>
                </div>

                <div class="sensor-gauge">
                    <div class="GaugeMeter" id="phGauge" data-percent="0"></div>
                </div>
                <div class="sensor-information">
                    <div class="sen-info-container">
                        <div class="sensor-information-text">Current pH Level:</div>
                        <div class="sensor-information-text" id="turbidity">0</div>
                    </div>
                    <div class="sen-info-container">
                        <div class="sensor-information-text">Analog Sensor Value:</div>
                        <div class="sensor-information-text">0</div>
                    </div>
                    <div class="sen-info-container">
                        <div class="sensor-information-text">Sensor Voltage:</div>
                        <div class="sensor-information-text">0</div>
                    </div>
                </div>
            </div>

            <div class="sensor-contents">
                <div class="sensor-title">
                    <div class="s-t">
                        <div class="temp-sensor-s-t">
                            Ammonia NH3 Sensor
                        </div>
                    </div>
                    <div class="sub-s-t">
                        Parts Per Million
                    </div>
                </div>

                <div class="sensor-gauge">
                    <div class="GaugeMeter" id="ammoniaGauge" data-percent="0"></div>
                </div>
                <div class="sensor-information">
                    <div class="sen-info-container">
                        <div class="sensor-information-text">Current PPM Level:</div>
                        <div class="sensor-information-text" id="turbidity">0</div>
                    </div>
                    <div class="sen-info-container">
                        <div class="sensor-information-text">Analog Sensor Value:</div>
                        <div class="sensor-information-text">0</div>
                    </div>
                    <div class="sen-info-container">
                        <div class="sensor-information-text">Sensor Voltage:</div>
                        <div class="sensor-information-text">0</div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>