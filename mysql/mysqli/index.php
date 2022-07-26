<?php

$db = new mysqli("localhost", "root", "", "my_db");

if(mysqli_connect_errno()){
    echo "Error: Could not connect to database.";
    exit;
}else{
    echo "Success: Connected to database.";
}

// $sql = "select name from my_guests";
// $sql = "update my_guests set name='sajib sarker' where id=1";
$sql = "insert into my_guests (name, email, age) values (?,?,?)";
// $result = $db->query($sql);


// prepare statement 
$stmt = $db->prepare($sql);
$stmt->bind_param("ssi", $name, $email, $age);
$name = "smith";
$email = "smith@gmail.com";
$age = 40;

$stmt->execute();
$stmt->close();
// $stmt->bind_result($name);
// while ($stmt->fetch()) {
//     echo $name . "<br>";
// }
// while ($row = $result->fetch_object()) {
//     echo $row->email."<br>";

// }