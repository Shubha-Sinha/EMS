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
    <title>Applied leave</title>
</head>

<body>
    <?php require_once("emp_nav.php"); ?>

    <!-- leave list start -->
    <section class="container mt-3">
        <h3 class="mt-2">Your leaves</h3>
        <div class="mt-2">
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">Sl</th>
                        <th scope="col">Paid leave</th>
                        <th scope="col">Medical leave</th>
                        <th scope="col">Casual leave</th>
                        <th scope="col">Applied From </th>
                        <th scope="col">Applied To</th>
                        <th scope="col">Status</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    // fetch start ********************
                    $sql = "SELECT * FROM `apply_leave` WHERE apply_by  =  " . $_SESSION['id'] . "";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        $sl = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                             <td>" . $sl . "</td>
                             <td>" . $row['apply_paid'] . "</td>
                             <td>" . $row['apply_medical'] . "</td>
                             <td>" . $row['apply_casual'] . "</td>
                             <td>" . $row['apply_l_from'] . "</td>
                             <td>" . $row['apply_l_to'] . "</td>
                             <td style='color: green;'>" . $row['status'] . "</td>
      
       
                            </tr>";
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