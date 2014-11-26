<!--
    Name:  Andrew Simpson
    Date:  23/11/14
    ID:    250 633 280
    Aliad: asimps53

    File: gettas_radio.php

    Description:
        This file lists out all of the TAs in radio buttons.
        The value of each button is the TAs' western ids.
-->

<?php
    $query = "select * from TEACHINGASSISTANT";
    $result = mysqli_query($connection,$query);
    if(!result){
        die("databases query failed.");
    }
    while($row = mysqli_fetch_assoc($result)){
        echo '<input type="radio" name="taID" value="';
        echo $row["userid"];
        echo '">' . $row["firstname"] . " " . $row["lastname"] . "<br>";
    }
    mysqli_free_result($result);
?>
