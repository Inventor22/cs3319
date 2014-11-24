<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dr. Western's Vet Clinic-Your Pets</title>
</head>
<body>
<?php
   include 'upload_file.php';
   include 'connectdb.php';
?>
<h1>Here are your pets:</h1>
<ol>
<?php
   $whichOwner= $_POST["petowners"];
   $petName = $_POST["petname"];
   $species =$_POST["species"];
   $query1= 'select max(petid) as maxid from pet';
   $result=mysqli_query($connection,$query1);
   if (!$result) {
          die("database max query failed.");
   }
   $row=mysqli_fetch_assoc($result);
   $newkey = intval($row["maxid"]) + 1;
   $petid = (string)$newkey;
   $query = 'insert into pet values("' . $petid . '","' . $petName . '","' . $species . '","' . $whichOwner . '","'.$petpic.'")';
   if (!mysqli_query($connection, $query)) {
        die("Error: insert failed" . mysqli_error($connection));
    }
   echo "Your pet was added!";
   mysqli_close($connection);
?>
</ol>
</body>
</html>
