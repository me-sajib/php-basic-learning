<?php
include_once "./helpers/header.php";
include_once "./helpers/sidebar.php";
require_once "./inc/connect.php";
?>

<div class="body flex-grow-1 px-3">
    <div class="container-lg">
        <h3 class="mb-4">Add Patient</h3>
        <form action="./classes/add_patients.php" method="POST" class="form">
            <div class="row">
                <!-- name form field -->
                <div class="col-md-12 col-sm-12 col-lg-4">
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter patient name">
                    </div>
                </div>

                <!-- phone form field -->
                <div class="col-md-12 col-sm-12 col-lg-4">
                    <div class="form-group">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="number" class="form-control" name="phone" id="phone" placeholder="Enter phone number">
                    </div>
                </div>

                <!-- age form field -->
                <div class="col-md-12 col-sm-12 col-lg-4 ">
                    <div class="form-group">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" class="form-control" name="age" id="age" placeholder="Enter age">
                    </div>
                </div>

                <!-- gender form field -->
                <div class="col-md-12 col-sm-12 col-lg-4 mt-4">
                    <div class="form-group">
                        <label for="gender" class="form-label">Gender</label>
                        <select name="gender" id="gender" class="form-control">
                            <option class="form-control" disabled value="Select Gender">Select Gender</option>
                            <option class="form-control" value="Male">Male</option>
                            <option class="form-control" value="Female">Female</option>
                            <option class="form-control" value="Others">Others</option>
                        </select>
                    </div>
                </div>

                <?php
                    $id = $_SESSION['user_id'];
                    $sql = "SELECT * FROM doctors WHERE clinic_id = '$id'";
                    $result = mysqli_query($conn, $sql);
                ?>
                <!-- doctors form field -->
                <div class="col-md-12 col-sm-12 col-lg-4  mt-4">
                    <div class="form-group">
                        <label for="doctors" class="form-label">Appointment Doctor</label>
                        <select name="doctor" id="doctors" class="form-control">
                            <option class="form-control" disabled value="Select Doctor">Select Doctor</option>
                            <?php
                                while($data = mysqli_fetch_assoc($result)){
                            ?>
                            <option class="form-control" value="<?php echo $data['id'];?>"><?php echo $data['name'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                 <!-- address form field -->
                 <div class="col-md-12 col-sm-12 col-lg-12 mt-4">
                    <div class="form-group">
                        <label for="address" class="form-label">Patient address</label>
                        <textarea class="form-control" cols="10" rows="2" placeholder="Enter patient address" name="address" id="address"></textarea>
                    </div>
                </div>

                  <div class="col-md-12 col-sm-12 col-lg-4 mt-4">
                    <div class="form-group">
                    <button class="btn btn-success" name="addPatient" type="submit">Save</button>
                    </div>
                </div>

            </div>

        </form>
    </div>
</div>

<?php
include_once "./helpers/footer.php";
?>