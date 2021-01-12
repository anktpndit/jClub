<?php
require_once 'dbh-in.php';

//for students
if (isset($_POST['q'])) {
    $value = $_POST['q'];
} else {
    $value = '';
}
$value = mysqli_real_escape_string($conn, $value);
$sql = "SELECT student_name FROM STUDENT WHERE student_name LIKE '%$value%' OR student_DOB LIKE '%$value%' OR
                    student_major LIKE '%$value%' OR student_contact LIKE '%$value%';";

$result = mysqli_query($conn, $sql);

$stack = array();

while ($row = mysqli_fetch_assoc($result)) {
    array_push($stack, $row['student_name']);
}
