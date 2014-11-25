<?php
    $query = "select * from COURSE";
    $result = mysqli_query($connection,$query);
    if(!result){
        die("databases query failed.");
    }
    while($row = mysqli_fetch_assoc($result)){
        echo '<input type="radio" name="c_code" value="';
        echo $row["userid"];
        echo '">' . $row["coursenumber"] . " - " . $row["coursename"] . "<br>";
    }
    mysqli_free_result($result);
?>
