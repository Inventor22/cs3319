<!--
    Name:  Dustin Dobransky
    Date:  23/11/14
    ID:    250575030
    Aliad: ddobran

    File: index.php

    Description:
        The homepage.
        This allows the user two options:
    1. Log in as a graduate supervisor
    2. Log in as a professor
-->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CS3319 - Databases - Asn 3 - Homepage</title>
</head>
<body>
    <h1>Le Assignment</h1>
    <h2>Choose your own Adventure:</h2>
    <form action="GradSecretary.php" method="post">
        <input type="submit" value="Graduate Supervisor">
    </form>
    <br />
    <form action="Professor.php" method="post">
        <input type="submit" value="Professor">
    </form>
</body>
</html>
