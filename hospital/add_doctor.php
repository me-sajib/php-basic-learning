<?php
include_once "./helpers/header.php";
include_once "./helpers/sidebar.php";

?>

<div class="body flex-grow-1 px-3">
    <div class="container-lg">
        <h3 class="mb-4">New Doctor</h3>
        <form action="./classes/add_doctors.php" class="form" method="POST">
            <div class="row">
                <!-- name form field -->
                <div class="col-md-12 col-sm-12 col-lg-4">
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter doctor name">
                    </div>
                </div>

                <!-- phone form field -->
                <div class="col-md-12 col-sm-12 col-lg-4">
                    <div class="form-group">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone number">
                    </div>
                </div>

                <!-- password form field -->
                <div class="col-md-12 col-sm-12 col-lg-4">
                    <div class="form-group">
                        <label for="password" class="form-label">Doctor login password</label>
                        <input type="text" class="form-control" name="password" id="password" placeholder="Enter password number">
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-lg-4 mt-4">
                    <div class="form-group">
                        <label for="status" class="form-label">Doctor status</label>
                        <select name="status" class="form-control" id="status">
                            <option value="active">Active</option>
                            <option value="disabled">De-active</option>
                            <option value="out">Out of clinic</option>
                        </select>
                    </div>
                </div>

                  <!-- schedules form field -->
                  <div class="col-md-12 col-sm-12 col-lg-4 mt-4">
                    <div class="form-group">
                        <label for="time" class="form-label">Doctor time</label>
                        <!-- <div class="row">
                            <div class="col-sm-6">start time: <input  type="time" class="form-control" name="times" id=""></div>
                            <div class="col-sm-6">end time: <input class="form-control" type="time" name="time" id=""></div>
                        </div> -->
                        <input class="form-control" name="time" id="time" placeholder="2PM-4PM"/>
                    </div>
                </div>
                
                 <!-- Designation form field -->
                 <div class="col-md-12 col-sm-12 col-lg-4 mt-4">
                    <div class="form-group">
                        <label for="desngn" class="form-label">Designation</label>
                        <input type="text" name="designation" class="form-control" placeholder="Doctor Designation" id="desngn">
                    </div>
                </div>

                 <!-- certificate form field -->
                 <div class="col-md-12 col-sm-12 col-lg-12 mt-4">
                    <div class="form-group">
                        <label for="certificate" class="form-label">Academic qualification</label>
                        <textarea class="form-control" cols="10" rows="2" name="certificate" id="certificate" placeholder="Enter doctor certificate"></textarea>
                    </div>
                </div>

                  <div class="col-md-12 col-sm-12 col-lg-4 mt-4">
                    <div class="form-group">
                    <button class="btn btn-success" type="submit" name="addDoctor">Save</button>
                    </div>
                </div>

            </div>

        </form>
    </div>
</div>

<?php
include_once "./helpers/footer.php";
?>