<?php
if (isset($_POST['buton'])) {

    require_once 'dbh-in.php';
    require_once 'function-in.php';


    $username = mysqli_real_escape_string($conn, strip_tags($_POST["userid"]));
    $pass = mysqli_real_escape_string($conn, strip_tags($_POST["password"]));


    login($conn, $username, $pass);

}
else {
    header("location: ../signlog.php?error=emptyfields");
    exit();
}