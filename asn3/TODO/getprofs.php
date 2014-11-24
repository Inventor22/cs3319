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
