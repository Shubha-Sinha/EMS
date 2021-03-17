<!-- update***** -->

<?php
require_once("../config.php");
require_once("../auth.php");
// ****************************
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = trim($_POST['password']);
    $confirm = trim($_POST['confirm']);

    if ($name == '' && $username == '' && $email == '' && $password == '' && $confirm == '') {
        echo "Invalid,input first.";
        exit();
    } else if ($password == $confirm) {
        // update start by id ********************
        $sql = "UPDATE `user` SET `name` = '$name', `username` = '$username',`email` = '$email', `password` = '" . md5($password) . "' WHERE `user`.`id` = $id;";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location:Admin_dashboard.php");
            exit();
        } else
            echo "Update not successfull";
    } else
        echo "password does't match.";
}
?>