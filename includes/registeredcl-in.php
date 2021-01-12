<?php
require_once 'dbh-in.php';
require_once 'function-in.php';

$result = getreginfo($conn, $sid);
$arrcl = array();
$arrname = array();

if (mysqli_num_rows($result) == 0) {
    echo "<li style='color:red;'>Not yet registered to clubs!</li>";
} else {
    while ($row = mysqli_fetch_assoc($result)) {
        $sql = "SELECT * FROM CLUB WHERE club_id = ?;";
        $prestate = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($prestate, $sql)) {
            header("location: ../searchstudents.php?error=execfail");
            exit();
        }

        array_push($arrcl, $row['club_id']);
        mysqli_stmt_bind_param($prestate, "i", $row['club_id']);
        mysqli_stmt_execute($prestate);

        $resultdata = mysqli_stmt_get_result($prestate);

        $actin = mysqli_fetch_assoc($resultdata);

        echo "<li>" . $actin['club_name'] . "</li>";
        array_push($arrname, $actin['club_name']);
    }
}
