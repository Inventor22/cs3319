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
    <ol>
        <?php
        $profuserid      = $_POST["userid"];
        $firstname     = $_POST["firstname"];
        $lastname      = $_POST["lastname"];
        
        $addProf = false;
        
        $findProf = 'select * from INSTRUCTOR where '.
            '        userid="'. $profuserid .'"'. 
            ' AND firstname="'.$firstname.'"'.
            ' AND lastname ="'.$lastname.'"';
        
        if (!mysqli_query($connection, $findProf) {
            echo "TA table invalid!";
        } else {
            if ($row=mysqli_fetch_assoc($result)) {
                echo "Prof already exists in INSTRUCTOR database.";
            } else {
                $addTA = true;
            }
        }
        
        if ($addTA) {
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
    </ol>
</body>
</html>
