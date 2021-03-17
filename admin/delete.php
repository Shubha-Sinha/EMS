<?php
require_once("../config.php");
require_once("../auth.php");

$id = $_GET['id'];
// delete start by id ********************
$sql =  "DELETE FROM `user` WHERE `user`.`id` = $id";
if (mysqli_query($conn, $sql))
    header("location:Admin_dashboard.php");
else
    echo "Delete not successfull";
