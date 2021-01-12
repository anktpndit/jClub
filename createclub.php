<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/clubcss.css">
    <title>CreateClub</title>
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/7594947089.js" crossorigin="anonymous"></script>
    <link href="https://kit-free.fontawesome.com/releases/latest/css/free-v4-shims.min.css" media="all" rel="stylesheet">
    <link href="https://kit-free.fontawesome.com/releases/latest/css/free-v4-font-face.min.css" media="all" rel="stylesheet">
    <script type="javascript" src="./particlesjs-config.json"></script>
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>

<body>
    <section id="container">
        <div id="particle-div"></div>
        <script>
            particlesJS.load('particle-div', 'particlesjs-config.json', function() {
                // console.log('particles-js config loaded');
            });
        </script>
        <div id="formid" class="form">
            <div id="welcomeMessage">
                <p class='welm'>Create Your Club</p>
            </div>
            <div class="socials">
                <a class="fb" href="#"><i class="fab fa-facebook-f fa-lg"></i></a>
                <a class="in" href="#"><i class="fab fa-instagram fa-lg"></i></a>
                <a class="tw" href="#"><i class="fab fa-twitter fa-lg"></i></a>
            </div>
            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "invalidcid") {
                    echo "<p class='error-msg' style='text-align:center; padding: 15px; color:red;font-size:12px;'>Invalid Club Username</p>";
                }
                if ($_GET["error"] == "invalidemail") {
                    echo "<p class='error-msg' style='text-align:center; padding: 15px; color:red;font-size:12px;'>Use a proper email.</p>";
                } else if ($_GET["error"] == "passmatch") {
                    echo "<p class='error-msg' style='text-align:center; padding: 15px; color:red;font-size:12px;'>Password doesn't match.</p>";
                } else if ($_GET["error"] == "usertaken") {
                    echo "<p class='error-msg' style='text-align:center; padding: 15px; color:red;font-size:12px;'>Username already exists!</p>";
                } else if ($_GET["error"] == "prestatefailed") {
                    echo "<p class='error-msg' style='text-align:center; padding: 15px; color:red;font-size:12px;'>Oops! Something is not right.</p>";
                }
            }
            ?>
            <form id="createClub" class="input-group" action="includes/signup-in.php" method="post">
                <input class="input-field" type="text" name="clubName" placeholder="Name of Your Club" required>
                <input class="input-field" type="email" name="clubemail" placeholder="Email Address" required>
                <input class="input-field" type="text" name="clubid" placeholder="Username" required>
                <input class="input-field" type="password" name="passw" placeholder="Password" required>
                <input class="input-field" type="password" name="repassw" placeholder="Repeat password" required>
                <input class="input-field" type="text" name="clubaccountdes" placeholder="Tell Us About Your Club!" required><br>
                <div class="dt">
                    <label class='dt' for="date">Date of Establishment:</label>
                    <input class="input-field1" type="date" id="dob" name="dob" required>
                </div>
                <div id=club_options>
                    <label for="club_categories" class="label_text">Category of Club: </label><br>
                    <select id="club_categories" class="input-field" name="opt" required>
                        <option value="1">Sports</option>
                        <option value="2">Dance</option>
                        <option value="3">Arts</option>
                        <option value="4">Outreach and Fellowship</option>
                        <option value="5">Other Clubs</option>
                    </select>
                </div>
                <input class="check-box" type="checkbox" name="rememberpass" required><span>I agree to terms and conditions.</span><br>
                <button class="submit-btn" type="submit" name="create">Create</button>
            </form>
        </div>
    </section>

    </script>

</body>

</html>