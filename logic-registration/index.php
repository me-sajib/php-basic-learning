<?php
include "inc/header.php";
include "lib/User.php";
$path = realpath(dirname(__FILE__));
include_once $path."/lib/Session.php";
Session::init();
$user = new User();
$names = Session::get("user");
if(isset($names)){
  echo $names;
}
?>


    <section class="login-form-section">
      <div class="container">
        <h1 class="login-title">Login Form</h1>
        <!-- login form -->
        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])){
          $loginData = $user->loginUser($_POST);
        }

        if(isset($loginData)){
          echo $loginData;
        }
        ?>
        <form action="" method="post">
          <input
            type="email"
            name="email"
            placeholder="Please enter your email "
            class="form-control mb-4 mt-4"
          />
          <input
            type="password"
            name="password"
            placeholder="Please enter your password "
            class="form-control mb-4"
          />
          <button type="submit" name="login" class="btn btn-success">login now</button>
        </form>
        <p>
          if you don't have account? <a href="registration.php">Register now</a>
        </p>
      </div>
    </section>

   <?php
   include "inc/footer.php";

   ?>