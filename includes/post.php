<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST["submit"])) {

    require_once 'dbh-in.php';
    require_once 'function-in.php';


    $actname = mysqli_real_escape_string($conn, strip_tags($_POST["activity_name"]));
    $actloc = mysqli_real_escape_string($conn, strip_tags($_POST["location"]));
    $acttype = mysqli_real_escape_string($conn, strip_tags($_POST["type"]));
    $actdes = mysqli_real_escape_string($conn, strip_tags($_POST["descript"]));
    $acttime = mysqli_real_escape_string($conn, strip_tags($_POST["time"]));
    $actdays = mysqli_real_escape_string($conn, strip_tags($_POST["days"]));
    $mand = mysqli_real_escape_string($conn, strip_tags($_POST["mand"]));
    $opt = mysqli_real_escape_string($conn, strip_tags($_POST["optional"]));
    $clubid = $_SESSION["clubid"];

    insactor($conn, $actname, $actloc, $acttype, $actdes, $acttime, $actdays, $mand, $opt, $clubid);
}
