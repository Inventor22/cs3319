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
    <ol>
        <?php
        $query = 'select * from TEACHINGASSISTANT';
        $result=mysqli_query($connection,$query);
        if (!$result) {
            die("database query failed.");
        }
        echo "<table id='display'>";
        echo "<tr>
                <td>User ID</td>
                <td>First name</td>
                <td>Last name</td>
                <td>Picture</td>
                <td>Student number</td>
                <td>Grad type</td>
                <td>Head prof user id</td>
             </tr>";
        
        while ($row=mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["userid"] . "</td>";
            echo "<td>" . $row["firstname"] . "</td>";
            echo "<td>" . $row["lastname"] . "</td>";
            echo '<td><img src="' . $rows[$product_image] . '"height="150px" width="120px"></td>';
            echo "<td>" . $row["studentnumber"] . "</td>";
            echo "<td>" . $row["gradtype"] . "</td>";
            echo "<td>" . $row["profuserid"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($result);
        ?>
    </ol>
    <?php
    mysqli_close($connection);
    ?>
</body>
</html>
