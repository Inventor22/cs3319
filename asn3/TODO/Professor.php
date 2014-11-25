<!--
    Name:  Andrew Simpson
    Date:  23/11/14
    ID:    250 633 280
    Aliad: asimps53

    File: Professor.php

    Description:
		This is the professors' portal.
		From this page, a professor can:
			- view all of the TAs assigned to a prof
			- view all of the TAs assigned to a course
			- view all of the courses that a TA is assigned to
-->

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
	<hr>
	<h2>View TA's by Professor</h2>
	<h3>Please enter a professor's name:</h3>
	<form action="getTAsByProf.php" method="post">
		<?php
			include 'getprofs.php';
		?>
		<br>
		<input type="submit" value="Get TAs">
	</form>
	<p>
	<hr>
	<p>
	<h2>View TA's by Course</h2>
	<h3>Please select a course:</h3>
	<form action="getTAsByCourse.php" method="post">
		<!-- Radio buttons -->
		<?php
		   include 'getcourses.php';
		?>
		<!--  Text box -->
		<!--Course Code (cs####):<br>
		<input type="text" name="c_code" value="">
		<br>-->
		<br>
		<input type="submit" value="Submit">
	</form>
	<p>
	<hr>
	<p>
	<h2>View Courses a TA is Assigned To</h2>
	<h3>Please select a TA:</h3>
	<form action="getTACourses.php" method="post">
		<?php
			include 'gettas.php';
		?>
		<br>
		<input type="submit" value="Get Courses"/>
	</form>
	<?php
		mysqli_close($connection);
	?>
</body>
</html>

