<?php
include "inc/header.php";
?>

    <section class="login-form-section">
      <div class="container">
        <h1 class="login-title">Login Form</h1>
        <!-- login form -->
        <form action="">
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
          <button class="btn btn-success">login now</button>
        </form>
        <p>
          if you don't have account? <a href="registration.php">Register now</a>
        </p>
      </div>
    </section>

   <?php
   include "inc/footer.php";

   include "database/Connection.php"
   ?>