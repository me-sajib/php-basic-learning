<?php

$server = "127.0.0.1";
$user = "root";
$password ="";
$database = "hotels";

// connect database
$connect = mysqli_connect($server, $user, $password, $database);

// check connect stable or not
if(!$connect){
   die("connection problem".mysqli_connect_error());
}else{
    // echo "successfully connect to database";
}
