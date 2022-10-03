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
          <form method="post" action="submitForm.php">
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
  </body>
</html>
