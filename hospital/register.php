<?php
include_once "./helpers/header.php";
include_once "./inc/validate.php";
include_once "./inc/connect.php";
?>

<?php
// store all error in variable
$errors = [];
if (isset($_POST['register'])) {
    $username = validate($_POST['username']);
    $clinic_name = validate($_POST['clinic_name']);
    $phone = validate($_POST['phone']);
    $password = validate($_POST['password']);
    $password2 = validate($_POST['password2']);

    // check user name and phone any password field empty
    if (empty($username) || empty($phone) || empty($password) || empty($password2) || empty($clinic_name)) {
        $errors["error"] = "All fields are required";
    }

    // check if passwords not match
    if ($password !== $password2) {
        $errors["error"] = "Passwords do not match";
    }

    // // check if email is valid
    // if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    //     $errors["error"] = "Email is not valid";
    // }

    // check if clinic_name is unique or not
    // $sql = "SELECT * FROM users WHERE name = '$clinic_name'";
    // $result = mysqli_query($conn, $sql);
    // if (mysqli_num_rows($result) > 0) {
    //     $errors["error"] = "Clinic Name is already taken";
    // }

    // check if phone is unique
    $sql = "SELECT * FROM users WHERE phone = '$phone'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $errors["error"] = "Phone number is already taken";
    }

    // create a token
    $token = md5(sha1($phone . $username));

    // insert user into database
    if (empty($errors)) {
        // insert users table
        $sql = "INSERT INTO users (user_name, clinic_name, phone, password, status, purses, expire, token) VALUES ('$username', '$clinic_name', '$phone', '$password', 'basic_user', '0', '0', '$token')";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            $errors["error"] = "Something went wrong";
        }
        if ($result) {
            header("Location: login.php");
        }
    }
}
?>

<div class="bg-light min-vh-100 d-flex flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mb-4 mx-4">
                    <form action="" method="POST">
                        <div class="card-body p-4">
                            <h1>Register</h1>
                            <p class="text-medium-emphasis">Create your account</p>
                            <!-- show errors when submit -->
                            <?php
                            if (isset($errors["error"])) {
                                echo "<div class='alert alert-danger'>{$errors["error"]}</div>";
                            }
                            ?>
                            <div class="input-group mb-3"><span class="input-group-text">
                                    <svg class="icon">
                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>

                                    </svg></span>
                                <input class="form-control" type="text" required name="username" placeholder="Username">
                            </div>

                            <div class="input-group mb-3"><span class="input-group-text">
                                    <svg class="icon">
                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>

                                    </svg></span>
                                <input class="form-control" type="text" required name="clinic_name" placeholder="Clinic Name">
                            </div>

                            <div class="input-group mb-3"><span class="input-group-text">
                                    <svg class="icon">
                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                                    </svg></span>
                                <input class="form-control" type="text" required name="phone" placeholder="phone">
                            </div>
                            <div class="input-group mb-3"><span class="input-group-text">
                                    <svg class="icon">
                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                                    </svg></span>
                                <input class="form-control" type="text" required name="address" placeholder="Address">
                            </div>
                            <div class="input-group mb-3"><span class="input-group-text">
                                    <svg class="icon">
                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                                    </svg></span>
                                <input class="form-control" type="password" name="password" required placeholder="Password">
                            </div>
                            <div class="input-group mb-4"><span class="input-group-text">
                                    <svg class="icon">
                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                                    </svg></span>
                                <input class="form-control" type="password" name="password2" required placeholder="Repeat password">
                            </div>

                            <!-- <div class="input-group mb-4">
                                <div class="d-flex gap-2 align-items-center">
                                    <span class="input-group-text">
                                            <svg class="icon">
                                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                                            </svg></span>
                                        <input type="radio" name="gender" id="gender" value="male" class="from-control"> Male 
                                        <input type="radio" name="gender" id="gender" value="female" class="from-control"> Female 

                                </div>
                            </div> -->

<!-- 
                            <div class="input-group mb-3">
                                <span class="input-group-text">
                                    <svg class="icon">
                                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                                    </svg></span>
                                
                                <select class="form-select" name="role" required>
                                    <option value="patient">Patient</option>
                                    <option value="doctor">Doctor</option>
                                    <option value="nurse">Nurse</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div> -->

                            <button class="btn btn-block btn-success" type="submit" name="register">Create Account</button>
                            <div class="pt-2">
                                already have an account? <a href="login.php">Sign in</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
<script src="vendors/simplebar/js/simplebar.min.js"></script>
<script>
</script>

</body>

</html>