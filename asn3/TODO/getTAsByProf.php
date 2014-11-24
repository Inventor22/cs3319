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
					echo "<td>{$row['userid']}</td>";
					echo "<td>{$row['firstname']}</td>";
					echo "<td>{$row['lastname']}</td>";
					echo "<td>{$row['gradtype']}</td>";
					echo '</tr>';
					// TODO: Show image.
				}
				echo "</table>";
			}
			if ($result->num_rows == 0){
				echo 'None';
			}
			mysqli_free_result($result);
		?>
	</ol>
	<h2>TA's that professor co-supervises:</h2>
	<ol>
		<?php
			// Do co-supervisor seach:
			$query = 'select * from CoSUPERVISE where profuserid="' . $wID . '"';
			$result=mysqli_query($connection,$query);
			if(!$result){
				die("databases query failed: " . mysqli_error($connection));
			}
			if ($result->num_rows > 0){
				while($row=mysqli_fetch_assoc($result)){
					$query2='select * from TEACHINGASSISTANT where userid="' . $row["tauserid"] . '"';
					$result2=mysqli_query($connection,$query2);
					if(!$result2){
						die("databases query failed: " . mysqli_error($connection));
					}
					// Only do if, should only be one result
					if($row2=mysqli_fetch_assoc($result2)){
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
							echo "<td>{$row['userid']}</td>";
							echo "<td>{$row['firstname']}</td>";
							echo "<td>{$row['lastname']}</td>";
							echo "<td>{$row['gradtype']}</td>";
							echo '</tr>';
							// TODO: Show image.
						}
						echo "</table>";
					}
					mysqli_free_result($result2);
				}
			}
			if ($result->num_rows == 0){
				echo 'None';
			}
			mysqli_free_result($result);
		?>
	</ol>
	<?php
    	mysqli_close($connection);
  	?>
</body>
</html>