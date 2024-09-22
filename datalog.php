<?php
session_start();
$dev = $_SESSION['logged_in_device'];

if (!isset($_SESSION['logged_in_user'])) {
    header("location: ./");
    exit();
}

require_once("dbcomms/dbcon.php");

// Initialize the date variable
$selectedDate = isset($_POST['selected_date']) ? $_POST['selected_date'] : date('Y-m-d');

// Fetch highest, lowest, and average values from the database for the selected date
$tableName = htmlspecialchars($dev, ENT_QUOTES, 'UTF-8'); // Assuming the table name is the device serial
$query = "
    SELECT 
        MAX(temperature) AS max_temp, 
        MIN(temperature) AS min_temp, 
        AVG(temperature) AS avg_temp, 
        MAX(tds) AS max_tds, 
        MIN(tds) AS min_tds, 
        AVG(tds) AS avg_tds, 
        MAX(ph) AS max_ph, 
        MIN(ph) AS min_ph, 
        AVG(ph) AS avg_ph 
    FROM `$tableName`
    WHERE DATE(timestamp) = :selected_date
";

$stmt = $pdoConnect->prepare($query);
$stmt->bindParam(':selected_date', $selectedDate);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
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
                Sensor Data Overview
            </div>

            <div class="main">
                <form method="post" action="">
                    <label for="date" class="date">Select Date:</label>
                    <input type="date" id="date" name="selected_date" value="<?= htmlspecialchars($selectedDate) ?>">
                    <input class="button" type="submit" value="Filter">
                </form>

                <table>
                    <thead>
                        <tr>
                            <th>Metric</th>
                            <th>Highest</th>
                            <th>Lowest</th>
                            <th>Average</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Temperature</td>
                            <td><?= htmlspecialchars($result['max_temp']) ?></td>
                            <td><?= htmlspecialchars($result['min_temp']) ?></td>
                            <td><?= number_format($result['avg_temp'],2 ) ?></td>
                        </tr>
                        <tr>
                            <td>TDS</td>
                            <td><?= htmlspecialchars($result['max_tds']) ?></td>
                            <td><?= htmlspecialchars($result['min_tds']) ?></td>
                            <td><?= number_format($result['avg_tds'], 2) ?></td>
                        </tr>
                        <tr>
                            <td>pH</td>
                            <td><?= htmlspecialchars($result['max_ph']) ?></td>
                            <td><?= htmlspecialchars($result['min_ph']) ?></td>
                            <td><?= number_format($result['avg_ph'], 2) ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> 
    </div>
</body>

</html>
