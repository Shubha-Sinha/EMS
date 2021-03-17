<?php
require_once("../auth.php");
require_once("../config.php");
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- b5 icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <title>Applied leave</title>
</head>

<body>

    <?php require_once("adm_nav.php"); ?>
    <section class="container mt-3">
        <!--leave status form  -->
        <?php
        if (isset($_POST['Approved'])) {
            $status = "Approved";
            $apply_id = $_POST['apply_id'];
            // update start by id ********************
            $sql = "UPDATE `apply_leave` SET `status` = '$status' WHERE `apply_leave`.`apply_id` = $apply_id";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo '
            <div class= " alert alert-warning alert-success fade show" role="alert">
            Approval was <strong>successfully</strong> sent.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div> 
          ';
            } else {
                echo '
            <div class= " alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Not success!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div> 
          ';
            }
        } elseif (isset($_POST['Rejected'])) {
            $status = "Rejected";
            $apply_id = $_POST['apply_id'];
            // update start by id ********************
            $sql = "UPDATE `apply_leave` SET `status` = '$status' WHERE `apply_leave`.`apply_id` = $apply_id";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo '
            <div class= " alert alert-warning alert-success fade show" role="alert">
            Approval was <strong>successfully</strong> sent.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div> 
          ';
            } else {
                echo '
            <div class= " alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Not success!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div> 
          ';
            }
        }
        ?>

        <!-- leave list start -->

        <h3 class="mt-2">Applied leaves</h3>
        <div class="mt-2">
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">Sl</th>
                        <th scope="col">Employee Name</th>
                        <th scope="col">Paid leave</th>
                        <th scope="col">Medical leave</th>
                        <th scope="col">Casual leave</th>
                        <th scope="col"> From </th>
                        <th scope="col"> To</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    // fetch start ********************
                    $sql = "SELECT * FROM `apply_leave` INNER JOIN `user`
                    ON apply_leave.apply_by  = user.id";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        $sl = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr>
                                <td> <?php echo $sl ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['apply_paid']; ?> </td>
                                <td><?php echo $row['apply_medical']; ?> </td>
                                <td><?php echo $row['apply_casual']; ?> </td>
                                <td><?php echo $row['apply_l_from']; ?> </td>
                                <td><?php echo $row['apply_l_to']; ?> </td>
                                <td style='color: green;'> <?php echo $row['status']; ?> </td>
                                <td>
                                    <form action='' method='post'>
                                        <input type='hidden' name='apply_id' value=' <?php echo $row['apply_id']; ?>'>
                                        <div class='d-grid gap-2 d-md-block'>
                                            <button class='btn btn-outline-success btn-sm' name='Approved' type='submit'><i class='bi bi-check-square-fill'></i> </button>
                                            <button class='btn btn-outline-danger btn-sm' name='Rejected' type='submit'><i class='bi bi-x-square-fill'></i></button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                    <?php
                            $sl++;
                        }
                    } else {
                        echo "0 results";
                    }

                    // fetch end **********************
                    ?>
                </tbody>
            </table>
        </div>
        <!-- leave list end -->


    </section>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>


</body>

</html>