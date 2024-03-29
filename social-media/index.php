<?php
include_once "./inc/header.php";
require_once "./DB/connection.php";
session_start();
?>
    <div class="login-page bg-light">
        <div class="container container-center">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                  <h3 class="mb-3">Login Now</h3>
                  <?php
                    if(isset($_GET["registration_success"])){?>
                        <div class="alert alert-success">
                            <?php echo "Registration Success ! Login now";?>
                    </div>
                   <?php } ?>

                  <?php
                    if(isset($_GET["success_login"])){?>
                        <div class="alert alert-info">
                            <?php echo "YAY ! Login Success";?>
                    </div>
                   <?php } ?>
                    <div class="bg-white shadow rounded">
                        <div class="row">
                            <div class="col-md-7 pe-0">
                                <div class="form-left h-100 py-5 px-5">
                                    <form action="DB/login.php" class="row g-4" method="POST">
                                        <div class="col-12">
                                            <label>Email<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                                                <input type="text" class="form-control" name="email" value="<?php echo isset($_SESSION["email"]) ? $_SESSION["email"] : "" ?>" required placeholder="Enter Email">
                                            </div>
                                        </div>

                                            <div class="col-12">
                                                <label>Password<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
                                                    <input type="password" class="form-control" name="password" required placeholder="Enter Password">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="inlineFormCheck">
                                                    <label class="form-check-label" for="inlineFormCheck">Remember me</label>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <a href="./registration.php" class="float-end text-primary">Registration</a>
                                            </div>

                                            <div class="col-12">
                                                <input type="submit" class="btn btn-primary px-4 float-end mt-4" name="login" value="Login"/>
                                            </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-5 ps-0 d-none d-md-block">
                                <div class="form-right h-100 bg-primary text-white text-center d-flex justify-content-center align-items-center">
                                    <div>
                                        <i class="bi bi-facebook"></i>
                                        <h2 class="fs-1">Social Media!!!</h2>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod totam at quae. Accusantium placeat, distinctio sint quisquam nemo nulla sapiente aspernatur error voluptates, soluta in illo tempora consequatur culpa? Ratione.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- assets js file link -->
    <script src="assets/js/bootstrap.bundle.js"></script>
</body>
</html>