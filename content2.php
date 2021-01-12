<section id="yourClubLandingPage">
    <div class="right">
        <div id="moderators_name">
            <h2>Moderators</h2>
            <ul class="dot">
                <li>Name of Moderator 1</li>
                <li>Name of Moderator 2</li>
                <li>Name of Moderator 3</li>
            </ul>
        </div>
        <div id="members_name">
            <h2>Members</h2>
            <ul class="dot">
                <?php
                require_once 'includes/mem-in.php';
                ?>
            </ul>
        </div>
    </div>
    <div class="left">
        <div class="intro">
            <h4>Your Club Space</h4>
            <!-- changes for each club after this -->
            <?php

            require_once 'includes/clubinfo-in.php';

            echo "<h1>" . $clubinfo["club_name"] . "</h1>";
            echo "Contact: " . $clubinfo["club_contact"] . "<br>";

            if ($clubinfo['sports'] == 1) {
                echo "Club Category: Sports";
            } else if ($clubinfo['other_clubs'] == 1) {
                echo "Club Category: Others";
            } else if ($clubinfo['arts'] == 1) {
                echo "Club Category: Arts";
            } else if ($clubinfo['dance'] == 1) {
                echo "Club Category: Dance";
            } else if ($clubinfo['outreach_and_fellowship'] == 1) {
                echo "Club Category: Outreach and Fellowship";
            }
            $_SESSION['clubid'] = $clubinfo['club_id'];
            ?>
        </div>
        <div class="clubDescription">
            <h4>Club Description</h4>
            <button class="edit-btn" name="button">Edit</button>
            <?php
            echo $clubinfo['club_description'];
            ?>
        </div>
        <div class="activities">
            <h4>Activities</h4>
            <ul class="dot">
                <?php
                require_once 'includes/actvinfo-in.php';

                ?>
            </ul>
            <a href="activity.php">Add Activities</a>
        </div>
    </div>
</section>
