<!--
    Name:  Dustin Dobransky
    Date:  23/11/14
    ID:    250575030
    Aliad: ddobran

    File: AddNewTA.php

    Description:  This file adds a TA to the TEACHINGASSISTANT database
-->

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
    <h1>Added new TA:</h1>
    <?php
    $tauserid      = $_POST["userid"];
    $firstname     = $_POST["firstname"];
    $lastname      = $_POST["lastname"];
    $studentnumber = $_POST["studentnumber"];
    $gradtype      = $_POST["type"];
    $headprofid    = $_POST["profuserid"];
    
    $addTA = false;
    
    $findTA0 = 'select * from TEACHINGASSISTANT where '.
        '        userid="'. $tauserid .'"'. 
        ' AND firstname="'.$firstname.'"'.
        ' AND lastname ="'.$lastname.'"';
    
    $result = mysqli_query($connection, $findTA0);
    
    if (!$result) {
        echo "TA table invalid!";
    } else {
        if (mysqli_num_rows($result)>0) {
            echo "TA already exists in TEACHINGASSISTANTS database.";
        } else {
            if (strlen($studentnumber) == 9) {
                $addTA = true;
            } else {
                echo 'Student number not valid.  Must be 9 characters.';
            }
        }
    }
    
    if ($addTA) {
        if ($TApic == NULL) {
            $TApic = 'TA_Pictures/default' . rand(0,2) . '.jpg';
        }
        
        $query = 'insert into TEACHINGASSISTANT
        (firstname, lastname, studentnumber, userid, gradtype, imagelocation, profuserid)
        values("'
            . $firstname . '","'
            . $lastname . '","' 
            . $studentnumber . '","' 
            . $tauserid . '","' 
            . $gradtype . '","' 
            . $TApic . '","' 
            . $headprofid . '")';
        
        //echo '<br>TA pic: '.$TApic.'<br>';
        
        if (!mysqli_query($connection, $query)) {
            die("Error: insert failed" . mysqli_error($connection));
        } else {
            echo "New TA added.";
            
            echo "<table>
                    <tr>
                        <td>Picture:</td>
                        <td><img src= '$TApic' height='150' width='120'>; ?></td>
                    </tr>
                    <tr>
                        <td>userid:</td>
                        <td><?php $_POST[\"userid\"] ?></td>
                    </tr>
                    <tr>
                        <td>firstname:</td>
                        <td><?php $_POST['firstname'] ?></td>
                    </tr>
                    <tr>
                        <td>lastname:</td>
                        <td><?php $_POST['lastname'] ?></td>
                    </tr>
                    <tr>
                        <td>studentnumber:</td>
                        <td><?php $_POST['studentnumber'] ?></td>
                    </tr>
                    <tr>
                        <td>gradtype:</td>
                        <td><?php $_POST['type'] ?></td>
                    </tr>
                    <tr>
                        <td>Head Prof:</td>
                        <td><?php $_POST['profuserid']  ?></td>
                    </tr>
                  </table>";
        }
    }
    mysqli_close($connection);
    
    include 'getTAs2.php';
    ?>
</body>
</html>
