
<?php
include "inc/header.php";
?>

    <section class="login-form-section">
      <div class="container">
        <h1 class="login-title">Login Form</h1>
        <!-- login form -->
        <form action="">
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
          <button class="btn btn-success">Register</button>
        </form>
        <p>
          if you don't have account? <a href="index.php">login now</a>
        </p>
      </div>
    </section>

    <?php
   include "inc/footer.php";
   ?>