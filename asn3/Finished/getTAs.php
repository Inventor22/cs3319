<!--
    Name:  Dustin Dobransky
    Date:  23/11/14
    ID:    250575030
    Aliad: ddobran

    File: DeleteTA.php

    Description:  This file retrieves and displays all the TAs from the
                  TEACHINGASSISTANT database, formatted in a table
-->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CS3319 - Databases - get all TAs</title>
</head>
<body>
    <?php
    include 'connectdb.php';
    ?>
    <h1>Here are all the TAs:</h1>
    <?php
    $query = 'select * from TEACHINGASSISTANT';
    $result=mysqli_query($connection,$query);
    if (!$result) {
        die("database query failed.");
    }
    echo "<table id='display'>";
    echo "<tr>
                <td>Picture</td>
                <td>User ID</td>
                <td>First name</td>
                <td>Last name</td>
                <td>Student number</td>
                <td>Grad type</td>
                <td>Head prof</td>
             </tr>";
    
    while ($row=mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo '<td>';
        if ($rows['imagelocation'] != NULL) {
            echo '<img src="' . $rows['imagelocation'] . '"height="150px" width="120px"></td>';
        } else {
            echo '</td>';
        }
        echo "<td>" . $row["userid"] . "</td>";
        echo "<td>" . $row["firstname"] . "</td>";
        echo "<td>" . $row["lastname"] . "</td>";
        echo "<td>" . $row["studentnumber"] . "</td>";
        echo "<td>" . $row["gradtype"] . "</td>";
        echo "<td>" . $row["profuserid"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
    
    mysqli_close($connection);
    ?>
</body>
</html>
