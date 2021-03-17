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
    <!-- jq css -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <title>leave</title>
</head>

<body>
    <?php require_once("emp_nav.php"); ?>
    <!-- leave apply start -->
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $from = $_POST['from'];
        $to = $_POST['to'];
        $Paid = $_POST['Paid'];
        $Medical = $_POST['Medical'];
        $Casual = $_POST['Casual'];
        $apply_by = $_POST['emp_id'];
        $status = "Pending";
        if ($from == '') {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Unsuccessful!</strong> input date first.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
        } else {
            // sql quary
            $sql = "INSERT INTO `apply_leave` (`apply_l_from`,`apply_l_to`,`apply_paid`,`apply_medical`,`apply_casual`,`apply_by`,`status`)VALUES ('$from','$to','$Paid','$Medical','$Casual','$apply_by','$status')";
            $res = mysqli_query($conn, $sql);

            if ($res) {
                echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        Leave apply <strong>successfull.</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }


    ?>
    <!-- leave apply end -->
    <!-- leave list start -->
    <section class="container mt-3">
        <a href="appliedLeave.php" class="btn btn-warning btn-sm offset mx-3 mt-2">Applied Leave</a>
        <h3 class="mt-2">Your leaves</h3>
        <div class="mt-2">
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">Employee Name</th>
                        <th scope="col">Paid leave</th>
                        <th scope="col">Medical leave</th>
                        <th scope="col">Casual leave</th>
                        <th scope="col">Valid From </th>
                        <th scope="col">Valid To</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    // fetch start ********************
                    $sql = "SELECT * FROM `assign_leave` INNER JOIN `user`
                    ON assign_leave.assign_to = user.id WHERE user.id =  " . $_SESSION['id'] . " ;";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
       
       <td>" . $row['name'] . "</td>
       <td>" . $row['paid'] . "</td>
       <td>" . $row['medical'] . "</td>
       <td>" . $row['casual'] . "</td>
       <td>" . $row['l_from'] . "</td>
       <td>" . $row['l_to'] . "</td>
      
       
     </tr>";
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

        <!-- apply leave start -->
        <form action="" method="POST">
            <div class="my-2">

                <input type="hidden" name="emp_id" value=" <?php echo $_SESSION['id']; ?> ">

                <div class='row gx-2'>
                    <div class='col-md-5'>

                        <figure><img src="../img/leave.jpg" alt="img" class="img-fluid" srcset=""></figure>

                    </div>

                    <div class="col-md-7">
                        <div style="background-color: #ebf5f0; padding: 18px; border-color: black; border-radius: 10px;">
                            <h5> Assign Leave </h5>
                            <div class="mb-3">
                                <label for="" class="form-label mt-2"> <strong>Leave From :</strong> </label>
                                <input type="text" name="from" id="from">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label mt-2"> <strong>Leave To :</strong> </label>
                                <input class=" offset mx-4" type="text" name="to" id="to">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label mt-2 offset mx-1"> <strong>Paid :</strong> </label>
                                <input class=" offset mx-5" type="text" name="Paid" placeholder="Number of leaves" id="">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label mt-2 offset mx-1"> <strong>Medical :</strong> </label>
                                <input class="offset mx-4" type="text" name="Medical" placeholder="Number of leaves" id="">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label mt-2 offset mx-1"> <strong>Casual : </strong> </label>
                                <input class="offset mx-4" type="text" name="Casual" placeholder="Number of leaves" id="">
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-2  mx-auto mt-3">
                <button class="btn btn-primary" type="submit">Apply</button>
                <a href="emp_dashboard.php" class="btn btn-primary">Cancel</a>
            </div>
        </form>
    </section>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!--************** jquery **************-->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <!--************** jquery-Ui **************-->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $(document).ready(function() {
            $('#from').datepicker({
                dateFormat: "dd-mm-yy",
                minDate: -0,
                maxDate: "+3M",
                changeMonth: true,
                changeYear: true,
                showAnim: "bounce"
            });
            $('#to').datepicker({
                dateFormat: "dd-mm-yy",
                minDate: "+1",
                maxDate: "+3M",
                changeMonth: true,
                changeYear: true,
                showAnim: "bounce"
            });
        })
    </script>
</body>

</html>