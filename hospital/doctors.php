<?php
include_once "./helpers/header.php";
include_once "./helpers/sidebar.php";
require_once "./inc/connect.php";

$clinic_id = $_SESSION["user_id"];
?>

<div class="body flex-grow-1 px-3">
    <div class="container-lg">
        <h3 class="mb-4">All Doctors</h3>
        <div class="d-flex justify-content-end mb-4">
            <form action="" class="d-flex gap-2">
                <input type="text" placeholder="Search" class="form-control"/>
                <button class="btn-sm btn btn-info">Search</button>
            </form>
        </div>
        <table class="table table-bordered table-striped">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Time</th>
                <th>Actions</th>
            </tr>
            <?php
            $sql = "SELECT * FROM doctors WHERE clinic_id = '$clinic_id'";
            $result = mysqli_query($conn, $sql);
            while($data = mysqli_fetch_assoc($result)){?>
            <tr>
                <td><?php echo $data['id']; ?></td>
                <td><?php echo $data['name']; ?></td>
                <td><?php echo $data['time']; ?></td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary mx-2">View</a>
                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                </td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>

<?php
include_once "./helpers/footer.php";
?>