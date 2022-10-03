<?php
$server = "127.0.0.1";
$username = "root";
$password = "";
$database = "hotels";

// create connection
$conn = mysqli_connect($server, $username, $password, $database);

// check connection
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}else{
    echo "Connected successfully <br/>";
}

function validation($data){
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data= stripcslashes($data);
    return $data;
}
$nameErr = $emailErr = $numberErr = $genderErr = $commentErr ="";
$name = $email = $number = $gender = $comment ="";
if($_SERVER["REQUEST_METHOD"] == "POST"){

    
    if(empty($_POST["uname"])){
      return  $nameErr = "name is required";
    }else{
        $name = validation($_POST["uname"]);
    }

    if(empty($_POST["email"])){
        $emailErr = "email is required";
    }else{
        $email = validation($_POST["email"]);
    }
    
    if(empty($_POST["number"])){
        $numberErr = "number is required";
    }else{
        $number = validation($_POST["number"]);
        
    }

    if(empty($_POST["gender"])){
        $genderErr= "gender is required";
    }else{
        $gender = validation($_POST["gender"]);
    }

    if(empty($_POST['comment'])){
        $commentErr = "comment is required";
    }else{

        $comment = validation($_POST["comment"]);
    }

    
    $sql = "INSERT INTO users (id, name, email, number, gender, comment) VALUES ('3','$name', '$email',  '$number','$gender', '$comment' )";
    
    if(mysqli_query($conn, $sql)){
        echo "Data Inserted successfully";
        
        ?>
        <script>
            alert("data inserted")
        </script>
    <?php }else{
        echo "Error : <br/>".mysqli_error($conn);
    }
}?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Touring Foreign Country</title>
  </head>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
    crossorigin="anonymous"
  />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Edu+TAS+Beginner:wght@400;500&display=swap"
    rel="stylesheet"
  />
  <link rel="stylesheet" href="style.css" />
  <body>
    <div class="container my-5">
      <div class="width-container">
        <h1 class="text-center">Welcome to IIT Campus Touring application</h1>
        <p class="text-primary text-center">Please fill up this form</p>

        <!-- form fill up -->
        <div class="my-4">
          <form method="post" action="" onsubmit=handleSubmit()>
            <div class="mb-3">
              <label for="name" class="form-label">Full Name</label>
              <input
                type="text"
                class="form-control"
                id="name"
                name="uname"
                placeholder="Enter your full name"
              />
              <?php echo $nameErr;?>
            </div>

            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label"
                >Email address</label
              >
              <input
                type="email"
                class="form-control"
                id="exampleInputEmail1"
                name="email"
                placeholder="enter your valid email address"
              />
            </div>
            <div class="mb-3">
              <label for="gender" class="form-label">Gender</label>
              <input
                type="text"
                class="form-control"
                id="gender"
                name="gender"
                placeholder="Enter your gender"
              />
            </div>

            <div class="mb-3">
              <label for="phone" class="form-label">Phone Number</label>
              <input
                type="number"
                maxlength="14"
                class="form-control"
                id="phone"
                name="number"
                placeholder="Enter your contact number"
              />
            </div>

            <div class="mb-3">
              <label for="comment" class="form-label">Comment</label>
              <textarea
                name="comment"
                placeholder="enter any comment"
                class="form-control"
                rows="4"
              ></textarea>
            </div>

            <input type="submit" value="submit" class="btn btn-primary" />
          </form>
        </div>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
      crossorigin="anonymous"
    ></script>
    <script>
        function handleSubmit(e){
            e.preventDefault();
            alert("show")
        }
    </script>
  </body>
</html>
<?php
mysqli_close($conn);