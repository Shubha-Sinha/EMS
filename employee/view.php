<?php
require_once("../auth.php");
require_once("../config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous" />

  <link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" />

  <title>View</title>
</head>

<body>
  <!-- navbar start -->
  <?php require_once("emp_nav.php"); ?>
  <!-- navbar end -->

  <!-- replay send -->
  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $taskId = $_POST['task_id'];
    $userId = $_POST['userId'];
    $task = mysqli_real_escape_string($conn, $_POST['task']);


    if ($task) {
      // sql quary
      $sql = "INSERT INTO `reply` (`reply`,`taskId`,`reply_by`)VALUES ('$task ','$taskId','$userId')";
      // insert data
      if (mysqli_query($conn, $sql)) {
        echo '
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>Reply successfull</strong> 
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    } else {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Reply Unsuccessful!</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
  }
  ?>
  <!-- replay send end -->

  <!-- Task list start -->
  <section class="container my-5">
    <h3>View Task</h3>
    <?php $task_id = $_GET['id'];
    // fetch start ********************
    $sql = "SELECT * FROM `task` WHERE t_id =  " . $task_id . "";
    $result = mysqli_query($conn, $sql);
    if (
      mysqli_num_rows($result) >
      0
    ) {
      $row = mysqli_fetch_assoc($result);
      echo '
      <div class="my-1" style="background-color: #cbcba9; border: 2px black; border-radius: 20px; padding: 18px;">
        ' . $row['task'] . '
      </div>
      ';
    } else echo "error found."; ?>
    <!-- Task list end -->

    <!-- Reply list start -->
    <?php
    $task_id = $_GET['id'];
    // fetch start ********************
    $sql1 = "SELECT * FROM `reply` WHERE taskId  =  " . $task_id . " ";   #AND reply_by = " . $_SESSION['id'] . " //// it's use for restrict to see admin's replay.
    $result1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($result1) > 0) {
      echo ' <p class="mt-2" style="text-align: right;">Your Reply</p>';

      while ($row1 = mysqli_fetch_assoc($result1)) {
        echo '
      <div class="my-2" style="background-color: #abcdef; border: 2px black; border-radius: 20px; padding: 18px;">
        ' . $row1['reply'] . '
      </div>
      ';
      }
    }  ?>
    <!-- Reply list end -->


    <!-- replay -->
    <form action="" method="post">
      <div class="mb-3 mt-4">
        <input type="hidden" name="task_id" value="<?php echo $task_id; ?>">
        <input type="hidden" name="userId" value="<?php echo $_SESSION['id']; ?>">
        <!-- <label for="" class="form-label offset mx-1">Replay</label> -->
        <textarea placeholder="Write your replay." style="background-color: #ebf5f0;" class="form-control" name="task" id="" rows="4" required></textarea>
      </div>

      <div class="col-md-2 mx-auto mt-1">
        <button class="btn btn-primary" type="submit">Replay</button>
        <a href="e_task.php" class="btn btn-primary">Cancel</a>
      </div>
    </form>
  </section>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>

</html>