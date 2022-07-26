<?php

$db = new mysqli("localhost", "root", "", "test");

if(mysqli_connect_errno()){
    echo "Error: Could not connect to database.";
    exit;
}else{
    echo "Success: Connected to database.";
}

$sql = "insert into images (img) values (?)";
$stmt = $db->prepare($sql);
$stmt->bind_param("s", $img);
$img = file_get_contents("img.jpg");
$stmt->send_long_data(0, $img);
$stmt->execute();