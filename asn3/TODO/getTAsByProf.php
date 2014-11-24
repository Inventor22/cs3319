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
			$wID= $_POST["profID"];
			$query = 'select * from ta where superID="' . $wID . '"';
			$result=mysqli_query($connection,$query);
			if(!$result){
				die("databases query failed.") .
				echo "Query error: 	" . mysqli_error($connection);
			}
			echo "TA's that professor " . $fname . " " . $lname . " head supervises:<br>";
			while($row=mysqli_fetch_assoc($result)){
				echo '<li>';
				echo $row["fname"] . " " . $row["lname"] . "<br>";
			}
			mysqli_free_result($result);
		?>
	</ol>
	<?php
    	mysqli_close($connection);
  	?>
</body>
</html>