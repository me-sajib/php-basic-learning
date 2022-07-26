<?php

$db = new mysqli("localhost", "root", "", "test");

if(mysqli_connect_errno()){
    echo "Error: Could not connect to database.";
    exit;
}else{
    echo "Success: Connected to database.";
}


$sql = "select img from images where id=?";
$stmt = $db->prepare($sql);
$stmt->bind_param("i", $id);
$id = 1;
$stmt->execute();
$stmt->bind_result($image);
$stmt->fetch();
header("Content-type:jpg");
echo '<img src="data:image/jpg;base64,'.base64_encode($image).'"/>';

// $sql = "insert into images (img) values (?)";
// $stmt = $db->prepare($sql);
// $stmt->bind_param("s", $img);
// $img = file_get_contents("img.jpg");
// $stmt->send_long_data(0, $img);
// $stmt->execute();