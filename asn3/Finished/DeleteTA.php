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
    
    echo "Deleting TA: $tauserid";

    $findTA0 = "select * from TEACHINGASSISTANT where".
        " userid='". $tauserid ."'". 
        " OR (firstname='".$firstname."' AND lastname ='".$lastname."')".
        " OR studentnumber='".$studentnumber."'";

    $deleteTA = "delete from TEACHINGASSISTANT where".
        " userid='". $tauserid ."'". 
        " OR (firstname='".$firstname."' AND lastname ='".$lastname."')".
        " OR studentnumber='".$studentnumber."'";
    
    $found = mysqli_query($connection,$findTA0);
    
    if ($found && mysqli_num_rows($found) > 0)
    {
        $ta = mysqli_fetch_assoc($found);
        if (file_exists($ta['imagelocation']) && !in_array($ta['imagelocation'], 
            array("TA_Pictures/default0.jpg","TA_Pictures/default1.jpg","TA_Pictures/default2.jpg")))
        {
            unlink($ta['imagelocation']); // delete the image
        }
        $firstname = $ta['firstname'];
        $lastname  = $ta['lastname'];
        
        if (!mysqli_query($connection, $deleteTA)) {
            echo '<br>Unable to delete TA ' . $tauserid . ': ' . $firstname . ' ' . $lastname;
        } else {
            echo "<br>TA removed";
        }
    } else {
        echo "<br>TA not removed from TEACHINGASSISTANT table.";
        echo '<br>';
        echo "Double check input parameters";
        echo '<br>';     
        echo mysqli_error($connection);
    }
    
    include 'getTAs2.php';
    ?>
</body>
</html>
