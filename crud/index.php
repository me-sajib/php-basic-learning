<?php

include "config.php";

    // read all data in database
    $sql = "SELECT * FROM users";
    $query = mysqli_query($connect, $sql);
    
    // edit data message
    if(isset($_GET["edit_success"])){
        echo "Data Updated Successfully";
    }
    if(isset($_GET["deleted_data"])){
        echo "Data Deleted Successfully";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <style>
        table{
            padding:10px 8px
        }
        thead{
            background:gray;
            color:white;
            font-weight:bold;
            font-family:san-serif;
        }
        td{
            padding:15px
        }
    </style>
</head>
<body>
    <table>
        <thead>
           <tr>
           <td>ID</td>
            <td>NAME</td>
            <td>EMAIL</td>
            <td>PHONE</td>
            <td>ACTION</td>
           </tr>
        </thead>
        <tbody>
           <?php
            if($query == true){
                $count =1;
                while($data = mysqli_fetch_array($query)){?>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td><?php echo $data["name"]; ?></td>
                    <td><?php echo $data["email"]; ?></td>
                    <td><?php echo $data["number"]; ?></td>
                    <td><a href="edit.php?id=<?php echo $data['email'];?>">edit</a>
                    <a href="delete.php?id=<?php echo $data['id'];?>">delete</a></td>
                </tr>
                <?php  }
            } ?>
        </tbody>
    </table>
</body>
</html>