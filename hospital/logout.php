<?php
session_start();

$keys = $_GET["logout"];

if($keys === "true"){
    session_unset();
    session_destroy();
    setcookie("our_token", "");
    header("location:login.php")    ;
}