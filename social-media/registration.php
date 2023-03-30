<?php
include_once "./inc/header.php";
?>
    <div class="login-page bg-light">
        <div class="container container-center">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                  <h3 class="mb-3">Registration now</h3>
                  <?php
                    if(isset($_GET["exits_email"])){?>
                        <span class="alert alert-danger">
                            <?php echo "OPPs! User already exits";?>
                            
                    </span> <br>
                   <?php } ?>
                    <div class="bg-white shadow rounded">
                        <div class="row">
                            <div class="col-md-7 pe-0">
                                <div class="form-left h-100 py-5 px-5">
                                    <form action="DB/registration.php" class="row g-4" method="POST">
                                            <div class="col-12">
                                                <label>Username<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                                                    <input type="text" class="form-control" required name="name" placeholder="Enter Username">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label>Email<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                                                    <input type="email" name="email" required class="form-control" placeholder="Enter Email">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label>Password<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
                                                    <input type="password" name="password" required class="form-control" placeholder="Enter Password">
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="inlineFormCheck">
                                                    <label class="form-check-label" for="inlineFormCheck">Remember me</label>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <a href="./index.php" class="float-end text-primary">Login</a>
                                            </div>

                                            <div class="col-12">
                                                <input type="submit" name="register"  class="btn btn-primary px-4 float-end mt-4" value="Registration">
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