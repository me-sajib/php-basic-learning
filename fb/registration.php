<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Now</title>
    <!-- css link -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <div class="w-75 d-flex align-item-center justify-content-center">
            <div class="form">

                <h2 class="mb-4">Registration Now</h2>
                <?php
                    if(isset($_GET["exits_email"])){?>
                        <span class="alert alert-danger">
                            <?php echo "OPPs! User already exits";?>
                            
                    </span> <br>
                   <?php } ?>
                <form action="DB/registration.php" method="POST" class="my-4">
                    <input type="text" name="name" placeholder="enter your username" class="my-3 form-control">
                    <input type="email" name="email" placeholder="enter your email" class="my-3 form-control">
                    <input type="password" name="password" placeholder="enter your password" class="form-control">
                    
                    <input type="submit" name="register" class=" my-2 btn btn-primary" value="register" />
                </form>
                <span>already have an account? <a href="index.php">Login Now</a></span>
            </div>
        </div>
    </div>
</body>
</html>