<?php

include_once 'header.php';

?>

<div class="container" style="padding-top: 5%;">
    <div class="formdiv">
        <div class="info"></div>
        <form method="post" action="includes/post.php">
            <!-- <div class="form-group row">
                <label for="first_name" class="col-sm-3 col-form-label">First Name</label>
                <div class="col-sm-7">
                <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name">
                </div>
            </div> -->
            <div class="form-group row">
                <label for="activity_name" class="col-sm-3 col-form-label">Activity Name</label>
                <div class="col-sm-7">
                    <input type="text" name="activity_name" class="form-control" id="activity_name" placeholder="Activity Name" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="location" class="col-sm-3 col-form-label">Activity Location</label>
                <div class="col-sm-7">
                    <input type="text" name="location" class="form-control" id="location" placeholder=" Activity Location" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="type" class="col-sm-3 col-form-label">Type</label>
                <div class="col-sm-7">
                    <input type="text" id="type" class="text" name="type" placeholder="Activity Type" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="descript" class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-7">
                    <input type="text" id="descript" name="descript" placeholder="Activity Description" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="time" class="col-sm-3 col-form-label">Activity Time</label>
                <div class="col-sm-7">
                    <input type="text" id="time" name="time" placeholder="Activity time" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="days" class="col-sm-3 col-form-label">Activity Days</label>
                <div class="col-sm-7">
                    <select name="days">
                        <option value="1">Sunday</option>
                        <option value="2">Monday</option>
                        <option value="3">Tuesday</option>
                        <option value="4">Wednesday</option>
                        <option value="5">Thursday</option>
                        <option value="6">Friday</option>
                        <option value="7">Saturday</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="mand" class="col-sm-3 col-form-label">Mandatory</label>
                <div class="col-sm-7">
                    <input type="number" id="mand" name="mand" min="0" max="1" placeholder="mandatory? insert 1 or else 0" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="optional" class="col-sm-3 col-form-label">Optional</label>
                <div class="col-sm-7">
                    <input type="number" id="optional" name="optional" min="0" max="1" placeholder="optional? insert 1 or else 0" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-7">
                    <input type="submit" name="submit" class="btn btn-success">
                </div>
            </div>
    </div>
    </form>
    <?php
    if (isset($_GET["error"])) {
        $abc = $_GET["error"];
        if ($abc == "none") {
            echo "<p style='text-align:center; color:green;font-size=14px;'>Sucessfully Inserted!</p>";
        } else if ($abc == "prestatefailed") {
            echo "<p style='text-align:center;color:red;font-size=14px;'>Something went wrong.</p>";
        } else if ($abc == "executefailed") {
            echo "<p style='text-align:center;color:red;font-size=14px;'>Execute Failed.</p>";
        }
    }
    ?>

</div>
</div>

<?php

include_once 'footer.php';

?>