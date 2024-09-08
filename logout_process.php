<?php
session_start();
unset($_SESSION["logged_in_user"]);
unset($_SESSION['logged_in_device']);
session_destroy();
header("Location: ./");
exit;
