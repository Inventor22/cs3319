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
    <h1>Adding new Prof:</h1>
    <?php
    $profuserid    = $_POST["userid"];
    $firstname     = $_POST["firstname"];
    $lastname      = $_POST["lastname"];
    
    //echo "user: ".$profuserid."<br>";
    //echo "fname: ".$firstname."<br>";
    //echo "lname: ".$lastname."<br>";
    
    if (strlen($profuserid) > 0 && strlen($firstname) > 0 && strlen($lastname) > 0)
    {
        $findProf = "select * from INSTRUCTOR where
        userid= '$profuserid'
        AND firstname='$firstname'
        AND lastname ='$lastname'";
        
        //echo $findProf.'<br>';
        
        $result = mysqli_query($connection, $findProf);
        
        $addProf = false;
        
        if (!$result) {
            echo "Prof table invalid!";
        } else {
            if (mysqli_num_rows($result) > 0) {
                echo "Prof already exists in INSTRUCTOR database.";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<li> ".$row['userid'].", ".$row['firstname'].", ".$row['lastname'].".";
                }
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
            echo "<br>New Prof added.<br>";
            echo "<table>
                    <tr>
                        <td>Prof userid:</td>
                        <td> $profuserid </td>
                    </tr>
                    <tr>
                        <td>First name:</td>
                        <td> $firstname </td>
                    </tr>
                    <tr>
                        <td>Last name:</td>
                        <td> $lastname </td>
                    </tr>
                </table>";
        }
        mysqli_close($connection);
        
        echo '<hr><br>List of Profs:<br>';
        include 'GetProfs.php';
    }
    else
    {
        echo '<br>Invalid parameters. Fields cannot be empty.';
    }

    
    ?>
</body>
</html>
