<?php
$connection = mysqli_connect("localhost", "root", "", "llc");

$readSql = "SELECT * FROM users";
$readData = mysqli_query($connection, $readSql);


$errors = [];

if(isset($_POST['update'])){

  $name = $_POST['name'];
  $email = $_POST['email'];
  $ids = $_POST['ids'];

  if(empty($email) || empty($name)){
    $errors['empty-data'] = "Please enter a valid email and  name";
    return;
  }

  if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
    $errors['invalid-email'] = "Please enter your valid email";
    return;
  }

  $query = "UPDATE `users` SET name='$name', email='$email' WHERE `id` = '$ids'";
  $updateData = mysqli_query($connection, $query);

  if($updateData){
   $success = "Data Updated Successfully";
  }

}

if(isset($_GET["delete"])){
    $deleteId = $_GET['delete'];
    $query = "DELETE FROM users WHERE id = '$deleteId'";
    $deleteData = mysqli_query($connection, $query);
    if($deleteData){
        $success = "Data Delete Successfully";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>
    <div class="container my-5">
    <?php
        if(isset($errors['empty-data'])){
          echo $errors["empty-data"];
        }

        if(isset($errors['invalid-email'])){
          echo $errors['invalid-email'];
        }
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($readData) {
                    $count = 1;
                    while ($data = mysqli_fetch_array($readData)) { ?>
                        <tr>
                            <td><?php echo $count++; ?></td>
                            <td><?php echo $data['name']; ?></td>
                            <td><?php echo $data['email']; ?></td>
                            <td>
                                <a href="?id=<?php echo $data['id']; ?>">Edit</a>

                                <a href="?delete=<?php echo $data['id']; ?>" onclick="return confirm('Are you sure! want to delete?')">Delete</a>

                            </td>
                        </tr>

                <?php   }
                } ?>
            </tbody>
        </table>
    </div>

    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "SELECT * FROM `users` WHERE `id` = '$id'";
        $idData = mysqli_query($connection, $query);
        $data = $idData->fetch_assoc();
        
        if (mysqli_num_rows($idData)) {
            if(isset($success)){?>
            <div class="alert alert-success w-25 mx-auto"><?php echo $success;?></div>
            <?php }
    ?>
            <div class="container my-5" style="width:600px">
                <form action="" method="post">

                    <!-- name -->
                    <div class="mb-3">
                        <label for="exampleInputEmail" class="form-label">Name</label>
                        <input type="text" name="name" value="<?php echo $data['name']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="name">
                    </div>

                    <!-- email -->
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" value="<?php echo $data['email']; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                 
                    <div class="mb-3"> 
                        <input hidden type="number" name="ids" value="<?php echo $data['id']; ?>" class="form-control" id="exampleInputPassword1">
                    </div>

                    <button type="submit" name="update" class="btn btn-primary">Save Changes</button>
                </form>

            </div>
    <?php
        } else {
            echo "User not found";
        }
    }
    ?>

</body>

</html>