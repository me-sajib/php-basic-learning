<?php
    $connection = mysqli_connect("localhost", "root", "", "llc");

    $errors = [];

    if(isset($_POST['login'])){

      $email = $_POST['email'];
      $pwd = $_POST['password'];

      if(empty($email) || empty($pwd)){
        $errors['empty-data'] = "Please enter a valid email and password";
        return;
      }

      if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
        $errors['invalid-email'] = "Please enter your valid email";
        return;
      }

      $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$pwd'";
      $data = mysqli_query($connection, $sql);
      print_r($data->fetch_all());
      

    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5" style="width:600px">
        <h2 class="text-center">Login Now</h2>
        <?php
        if(isset($errors['empty-data'])){
          echo $errors["empty-data"];
        }

        if(isset($errors['invalid-email'])){
          echo $errors['invalid-email'];
        }
        ?>
        <form action="" method="post">
           
              <!-- email -->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <!-- password area -->
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
              </div>
             
              <button type="submit" name="login" class="btn btn-primary">Submit</button>
        </form>
        <span>Don't have any account ? <a href="signup.php">Sign-up Now</a></span>
    </div>
   
</body>
</html>