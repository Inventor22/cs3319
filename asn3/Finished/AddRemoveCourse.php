<!--
    Name:  Dustin Dobransky
    Date:  23/11/14
    ID:    250575030
    Aliad: ddobran

    File: AddRemoveCourse.php

    Description:  This file adds or removes a course from the COURSE database
-->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CS3319 Asn3 - Add/Remove Course</title>
</head>
<body>
    <?php
    include 'connectdb.php';
    
    $courseNumber = $_POST["coursenumber"];
    $courseName   = $_POST["coursename"];
    
    //echo $courseName;
    //echo $courseNumber;
    
    $checkIfCourseExists = "select * from COURSE
                                where coursenumber = '$courseNumber'";
    //AND   coursename   = '$courseName'";
    
    $result = mysqli_query($connection, $checkIfCourseExists);
    
    $courseExists = false;
    if ($result && mysqli_num_rows($result) > 0) {
        $courseExists = true;
    }
    
    if ($_POST['submit']==0) // add course
    {
        if (!$courseExists) {
            $addCourse = "INSERT INTO COURSE (coursenumber, coursename) VALUES('$courseNumber', '$courseName')";
            if (mysqli_query($connection, $addCourse)) {
                echo '<br>Successfully added course';
            } else {
                echo '<br>Unable to add course';
            }
        } else {
            echo '<br>Course already exists!';
        }
    }
    else if($_POST['submit']==1) // remove course
    {
        if ($courseExists) {
            $removeCourse = "DELETE FROM COURSE 
                                where coursenumber = '$courseNumber'";
                                //AND   coursename   = '$courseName'";
            
            if (!mysqli_query($connection, $removeCourse)) {
                echo '<br>Course successfully deleted!';
            } else {
                echo '<br>Removing course failed!';
            }
            
            if (mysqli_query($connection, $courseExists)) {
                echo '<br>Something whent wrong.  Course not removed.';
            } else {
                echo "Course $courseNumber successfully removed.";
            }
            
        } else {
            echo '<br>Coursed does not exist, cannot delete!';
        }
    }
    
    echo '<br>All registered courses:';
    
    $getAllCourses = 'SELECT * FROM COURSE';
    $allCourses = mysqli_query($connection, $getAllCourses);
    if ($allCourses) {
        echo '<table><tr><td>Course Number</td><td>Course Name</td></tr>';
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
