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
                foreach($user as $key => $value){
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
