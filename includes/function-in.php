<?php

function invaliduserid($username)
{
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidemail($email)
{
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function passmatch($pass, $passRe)
{
    $result;
    if ($pass != $passRe) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

//checking if username exists in database or not
function uidex($conn, $username, $email)
{
    $sql  = "SELECT * FROM ACCOUNTS WHERE account_Username = ? OR account_email = ?;";
    $prestate = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($prestate, $sql)) {
        header("location: ../signlog.php?error=prestatefailed");
        exit();
    }

    mysqli_stmt_bind_param($prestate, "ss", $username, $email);
    mysqli_stmt_execute($prestate);


    $resultdata = mysqli_stmt_get_result($prestate);

    if ($row = mysqli_fetch_assoc($resultdata)) {
        mysqli_stmt_close($prestate);
        return $row;
    } else {
        mysqli_stmt_close($prestate);
        $result = false;
        return $result;
    }
}

//inserting data into database for user/student
function insertuser($conn, $name, $email, $username, $pass, $major, $accountdes, $dateofbirth)
{
    $sql1  = "INSERT INTO ACCOUNTS(account_Username, account_Password, account_Type, account_des, account_email) VALUES (?,?,?,?,?);";
    $sql2 = "INSERT INTO STUDENT(student_name, student_DOB, student_major, student_contact) VALUES(?,?,?,?);";
    $prestate1 = mysqli_stmt_init($conn);
    $prestate2 = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($prestate1, $sql1)) {
        header("location: ../signlog.php?error=prestatefailed");
        exit();
    }

    $hashing = password_hash($pass, PASSWORD_DEFAULT);

    if (!mysqli_stmt_prepare($prestate2, $sql2)) {
        header("location: ../signlog.php?error=prestatefailed");
        exit();
    }

    $user = "user";
    //prepared statement 1 
    //inserting into ACCOUNTS table
    mysqli_stmt_bind_param($prestate1, "sssss", $username, $hashing, $user, $accountdes, $email);
    mysqli_stmt_execute($prestate1);
    $accid = mysqli_insert_id($conn);
    mysqli_stmt_close($prestate1);
    //prepared statement 2
    //inserting into STUDENT table
    mysqli_stmt_bind_param($prestate2, "ssss", $name, $dateofbirth, $major, $email);
    mysqli_stmt_execute($prestate2);
    $studid = mysqli_insert_id($conn);
    mysqli_stmt_close($prestate2);

    //inserting into MANAGES table
    //prepared statement 3
    $sql3 = "INSERT INTO MANAGES(account_id, student_id) VALUES(?,?);";
    $prestate3 = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($prestate3, $sql3)) {
        header("location: ../signlog.php?error=prestatefailed");
        exit();
    }
    mysqli_stmt_bind_param($prestate3, "ii", $accid, $studid);
    mysqli_stmt_execute($prestate3);
    mysqli_stmt_close($prestate3);

    //inserting into Permission table
    //prepared statement 4
    $sql4 = "INSERT INTO PERMISSION(permission_name) VALUES(?);";
    $prestate4 = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($prestate4, $sql4)) {
        header("location: ../signlog.php?error=prestatefailed1");
        exit();
    }
    mysqli_stmt_bind_param($prestate4, "s", $user);
    mysqli_stmt_execute($prestate4);
    $permid = mysqli_insert_id($conn);
    mysqli_stmt_close($prestate4);

    //inserting into Holds table
    //prepared statement 5
    $sql5 = "INSERT INTO HOLDS(account_id, permission_id) VALUES(?,?);";
    $prestate5 = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($prestate5, $sql5)) {
        header("location: ../signlog.php?error=prestatefailed2");
        exit();
    }
    mysqli_stmt_bind_param($prestate5, "ii", $accid, $permid);
    mysqli_stmt_execute($prestate5);
    mysqli_stmt_close($prestate5);



    header("location: ../signlog.php?error=none");
    exit();
}

//inserting data for our clubs 
function insertclub($conn, $clubname, $email, $username, $pass, $accountdes, $dateofbirth, $type)
{
    $sql1  = "INSERT INTO ACCOUNTS(account_Username, account_Password, account_Type, account_des, account_email) VALUES (?,?,?,?,?);";
    $sql2 = "INSERT INTO CLUB(club_name, club_description, club_contact, club_begin , club_rating, sports, other_clubs, arts, dance, outreach_and_fellowship) VALUES(?,?,?,?,?,?,?,?,?,?);";
    $prestate1 = mysqli_stmt_init($conn);
    $prestate2 = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($prestate1, $sql1)) {
        header("location: ../createclub.php?error=prestatefailed");
        exit();
    }

    $hashing = password_hash($pass, PASSWORD_DEFAULT);

    if (!mysqli_stmt_prepare($prestate2, $sql2)) {
        header("location: ../createclub.php?error=prestatefailed");
        exit();
    }

    $user = "club";
    //prepared statement 1 
    //inserting into ACCOUNTS table
    mysqli_stmt_bind_param($prestate1, "sssss", $username, $hashing, $user, $accountdes, $email);
    mysqli_stmt_execute($prestate1);
    $accid = mysqli_insert_id($conn);
    mysqli_stmt_close($prestate1);
    //prepared statement 2
    //inserting into CLUB table
    $rating = NULL;
    if ($type == '1') {
        $sport = 1;
        $other = 0;
        $art = 0;
        $dance = 0;
        $outreach = 0;
        mysqli_stmt_bind_param($prestate2, "sssssdiiii", $clubname, $accountdes, $email, $dateofbirth, $rating, $sport, $other, $art, $dance, $outreach);
    } else if ($type == '2') {
        $sport = 0;
        $other = 0;
        $art = 0;
        $dance = 1;
        $outreach = 0;
        mysqli_stmt_bind_param($prestate2, "sssssdiiii", $clubname, $accountdes, $email, $dateofbirth, $rating, $sport, $other, $art, $dance, $outreach);
    } else if ($type == '3') {
        $sport = 0;
        $other = 0;
        $art = 1;
        $dance = 0;
        $outreach = 0;
        mysqli_stmt_bind_param($prestate2, "sssssdiiii", $clubname, $accountdes, $email, $dateofbirth, $rating, $sport, $other, $art, $dance, $outreach);
    } else if ($type == '4') {
        $sport = 0;
        $other = 0;
        $art = 0;
        $dance = 0;
        $outreach = 1;
        mysqli_stmt_bind_param($prestate2, "sssssdiiii", $clubname, $accountdes, $email, $dateofbirth, $rating, $sport, $other, $art, $dance, $outreach);
    } else if ($type == '5') {
        $sport = 0;
        $other = 1;
        $art = 0;
        $dance = 0;
        $outreach = 0;
        mysqli_stmt_bind_param($prestate2, "sssssdiiii", $clubname, $accountdes, $email, $dateofbirth, $rating, $sport, $other, $art, $dance, $outreach);
    }
    mysqli_stmt_execute($prestate2);
    $clubid = mysqli_insert_id($conn);
    mysqli_stmt_close($prestate2);

    //inserting into MANAGES table
    //prepared statement 3
    $sql3 = "INSERT INTO MANAGES(account_id, club_id) VALUES(?,?);";
    $prestate3 = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($prestate3, $sql3)) {
        header("location: ../createclub.php?error=prestatefailed");
        exit();
    }
    mysqli_stmt_bind_param($prestate3, "ii", $accid, $clubid);
    mysqli_stmt_execute($prestate3);
    mysqli_stmt_close($prestate3);

    //inserting into Permission table
    //prepared statement 4
    $sql4 = "INSERT INTO PERMISSION(permission_name) VALUES(?);";
    $prestate4 = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($prestate4, $sql4)) {
        header("location: ../createclub.php?error=prestatefailed");
        exit();
    }
    $user = "mod";
    mysqli_stmt_bind_param($prestate4, "s", $user);
    mysqli_stmt_execute($prestate4);
    $permid = mysqli_insert_id($conn);
    mysqli_stmt_close($prestate4);

    //inserting into Holds table
    //prepared statement 5
    $sql5 = "INSERT INTO HOLDS(account_id, permission_id) VALUES(?,?);";
    $prestate5 = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($prestate5, $sql5)) {
        header("location: ../createclub.php?error=prestatefailed");
        exit();
    }
    mysqli_stmt_bind_param($prestate5, "ii", $accid, $permid);
    mysqli_stmt_execute($prestate5);
    mysqli_stmt_close($prestate5);



    header("location: ../signlog.php?error=none");
    exit();
}

function login($conn, $username, $pass)
{
    $uidex = uidex($conn, $username, $username);


    if ($uidex == false) {
        header("location: ../signlog.php?error=wronguserorpass");
        exit();
    }

    $hashedPass = $uidex['account_Password'];

    if ($pass === $hashedPass) {
        session_start();
        $_SESSION["accid"] = $uidex['account_id'];
        $_SESSION["accusername"] = $uidex['account_Username'];
        $_SESSION["acctype"] = $uidex['account_Type'];
        header("location: ../index.php");
        exit();
    }

    $checkpass = password_verify($pass, $hashedPass);

    if ($checkpass === false) {
        header("location: ../signlog.php?error=wronguserorpass");
        exit();
    } else if ($checkpass === true) {
        session_start();
        $_SESSION["accid"] = $uidex['account_id'];
        $_SESSION["accusername"] = $uidex['account_Username'];
        $_SESSION["acctype"] = $uidex['account_Type'];
        header("location: ../index.php");
        exit();
    }
}

function getclubinfo($conn, $accid)
{
    $sql  = "SELECT club_id FROM MANAGES WHERE account_id=?;";
    $prestate = mysqli_stmt_init($conn);

    mysqli_stmt_prepare($prestate, $sql);

    mysqli_stmt_bind_param($prestate, "i", $accid);
    mysqli_stmt_execute($prestate);


    $result = mysqli_stmt_get_result($prestate);

    $info = mysqli_fetch_assoc($result);
    mysqli_stmt_close($prestate);
    $club_id = $info['club_id'];

    //query for finding the club info using clubid

    $sql2  = "SELECT * FROM CLUB WHERE club_id=?;";
    $prestate2 = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($prestate2, $sql2);

    mysqli_stmt_bind_param($prestate2, "i", $club_id);
    mysqli_stmt_execute($prestate2);

    $resultdata = mysqli_stmt_get_result($prestate2);
    $info2 = mysqli_fetch_assoc($resultdata);
    mysqli_stmt_close($prestate2);
    return $info2;
}

function getactinfo1($conn, $clid)
{
    $sql  = "SELECT activity_id FROM ORGANIZES WHERE club_id=?;";
    $prestate = mysqli_stmt_init($conn);

    mysqli_stmt_prepare($prestate, $sql);

    mysqli_stmt_bind_param($prestate, "i", $clid);
    mysqli_stmt_execute($prestate);

    $result = mysqli_stmt_get_result($prestate);
    mysqli_stmt_close($prestate);
    
    return $result;
}

function insactor($conn, $actname, $actloc, $acttype, $actdes, $acttime, $actdays, $mand, $opt, $clubid)
{
    //inserting into activities table 
    $sql1  = "INSERT INTO ACTIVITY(activity_name, activity_location, activity_desc, activity_type, activity_day, activity_time ,optional_activity, mandatory_activity) VALUES(?,?,?,?,?,?,?,?);";

    $prestate1 = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($prestate1, $sql1)) {
        header("location: ../activity.php?error=prestatefailed");
        exit();
    }

    //inserting into ACTIVITY table
    mysqli_stmt_bind_param($prestate1, "ssssssii", $actname, $actloc, $actdes, $acttype, $actdays, $acttime, $opt, $mand);
    mysqli_stmt_execute($prestate1);
    $actid = mysqli_insert_id($conn);
    mysqli_stmt_close($prestate1);



    //inserting into organizes table 
    $sql = "INSERT INTO ORGANIZES(club_id, activity_id) VALUES(?,?);";
    $prestate = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($prestate, $sql)) {
        header("location: ../activity.php?error=prestatefailed");
        exit();
    }
    echo $actid;

    mysqli_stmt_bind_param($prestate, "ii", $clubid, $actid);
    if (!mysqli_stmt_execute($prestate)) {
        header("location: ../activity.php?error=executefailed");
        exit();
    }
    mysqli_stmt_close($prestate);

    header("location: ../index.php?error=none");
    exit();
}


function getclubs($conn)
{
    $sql2  = "SELECT club_id, club_name FROM CLUB";
    $prestate2 = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($prestate2, $sql2);
    mysqli_stmt_execute($prestate2);

    $resultdata = mysqli_stmt_get_result($prestate2);
    mysqli_stmt_close($prestate2);
    return $resultdata;
}

function insertreg($conn, $accid)
{
    $sql  = "SELECT * FROM MANAGES WHERE account_id=?;";
    $prestate = mysqli_stmt_init($conn);

    mysqli_stmt_prepare($prestate, $sql);

    mysqli_stmt_bind_param($prestate, "i", $accid);
    if (!mysqli_stmt_execute($prestate)) {
        header("location: ../register.php?error=exec1&");
        exit();
    }


    $result = mysqli_stmt_get_result($prestate);

    $info = mysqli_fetch_assoc($result);
    $student_id = $info['student_id'];
    mysqli_stmt_close($prestate);

    return $student_id;
}


//function to find student_id of a club
function getmeminfo($conn, $cid) {
    $sql  = "SELECT * FROM HAS WHERE club_id=?;";
    $prestate = mysqli_stmt_init($conn);

    mysqli_stmt_prepare($prestate, $sql);

    mysqli_stmt_bind_param($prestate, "i", $cid);
    if (!mysqli_stmt_execute($prestate)) {
        header("location: ../index.php?error=execfail");
        exit();
    }


    $result = mysqli_stmt_get_result($prestate);
    mysqli_stmt_close($prestate);

    return $result;
}

function getreginfo($conn, $sid) {
    $sql  = "SELECT club_id FROM REGISTER WHERE student_id=?;";
    $prestate = mysqli_stmt_init($conn);

    mysqli_stmt_prepare($prestate, $sql);

    mysqli_stmt_bind_param($prestate, "i", $sid);
    if (!mysqli_stmt_execute($prestate)) {
        header("location: ../searchstudents.php?error=execfail");
        exit();
    }

    $result = mysqli_stmt_get_result($prestate);
    mysqli_stmt_close($prestate);

    return $result;
}
