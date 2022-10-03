<?php
include "connection.php";
include "validation.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email =validation( $_POST["email"]);
    $password = validation($_POST["password"]);

    // if user exits
    
    $loginAuth = md5(sha1($email.$password));
    $sql = "SELECT email, password FROM users WHERE auth = '$loginAuth' ";
    $query = mysqli_query($connection, $sql);
    $userRow = mysqli_num_rows($query);
    if($query == true ){
        if($userRow === 1){
            // setcookie("fbuser",$loginAuth);
				setcookie('users',$loginAuth,time()+(86400*30),"/");

            header("Location:../home/home.php?login_user");
        }else{
            header("Location:../index.php?invalid_user");
        }
    }else{
        echo "are you hacker bro";
    }
}