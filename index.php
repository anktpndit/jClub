<?php

include_once 'header.php';

?>

<?php

if (isset($_GET['error'])) {
    if ($_GET['error']== 'noclub') {
        echo "<p style='color:red;margin-top:5%;'>No registered clubs yet!</p>";
    } else if ($_GET['error'] == 'nostudent') {
        echo "<p style='color:red;margin-top:5%;'>No registered students yet!</p>";
    }
}

if (isset($_SESSION["accid"])) {
    if ($_SESSION["acctype"] == "club") {
        require_once 'content2.php';
    } else {
        require_once 'content1.php';
    }
} else {
    require_once 'content1.php';
}
?>

<?php

include_once 'footer.php';

?>