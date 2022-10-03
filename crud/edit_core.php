<?php 
include "config.php";

if(isset($_POST['edit'] )){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $number = $_POST["number"];

    $sql = "UPDATE users SET name='$name', email='$email', number='$number' WHERE email='$email'";
    $query = mysqli_query($connect, $sql);
    if($query){
        header("Location:index.php?edit_success");
    }else{
        echo "something is wrong";
    }
}