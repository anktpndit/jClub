<?php
$clubidres = getactinfo1($conn, $cid);

while ($row = mysqli_fetch_assoc($clubidres)) {
$sql = "SELECT * FROM ACTIVITY WHERE activity_id = ?;";
$prestate = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($prestate, $sql)) {
header("location: ../activity.php?error=prestatefailed");
exit();
}

mysqli_stmt_bind_param($prestate, "i", $row['activity_id']);
mysqli_stmt_execute($prestate);

$resultdata = mysqli_stmt_get_result($prestate);

$actin = mysqli_fetch_assoc($resultdata);

echo "<li>". $actin['activity_name'] . ":</li>";
echo "<ul>
    <li>Location: " . $actin['activity_location'] . "</li>";
    echo "<li>Desciption: " . $actin['activity_desc'] . "</li>";
    echo "<li>Type: " . $actin['activity_type'] . "</li>";
    if ($actin['activity_day'] == 1) {
        echo "<li>Day: Sunday</li>";
    } else if ($actin['activity_day'] == 2) {
        echo "<li>Day: Monday</li>";
    } else if ($actin['activity_day'] == 3) {
        echo "<li>Day: Tuesday</li>";
    } else if ($actin['activity_day'] == 4) {
        echo "<li>Day: Wednesday</li>";
    } else if ($actin['activity_day'] == 5) {
        echo "<li>Day: Thursday</li>";
    } else if ($actin['activity_day'] == 6) {
        echo "<li>Day: Friday</li>";
    } else if ($actin['activity_day'] == 7) {
        echo "<li>Day: Saturday</li>";
    }
    echo "<li>Time: " . $actin['activity_time'] . "</li>
</ul>";
}