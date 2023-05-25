<?php
include_once "./inc/header.php";
?>

<div class="container mt-5">
    <div class="w-50">
        <table class="table table-bordered">
            <tr>
                <td>Name</td>
                <td>Email</td>
            </tr>
            <?php
            foreach ($user as $value) {?>
                <tr>
                    <td><?php echo $value['name'];?></td>
                    <td><?php echo $value['email'];?></td>
                </tr>
            <?php }
            ?>
        </table>
    </div>
</div>

<?php
include_once "./inc/footer.php";