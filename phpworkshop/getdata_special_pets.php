<?php
$query = "SELECT o.fname, o.lname, p.petname FROM pet AS p, owner AS o WHERE p.ownerid = o.ownerid";
$result = mysqli_query($connection,$query);
echo $query . '<p>';
if(!result){
    die("databases query failed.");
}
echo "<ol>";
while($row = mysqli_fetch_assoc($result)){
    echo "<li>";
    echo $row["fname"] . " " . $row["lname"] . " " . $row["petname"] . "</li>";

    //$query2 = "select * from own as owner where own.ownerid = " . $row["ownerid"];
    //$result2 = mysqli_query($connection,$query2);
    //if(!result2){
    //     die("databases query failed.");
    //}
    //while($ownrow = mysqli_fetch_assoc($result2)){
    //    echo "<li>";
    //    echo $row["species"] . " " . $ownrow["fname"] . " " . $ownrow["lname"] . " " . $row["petname"] . "</li>";
    //}
}
echo "</ol>";
mysqli_free_result($result);
?>
