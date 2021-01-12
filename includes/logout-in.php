<?php 

    //deleting session
    session_start(); //for deleting we must start session
    session_unset();
    session_destroy();

    header("location: ../index.php");
    exit();