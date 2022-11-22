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
        <form action="" method="post" enctype="multipart/form-data">
           
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
              <input type="file" name="photo" id="" class="form-control">
              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
        <span>Don't have any account ? <a href="signup.php">Sign-up Now</a></span>
    </div>
    <?php
    if(isset($_POST['email'])){
      echo $_FILES['photo']['name'];
      var_dump($_FILES);
    }
    ?>
</body>
</html>