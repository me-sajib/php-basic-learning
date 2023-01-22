<?php
$connection = mysqli_connect("localhost", "root", "", "llc");

$readSql = "SELECT * FROM users";
$readData = mysqli_query($connection, $readSql);


$errors = [];



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
<style>
    img{
        width:50px;
        height:50px;
    }
</style>
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
                    <th>Image</th>
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
                            <td> <img src="photo/<?php echo $data['profile_photo']; ?>" alt=""> </td>
                            <td><?php echo $data['name']; ?></td>
                            <td><?php echo $data['email']; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $data['id']; ?>">Edit</a>
                                <a href="?delete=<?php echo $data['id']; ?>" onclick="return confirm('Are you sure! want to delete?')">Delete</a>

                            </td>
                        </tr>

                <?php   }
                } ?>
            </tbody>
        </table>
    </div>

</body>

</html>