<?php
session_start();
//  *******************
require_once('config.php');
// login *****************
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim(md5($_POST['password']));

    if ($username == '' && $password == '') {
        echo "invalid input.";
    } else {
        // check start ********************
        $sql = "SELECT * FROM `user` WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            //~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            $row = mysqli_fetch_assoc($result);
            $role = $row['Role'];
            $id = $row['id'];
            // *******************
            $_SESSION['role'] = $role; #use for auth, by role
            // *******************
            // Roll's data fetch done. 
            if ($role == 'admin') {
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $id;
                header("Location:admin/Admin_dashboard.php");
                exit();
            } elseif ($role == 'employee') {
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $id;
                header("Location:employee/emp_dashboard.php");
                exit();
            }
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Login Unsuccessful!</strong> You should check your username and passwaord.
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
            background-color: #f0eee4;
        }
    </style>

    <title>Login</title>
</head>

<body>
    <!-- login form start-->
    <section class="container">
        <div class="my-5" style="text-align: center;">
            <h3>Login First</h3>
        </div>
        <div class="mt-5">
            <form action="" method="POST">
                <div class="mb-3 col-4 mx-auto">
                    <label for="" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="mb-3 col-4 mx-auto">
                    <label for="" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="col-1 mx-auto mt-4">
                    <button type="submit" class="btn btn-info">Login</button>
                </div>
            </form>
        </div>
    </section>
    <!-- login form end-->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>