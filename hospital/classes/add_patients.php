<?php
session_start();
require_once "../inc/connect.php";

$clinic_id = $_SESSION['user_id'];

if (isset($_POST['addPatient'])) {
    $name = trim(htmlspecialchars(stripcslashes( $_POST['name'])));
    $phone = trim(htmlspecialchars(stripcslashes( $_POST['phone'])));
    $age = trim(htmlspecialchars(stripcslashes( $_POST['age'])));
    $gender = trim(htmlspecialchars(stripcslashes( $_POST['gender'])));
    $doctor = trim(htmlspecialchars(stripcslashes( $_POST['doctor'])));
    $address = trim(htmlspecialchars(stripcslashes( $_POST['address'])));
    
//TODO important date time    $date = date('d-m-Y', strtotime($_POST['date']));

    if (empty($phone) || empty($doctor)) {
        header("location:../add_patient.php?error=phone");
        exit;
    } else {
        // $to = "01792981006";
        // $token = "9375163436168164127658bea6462f2c18673286f2f1a06df763";
        // $message = " $name আপনাকে আমাদের ক্লিনিকে স্বাগতম, আপনার সিরিয়াল আর ৩০ মিনিট পরে, দয়া করে একটু অপেক্ষা করুন";
        // $url = "http://api.greenweb.com.bd/api.php?json";

        // $data = array(
        //     'to' => "$phone",
        //     'message' => "$message",
        //     'token' => "$token"
        // );
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        // curl_setopt($ch, CURLOPT_ENCODING, '');
        // curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // $smsresult = curl_exec($ch);

    
        // check if phone is unique
        $doctorPhoneSql = "SELECT * FROM patients WHERE phone = '$phone' AND clinic_id = '$clinic_id'";
        $doctorPhoneResult = mysqli_query($conn, $doctorPhoneSql);
        if (mysqli_num_rows($doctorPhoneResult) > 0) {
            header("location:../add_patient.php?error=phone_exists");
            exit();
        } else {
            $sql = "INSERT INTO patients (clinic_id, name, phone, age, gender, address, total_visit) VALUES ('$clinic_id', '$name', '$phone', '$age', '$gender', '$address', '1')";
            $result = mysqli_query($conn, $sql);

            // get by current patient id by phone  number
            $current_patient_id = "SELECT * FROM patients WHERE phone = '$phone'";
            $current_patient_query = mysqli_query($conn, $current_patient_id);
            if (mysqli_num_rows($current_patient_query) > 0) {
                $row = mysqli_fetch_assoc($current_patient_query);
                $patient_id = $row['id'];
                // insert treatment count
                $treatment_sql = "INSERT INTO treatment_count (clinic_id, patient_id, doctor_id) VALUES ('$clinic_id', '$patient_id', '$doctor')";
                $treatment_sql_query = mysqli_query($conn, $treatment_sql);
            }
            if ($result) {
                header("location:../patients.php?patient=added");
            }
        }
    }
}
