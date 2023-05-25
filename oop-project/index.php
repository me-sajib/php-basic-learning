<?php

$errors = [];
if(isset($_POST["login"])){
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // if any input is empty
    if( empty($email) || empty($password)){
        $errors['empty'] = "All fields are required";
    }
    // if password is less than 6
    if(strlen($password) < 6){
        $errors['password'] = "Password must be at least 6 characters";
    }

    // if email is not valid
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Email is not valid";
    }

    if(empty($errors)){
            require_once "./config/config.php";
            $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
            $stmt = $connection->prepare($sql);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $password);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if(count($data) > 0){
              echo "Login Successful ".$data['name'];
            }else{
              echo "Fail to login";
            }
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Project</title>
    <!-- bootstrap css cdn link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container w-50">
        <h1 class="my-5">Login now</h1>
        <form action="" method="POST">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input type="email" name="email" placeholder="Enter your email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input type="password" name="password" placeholder="Enter your password" class="form-control" id="exampleInputPassword1">
            </div>

            <div class="pb-4">If you have no account <a href="./registration.php">Registration Now</a></div>
            <button type="submit" name="login" class="btn btn-primary">Submit</button>
          </form>
    </div>

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>