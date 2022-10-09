<?php
 require_once("./classes/User.php");

 $user = new User;


//  form submit value

if($_SERVER["REQUEST_METHOD"]== 'POST' && isset($_POST["submit"])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $number = $_POST['number'];
  $gender = $_POST['gender'];
  $comment = $_POST['comment'];

  if(empty($name) || empty($email) || empty( $number) || empty( $gender) || empty($comment) ){
    echo "all field are required";
  }else{

    $user->insertData('5',$name, $email, $number, $gender, $comment);
  }

}
?>

<?php
// form update value


if(isset($_POST['update'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $number = $_POST['number'];
  $gender = $_POST['gender'];
  $comment = $_POST['comment'];
  $id = $_POST['id'];

  if(empty($name) || empty($email) || empty( $number) || empty( $gender) || empty($comment) ){
    echo "all field are required";
  }else{

    $user->updateData($id, $name, $email, $number, $gender, $comment);
    echo "data update";
  }

}

if(isset($_GET['action']) && $_GET['action'] == "delete"){
  $id = $_GET['id'];
  $user->deleteUser($id);
  echo "data deleted";
  
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CRUD</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="container">
      <div class="d-flex">
        <div class="item">
          <!-- update form -->
          <?php
            if(isset($_GET["action"]) && $_GET['action'] == "edit"){
              $id = $_GET['id'];
              
              $result = $user->readById($id);
            
          ?>
          <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
          <input type="hidden" name="id" value="<?php echo $result['id'];?>">
            <input type="text" name="name" placeholder="name" value="<?php echo $result['name'];?>" />
            <input type="email" name="email" placeholder="email"  value="<?php echo $result['email'];?>" />
            <input type="number" name="number" placeholder="number" value="<?php echo $result['number'];?>" />
            <input type="text" name="gender" placeholder="gender" value="<?php echo $result['gender'];?>" />
            <textarea name="comment" id="" cols="20" rows="4" value="<?php echo $result['comment'];?>"></textarea>
            <input type="submit" name="update" value="update" />
          </form>
<?php }else{?>
          <!-- insert form -->
          <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <input type="text" name="name" placeholder="name" />
            <input type="email" name="email" placeholder="email" />
            <input type="number" name="number" placeholder="number" />
            <input type="text" name="gender" placeholder="gender" />
            <textarea name="comment" id="" cols="20" rows="4"></textarea>
            <input type="submit" value="submit" name="submit" />
          </form>
          <?php }?>
        </div>
        <div class="item">
          <div class="horizontal-line"></div>
        </div>
        <div class="item">
          <table>
            <thead>
              <th>id</th>
              <th>name</th>
              <th>email</th>
              <th>number</th>
              <th>gender</th>
              <th>comment</th>
              <th>action</th>
            </thead>
            <tbody>
              <?php
              $i =0;
                foreach($user->readAll() as $key => $value){
                  $i++;
                
              ?>
              <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $value['name'];?></td>
                <td><?php echo $value['email'];?></td>
                <td><?php echo $value['number'];?></td>
                <td><?php echo $value['gender'];?></td>
                <td><?php echo $value['comment'];?></td>
                <td>
                  
                  <?php echo "<a href='?action=edit&id=".$value['id']."'>Edit</a>"; ?>
                  <?php echo "<a href='?action=delete&id=".$value['id']."'>Delete</a>"; ?>
                  
                </td>
              </tr>
              <?php
              }?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
