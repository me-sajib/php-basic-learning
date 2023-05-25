<?php
include_once "./inc/header.php";

spl_autoload_register(function ($class) {
    include_once "classes/" . $class . ".php";
});

$student = new Students();

$success = [];
if (isset($_POST['create'])) {
    $name = $student->setName($student->validateData($_POST['name']));
    $email = $student->setEmail($student->validateData($_POST["email"]));
    $password = $student->setPassword($student->validateData($_POST["password"]));
    $profile = $student->setProfile_photo($student->validateData($_POST["profile"]));

    if ($student->insertUser()) {
        header("location:index.php?action=inserted");
        exit();
    }
}

// update data 
if (isset($_POST['update'])) {
    $name = $student->setName($student->validateData($_POST['name']));
    $email = $student->setEmail($student->validateData($_POST["email"]));
    $password = $student->setPassword($student->validateData($_POST["password"]));
    $profile = $student->setProfile_photo($student->validateData($_POST["profile"]));

    if ($student->updateUser($_GET["id"])) {
        header("location:index.php?action=update");
        exit();
    }
}


?>

<div class="container">
    <div class="row mt-5">

        <div class="col-md-6">
            <?php
            if (isset($_GET["action"]) && $_GET["action"] == "update") {
                echo "<div class='alert alert-success'> Student Updated </div>";
            }

            if (isset($_GET["action"]) && $_GET["action"] == "edit") {
                $id = $_GET["id"];
                $user = $student->readUser($id);
            ?>
                <!-- edit user form  -->
                <form method="POST">
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?php echo $user['name']; ?>" placeholder="enter your name">
                    </div>
                    <div class="form-group mt-2">
                        <label for="name" class="form-label">Email</label>
                        <input type="text" name="email" id="name" class="form-control" value="<?php echo $user['email']; ?>" placeholder="enter your email">
                    </div>
                    <div class="form-group mt-2">
                        <label for="password" class="form-label">Password</label>
                        <input type="text" name="password" id="name" class="form-control" value="<?php echo $user['password']; ?>" placeholder="enter your pass">
                    </div>
                    <div class="form-group mt-2">
                        <label for="pp" class="form-label">PP</label>
                        <input type="text" name="profile" id="name" class="form-control" value="<?php echo $user['profile_photo']; ?>" placeholder="enter your profle">
                    </div>
                    <button class="btn btn-primary mt-3" type="submit" name="update">Update</button>
                </form>
            <?php } else {
            ?>
                <form method="POST">
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="enter your name">
                    </div>
                    <div class="form-group mt-2">
                        <label for="name" class="form-label">Email</label>
                        <input type="text" name="email" id="name" class="form-control" placeholder="enter your email">
                    </div>
                    <div class="form-group mt-2">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="name" class="form-control" placeholder="enter your pass">
                    </div>
                    <div class="form-group mt-2">
                        <label for="pp" class="form-label">PP</label>
                        <input type="text" name="profile" id="name" class="form-control" placeholder="enter your profle">
                    </div>
                    <button class="btn btn-primary mt-3" type="submit" name="create">Create</button>
                </form>

            <?php } ?>
        </div>

        <div class="col-md-6">
            <?php
            if (isset($_GET["action"]) && $_GET["action"] == "inserted") {
                echo "<div class='alert alert-success'> Student created </div>";
            }

            ?>
            <table class="table">
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>password</td>
                    <td>Action</td>
                </tr>
                <?php
                $i = 0;
                foreach ($student->readAll() as $value) {
                    $i++;
                ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $value['name']; ?></td>
                        <td><?php echo $value['email']; ?></td>
                        <td><?php echo $value['password']; ?></td>
                        <td>
                            <a href="?action=edit&id=<?php echo $value['id'] ?>" class="btn btn-info">Edit</a>
                            <a href="@" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>

    </div>
</div>

<?php
include_once "./inc/footer.php";
