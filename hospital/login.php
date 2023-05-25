<?php
include_once "./helpers/header.php";
require_once "./inc/connect.php";
require_once "./inc/validate.php";

// if user is already logged in
if (isset($_SESSION['phone'])) {
    header("Location: index.php");
}
// // error array
$errors = [];
// // login form data and login validation and redirect to home page
if (isset($_POST['login'])) {
    $phone = validate($_POST['phone']);
    $password = validate($_POST['password']);

    if (empty($phone) || empty($password)) {
        $errors["error"] = "All fields are required";
    }

    if (empty($errors)) {

      

        // check if email exits in database and check user password exit or not

        $first_check_sql = "SELECT * FROM users WHERE phone = '$phone' AND password = '$password'";
        $result = mysqli_query($conn, $first_check_sql);

        // // if user is found
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['is_login'] = true;
            $_SESSION['phone'] = $row['phone'];
            $_SESSION['token'] = $row['token'];
            // set cookie for 3 days 
            var_dump($row['id']);
            setcookie("our_token", $row['token'], time() + (86400 * 3), "/");
            header("Location: index.php");
        } else {
            $errors['error'] = "User not found";
        }
    }
}
?>
<div class="bg-light min-vh-100 d-flex flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card-group d-block d-md-flex row">
                    <div class="card col-md-7 p-4 mb-0">
                        <form action="" method="POST">
                            <div class="card-body">
                                <h1>Login</h1>
                                <!-- show error msg -->
                                <?php
                                if (isset($errors["error"])) {
                                    echo "<div class='alert alert-danger'>{$errors["error"]}</div>";
                                }
                                ?>
                                <div class="input-group mb-3"><span class="input-group-text">
                                        <svg class="icon">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                                        </svg></span>
                                    <input class="form-control" type="number" required name="phone" placeholder="Phone number">
                                </div>
                                <div class="input-group mb-4"><span class="input-group-text">
                                        <svg class="icon">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                                        </svg></span>
                                    <input class="form-control" type="password" required name="password" placeholder="Password">
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <button class="btn btn-primary px-4" type="submit" name="login">Login</button>
                                    </div>
                                    <div class="col-6 text-end">
                                        <button class="btn btn-link px-0" type="button">Forgot password?</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card col-md-5 text-white bg-primary py-5">
                        <div class="card-body text-center">
                            <div>
                                <h2>Sign up</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <a href="register.php" class="btn btn-lg btn-outline-light mt-3" type="button">Register Now!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- CoreUI and necessary plugins-->
<script src="vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
<script src="vendors/simplebar/js/simplebar.min.js"></script>
<script>
</script>

</body>

</html>