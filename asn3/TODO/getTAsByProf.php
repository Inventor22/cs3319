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
			// Do head superviser seach:
			$query = 'select * from ta where superID="' . $wID . '"';
			$result=mysqli_query($connection,$query);
			if(!$result){
				die("databases query failed.");
				echo "Query error: 	" . mysqli_error($connection);
			}
			echo "TA's that professor " . $fname . " " . $lname . " head supervises:<br>";
			$count=0;
			while($row=mysqli_fetch_assoc($result)){
				$count++;
				echo '<li>';
				echo $row["fname"] . " " . $row["lname"] . " " . $row["westernID"] . " " . $row["type"] . "<br>";
				// TODO: Show image.
			}
			mysqli_free_result($result);
			$query = 'select * from ...';
			if ($count == 0){
				echo 'None';
			}
			echo '<br>';
			// Do co-supervisor seach:
			$query = 'select * from cosupervises where superID="' . $wID . '"';
			$result=mysqli_query($connection,$query);
			if(!$result){
				die("databases query failed.");
				echo "Query error: 	" . mysqli_error($connection);
			}
			echo "TA's that professor " . $fname . " " . $lname . " co-supervises:<br>";
			$count=0;
			while($row=mysqli_fetch_assoc($result)){
				$count++;
				echo '<li>';
				echo $row["fname"] . " " . $row["lname"] . " " . $row["westernID"] . " " . $row["type"] . "<br>";
				// TODO: Show image.
			}
			if ($count == 0){
				echo 'None';
			}
			echo '<br>';
		?>
	</ol>
	<?php
    	mysqli_close($connection);
  	?>
</body>
</html>