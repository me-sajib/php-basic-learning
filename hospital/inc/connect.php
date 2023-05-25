<?php

$host = "localhost";
$username = "root";
$db = "clinic_management";
$pwd = "";

$conn = mysqli_connect($host, $username, $pwd, $db);

if(!$conn){
    echo "connection fail";
}