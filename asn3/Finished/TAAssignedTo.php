<!--
    Name:  Dustin Dobransky
    Date:  23/11/14
    ID:    250575030
    Aliad: ddobran

    File: TAAssignedTo.php

    Description:
        This script assigs a TA to a particular course, and fills in
        course details for: year, term, and # of students
-->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CS3319 Asn3 - Assign TA to Course</title>
</head>
<body>
    <?php
    include 'connectdb.php';
    
    $courseNumber = $_POST["coursenumber"];
    $year         = (int)$_POST["year"];
    $numStudents  = (int)$_POST["numofstudents"];
    $term         = $_POST["term"];
    $tauserid     = $_POST["tauserid"];
    
    //echo $courseNumber.'<br>';
    //echo $year        .'<br>';
    //echo $numStudents .'<br>';
    //echo $term        .'<br>';
    //echo $tauserid    .'<br>';
    
    $intsNotValidRange = ($year < 1990)
                      || ($year > 2050)
                      || ($numStudents < 0)
                      || ($numStudents > 3000);
    
    if (!$intsNotValidRange) {
        
        $checkIfExists = "SELECT * FROM TAAssignedTO where
                    coursenumber = '$courseNumber' AND
                    year = $year AND
                    numofstudents= $numStudents AND
                    term = '$term' AND
                    tauserid = '$tauserid' ";
        
        $result = mysqli_query($connection, $checkIfExists);
        
        if ($_POST['submit']==0) // Add Course Info and assign TA
        {
            if ($result && mysqli_num_rows($result) > 0) {
                echo 'cannot add ta to course -- already exists';
            } else {
                $addCourseInfo = "INSERT INTO TAAssignedTO
                    (coursenumber, tauserid, year, term, numofstudents)
                    VALUES('$courseNumber', '$tauserid',
                            $year, '$term', $numStudents)";
                
                if (mysqli_query($connection, $addCourseInfo)) {
                    echo 'SUCCESS: Added course info and TA';
                } else {
                    echo 'FAILED: could not insert course info';   
                }
            }
        }
        else if($_POST['submit']==1) // Remove TA from Course
        {
            if ($result && mysqli_num_rows($result) > 0) {
                $removeCourse = "DELETE FROM TAAssignedTO
                                where tauserid     = '$tauserid'
                                AND   courseNumber = '$courseNumber'
                                AND   year         = $year
                                AND   term         = '$term'";
                
                $checkForCourse = "SELECT * FROM TAAssignedTO
                                where tauserid     = '$tauserid'
                                AND   courseNumber = '$courseNumber'
                                AND   year         = $year
                                AND   term         = '$term'";
                
                if (mysqli_query($connection, $removeCourse)) {
                    $exists = mysqli_query($connection,  $checkForCourse);
                    if ($exists && mysqli_num_rows($exists) > 0) {
                        echo '<br>Something went wrong.  Course not deleted.';
                    } else {
                        echo "<br>Course $courseNumber successfully deleted!";
                    }
                } else {
                    echo '<br>Removing course failed!';
                }
            } else {
                echo '<br>Course does not exist, cannot delete!';
            }
        }
        
        echo '<br><br>All registered courses and their TAs:';
        echo '<br>';
        
        $getAllCourses = 'SELECT * FROM TAAssignedTO';
        $allCourses = mysqli_query($connection, $getAllCourses);
        if ($allCourses) {
            while ($row = mysqli_fetch_assoc($allCourses)) {
                echo '<li>';
                echo 'Course Number: '.$row['coursenumber'].' tauserid: '.$row['tauserid']
                .' year: '.$row['year'].' term: '.$row['term']
                .' Number of Students: '.$row['numofstudents'];
            }
        }
    } else {
        echo '<br>Integer parameters out of range!';
    }
        
    mysqli_close($connection);
    ?>
</body>
</html>
