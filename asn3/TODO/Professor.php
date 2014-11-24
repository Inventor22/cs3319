<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>UWO Professor Portal</title>
</head>
<body>
	<?php
		include 'connectdb.php';
	?>
	<h1>Welcome to the Western Professors' Portal</h1>
	<h2>View TA's by professor</h2>
	<h3>Please enter a professor's name:</h3>
	<form action="getTAsByProf.php" method="post">
		<?php
			include 'getprofs.php';
		?>
		<input type="submit" value="Get TAs">
	</form>
	<p>
	<hr>
	<p>
	<h2>View TA's by course</h2>
	<h3>Please select a course:</h3>
	<form action="getTAsByCourse.php" method="post">
<!-- 		<?php
		// Only needed if we want to use radio buttons
		// Radio buttons are a bad choice for this - 
		// there are simply too many courses.
		   include 'getcourses.php';
		?> -->
		Course Code (cs####):<br>
		<input type="text" name="c_code" value="">
		<br>
		Year:<br>
		<input type="text" name="c_year" value="">
		<br>
		Term (First letter capitalized):<br>
		<input type="text" name="c_term" value="">
		<br><br>
		<input type="submit" value="Submit">
	</form>
	<?php
		mysqli_close($connection);
	?>
</body>
</html>

