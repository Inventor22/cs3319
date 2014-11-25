<!--
    Name:  Dustin Dobransky
    Date:  23/11/14
    ID:    250575030
    Aliad: ddobran

    File: GradSecretary.php

    Description:
        This file is responsible for providing an interface for the
        Graduate Secretary for performing the following functions:
    1. Add/Remove Professors
    2. Add/Remove Teaching Assistants
    3. Add/Remove Courses
    4. Assign/Modify a head professor to a TA
    5. Assign a TA to a course and provide extra course details (year, term, # students)
    6. Add/Remove CoSupervisors for a TA
-->

<!DOCTYPE html>

<?php 
// password magic: http://www.totallyphp.co.uk/password-protect-a-page
// Define your username and password 
$username = "ADMIN"; 
$password = "janice"; 

if ($_POST['txtUsername'] != $username || $_POST['txtPassword'] != $password) { 

?>

<h1>Login to Graduate Supervisor broom closet:</h1>

<form name="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <p>
        <label for="txtUsername">Username:</label>
        <br />
        <input type="text" title="Enter your Username" name="txtUsername" value="ADMIN" />
    </p>

    <p>
        <label for="txtpassword">Password:</label>
        <br />
        <input type="password" title="Enter your password" name="txtPassword" />
    </p>

    <p>
        <input type="submit" name="Submit" value="Login" />
    </p>

</form>

<?php 
} 
else { 
?>

<html>
<head>
    <meta charset="utf-8">
    <title>CS3319 - Databases - Assignment 3 stuff</title>
</head>
<body>
    <?php
    include 'connectdb.php';
    ?>
    <h1>Graduate Student Secretary</h1>
    <h2>TAs</h2>
    <form action="getTAs.php" method="post">
        <button name="submit">Get TAs</button>
    </form>
    <hr>
    <h2>Add a new teaching assistant:</h2>
    <form action="AddNewTA.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>userid:</td>
                <td>
                    <input type="text" name="userid"></td>
            </tr>
            <tr>
                <td>firstname:</td>
                <td>
                    <input type="text" name="firstname"></td>
            </tr>
            <tr>
                <td>lastname:</td>
                <td>
                    <input type="text" name="lastname"></td>
            </tr>
            <tr>
                <td>studentnumber:</td>
                <td><input type="text" name="studentnumber"></td>
            </tr>
            <tr>
                <td>gradtype:</td>
                <td>
                    <input type="radio" name="type" value="PhD">PhD
                    <input type="radio" name="type" value="Masters">Masters</td>
            </tr>
            <tr>
                <td>Image:</td>
                <td><input type="file" name="file" id="file"><br></td>
            </tr>
            <tr>
                <td>Prof user id:</td>
                <td><input type="text" name="profuserid" /></td>
            </tr>
        </table>
        <br>
        <input type="submit" name="Add New TA" value="Add New TA">
    </form>

    <hr>
    <h2>Delete a teaching assistant:</h2>
    <form action="DeleteTA.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>userid:</td>
                <td>
                    <input type="text" name="userid"></td>
            </tr>
            <tr>
                <td>OR</td>
            </tr>
            <tr>
                <td>firstname:</td>
                <td>
                    <input type="text" name="firstname"></td>
            </tr>
            <tr>
                <td>lastname:</td>
                <td>
                    <input type="text" name="lastname"></td>
            </tr>
            <tr>
                <td>OR
                </td>
            </tr>
            <tr>
                <td>studentnumber:</td>
                <td>
                    <input type="text" name="studentnumber"></td>
            </tr>
        </table>
        <br />
        <input type="submit" name="Delete TA" value="Delete TA">
    </form>

    <hr>
    <h2>Rename a teaching assistant:</h2>
    <form action="ModifyTA.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>&nbsp;</td>
                <td>userid:</td>
                <td>
                    <input type="text" name="userid"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>OR</td>
            </tr>
            <tr>
                <td>FROM:&nbsp;&nbsp;&nbsp; </td>
                <td>firstname:</td>
                <td>
                    <input type="text" name="firstname"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>lastname:</td>
                <td>
                    <input type="text" name="lastname"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>OR
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>studentnumber:</td>
                <td>
                    <input type="text" name="studentnumber"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>TO:</td>
                <td>new firstname:</td>
                <td>
                    <input type="text" name="newfirstname"></td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>new lastname:</td>
                <td>
                    <input type="text" name="newlastname"></td>
                <td>&nbsp;</td>
            </tr>
        </table>
        <br />

        <input type="submit" name="Rename TA" value="Rename TA">
    </form>

    <hr>
    <h2>Add Professor:</h2>
    <form action="AddProfessor.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>userid:</td>
                <td>
                    <input type="text" name="userid"></td>
            </tr>
            <tr>
                <td>firstname:</td>
                <td>
                    <input type="text" name="firstname"></td>
            </tr>
            <tr>
                <td>lastname:</td>
                <td>
                    <input type="text" name="lastname"></td>
            </tr>
        </table>
        <br />
        <input type="submit" name="Add Professor" value="Add Professor">
    </form>

    <hr>
    <h2>Delete Professor:</h2>
    <form action="DeleteProfessor.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>userid:</td>
                <td>
                    <input type="text" name="userid"></td>
            </tr>
            <tr>
                <td>OR</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>firstname:</td>
                <td>
                    <input type="text" name="firstname"></td>
            </tr>
            <tr>
                <td>lastname:</td>
                <td>
                    <input type="text" name="firstname"></td>
            </tr>
        </table>
        <br />
        <input type="submit" name="Delete Professor" value="Delete Professor">
    </form>

    <hr>
    <h2>Assign Professors to TAs:</h2>
    <form action="ProfToTA.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>TA userid:</td>
                <td>
                    <input type="text" name="tauserid"></td>
                <td>
                    &nbsp;</td>
                <td>Prof userid</td>
                <td>
                    <input type="text" name="profuserid"></td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td></td>
                <td>&nbsp;OR&nbsp;</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>TA firstname:</td>
                <td>
                    <input type="text" name="ta_firstname"></td>
                <td>
                    &nbsp;</td>
                <td>Prof firstname&nbsp;</td>
                <td>
                    <input type="text" name="prof_firstname"></td>

            </tr>
            <tr>
                <td>TA lastname:</td>
                <td>
                    <input type="text" name="ta_lastname"></td>
                <td>
                    &nbsp;</td>
                <td>Prof lastname&nbsp;</td>
                <td>
                    <input type="text" name="prof_lastname"></td>
            </tr>
        </table>
        <br />
        <table>
            <tr>
                <td align="center">
                    <button name="submit" value="0">Assign Prof as Head Supervisor for TA</button></td>
                <td align="center">
                    <button name="submit" value="1">Assign Prof as CoSupervisor for TA</button></td>
            </tr>
            <tr>
                <td align="center">
                    <button name="submit" value="2">Remove Prof as Head Supervisor for TA</button></td>
                <td align="center">
                    <button name="submit" value="3">Remove Prof as CoSupervisor for TA</button></td>
            </tr>
        </table>
    </form>

    <hr>
    <h2>Add/Remove Course:</h2>
    <form action="AddRemoveCourse.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Course Number:</td>
                <td>
                    <input type="text" name="userid"></td>
            </tr>
            <tr>
                <td>Course Name:</td>
                <td>
                    <input type="text" name="firstname"></td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <td>
                    <button name="submit" value="0">Add Course</button></td>
                <td>
                    <button name="submit" value="1">Remove Course</button></td>
            </tr>
        </table>
    </form>

    <hr />
    <h2>Assign TA to course:</h2>
    <form action="TAAssignTo.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Course Number:</td>
                <td>
                    <input type="text" name="coursenumber"></td>
            </tr>
            <tr>
                <td>Year:</td>
                <td>
                    <input type="text" name="year"></td>
            </tr>
            <tr>
                <td>Number of Students:</td>
                <td>
                    <input type="text" name="numofstudents"></td>
            </tr>
            <tr>
                <td>Term:</td>
                <td>
                    <input type="radio" name="term" value="Fall">Fall
                    <input type="radio" name="term" value="Winter">Winter</td>
            </tr>
            <tr>
                <td>TA userid:</td>
                <td>
                    <input type="text" name="tauserid"></td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <td>
                    <button type="submit" value="0">Add Course Info and assign TA</button></td>
                <td>
                    <button type="submit" value="1">Remove TA from Course</button></td>
            </tr>
        </table>
    </form>
    <br />
    <br />
    <br />
    <br />
    <br />

    <?php
    mysqli_close($connection);
    ?>
</body>
</html>

<?php 
} 
?>