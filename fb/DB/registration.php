<?php
include "connection.php";
include "validation.php";

// insert data in database
if(isset($_REQUEST["register"])){
    $name = validation($_POST["name"]);
    $email = validation($_POST["email"]);
    $password = validation($_POST["password"]);
    
    // check already user exits or not
    $exitsSql = "SELECT * FROM users WHERE email ='$email'";
    $exitQuery = mysqli_query($connection, $exitsSql);
    if($exitQuery->num_rows > 0){
        header("Location:../registration.php?exits_email");
    }
    else{

        // // insert data
        // create auth
        $authentication = md5(sha1($email.$password));
       
        $sql = "INSERT INTO users (id, name, email, password, auth) VALUES (2, '$name', '$email', '$password', '$authentication')";
       
        $query = mysqli_query($connection, $sql);
        if($query == true){
            header("Location:../index.php?register_success");
        }else{
            header("Location:../registration.php?login_problem");
        }
    }
    
}
