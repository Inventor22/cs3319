<!--
    Name:  Dustin Dobransky
    Date:  26/11/14
    ID:    250575030
    Aliad: ddobran

    File: GetCoSupervisors.php

    Description:  This file retrieves and displays all the TAs and their
                  CoSupervisors from the TEACHINGASSISTANT database,
                  formatted in a fancy table.
-->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CS3319 - Databases - get all TAs and their Supervisors</title>
</head>
<body>
    <?php
    include 'connectdb.php';
    ?>
    <h2>List of all CoSupervisors:</h2>
    <?php
    $query = 'select * from CoSUPERVISE';
    $result=mysqli_query($connection,$query);
    if (!$result) {
        die("database query failed.");
    }
    echo "<table id='display'>";
    echo "<tr>
            <td>Prof user id</td>
            <td>TA user id</td>
          </tr>";
    
    while ($row=mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["profuserid"] . "</td>";
        echo "<td>" . $row["tauserid"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
    
    mysqli_close($connection);
    ?>
</body>
</html>
