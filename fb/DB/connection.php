<?php

$server = "127.0.0.1";
$user = "root";
$password = "";
$database = "fb";

$connection = mysqli_connect($server, $user, $password, $database);

if(!$connection){
    die("Something problem database connection");
}else{
    // echo "database connection successfully";
}