<?php
include_once "validation.php";
include_once "connection.php";
session_start();
// login implement
if (isset($_REQUEST["login"])) {
    $email = validation($_POST["email"]);
    $password = validation($_POST["password"]);

    // check is empty or not
    if (empty($email) || empty($password)) {
        header("Location:../login.php?empty_fields");
    }

    $_SESSION["email"] = $email;
    // check user exits or not
    $sql = "SELECT * FROM users WHERE email ='$email' AND password ='$password'";
    $query = mysqli_query($connection, $sql);

    if ($query->num_rows === 1) {

        $row = mysqli_fetch_assoc($query);
        $token = $row["token"];

        setcookie("users", $token, time() + (86400 * 30) * 7, "/");
        // setcookie("users", "", time() - (86400 * 30) * 7);
        header("Location:../pages/profile/profile.php");
    } else {
        header("Location:../index.php?login_problem");
    }
}
