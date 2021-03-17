<?php
// mysql conect with php
$serverName = "localhost";
$userName = "root";
$password = "";
$dataBase = "ems";

// create a conection
$conn = mysqli_connect($serverName, $userName, $password, $dataBase);
if (!$conn)
    die(mysqli_connect_error());
// echo "success";
