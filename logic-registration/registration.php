<?php
include "inc/header.php";
require_once "lib/User.php";

$user = new User(); 
// check already login or not
Session::alreadyLogin("login");
?>

    <section class="login-form-section">
      <div class="container">
        <h1 class="login-title">Registration Now</h1>
        <?php
        if($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['registration'])){
         $registrationUser =  $user->userRegistration($_POST);
        }

        if(isset($registrationUser)){
          echo $registrationUser;
        }
        ?>
        <!-- login form -->
        <form action="" method="post">
          <input
            type="text"
            name="name"
            placeholder="Please enter your username "
            class="form-control mb-4 mt-4"
          />
          <input
            type="email"
            name="email"
            placeholder="Please enter your email "
            class="form-control mb-4 "
          />
          <input
            type="password"
            name="password"
            placeholder="Please enter your password "
            class="form-control mb-4"
          />
          <button name="registration" type="submit" class="btn btn-success">Register</button>
        </form>
        <p>
          if you don't have account? <a href="index.php">login now</a>
        </p>
      </div>
    </section>

    <?php
   include "inc/footer.php";
   ?>