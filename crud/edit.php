<?php
include "config.php";

$email = $_GET["id"];
// user information query
$sql = "SELECT * FROM users WHERE email = '$email'";
$query = mysqli_query($connect, $sql);

if($query == true){
    $data = mysqli_fetch_assoc($query); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    <table>
        <form action="edit_core.php" method="post">
        <tr>
            <td>name</td>
            <td><input type="text" value="<?php echo $data['name']?>" name="name" placeholder="enter name"></td>
        </tr>
        <tr>
            <td>email</td>
            <td><input type="email" value="<?php echo $data['email']?>" name="email" placeholder="email"></td>
        </tr>
        <tr>
            <td>phone</td>
            <td><input type="number" value="<?php echo $data['number']?>" name="number" placeholder="number"></td>
        </tr>
        <tr>
            <td>	<input type="submit" name="edit" value="SUBMIT">
</td>
            <td><button>back</button></td>
        </tr>
</form>
    </table>
    <?php }?>
</body>
</html>