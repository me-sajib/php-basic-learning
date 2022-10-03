<?php
include "../DB/connection.php";

if(!isset($_COOKIE["users"])){
    header("Location:../index.php?invalid_user");
}
$cookie = $_COOKIE["users"];

$sql = "SELECT * FROM users WHERE auth = '$cookie'";
$query = mysqli_query($connection, $sql);
$userInfo = mysqli_fetch_assoc($query);

?>  

<?php
    if (isset($_GET['action']) && $_GET['action'] == 'logout'){
        setcookie("users","",time() - (86400 * 30),"/" );
        header("Location:../index.php?login_first");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <?php include "../components/nav_profile_style/nav_profile_style.php"; ?>
</head>
<body>
    <!-- navbar -->
    <?php include "../components/nav/nav.php"; ?>
    <div class="container">
        <h1 class="text-success my-5 mx-auto">Hey man how are you</h1>
    </div>
</body>
</html>