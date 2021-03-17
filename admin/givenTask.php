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

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <title>Task</title>
</head>

<body>
    <?php require_once("adm_nav.php"); ?>

    <!-- Task list start -->
    <section class="container my-5">
        <h3>Task List</h3>
        <div class="mt-1">
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Task</th>
                        <th scope="col">Assigned by</th>
                        <th scope="col">Date & Time</th>
                        <th scope="col">Operations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // fetch start ********************
                    $sql = "SELECT * FROM `task`";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        $sl = 1; //sl number
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
       <th scope='row'>" . $sl . "</th>
       <td>" . substr($row['task'], 0, 100) . "</td>
       <td>" . $row['assigned_by'] . "</td>
       <td>" . $row['date&time'] . "</td>
       <td><div class=' d-md-flex justify-content-md-end'>
         <a href='replyView.php?id=$row[t_id]'><input type='submit' value='View' class='btn btn-primary me-md-2' id='Edit'></a>
     </div></td>
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
        <!-- Task list end -->
    </section>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- jquary cdn -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <!-- Data tables cdn -->
    <script src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <!-- Data tables  JavaScript-->
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>