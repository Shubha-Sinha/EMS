<?php
require_once("../config.php");
require_once("../auth.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $name = trim($_POST['name']);
  $username = trim($_POST['username']);
  $email = $_POST['email'];
  $Gender = $_POST['Gender'];
  $Department = $_POST['Department'];
  $role = $_POST['role'];
  $password = trim($_POST['password']);
  $confirm = trim($_POST['confirm']);

  if ($name == '' && $username == '' && $email == '' && $Gender == '' && $Department == '' && $password == '' && $confirm == '' && $role == '') {
    echo "Invalid,input first.";
    exit();
  } else {
    if ($password == $confirm) {
      // sql quary
      $sql = "INSERT INTO `user` (`name`,`username`,`email`,`gender`,`password`,`department`,`Role`)VALUES ('$name','$username','$email','$Gender','" . md5($password) . "','$Department','$role')"; # md5() is use for password encript/hashing.
      // insert data
      if (mysqli_query($conn, $sql)) {
        echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Register successfull</strong> You should go to the <a href="index.php" class="alert-link">Login</a> page.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    } else {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Unsuccessful!</strong>Passwaord does not match.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    }
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <style>
    body {
      background-color: #edeeef;
    }
  </style>

  <title>Register</title>
</head>

<body>
  <!-- navbar start -->
  <?php require_once("adm_nav.php"); ?>
  <!-- navbar end -->
  <!--Register form start  -->
  <section class="container">
    <div class="my-1" style="text-align: center;">
      <h3>Register</h3>
    </div>
    <!-- form start -->
    <form action="" method="POST">
      <div class="col-md-6 mx-auto">
        <label for="" class="form-label">Name</label>
        <input type="text" class="form-control" id="" name="name" required>
      </div>
      <div class="col-md-6 mx-auto">
        <label for="" class="form-label">Username</label>
        <input type="text" class="form-control" id="" name="username" required>
      </div>
      <div class="col-md-6 mx-auto">
        <label for="" class="form-label">Email</label>
        <input type="email" class="form-control" id="" name="email" required>
      </div>
      <!-- radio btn start-->
      <!-- gender start-->
      <div class="mt-3 col-md-6 mx-auto">
        <label for="exampleInputRadio" class="form-label">Gender :</label>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="Gender" id="male" value="male">
          <label class="form-check-label" for="inlineRadio1">Male</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="Gender" id="female" value="female">
          <label class="form-check-label" for="inlineRadio2">Female</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="Gender" id="other" value="other">
          <label class="form-check-label" for="inlineRadio3">Other</label>
        </div>
      </div>
      <!-- gender end -->

      <!-- radio btn end -->
      <div class="col-md-6 mx-auto">
        <label for="" class="form-label">Password</label>
        <input type="password" class="form-control" id="" name="password" required>
      </div>
      <div class="col-md-6 mx-auto">
        <label for="" class="form-label">C_Password</label>
        <input type="password" class="form-control" id="" name="confirm" required>
      </div>
      <!-- radio btn start -->
      <!-- dept -->
      <div class="my-3 col-md-6 mx-auto">
        <label class="form-check-label mb-1" for="exampleRadios1">
          Department
        </label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="Department" id="exampleRadios1" value="developer" checked>
          <label class="form-check-label" for="exampleRadios1">
            Developer
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="Department" id="exampleRadios2" value="tester">
          <label class="form-check-label" for="exampleRadios2">
            Tester
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="Department" id="exampleRadios3" value="seo">
          <label class="form-check-label" for="exampleRadios3">
            SEO
          </label>
        </div>
      </div>
      <!-- dept -->
      <!-- role -->
      <div class="my-3 col-md-6 mx-auto">
        <label for="exampleInputRadio" class="form-label">Role :</label>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="role" id="" value="admin">
          <label class="form-check-label" for="inlineRadio1">Admin</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="role" id="" value="employee">
          <label class="form-check-label" for="inlineRadio2">Employee</label>
        </div>
      </div>
      <!-- role -->
      <!-- radio btn end -->
      <div class="col-md-1 mx-auto mt-2">
        <button class="btn btn-primary" type="submit">Register</button>
        <a href="Admin_dashboard.php" class="btn btn-primary mt-2">Cancel</a>
      </div>
    </form>

    <!-- form end -->
  </section>
  <!--Register form end  -->

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>