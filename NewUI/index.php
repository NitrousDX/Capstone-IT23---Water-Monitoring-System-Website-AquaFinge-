<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AquaFinge</title>
    <link rel="stylesheet" href="newui.css">
    <script src="Timer.js" defer></script>
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-title">AquaFinge</div>
        <ul>
            <li>
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                    <path d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z" />
                </svg>
                <span>Dashboard</span>
            </li>
            <li>
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                    <path d="M480-120q-138 0-240.5-91.5T122-440h82q14 104 92.5 172T480-200q117 0 198.5-81.5T760-480q0-117-81.5-198.5T480-760q-69 0-129 32t-101 88h110v80H120v-240h80v94q51-64 124.5-99T480-840q75 0 140.5 28.5t114 77q48.5 48.5 77 114T840-480q0 75-28.5 140.5t-77 114q-48.5 48.5-114 77T480-120Zm112-192L440-464v-216h80v184l128 128-56 56Z" />
                </svg>
                <span>Data History</span>
            </li>
            <li>
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                    <path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z" />
                </svg>
                <span>Accounts</span>
            </li>
            <li>
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                    <path d="m370-80-16-128q-13-5-24.5-12T307-235l-119 50L78-375l103-78q-1-7-1-13.5v-27q0-6.5 1-13.5L78-585l110-190 119 50q11-8 23-15t24-12l16-128h220l16 128q13 5 24.5 12t22.5 15l119-50 110 190-103 78q1 7 1 13.5v27q0 6.5-2 13.5l103 78-110 190-118-50q-11 8-23 15t-24 12L590-80H370Zm70-80h79l14-106q31-8 57.5-23.5T639-327l99 41 39-68-86-65q5-14 7-29.5t2-31.5q0-16-2-31.5t-7-29.5l86-65-39-68-99 42q-22-23-48.5-38.5T533-694l-13-106h-79l-14 106q-31 8-57.5 23.5T321-633l-99-41-39 68 86 64q-5 15-7 30t-2 32q0 16 2 31t7 30l-86 65 39 68 99-42q22 23 48.5 38.5T427-266l13 106Zm42-180q58 0 99-41t41-99q0-58-41-99t-99-41q-59 0-99.5 41T342-480q0 58 40.5 99t99.5 41Zm-2-140Z" />
                </svg>
                <span>Settings</span>
            </li>
        </ul>
        <div class="div"></div>
        <div class="logout-button">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                <path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z" />
            </svg>
            <a href="">Logout</a>
        </div>
    </div>

    <div class="main-content">
        <div class="main-content-title">
            Welcome! Administrator
            <div class="main-content-title-sub">
                Current Device Registered: SEN1234567890123
            </div>
        </div>
        <div class="timer-settings">
            <div class="device-connection">
                <div class="dc-title">
                    <span class="ts-title">Device Connection Status</span>
                </div>

                <div class="cont">
                    <div class="device-name">Device Serial Number: &nbsp; <b>SEN1234567890123</b></div>
                    <div class="sensor-list">

                        <div class="sensor-icons-label">
                            <div class="active-indicator">
                                <div class="circle"></div>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                                <path d="M480-80q-83 0-141.5-58.5T280-280q0-48 21-89.5t59-70.5v-320q0-50 35-85t85-35q50 0 85 35t35 85v320q38 29 59 70.5t21 89.5q0 83-58.5 141.5T480-80Zm-40-440h80v-40h-40v-40h40v-80h-40v-40h40v-40q0-17-11.5-28.5T480-800q-17 0-28.5 11.5T440-760v240Z" />
                            </svg>
                            <span>DS18B20 Sensor</span>
                        </div>

                        <div class="sensor-icons-label">
                            <div class="active-indicator">
                                <div class="circle"></div>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                                <path d="M172-488q25-87 101.5-184.5T480-880q130 110 206.5 207.5T788-488h-84q-23-62-79-133.5T480-774q-88 81-144.5 152.5T256-488h-84Zm622 146q-9 49-31.5 92.5T705-171q-35 35-78.5 57T535-84l259-258Zm-163-66h114L421-84q-23-5-44.5-11.5T335-113l296-295Zm-229 0h114L267-159q-15-14-28.5-29T214-220l188-188Zm-243 0h127L176-298q-8-27-12-54.5t-5-55.5Zm321-80Z" />
                            </svg>
                            <span>TDS Meter Sensor</span>
                        </div>

                        <div class="sensor-icons-label">
                            <div class="active-indicator">
                                <div class="circle"></div>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                                <path d="M360-82Q238-96 159-187T80-408q0-100 79.5-217.5T400-880q161 137 240.5 254.5T720-408v8h-80v-8q0-73-60.5-165T400-774Q281-665 220.5-573T160-408q0 97 56 164t144 81v81Zm40-387Zm40 389v-240h140q24 0 42 18t18 42v40q0 24-18 42t-42 18h-80v80h-60Zm240 0v-240h60v80h80v-80h60v240h-60v-100h-80v100h-60ZM500-220h80v-40h-80v40Z" />
                            </svg>
                            <span>PH-4502C Sensor</span>
                        </div>

                    </div>
                </div>
            </div>

            <div class="set-timer">
                <div class="dc-title">
                    <span class="ts-title">Set Monitoring Timer</span>
                </div>

                <div class="cont-time">
                    <div class="time-container">
                        <label for="duration">Set Duration: &nbsp;</label>
                        <input type="number" id="duration" min="1" value="5" class="timers">
                        <span>&nbsp; secs.</span>
                    </div>

                    <div class="total-timer" id="timerDisplay">
                        <p>0</p>
                    </div>
                    <div class="timer-buttons">
                        <button id="startBtn">Start Timer</button>
                        <button id="stopBtn">Stop Timer</button>
                    </div>
                </div>
            </div>

            <div class="save-data">
                <div class="dc-title">
                    <span class="ts-title">Saved Data</span>
                </div>

                <div class="cont-save">
                    <table id="temp-table">
                        <thead>
                            <th>TEMP</th>
                            <th>TDS</th>
                            <th>PH</th>
                        </thead>
                        <tbody id="temp-table-body">
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="sensor-gauges">

        </div>
    </div>
</body>

</html>