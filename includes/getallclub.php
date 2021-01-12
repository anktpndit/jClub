<?php
require_once 'includes/dbh-in.php';
require_once 'includes/function-in.php';

$clubre = getclubs($conn);

//displaying the options that user can register for a club
while ($row = mysqli_fetch_assoc($clubre)) {
    echo "<option value='" . $row['club_id'] . "'>" . $row['club_name'] . "</option>";
}
