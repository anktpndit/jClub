<?php
require_once 'dbh-in.php';

//searching all clubs 

if (isset($_POST['q'])) {
    $value = $_POST['q'];
} else {
    $value='';
}
$value = mysqli_real_escape_string($conn, $value);
$sql = "SELECT * FROM CLUB WHERE club_name LIKE '%$value%' OR club_description LIKE '%$value%' OR
                    club_begin LIKE '%$value%' OR club_contact LIKE '%$value%';";

$sql2 = "SELECT * FROM ACTIVITY WHERE activity_name LIKE '%$value%' OR activity_location LIKE '%$value%' OR
                    activity_desc LIKE '%$value%' OR activity_type LIKE '%$value%' OR activity_day LIKE '%$value%' OR activity_time LIKE '%$value%';";
$result2 = mysqli_query($conn, $sql2);

$result = mysqli_query($conn, $sql);

$stack = array();

while ($row = mysqli_fetch_assoc($result)) {
    array_push($stack, $row['club_name']);
}

while ($row2 = mysqli_fetch_assoc($result2)) {
    array_push($stack, $row2['activity_name']);
}

