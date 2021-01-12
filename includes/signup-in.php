<?php

if (isset($_POST["button"])) {
    require_once 'dbh-in.php';
    require_once 'function-in.php';

    $name = mysqli_real_escape_string($conn,strip_tags($_POST["studentname"]));
    $email = mysqli_real_escape_string($conn,strip_tags($_POST["email"]));
    $username = mysqli_real_escape_string($conn, strip_tags($_POST["username"]));
    $pass = mysqli_real_escape_string($conn, strip_tags($_POST["pwd"]));
    $passRe = mysqli_real_escape_string($conn, strip_tags($_POST["repwd"]));
    $major = mysqli_real_escape_string($conn, strip_tags($_POST["major"]));
    $accountdes = mysqli_real_escape_string($conn, strip_tags($_POST["accountdes"]));
    $dateofbirth = mysqli_real_escape_string($conn, strip_tags($_POST["dob"]));

    //functions to handle errors 
    if (invaliduserid($username) !== false) {
        header("location: ../signlog.php?error=invaliduid");
        exit();
    }

    if (invalidemail($email) !== false) {
        header("location: ../signlog.php?error=invalidemail");
        exit();
    }

    if (passmatch($pass,$passRe) !== false) {
        header("location: ../signlog.php?error=passmatch");
        exit();
    }

    if (uidex($conn, $username, $email) !== false) {
        header("location: ../signlog.php?error=usertaken");
        exit();
    }

    insertuser($conn, $name, $email, $username, $pass, $major, $accountdes, $dateofbirth);

} else if (isset($_POST["create"])) {

    $clubname = $_POST["clubName"];
    $email = $_POST["clubemail"];
    $username = $_POST["clubid"];
    $pass = $_POST["passw"];
    $passRe = $_POST["repassw"];
    $accountdes = $_POST["clubaccountdes"];
    $dateofbirth = $_POST["dob"];
    $type = $_POST["opt"];

    require_once 'dbh-in.php';
    require_once 'function-in.php';

    //functions to handle errors 
    if (invaliduserid($username) !== false) {
        header("location: ../createclub.php?error=invalidcid");
        exit();
    }

    if (invalidemail($email) !== false) {
        header("location: ../createclub.php?error=invalidemail");
        exit();
    }

    if (passmatch($pass, $passRe) !== false) {
        header("location: ../createclub.php?error=passmatch");
        exit();
    }

    //important
    if (uidex($conn, $username, $email) !== false) {
        header("location: ../createclub.php?error=usertaken");
        exit();
    }

    insertclub($conn, $clubname, $email, $username, $pass, $accountdes, $dateofbirth, $type);

} else {
    header("location: ../signlog.php");
    exit();
}