<?php

$path = realpath(dirname(__FILE__));
include_once $path."/../lib/Session.php";
Session::init();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Logic registration</title>
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  </head>
  <body>
    <header>
      <nav class="container">
        <!-- navigation code below -->
        <div class="navigation">
          <div class="logo">
            <h1>Demo Website</h1>
          </div>
          <?php
          if(isset($_GET['action']) && $_GET['action'] == "logout"){
            Session::destory();
          }
          ?>
          <div class="nav-link">
            <ul>
              <?php 
              if(Session::get("login") == true){?>

              <li><a href="allUser.php">Home</a></li>
              <li><a href="profile.php?id=<?php echo Session::get('id');?>">Profile</a></li>

              <li><a href="?action=logout">Logout</a></li>
              <?php }else{
              ?>
              
              <li><a href="registration.php">Sign up</a></li>
              <li><a href="index.php">Login</a></li>

              <?php } ?>
            </ul>
          </div>
        </div>
        <!-- end of navigation code below -->
      </nav>
    </header>