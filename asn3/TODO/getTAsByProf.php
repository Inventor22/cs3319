<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>UWO Professor Portal - TA's by Prof</title>
</head>
<body>
	<?php
		include 'connectdb.php';
	?>
	<h1>TA's</h1>
	<ol>
		<?php
			$fname = $_POST["fname"];
			$lname = $_POST["lname"];
			// Get prof's westernID
			$query = "select westernID from prof where fname=" . $fname;
			$result = mysqli_query($connection,$query);
			if(!result){
				die("databases query failed.");
			}
			while()
			echo "TA's that professor " . $fname . " " . $lname . " head supervises:<br>";
			while($row = mysqli_fetch_assoc($result)){
				echo $row["fname"] . " " . $row["lname"] . "<br>";
			}
			mysqli_free_result($result);
		?>
	</ol>
</body>