<!--
    Name:  Dustin Dobransky
    Date:  23/11/14
    ID:    250575030
    Aliad: ddobran

    File: DeleteTA.php

    Description:  This file deletes a TA from the TEACHINGASSISTANT database
-->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CS3319 Asn3 - Delete TA</title>
</head>
<body>
    <?php
    include 'connectdb.php';
    ?>
    <h1>Deleting TA</h1>
    <?php
    $tauserid      = $_POST["userid"];
    $firstname     = $_POST["firstname"];
    $lastname      = $_POST["lastname"];
    $studentnumber = $_POST["studentnumber"];
    
    echo 'Deleting TA: '.$tauserid.' from TEACHINGASSISTANT';
    echo '<br>';

    $findTA0 = "delete from TEACHINGASSISTANT where".
    " userid='". $tauserid .'"'. 
    " OR (firstname='".$firstname."' AND lastname ='".$lastname."')".
    " OR studentnumber='".$studentnumber."'";

    $result = mysqli_query($connection,$findTA0);
    if ($result) {
        echo "TA removed from TEACHINGASSISTANT table";
    } else {
        echo "TA not removed from TEACHINGASSISTANT table.";
        echo '<br>';
        echo "Double check input parameters";
        echo '<br>';     
        echo mysqli_error($connection);
    }
    
    include 'getTAs.php';

    if ($connection) {   
        mysqli_close($connection);
    }
    ?>
</body>
</html>
