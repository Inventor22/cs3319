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
	<h1>TA's Assigned to Course</h1>
	
	<?php
		// Get course code, year, and term from the caller
		$c_code = $_POST["c_code"];
		$c_year = $_POST["c_year"];
		$c_term = $_POST["c_term"];

		echo "<h2>TA's that are assigned to course $c_code in $c_term term $c_year:</h2>";

		// Put the query together
		$query = "select * from TAAssignedTO where coursenumber=\"$c_code\" and " .
					"year=\"$c_year\" and term=\"$c_term\"";
		
		// Do seach:
		$result=mysqli_query($connection,$query);
		if(!$result){
			die("databases query failed.");
			echo "Query error: 	" . mysqli_error($connection);
		}
		if ($result->num_rows > 0){
			// Setup table
			echo "<table id='display'>";
			echo "<tr>
					<td>User ID</td>
					<td>Number of Students</td>
				  </tr>";

			// Print data into table.
			while($row=mysqli_fetch_assoc($result)){
				echo '<tr>';
				echo "<td>{$row['tauserid']}</td>";
				echo "<td>{$row['numofstudents']}</td>";
				echo '</tr>';
			}
			echo "</table>";
		}
    	mysqli_close($connection);
  	?>
</body>
</html>