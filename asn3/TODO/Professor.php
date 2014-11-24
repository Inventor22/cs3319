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
	<h2>View TA's by professor</h2>
	<h3>Please enter a professor's name:</h3>
	<form action="getTAsByProf.php" method="post">
		<?php
			include 'getprofs.php';
		?>
<!-- 	<?php
		   include 'get_tas.php';
		?>
		First name:<br>
		<input type="text" name="firstname" value="">
		<br>
		Last name:<br>
		<input type="text" name="lastname" value="">
		<br><br> -->

		<input type="submit" value="Get TAs">
	</form>
	<hr>
	<h2>View TA's by course</h2>
	<h3>Please enter a course number:</h3>
	First name:<br>
	<form action="get_courses.php" method="post">
		<?php
		   include 'get_courses.php';
		?>
		Course Code:<br>
		<input type="text" name="c_code" value="">
		<br>
		Year:<br>
		<input type="text" name="c_year" value="">
		<br>
		Term:<br>
		<input type="text" name="c_term" value="">
		<br><br>
		<input type="submit" value="Submit">
	</form>
	<?php
		mysqli_close($connection);
	?>
</body>
</html>

