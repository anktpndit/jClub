<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "group14";

$conn = mysqli_connect($serverName,$dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Error connecting to the database: " . mysqli_connect_error());
}

