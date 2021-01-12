<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$accid = $_SESSION['accid'];

require_once 'dbh-in.php';
require_once 'function-in.php';

$cinf = getclubinfo($conn,$accid);

$cid = $cinf['club_id'];

$result = getmeminfo($conn,$cid);

while ($row = mysqli_fetch_assoc($result)) {
    $sql  = "SELECT * FROM STUDENT WHERE student_id = ?;";
    $prestate = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($prestate, $sql)) {
        header("location: ../index.php?error=prestatefailed");
        exit();
    }

    mysqli_stmt_bind_param($prestate, "i", $row['student_id']);
    mysqli_stmt_execute($prestate);

    $resultdata = mysqli_stmt_get_result($prestate);

    $actin = mysqli_fetch_assoc($resultdata);

    echo "<li>" . $actin['student_name'] . "</li>";
}
