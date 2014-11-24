<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CS3319 Asn3 - Add/Remove Course</title>
</head>
<body>
    <?php
        include 'connectdb.php';
    ?>
    <ol>
        <?php
        $courseNumber = $_POST["coursenumber"];
        $year         = $_POST["year"];
        $numStudents  = $_POST["numofstudents"];
        $term         = $_POST["term"];
        $tauserid     = $_POST["tauserid"];
        
        if ($_POST['submit']==0) // Add Course Info and assign TA
        {
            if (!$courseExists) {
                $addCourse = 'INSERT INTO COURSE (coursenumber, coursename) VALUES("'.$courseNumber.'", "'.$courseName.'")';
            } else {
                echo 'Course already exists!';
            }
        }
        else if($_POST['submit']==1) // Remove TA from Course
        {
            if ($courseExists) {
                $removeCourse = 'DELETE FROM COURSE '.
                                    'where coursenumber="'$courseNumber.'" '
                                    .'AND coursename="'.$courseName.'"';
                
                if (mysqli_query($connection, $removeCourse)) {
                    echo 'Course successfully deleted!';
                } else {
                    echo 'Removing course failed!';
                }
            } else {
                echo 'Coursed does not exist, cannot delete!';
            }
        }
        
        echo 'All registered courses:';
        
        $getAllCourses = 'SELECT * FROM COURSE';
        $allCourses = mysqli_query($connection, $getAllCourses);
        if ($allCourses) {
            while ($row = mysqli_fetch_assoc($allCourses)) {
                echo '<li>';
                echo 'Course name: '.$row['coursename'].' Course Number: '.$row['coursenumber'];
            }
        }
        
        mysqli_close($connection);
        ?>
    </ol>
</body>
</html>
