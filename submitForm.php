<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "application";

// create connection
$conn = mysqli_connect($server, $username, $password, $database);

// check connection
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}else{
    // echo "Connected successfully";
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["uname"];
    $email = $_POST["email"];
    $number = $_POST["number"];
    $gender = $_POST["gender"];
    $comment = $_POST["comment"];
    
    $sql = "INSERT INTO users (name, email, gender, phone, comment) VALUES ('$name', '$email', '$gender', '$number', '$comment')";
    
    if(mysqli_query($conn, $sql)){
        echo "Data Inserted successfully";
    }else{
        echo "Error : <br/>".mysqli_error($conn);
    }
}

mysqli_close($conn);