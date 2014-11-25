<!--
    Name:  Dustin Dobransky
    Date:  23/11/14
    ID:    250575030
    Aliad: ddobran

    File: ModifyTA.php

    Description:
        This file modified the first and last name of a TA.
-->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CS3319 Asn3 - Added TAs</title>
</head>
<body>
    <?php
    include 'connectdb.php';
    ?>
    <h1>Modifying TA:</h1>
    <?php
    $from_tauserid      = strlen($_POST["userid"]) > 0 ? mysqli_real_escape_string($connection, $_POST["userid"]) : NULL;
    $from_firstname     = strlen($_POST["firstname"]) > 0 ? mysqli_real_escape_string($connection, $_POST["firstname"]) : NULL;
    $from_lastname      = strlen($_POST["lastname"]) > 0 ? mysqli_real_escape_string($connection, $_POST["lastname"]) : NULL;
    $from_studentnumber = strlen($_POST["studentnumber"]) > 0 ? mysqli_real_escape_string($connection, $_POST["studentnumber"]) : NULL;
    
    $to_firstname = strlen($_POST["newfirstname"]) > 0 ? mysqli_real_escape_string($connection, $_POST["newfirstname"]) : NULL;
    $to_lastname  = strlen($_POST["newlastname"]) > 0 ? mysqli_real_escape_string($connection, $_POST["newlastname"]) : NULL;
    
    if (strlen($from_tauserid) > 0) {
        $changeTA = "update TEACHINGASSISTANT 
                    set lastname='".$to_lastname."', firstname='".$to_firstname."'"
                    ." where userid='".$from_tauserid."'";
    }
    else if (strlen($from_firstname) > 0 && strlen($from_lastname) > 0)
    {
        $changeTA = "update TEACHINGASSISTANT 
                    set lastname = '".$to_lastname."', firstname = '".$to_firstname."'"
                    ." where firstname = '".$from_firstname."' and lastname = '".$from_lastname."';";
    }
    else if (strlen($from_studentnumber) > 0)
    {   
        $changeTA = "UPDATE TEACHINGASSISTANT 
                    set lastname='$to_lastname', firstname='$to_firstname'
                    where studentnumber='$from_studentnumber'";
    } else {
        echo 'no valid fields; update aborted <br>';
    }
    
    if (mysqli_query($connection,$changeTA)) {
        echo "TA updated<br>";
    } else {
        echo "TA not updated";
        echo '<br>';
        echo "double check input parameters";
        echo mysqli_error($connection);
    }
    
    $verify = "select * from TEACHINGASSISTANT
                   where userid='$from_tauserid'
                     OR (firstname='$to_firstname' AND lastname='$to_lastname')
                     OR studentnumber='$from_studentnumber'";
    
    $result = mysqli_query($connection, $verify);
    if (!$result) {
        echo "ta not updated properly; unable to access TEACHINGASSISTANT database";
    } else {
        echo "From:<li> $from_firstname $from_lastname";
        while ($row=mysqli_fetch_assoc($result)) {
            echo 'To: <li>';
            echo $row["userid"].', '.$row['firstname'].', '.$row['lastname'];
        }
    }
    
    mysqli_close($connection);
    ?>
</body>
</html>
