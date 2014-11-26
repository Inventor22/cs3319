<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CS3319 Asn3 - Add/Remove Course</title>
</head>
<body>
    <?php
    include 'connectdb.php';
    
    echo '<br>All registered courses:';
    
    $getAllCourses = 'SELECT * FROM COURSE';
    $allCourses = mysqli_query($connection, $getAllCourses);
    if ($allCourses) {
        echo '<table><tr><td>Course Number   </td><td>Course Name</td></tr>';
        while ($row = mysqli_fetch_assoc($allCourses)) {
            echo '<tr>';
            echo '<td>'.$row['coursenumber'].'</td><td>'.$row['coursename'].'</td>';
            echo '</tr>';
        }
        echo '</table>';
    }
    
    mysqli_close($connection);
    ?>
</body>
</html>
