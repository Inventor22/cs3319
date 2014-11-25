<!--
    Name:  Dustin Dobransky
    Date:  23/11/14
    ID:    250575030
    Aliad: ddobran

    File: AddProfessor.php

    Description:  This file adds a Professor the INSTRUCTOR database
-->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CS3319 Asn3 - Add a Prof</title>
</head>
<body>
    <?php
    include 'connectdb.php';
    ?>
    <h1>Added new Prof:</h1>
    <?php
    $profuserid      = $_POST["userid"];
    $firstname     = $_POST["firstname"];
    $lastname      = $_POST["lastname"];
    
    $findProf = 'select * from INSTRUCTOR where '.
        '        userid="'. $profuserid .'"'. 
        ' AND firstname="'.$firstname.'"'.
        ' AND lastname ="'.$lastname.'"';
    
    $result = mysqli_query($connection, $findProf);
    
    if (!$result) {
        echo "TA table invalid!";
    } else {
        if ($row=mysqli_fetch_assoc($result) && $row==NULL) {
            echo "Prof already exists in INSTRUCTOR database.";
        } else {
            $addProf = true;
        }
    }
    
    if ($addProf) {
        $query = 'insert into INSTRUCTOR values("'
            . $firstname . '","'
            . $lastname . '","' 
            . $profuserid . '")';
        
        if (!mysqli_query($connection, $query)) {
            die("Error: insert failed" . mysqli_error($connection));
        }
        echo "New Prof added:";
    }
    mysqli_close($connection);
    ?>
    <table>
        <tr>
            <td>Prof userid:</td>
            <td><?php $_POST["userid"]; ?></td>
        </tr>
        <tr>
            <td>First name:</td>
            <td>
                <?php $_POST["firstname"]; ?></td>
        </tr>
        <tr>
            <td>Last name:</td>
            <td>
                <?php $_POST["lastname"]; ?></td>
        </tr>
    </table>
</body>
</html>
