<!--
    Name:  Andrew Simpson
    Date:  23/11/14
    ID:    250 633 280
    Aliad: asimps53

    File: getprofs_radio.php

    Description:
        This file lists out all of the profs in radio buttons.
        The value of each button is the profs' western id.
-->

<?php
    $query = "select * from INSTRUCTOR";
    $result = mysqli_query($connection,$query);
    if(!result){
        die("databases query failed.");
    }
    while($row = mysqli_fetch_assoc($result)){
        echo '<input type="radio" name="profID" value="';
        echo $row["userid"];
        echo '">' . $row["firstname"] . " " . $row["lastname"] . "<br>";
    }
    mysqli_free_result($result);
?>
