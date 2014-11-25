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
	<h2>TA's that are assigned to course:</h2>
	<?php
		// Get course code, year, and term from the caller
		$c_code = $_POST["c_code"];
		$c_year = $_POST["c_year"];
		$c_term = $_POST["c_term"];

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
					<td>First Name</td>
					<td>Last Name</td>
					<td>Grad Type</td>
					<td>Profile Picture</td>
				  </tr>";

			// Print data into table.
			while($row=mysqli_fetch_assoc($result)){
				echo '<tr>';
				echo "<td>{$row['tauserid']}</td>";
				echo "<td>{$row['numofstudents']}</td>";
				// echo "<td>{$row['lastname']}</td>";
				// echo "<td>{$row['gradtype']}</td>";
				echo '</tr>';
				// TODO: Show image.
			}
			echo "</table>";
		}
    	mysqli_close($connection);
  	?>
</body>
</html>