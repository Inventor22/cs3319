<!--
    Name:  Dustin Dobransky
    Date:  23/11/14
    ID:    250575030
    Aliad: ddobran

    File: DeleteProfessor.php

    Description:  This file deletes a Professor from the Instructor database
-->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CS3319 Asn3 - Delete Professor</title>
</head>
<body>
    <?php
    include 'connectdb.php';
    ?>
    <h1>Deleting Professor</h1>
    <?php
    $profuserid = $_POST["userid"];
    $firstname  = $_POST["firstname"];
    $lastname   = $_POST["lastname"];
    
    $findTA = 'select * from INSTRUCTOR where'
        .' userid="'. $profuserid .'"'
        .' OR (firstname="'.$firstname.'" AND lastname ="'.$lastname.'")';
    
    $deleteTA = 'delete from INSTRUCTOR where'
        .' userid="'. $profuserid .'"'
        .' OR (firstname="'.$firstname.'" AND lastname ="'.$lastname.'")';
    
    $found = mysqli_query($connection,$findTA);
    
    if ($found && mysqli_num_rows($found) > 0)
    {
        if (mysqli_query($connection, $deleteTA)) {
            echo '<br>Prof. ' . $firstname . ' ' . $lastname . ' removed.';
        } else {
            echo '<br>Unable to delete Prof. ' . $firstname . ' ' . $lastname;
        }
    } else {
        echo "Prof not removed.<br>";
        echo "Double check input parameters";
    }
    
    mysqli_close($connection);
    
    include 'GetProfs.php';
    
    ?>
</body>
</html>
