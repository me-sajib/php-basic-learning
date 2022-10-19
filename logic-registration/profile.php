<?php
include "inc/header.php";
$path = realpath(dirname(__FILE__));
include_once $path."/lib/Session.php";
include_once $path."/lib/User.php";

Session::init();

$user = new User();
?>



<div class="container">
<?php 
global $id;

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])){
        $updateData = $user->updateUser($id, $_POST);
    }
?>
        <?php 
        $data = $user->getUserById($id);
        ?>

    <form action="" method="post" style="width: 600px;margin:30px auto;">
        <h2>Update Now</h2>
    

        <?php 
        if(isset($updateData)){
            echo $updateData;
        }
        ?>
    <input
            type="text"
            name="name"
            placeholder="Please enter your username "
            class="form-control mb-4 mt-4"
            value="<?php echo $data['name'];?>"
          />
          <input
            type="email"
            name="email"
            value="<?php echo $data['email'];?>"
            placeholder="Please enter your email "
            class="form-control mb-4 "
          />
          <input
            type="text"
            value="<?php echo $data['skills'];?>"
            name="skill"
            placeholder="Please enter your skills "
            class="form-control mb-4"
          />
          <?php
          if($id == Session::get('id')){?>

              <button name='update' class="btn btn-success">Update Now</button>
         <?php }else{
          ?>
          <a href="allUser.php" class="btn btn-warning">Back</a>
          <?php }?>
    </form>
</div>


<?php include "inc/footer.php";?>