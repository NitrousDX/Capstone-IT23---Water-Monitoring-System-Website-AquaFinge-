<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    
    //change to database soon
    $file = 'data.txt';
    $currentData = file_get_contents($file);
    $currentData .= json_encode($data) . "\n";
    file_put_contents($file, $currentData);
    
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "failure", "message" => "Invalid request"]);
}
?>
