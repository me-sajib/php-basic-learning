<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "llc");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit data</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
<?php
        $id = $_GET['id'];

        $query = "SELECT * FROM `users` WHERE `id` = '$id'";
        $idData = mysqli_query($connection, $query);
        $data = $idData->fetch_assoc();  
    ?>
            <div class="container my-5" style="width:600px">
            <?php  if(isset($_SESSION["message"], $_SESSION["type"])){?>
            <div class="alert alert-<?php echo $_SESSION["type"]?> w-75 mx-auto"><?php echo $_SESSION["message"];?></div>
            <?php }
            ?>
            <h1>Edit Data</h1>
                <form action="editData.php" method="post">

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
                    <a href="user.php" class="btn btn-outline-primary ml-3">Back</a>
                </form>

            </div>
    <?php
    unset($_SESSION["message"], $_SESSION["type"]);
    ?>
</body>
</html>