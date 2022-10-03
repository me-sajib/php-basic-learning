<?php
include "../DB/connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $post = $_POST["post"];
    $img = $_FILES["image"]["name"];
    $tmp = $_FILES["image"]["tmp_name"];
    $folder = "../assets/image/".$img;

    $sql = "INSERT INTO posts (userId, post, image, date) VALUES (2, '$post','$img', '19sep - 22')";
    $query = mysqli_query($connection, $sql);
    if($query){
        //upload image
        move_uploaded_file($tmp, $folder);
        header("Location:../profile/profile.php?post_done");
    }else{
        header("Location:../profile/profile.php?failed_post");
    }

    
}