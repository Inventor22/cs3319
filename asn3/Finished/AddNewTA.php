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
    $tauserid      = $_POST["tauserid"];
    $firstname     = $_POST["firstname"];
    $lastname      = $_POST["lastname"];
    $studentnumber = $_POST["studentnumber"];
    $gradtype      = $_POST["gradtype"];
    $headprofid    = $_POST["profuserid"];
    $imagelocation = $_POST["imagelocation"];
    
    $addTA = false;
    
    $findTA0 = 'select * from TEACHINGASSISTANT where '.
        '        userid="'. $tauserid .'"'. 
        ' AND firstname="'.$firstname.'"'.
        ' AND lastname ="'.$lastname.'"';
    
    $result = mysqli_query($connection, $findTA0);
    
    if (!$result) {
        echo "TA table invalid!";
    } else {
        if ($row=mysqli_fetch_assoc($result)) {
            echo "TA already exists in TEACHINGASSISTANTS database.";
        } else {
            $addTA = true;
        }
    }
    
    if ($addTA) {
        $query = 'insert into TEACHINGASSISTANT values("'
            . $tauserid . '","' 
            . $firstname . '","'
            . $lastname . '","' 
            . $studentnumber . '","' 
            . $gradtype . '","' 
            . $imagelocation . '","' 
            . $headprofid . '")';
        
        if (!mysqli_query($connection, $query)) {
            die("Error: insert failed" . mysqli_error($connection));
        } else {
            echo "New TA added.";
        }
    }
    mysqli_close($connection);
    ?>
    <table>
        <tr>
            <td>userid:</td>
            <td><?php $_POST["userid"]; ?></td>
        </tr>
        <tr>
            <td>firstname:</td>
            <td>
                <?php $_POST["firstname"]; ?></td>
        </tr>
        <tr>
            <td>lastname:</td>
            <td>
                <?php $_POST["lastname"]; ?></td>
        </tr>
        <tr>
            <td>studentnumber:</td>
            <td><?php $_POST["studentnumber"]; ?></td>
        </tr>
        <tr>
            <td>gradtype:</td>
            <td>
                <?php $_POST["gradtype"]; ?></td>
        </tr>
        <tr>
            <td>Picture:</td>
            <td><?php echo '<img src="' . $row["imagelocation"] . '" height="150" width="120">'; ?></td>
        </tr>
        <tr>
            <td>Head Prof:</td>
            <td><?php $_POST["profuserid"]; ?></td>
        </tr>
    </table>

    <?php
    include 'getTAs.php';
    ?>
</body>
</html>
