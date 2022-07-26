<?php

$db = new mysqli("localhost", "root", "", "my_db");

if(mysqli_connect_errno()){
    echo "Error: Could not connect to database.";
    exit;
}else{
    echo "Success: Connected to database.";
}

// $sql = "select * from my_guests";
$sql = "update my_guests set name='sajib sarker' where id=1";
$result = $db->query($sql);

// while ($row = $result->fetch_object()) {
//     echo $row->email."<br>";

// }