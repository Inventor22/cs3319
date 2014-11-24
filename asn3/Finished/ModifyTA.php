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
    <h1>Modifying TA:</h1>
    <ol>
        <?php
        $from_tauserid      = $_POST["userid"];
        $from_firstname     = $_POST["firstname"];
        $from_lastname      = $_POST["lastname"];
        $from_studentnumber = $_POST["studentnumber"];
        
        $to_firstname = $_POST["newfirstname"];
        $to_lastname  = $_POST["newlastname"]; 
        
        $changeTA = 'UDPATE TEACHINGASSISTANT '.
                    'set firstname="'.$to_firstname.'", lastname="'.$to_lastname.'" '
                    'where userid="'.$from_tauserid.'"'.
                        'OR (firstname="'.$from_firstname.'" AND lastname="'.$from_lastname.'") '
                        'OR studentnumber="'.$from_studentnumber.'"';
        $addTA = false;

        if (mysqli_query($connection,$changeTA);) {
            echo "TA updated from TEACHINGASSISTANT table";
        } else {
            echo "TA not removed from TEACHINGASSISTANT table.";
            echo "double check input parameters"
        }
        
        $verify = 'select * from TEACHINGASSISTANT '.
                  'where userid="'.$from_tauserid.'"'.
                     'OR (firstname="'.$to_firstname.'" AND lastname="'.$to_lastname.'") '
                     'OR studentnumber="'.$from_studentnumber.'"';
        
        $result = mysqli_query($connection, $verify);
        if (!$result) {
            echo "ta not updated properly; unable to access TEACHINGASSISTANT database";
        } else {
            while ($row=mysqli_fetch_assoc($result)) {
                echo '<li>';
                echo $row["userid"];
                echo '<img src="' . $row["petpicture"] . '" height="60" width="60">';
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
                <td>Picture:</td>
                <td><?php $_POST["tauserid"]; ?></td>
            </tr>
        </table>
    </ol>
</body>
</html>
