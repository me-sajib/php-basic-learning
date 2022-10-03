<?php
if(isset($_COOKIE["users"])){
    header("Location:profile/profile.php?redirect_profile");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Now</title>
    <!-- css link -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <div class="w-75 d-flex align-item-center justify-content-center">
            <div class="form">

                <h2 class="my-3">Login Now</h2>
                
                <?php
                if(isset($_GET["register_success"])){?>
                    <span class="alert alert-success">
                <?php  echo "Register Success, Login Now";
                }?>
                </span>


                <?php
                if(isset($_GET["invalid_user"])){?>
                    <span class="] alert alert-danger">
                <?php  echo "Wrong Information";
                }?>
                </span>

                


                <form action="DB/login.php" method="post">
                    <input type="email" name="email" placeholder="enter your email" class="my-3 form-control">
                    <input type="password" name="password" placeholder="enter your password" class="form-control">
                    <button type="submit" name="login" class=" mt-4 mb-2 btn btn-primary">Login</button>
                </form>
                <span>New to website? <a href="registration.php">Create an account</a></span>
            </div>
        </div>
    </div>
</body>
</html>