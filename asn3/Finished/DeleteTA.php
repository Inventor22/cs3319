<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CS3319 Asn3 - Added TAs</title>
</head>
<body>
    <?php
    include 'upload_file.php';
    include 'connectdb.php';
    ?>
    <h1>Deleting TA:</h1>
    <ol>
        <?php
        $tauserid      = $_POST["userid"];
        $firstname     = $_POST["firstname"];
        $lastname      = $_POST["lastname"];
        $studentnumber = $_POST["studentnumber"];
        
        $addTA = false;
        
        $findTA0 = 'delete from TEACHINGASSISTANT where'.
            ' userid="'. $tauserid .'"'. 
            ' OR (firstname="'.$firstname.'" AND lastname ="'.$lastname.'")'.
            ' OR studentnumber="'.$studentnumber.'"';
        
        if (mysqli_query($connection,$findTA0)) {
            echo "TA removed from TEACHINGASSISTANT table";
        } else {
            echo "TA not removed from TEACHINGASSISTANT table.";
            echo "double check input parameters"
        }
        
        mysqli_close($connection);
        ?>
    </ol>
</body>
</html>
