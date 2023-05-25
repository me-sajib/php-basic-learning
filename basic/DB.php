<?php
$user_name = "root";
$password = "";
$dsn = "mysql:host=localhost;dbname=llc";
try{
    $connection = new PDO($dsn, $user_name, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}