<?php
    $query = "select * from prof";
    $result = mysqli_query($connection,$query);
    if(!result){
        die("databases query failed.");
    }
    echo "Who are you looking up?</br>";
    while($row = mysqli_fetch_assoc($result)){
        echo '<input type="radio" name="profs" value="';
        echo $row["ownerid"];
        echo '">' . $row["fname"] . " " . $row["lname"] . "<br>";
    }
    mysqli_free_result($result);
?>
