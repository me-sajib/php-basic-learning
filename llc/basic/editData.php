<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "llc");

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $ids = $_POST['ids'];

    if(empty($email) || empty($name)){
      $_SESSION["message"] = "Please enter a valid email and  name";
      $_SESSION['type'] = "warning";
      header('Location:edit.php?id='.$ids);
      exit();
    }
  
    if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
      $_SESSION["message"] = "Please enter your valid email";
     $_SESSION['type'] = "warning";
     header('Location:edit.php?id='.$ids);
     exit();
    }
    
    
        $query = "UPDATE `users` SET name='$name', email='$email' WHERE `id` = '$ids'";  
        $updateData = mysqli_query($connection, $query);

        if($updateData){
            $_SESSION["message"] = "Data Update Successfully";
            $_SESSION['type'] = "success";
            header("Location:edit.php?id=".$ids);
            exit();
           }

            $_SESSION["message"] = "Data Update Not Successfully";
            $_SESSION['type'] = "warning";
            header("Location:edit.php?id=".$ids);
            exit();
    
  }
