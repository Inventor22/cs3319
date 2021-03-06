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
    
    // must match CS or c, then 4 digits starting with 1234, or 9.
    if (preg_match("/^CS([1-4]|[9])([0-9]{3})/i", $courseNumber) && strlen($courseName))
    {
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
                    echo '<br>Successfully added course<br>';
                } else {
                    echo '<br>Unable to add course.<br>';
                }
            } else {
                echo '<br>Course already exists!<br>';
            }
        }
        else if($_POST['submit']==1) // remove course
        {
            if ($courseExists) {
                $removeCourse = "DELETE FROM COURSE 
                                where coursenumber = '$courseNumber'";
                //AND   coursename   = '$courseName'";
                
                if (!mysqli_query($connection, $removeCourse)) {
                    echo '<br>Removing course failed!  May be linked to a TA.  Delete TA first.<br>';
                }
                else if (mysqli_query($connection, $courseExists)) {
                    echo '<br>Something went wrong.  Course not removed.<br>';
                } else {
                    echo "<br>Course $courseNumber successfully removed.<br>";
                }
            } else {
                echo '<br>Coursed does not exist, cannot delete!<br>';
            }
        }
    } else {
        echo '<br>Invalid course name or course number<br>';
    }
    mysqli_close($connection);
    
    include 'PrintAllCourses.php';
    ?>
</body>
</html>
