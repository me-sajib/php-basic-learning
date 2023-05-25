
<?php
require_once "./config/config.php";
$sql = "SELECT * FROM users";
$stmt = $connection->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// search box
$search_value = "";
if(isset($_GET["search"])){
    $search_value =  $_GET['search_box'];
    $sql = "SELECT * FROM users WHERE name LIKE '%$search_value%' OR email LIKE '%$search_value%'";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $search_value_color = '<span style="color:#ff0000">'. $search_value. '</span>';
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <div class="container my-5">
        <form action="" class="w-25 my-2" method="get">
            <input type="text" class="form-control" value="<?php echo $search_value ??''?>" name="search_box">
            <button type="submit" class="mt-2 btn btn-success" name="search">Search</button>
        </form>
       <?php 
       if($search_value != ""){?>
          <p class="alert alert-success">you have search <b><?php echo $search_value ?></b></p>
     <?php  }
       ?> 
    <table class="table table-striped border table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Photo</th>
</tr>
    <?php
        foreach($data as $row){
            ?>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $search_value ? str_replace($search_value, $search_value_color, $row["name"]) : $row['name']?></td>
            <td><?php echo $search_value ? str_replace($search_value, $search_value_color, $row["email"]) : $row['email']?></td>
            <td><img src="images/<?php echo $row['profile_photo'];?>" alt="images" width="50"></td>
        </tr>

        <?php }
    ?>
    </table>
    </div>

</body>
</html>