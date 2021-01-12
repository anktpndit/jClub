<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once 'includes/dbh-in.php';
require_once 'includes/function-in.php';
$accid = $_SESSION["accid"];

$clubinfo = getclubinfo($conn, $accid);
