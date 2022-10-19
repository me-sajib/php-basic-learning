<?php
require_once "inc/header.php";
require_once "lib/User.php";

$path = realpath(dirname(__FILE__));
include_once $path."/lib/Session.php";

?>
<?php
Session::init();

$user = new User();
$allData = $user->getAllUser();

?>

<h1 class="text-center mt-3"><b>Welcome </b><?php echo Session::get("user"); ?></h1>
<?php 
if(isset($_GET['data']) && $_GET["data"] == "update"){
    echo "<div class='w-25 container alert alert-success'><b>Update!</b> Data Updated Successfully</div>";
}
?>
<table class="table table-bordered" style="width:800px;margin:50px auto">

    <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Skills</th>
        <th>Action</th>
    </thead>

    <tbody>
       
        <?php 
        if($allData){
            $i=1;
            foreach ($allData as $data) {?>
             <tr>
              <td><?php echo $i++;?></td>
            <td><?php echo $data['name'];?></td>
            <td><?php echo $data['email'];?></td>
            <td><?php echo $data['skills'];?></td>
            <td>
                <a href="profile.php?id=<?php echo $data['id'];?>" class="btn btn-warning">view</a>
                <a href="?delete=true&id=<?php echo $data['id'];?>" class="btn btn-danger">delete</a>
            </td>
            </tr>
        <?php    }
        }
        
        ?>
           
     
    </tbody>
</table>









<?php
include "inc/footer.php";?>