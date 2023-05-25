<?php

$errors = [];
if(isset($_POST["register"])){
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $profile_photo = $_FILES["profile_photo"];

    // if any input is empty
    if(empty($name) || empty($email) || empty($password) || empty($profile_photo)){
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
        $file_data = explode(".", $profile_photo["name"]);
        $file_ext = end($file_data);
        $new_file_name = uniqid("pp_", true) . "." .$file_ext;
        $upload = move_uploaded_file($profile_photo["tmp_name"], "images/".$new_file_name);

        if(!in_array($file_ext, ["jpg", "png", "jpeg"])){
            $errors['empty'] = "Invalid file type";
        }

        if($upload){
            require_once "./config/config.php";

            $sql = "INSERT INTO users (name, email, password, profile_photo) VALUES (:name, :email, :password, :new_file_name)";
            $stmt = $connection->prepare($sql);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $password);
            $stmt->bindParam(":new_file_name", $new_file_name);
            $stmt->execute();
            echo "Registered";
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
        <h1 class="my-5">Registration Now</h1>
        <?php
        if(isset($errors['empty']) || isset($errors['email']) || isset($errors['password'])){   
            echo "<div class='alert alert-danger'>".$errors['empty']."</div>";
        }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" placeholder="Enter your name" class="form-control" required id="name" name="name">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" placeholder="Enter your email" class="form-control" required name="email" id="email">
            </div>
            <div class="mb-3">
              <label for="photo" class="form-label">Profile Photo</label>
              <input type="file" class="form-control" name="profile_photo" id="photo">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" placeholder="Enter your password" name="password" class="form-control" id="password">
            </div>
            <div class="pb-4">If you have no account <a href="./index.php">Login Now</a></div>
            <button type="submit" name="register" class="btn btn-primary">Submit</button>
          </form>
    </div>

    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>