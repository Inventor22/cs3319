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
	<h1>TA Courses</h1>
	<h2>Courses that the specified TA is assigned to:</h2>
	<?php
		// Get course code, year, and term from the caller
		$taid = $_POST["taID"];
		// Put the query together
		$query = "select * from TAAssignedTO where tauserid=\"$taid\"";
		
		// Do seach:
		$result=mysqli_query($connection,$query);
		if(!$result){
			die("databases query failed.");
			echo "Query error: 	" . mysqli_error($connection);
		}
		$count = $result->num_rows;
		if ($result->num_rows > 0){
			// Setup table
			echo "<table id='display'>";
			echo "<tr>
					<td>User ID</td>
					<td>Course Number</td>
					<td>Year</td>
					<td>Term</td>
					<td>Number of Students</td>
				  </tr>";

			// Print data into table.
			while($row=mysqli_fetch_assoc($result)){
				echo '<tr>';
				echo "<td>{$row['tauserid']}</td>";
				echo "<td>{$row['coursenumber']}</td>";
				echo "<td>{$row['year']}</td>";
				echo "<td>{$row['term']}</td>";
				echo "<td>{$row['numofstudents']}</td>";
				echo '</tr>';
			}
			echo "</table>";
		}
    	
    	// Display the count of the courses that they're in
    	echo "<p>This TA is currently assigned to $count course(s).<br>";

    	// Get the TA's type - used to check if they can do more
		$query = "select * from TEACHINGASSISTANT where userid=\"$taid\"";
		
		// Do seach:
		$result=mysqli_query($connection,$query);
		if(!$result){
			die("databases query failed.");
			echo "Query error: 	" . mysqli_error($connection);
		}
		$type = "";
		if ($result->num_rows > 0){
			// Print data into table.
			if($row=mysqli_fetch_assoc($result)){
				$type = $row["gradtype"];
			}
			echo "</table>";
		}

		// Handle note about whether the TA cannot do more courses
		if ($type=="Masters" && $count>=3){
			echo "Note: This TA is not available to be assigned to anymore courses.<br>";
		}
		else if ($type=="PhD" && $count>=8){
			echo "Note: This TA is not available to be assigned to anymore courses.<br>";
		}
		else {
			echo "Note: This TA is available to be assigned to more courses.<br>";
		}

    	mysqli_close($connection);
  	?>
</body>
</html>