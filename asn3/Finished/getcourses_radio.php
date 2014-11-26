<!--
    Name:  Andrew Simpson
    Date:  23/11/14
    ID:    250 633 280
    Aliad: asimps53

    File: getcourses.php

    Description:
        This file lists out all of the courses in radio buttons.
        The value of each button is each courses' code.
-->

<?php
    $query = "select * from COURSE";
    $result = mysqli_query($connection,$query);
    if(!result){
        die("databases query failed.");
    }
    while($row = mysqli_fetch_assoc($result)){
        echo '<input type="radio" name="c_code" value="';
        echo $row["coursenumber"];
        echo '">' . $row["coursenumber"] . " - " . $row["coursename"] . "<br>";
    }
    mysqli_free_result($result);
?>
