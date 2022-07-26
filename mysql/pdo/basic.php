<?php

$dsn = "mysql:dbname=my_db;host=localhost";
$user = "root";
$pass = "";

try {
    $db = new PDO($dsn, $user, $pass);

} catch (PDOException $e) {
    echo "Error: Could not connect to database.".$e->getMessage();
}

$sql = "select * from my_guests";
$result = $db->query($sql);
foreach ($result as $value) {
    echo $value['name']."<br>";
}

// insert data 
$name = "jack";
$email = "jack@gmail.com";
$age = 30;

$sql_insert = "insert into my_guests (name, email, age) values (:name, :email, :age)";
$stmt = $db->prepare($sql_insert);
$stmt->bindParam(':name', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':age', $age);
$stmt->execute();