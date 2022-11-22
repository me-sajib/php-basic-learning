<?php

// database connectoin set
$connection = mysqli_connect("localhost", "root", "", "llc");

$errors = [];
if(isset($_POST['register'])){
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $photo = $_FILES['photo'];
    $password = trim($_POST['password']);
    
    // validation
    if(empty($name)){
        $errors['name'] = "You must enter a valid username";
    }

    if(empty($email)){
        $errors['email'] = "You must be a valid email";
    }

    if(empty($password)){
        $errors['password'] = "You must enter a password";
    }

    // now insert database
    if(empty($errors)){
        // profile photo insert
        if(isset($photo)){
            $file_data = explode(".", $photo['name']);
            $file_ext = end($file_data);
            $new_file_name = uniqid("pp_", true). ".".$file_ext;
           $upload =  move_uploaded_file($photo['tmp_name'], 'photo/'. $new_file_name);

           if($upload){
            $sql = "INSERT INTO users (name, email, profile_photo, password) VALUES ('$name', '$email', '$new_file_name', '$password')";
            
            $insert = mysqli_query($connection, $sql);
              
            if($insert){
                $success = "Wow ! Registration Successfull";
              }
           }
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
    <title>Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5" style="width:600px">
        <h2 class="text-center">Welcome ! Registration Now</h2>
        <?php
        if(isset($success)){
            echo "<div class='alert alert-success'>".$success."</div>";
        }
        ?>
        <form action="" method="post" enctype="multipart/form-data">
            <!-- name area -->
            
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="name">
                <!-- name error msg show -->
                <?php
                    if(isset($errors['name'])){
                        echo "<div class='alert alert-danger'>".$errors['name'] ."</div>";
                    }
            ?>
              </div>
              <!-- email -->
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <!-- email error msg show -->

                <?php
                    if(isset($errors['email'])){
                        echo "<div class='alert alert-danger'>".$errors['email'] ."</div>";
                    }
                 ?>
              </div>

              <!-- image upload -->
            <div class="mb-3">
                <label for="photos" class="form-label">Profile Photo</label>
                <input type="file" name="photo" class="form-control" id="photos" aria-describedby="pp">
               
              </div>
              <!-- password area -->
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                <!-- password error msg show -->
                <?php
                    if(isset($errors['password'])){
                        echo "<div class='alert alert-danger'>".$errors['password'] ."</div>";
                    }
                ?>
              </div>
              <button type="submit" name="register" class="btn btn-primary">Submit</button>
        </form>
        <span>If you already an account ? <a href="index.php">Login Now</a></span>
    </div>
    
</body>
</html>