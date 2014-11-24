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
    <h1>Deleting TA:</h1>
    <ol>
        <?php
        $profuserid = $_POST["userid"];
        $firstname  = $_POST["firstname"];
        $lastname   = $_POST["lastname"];
        
        $findTA0 = 'delete from INSTRUCTOR where'.
            ' userid="'. $profuserid .'"'. 
            ' OR (firstname="'.$firstname.'" AND lastname ="'.$lastname.'")';
        
        if (mysqli_query($connection,$findTA0)) {
            echo 'Prof. ' . $firstname . ' ' . $lastname . ' removed from TEACHINGASSISTANT table';
        } else {
            echo "Prof not removed from TEACHINGASSISTANT table.";
            echo "double check input parameters"
        }
        
        mysqli_close($connection);
        ?>
    </ol>
</body>
</html>
