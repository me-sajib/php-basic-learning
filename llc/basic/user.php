<?php
$connection = mysqli_connect("localhost", "root", "", "llc");

$readSql = "SELECT * FROM users";
$data = mysqli_query($connection, $readSql);


$errors = [];



if (isset($_GET["delete"])) {
    $deleteId = $_GET['delete'];
    $query = "DELETE FROM users WHERE id = '$deleteId'";
    $deleteData = mysqli_query($connection, $query);
    if ($deleteData) {
        $success = "Data Delete Successfully";
    }
}
$keyword = "";
$isData = 1;
if (isset($_GET["keyword"])) {
    $keyword =  $_GET["keyword"];
    $query = "SELECT `id`, `name`, `email`, `profile_photo` FROM `users` WHERE `name` LIKE '%$keyword%' OR `email` LIKE '%$keyword%'";
    $data = mysqli_query($connection, $query);
    $isData = $data->num_rows;
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
        img {
            width: 50px;
            height: 50px;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <div class="mb-5">
            <a href="signup.php" class="btn btn-outline-info">Registration</a>
            <a href="index.php" class="btn btn-outline-secondary">Login</a>
        </div>
        <?php
        if (isset($errors['empty-data'])) {
            echo $errors["empty-data"];
        }

        if (isset($errors['invalid-email'])) {
            echo $errors['invalid-email'];
        }
        ?>
        <!-- search field-->
        <form action="" method="get">
            <input type="text" class="form-control" value="<?php echo $keyword ?? ""; ?>" placeholder="Enter your search keyword" name="keyword" />
            <button type="submit" class="btn btn-info mt-3">search</button>
        </form>
        <?php
        if (isset($keyword) && strlen($keyword) < 0 ) { ?> <div class="alert alert-info mt-2">You have searched <b><?php echo $keyword; ?></b></div>
        <?php
        }

        if($isData < 1){ ?>
            <div class="alert alert-danger mt-3">No user found.</div> 
        <?php }
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
                if ($data || $data) {
                    $count = 1;
                    while ($user = mysqli_fetch_assoc($data)) { ?>
                        <tr>
                            <td><?php echo $count++; ?></td>
                            <td> <img src="photo/<?php echo $user['profile_photo']; ?>" alt=""> </td>
                            <td><?php echo str_replace($keyword, '<span style="color:#ff0000">' . $keyword . '</span>', $user['name']); ?></td>
                            <td><?php echo str_replace($keyword, '<span style="color:#ff0000">' . $keyword . '</span>', $user['email']); ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $user['id']; ?>">Edit</a>
                                <a href="?delete=<?php echo $user['id']; ?>" onclick="return confirm('Are you sure! want to delete?')">Delete</a>

                            </td>
                        </tr>
                <?php   }
                } ?>
            </tbody>
        </table>
    </div>

</body>
</html>