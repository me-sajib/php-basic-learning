<?php
// require_once("config.php");


// class User{
    
//     public function addUser($tbl, $name, $email, $password){
//         $con = new Connection();
//        $dbs = $con->db_connect();
//         $sql = "INSERT INTO ".$tbl." (name, email, password) VALUES ('$name', '$email', '$password')";
//         $conn = $dbs->prepare($sql);
//     }
// }

// $res = new User();
// $res->addUser("users", "sajib", "sajib@gmail.com", "23423");

$db = new mysqli("localhost", "root", "", "hotels");
if(mysqli_connect_error()){
    echo "connection error";
}else{
    // echo "connection successfully";
}

// $sql = "select name, email from users order by id";
// $stmt = $db->prepare($sql);
// $stmt->execute();
// $stmt->bind_result($name, $email);

// while($stmt->fetch()){
//     echo "$name <br/> $email";
// }

$sql = "INSERT INTO users (id, name, email, number, gender, comment) VALUES (?,?,?,?,?,?)";

$stmt = $db->prepare($sql);
$stmt->bind_param("ississ",$id, $name,$email, $number, $gender,$comment);
$id = 3;
$name = "raju mia";
$email = "raju@seo.com";
$number = "0182922922";
$gender = "male";
$comment = "noting to be comment on me";
$stmt->execute();
$stmt->close();