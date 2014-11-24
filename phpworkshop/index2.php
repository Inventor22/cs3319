<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dr. Western's Vet Clinic</title>
</head>
<body>
<?php
include 'connectdb.php';
?>
<h1>Welcome to the Western Vet Clinic</h1>
<h2>Our Customers</h2>
<form action="getpets.php" method="post">
<?php
   include 'getdata.php';
?>
<input type="submit" value="Get Pet Names">
</form>
<p>
<hr>
<p>
<h2>ADD A NEW PET:</h2>
<form action="addnewpet.php" method="post" enctype="multipart/form-data">
New Pet's Name: <input type="text" name="petname"><br>
New Pet's Species: <br>
<input type="radio" name="species" value="dog">Dog<br>
<input type="radio" name="species" value="cat">Cat<br>
<input type="radio" name="species" value="bird">Bird<br>
<input type="file" name="file" id="file"><br>
For which customer: <br>
<?php
include 'getdata.php';
?>
<input type="submit" value="Add New Pet">
</form>
<?php
mysqli_close($connection);
?>
</body>
</html>
