<?php
require_once("../config.php");
require_once("../auth.php");
// msg insert ************************
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $task = mysqli_real_escape_string($conn, $_POST['task']);
  $assigned_by = $_POST['assigned_by'];
  $emp_list = $_POST['emp'];

  if ($task == '') {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Unsuccessful!</strong> input task first.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  } else {
    // loop is use for make separate task row for each emp in the table.
    foreach ($emp_list as $emp) {
      // sql quary
      $sql = "INSERT INTO `task` (`task`,`id`,`assigned_by`)VALUES ('$task','$emp','$assigned_by')";
      $res = mysqli_query($conn, $sql);
    }
    if ($res) {
      echo '
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                     task send <strong>successfull.</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
      background-color: #F8F8FF;
    }
  </style>
  <title>Task</title>
</head>

<body>
  <?php include_once("adm_nav.php"); ?>
  <!-- navbar end -->

  <!-- grid start -->
  <section class="container">
    <a href="givenTask.php" class="btn btn-warning btn-sm offset mx-4 mt-3">Given Task</a>
    <form action="" method="POST">
      <div class="my-2">
        <strong>Employee list:</strong>
        <input type="hidden" name="assigned_by" value=" <?php echo $_SESSION['username']; ?> ">
        <?php
        // fetch start ********************
        $sql = "SELECT * FROM `user` WHERE `Role` = 'employee' order by id";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo "
                <div class='row gx-5'>
                <div class='col-md-4' >
                <div class='form-check'>
                <input class='form-check-input' type='checkbox' name='emp[]' value='" . $row['id'] . "' id=''>
                <label class='form-check-label' for='flexCheckDefault'>
                " . $row['name'] . "
                </label>
                </div>
                </div>
              ";
          }
        } else {
          echo "0 results";
        }
        // fetch end **********************
        ?>


        <div class="col-md-8">
          <div class="mb-3">
            <label for="" class="form-label"> <strong>Task</strong> </label>
            <textarea style="background-color: #ebf5f0;" class="form-control" name="task" id="" rows="7"></textarea>
          </div>
        </div>
      </div>
      </div>

      <div class="col-md-2 mx-auto mt-1">
        <button class="btn btn-primary" type="submit">Send</button>
        <a href="Admin_dashboard.php" class="btn btn-primary">Cancel</a>
      </div>
    </form>
  </section>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>