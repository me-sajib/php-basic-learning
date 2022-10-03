<?php
include "config.php";

$id = $_GET["id"];

$sql = "DELETE FROM users WHERE id = '$id'";
$query = mysqli_query($connect, $sql);
if($query){
    header("Location:index.php?deleted_data");
}