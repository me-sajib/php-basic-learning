<?php
session_start();
require_once "../inc/connect.php";

$clinic_id = $_SESSION['user_id'];

if (isset($_POST['addDoctor'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $status = $_POST['status'];
    $time = $_POST['time'];
    $designation = $_POST['designation'];
    $certificate = $_POST['certificate'];

    if (empty($name) || empty($phone) || empty($password) || empty($status) || empty($time) || empty($certificate) || empty($designation)) {
        header("location:../doctors.php");
        exit;
    } else {
        // check if phone is unique
        $doctorPhoneSql = "SELECT * FROM doctors WHERE phone = '$phone' AND clinic_id = '$clinic_id'";
        $doctorPhoneResult = mysqli_query($conn, $doctorPhoneSql);
        if (mysqli_num_rows($doctorPhoneResult) > 0) {
            echo ("Phone number is already taken");
        } else {
            $sql = "INSERT INTO doctors (clinic_id, name, phone, password, status, time, designation, academic_status) VALUES ('$clinic_id', '$name', '$phone', '$password', '$status', '$time', '$designation', '$certificate')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("location:../doctors.php?doctor=added");
            }
        }
    }
}
