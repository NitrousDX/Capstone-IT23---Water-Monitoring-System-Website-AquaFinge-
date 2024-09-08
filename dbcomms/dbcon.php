<?php
$host = "localhost";
$dbname = "capstone_database_tilapia";
$username = "root";
$password = "";

try {
    $pdoConnect = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
    $pdoConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exc) {
    echo $exc->getMessage();
}
