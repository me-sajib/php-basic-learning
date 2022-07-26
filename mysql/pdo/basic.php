<?php

$dsn = "mysql:dbname=my_db;host=localhost";
$user = "root";
$pass = "";

try {
    $db = new PDO($dsn, $user, $pass);

} catch (PDOException $e) {
    echo "Error: Could not connect to database.".$e->getMessage();
}

$sql = "select * from my_guests";
$result = $db->query($sql);
foreach ($result as $value) {
    echo $value['name']."<br>";
}