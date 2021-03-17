<?php
require_once("../auth.php");
require_once("../config.php");
// Update functionality ****
$id = $_GET["id"];
// fetch start by id ********************
$sql = "SELECT * FROM `user` where id = $id";
$result = mysqli_query($conn, $sql);
while ($select = mysqli_fetch_assoc($result)) {
    $name = $select['name'];
    $username = $select['username'];
    $email = $select['email'];
    $password = $select['password'];
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

    <title>Update</title>
</head>

<body>
    <!-- navbar start -->
    <?php require_once("adm_nav.php"); ?>
    <!-- navbar end -->
    <!--Register form start  -->
    <section class="container">
        <div class="my-3" style="text-align: center;">
            <h3>Update</h3>
        </div>
        <!-- form start -->
        <form action="update.php" method="POST">
            <div class="col-md-6 mx-auto">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control" id="" name="name" value="<?php echo $name; ?>" required>
            </div>
            <div class="col-md-6 mx-auto">
                <label for="" class="form-label">Username</label>
                <input type="text" class="form-control" id="" name="username" value="<?php echo $username; ?>" required>
            </div>
            <div class="col-md-6 mx-auto">
                <label for="" class="form-label">Email</label>
                <input type="email" class="form-control" id="" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="col-md-6 mx-auto">
                <label for="" class="form-label">Password</label>
                <input type="password" class="form-control" id="" name="password" value="<?php echo $password; ?>" required>
            </div>
            <div class="col-md-6 mx-auto">
                <label for="" class="form-label">C_Password</label>
                <input type="password" class="form-control" id="" name="confirm" value="<?php echo $password; ?>" required>
            </div>
            <input type="hidden" id="" name="id" value="<?php echo $_GET['id']; ?>">

            <div class="col-md-1 mx-auto mt-2">
                <button class="btn btn-primary" name="update" type="submit">Update</button>
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