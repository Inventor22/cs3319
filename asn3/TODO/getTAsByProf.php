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
	<h1>TA's Supervised by Professor </h1>
	<h2>TA's that professor head supervises:</h2>
	<ol>
		<?php
			$wID= $_POST["profID"];
			// Do head superviser seach:
			$query = 'select * from TEACHINGASSISTANT where profuserid="' . $wID . '"';
			$result=mysqli_query($connection,$query);
			if(!$result){
				die("databases query failed.");
				echo "Query error: 	" . mysqli_error($connection);
			}
			$count=0;
			while($row=mysqli_fetch_assoc($result)){
				$count++;
				echo '<li>';
				echo $row["firstname"] . " " . $row["lastname"] . " " . $row["userid"] . " " . $row["gradtype"] . "<br>";
				// TODO: Show image.
			}
			mysqli_free_result($result);
			if ($count == 0){
				echo 'None';
			}
		?>
	</ol>
	<h2>TA's that professor co-supervises:</h2>
	<ol>
		<?php
			// Do co-supervisor seach:
			$query = 'select * from CoSUPERVISE where profuserid="' . $wID . '"';
			$result=mysqli_query($connection,$query);
			if(!$result){
				die("databases query failed.");
				echo "Query error: 	" . mysqli_error($connection);
			}
			$count=0;
			while($row=mysqli_fetch_assoc($result)){
				$count++;
				// Do sub-query for the specific TA
				$query2='select * from TEACHINGASSISTANT where westernID="' . $row["tauserid"] . '"';
				$result2=mysqli_query($connection,$query2);
				if(!$result2){
					die("databases query failed.");
					echo "Query error: 	" . mysqli_error($connection);
				}
				if($row2=mysqli_fetch_assoc($result2)){
					echo '<li>';
					echo $row2["firstname"] . " " . $row2["lastname"] . " " . $row2["userid"] . " " . $row2["gradtype"] . "<br>";
					// TODO: Show image.
				}
			}
			if ($count == 0){
				echo 'None';
			}
		?>
	</ol>
	<?php
    	mysqli_close($connection);
  	?>
</body>
</html>