<?php
    $query = "select * from prof";
    $result = mysqli_query($connection,$query);
    if(!result){
        die("databases query failed.");
    }
    while($row = mysqli_fetch_assoc($result)){
        echo '<input type="radio" name="profID" value="';
        echo $row["westernID"];
        echo '">' . $row["fname"] . " " . $row["lname"] . "<br>";
    }
    mysqli_free_result($result);
?>
