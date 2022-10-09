<?php

$dsn = "mysql:dbname=hotels;host=127.0.0.1";
$user = "root";
$password = "";

try {
    $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo "database connection fail".$e->getMessage();
}

// select all data
// $sql = "select * from users";
// $result = $pdo->query($sql);
// foreach($result as $value){
//     echo $value['name']."<br/>";
// }

//data inserted sql 
// bindValue mean its bindValue(:id, "3") like that, or bindParam(:id, $id) like that
$id = "2";
$name = "golap max";
$email = "golap@max.com";
$number = "01833282838";
$gender = "male";
$comment = "good to see you and our profile ui are so good";

// $sql = "INSERT INTO users ( id, name, email, number, gender, comment) VALUES ( ?, ?, ?, ?, ?,?)";
// $stmt = $pdo->prepare($sql);
// $stmt->bindParam(":id", $id);
// $stmt->bindParam(":name", $name);
// $stmt->bindParam(":email", $email);
// $stmt->bindParam(":number", $number);
// $stmt->bindParam(":gender", $gender);
// $stmt->bindParam(":comment", $comment);
// $arr = array($id, $name, $email, $number, $gender, $comment);
// $stmt->execute($arr);

// $sql = "SELECT * FROM users WHERE  gender=:gender";
// $stmt = $pdo->prepare($sql);
// // $stmt->bindParam(":id", $id);
// $stmt->bindParam(":gender", $gender);
// // $stmt->execute(array(":id"=> $id));
// $stmt->execute();
// while ($result = $stmt->fetch()) {
//     echo $result["name"]."<br>";
//     echo $result['email']."<br/>";
// }


// $sql = "UPDATE users SET email=?, name=? WHERE id=?";
// $stmt = $pdo->prepare($sql);
// $stmt->execute(array($email, $name, $id));


// $sql = "DELETE FROM users WHERE id=:id";
// $stmt = $pdo->prepare($sql);
// $stmt->bindParam(":id", $id);
// $stmt->execute();
