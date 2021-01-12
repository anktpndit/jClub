<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jClub</title>
    <?php
    if (isset($_SESSION["accid"])) {
        if ($_SESSION["acctype"] == "club") {
            echo "<link rel='stylesheet' type='text/css' href='css/c.css'>";
        } else {
            echo "<link rel='stylesheet' type='text/css' href='css/styles.css'>";
        }
    } else {
        echo "<link rel='stylesheet' type='text/css' href='css/styles.css'>";
    }
    ?>

    <link rel='icon' href="icon/favicon.ico">
    <!-- Fonts Link -->
    <link href="https://fonts.googleapis.com/css?family=Kelly+Slab|Titillium+Web&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Asap:700|Roboto&display=swap" rel="stylesheet">
    <!-- Bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Fonawesome -->
    <script src="https://kit.fontawesome.com/7594947089.js" crossorigin="anonymous"></script>

    <!-- Icon link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Javascript link -->
    <script type="javascript" src="./main.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <link rel="stylesheet" href="css/jquerybox.css">