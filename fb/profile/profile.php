<?php
include "../DB/connection.php";

if(!isset($_COOKIE["users"])){
    header("Location:../index.php?login_first");
}
?>

<?php
    if (isset($_GET['action']) && $_GET['action'] == 'logout'){
        setcookie("users","",time() - (86400 * 30),"/" );
        header("Location:../index.php?login_first");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php
  include "../components/nav_profile_style/nav_profile_style.php";
  ?>
</head>
<body>

<?php
include "../components/nav/nav.php";
?>
<div class="container bootstrap snippets bootdey">
<div class="row">
  <div class="profile-nav col-md-3">
      <div class="panel">
          <div class="user-heading round">
              <a href="#">
                  <img src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="">
              </a>
              <h1>Camila Smith</h1>
              <p>deydey@theEmail.com</p>
          </div>

          <ul class="nav nav-pills nav-stacked">
              <li class="active"><a href="#"> <i class="fa fa-user"></i> Profile</a></li>
              <li><a href="#"> <i class="fa fa-edit"></i> Edit profile</a></li>
          </ul>
      </div>
  </div>
  <div class="profile-info col-md-9">
      <div class="panel">
          <form action="../DB/userPost.php" method="post" enctype="multipart/form-data">
              <textarea name="post" placeholder="Whats in your mind today?" rows="2" class="form-control input-lg p-text-area"></textarea>
              <footer class="panel-footer">
                  <button type="submit" class="btn btn-warning pull-right">Post</button>
                  <ul class="nav nav-pills">
                      
                  <li> <input type="file" name="image"  id=""/></li>
             
              </ul>
          </footer>
          </form>

      </div>
      <div class="panel">
          <div class="bio-graph-heading">
              self learner
          </div>
          <div class="panel-body bio-graph-info">
              <h1>Bio Graph</h1>
              <div class="row">
                  <div class="bio-row">
                      <p><span>First Name </span>: Camila</p>
                  </div>
                  <div class="bio-row">
                      <p><span>Last Name </span>: Smith</p>
                  </div>
                  <div class="bio-row">
                      <p><span>Country </span>: Australia</p>
                  </div>
                  <div class="bio-row">
                      <p><span>Birthday</span>: 13 July 1983</p>
                  </div>
                  <div class="bio-row">
                      <p><span>Occupation </span>: UI Designer</p>
                  </div>
                  <div class="bio-row">
                      <p><span>Email </span>: jsmith@flatlab.com</p>
                  </div>
                  <div class="bio-row">
                      <p><span>Mobile </span>: (12) 03 4567890</p>
                  </div>
                  <div class="bio-row">
                      <p><span>Phone </span>: 88 (02) 123456</p>
                  </div>
              </div>
          </div>
      </div>
      <div>
          <div class="row">
            <!-- all post show in profile -->
            <?php
            $sql = "SELECT * FROM posts";
            $query = mysqli_query($connection, $sql);
            if($query == true){

                while($data = mysqli_fetch_array($query)){?>

              <div class="col-md-6">
                  <div class="panel">
                      <div class="panel-body">
                          <div class="bio-chart">
                              <div style="display:inline;width:100px;height:100px;">
                              <img src="../assets/image/<?php echo $data['image'];?>" height="100" width="100" alt=""></div>
                          </div>
                          <div class="bio-desk">
                              <h4 class="green"><?php echo substr($data["post"], 0, 100).'...';?></h4>
                              <p>Post Date : <?php echo $data["date"];?></p>
                              <p><a href="#">Details</a></p>
                          </div>
                      </div>
                  </div>
              </div>
              
                <?php }}
            ?>

          </div>
      </div>
  </div>
</div>
</div>
<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>