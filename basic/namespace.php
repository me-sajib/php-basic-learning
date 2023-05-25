<?php
    namespace Student;
    include "oop.php";
    
$obj = new User("John", 33);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?php $obj->details();?></h1>
</body>
</html>
