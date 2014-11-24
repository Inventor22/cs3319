<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CS3319 - Databases - Assignment 3 stuff</title>
</head>
<body>
    <!--    <?php
            include 'connectdb.php';
            ?>-->
    <h1>Graduate Student Secretary</h1>
    <h2>TAs</h2>
    <form action="getpets.php" method="post">
        <!--        <?php
                    include 'getdata.php';
                    ?>-->
        <Button name="submit">Get TA Names</Button>
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
                <td></tsd><input type="text" name="studentnumber"></td>
            </tr>
            <tr>
                <td>gradtype:</td>
                <td>
                    <input type="radio" name="type" value="PhD">PhD
                    <input type="radio" name="type" value="Masters">Masters</td>
            </tr>
        </table>
        <br>
        <?php
        include 'getdata.php';
        ?>
        <input type="submit" name="Add New TA" value="Add New TA">
    </form>
    <?php
    mysqli_close($connection);
    ?>
    <hr>
    <h2>Delete a teaching assistant:</h2>
    <form action="deleteTA.php" method="post" enctype="multipart/form-data">
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
        <?php
        include 'getdata.php';
        ?>
        <input type="submit" name="Delete TA" value="Delete TA">
    </form>
    <?php
    mysqli_close($connection);
    ?>
    <hr>
    <h2>Rename a teaching assistant:</h2>
    <form action="deleteTA.php" method="post" enctype="multipart/form-data">
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
        <?php
        include 'getdata.php';
        ?>
        <input type="submit" name="Rename TA" value="Rename TA">
    </form>
    <?php
    mysqli_close($connection);
    ?>

    <hr>
    <h2>Add Professor:</h2>
    <form action="deleteTA.php" method="post" enctype="multipart/form-data">
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
                    <input type="text" name="firstname"></td>
            </tr>
        </table>
        <br />
        <?php
        include 'getdata.php';
        ?>
        <input type="submit" name="Add Professor" value="Add Professor">
    </form>
    <?php
    mysqli_close($connection);
    ?>
    <hr>
    <h2>Delete Professor:</h2>
    <form action="deleteTA.php" method="post" enctype="multipart/form-data">
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
        <?php
        include 'getdata.php';
        ?>
        <input type="submit" name="Delete Professor" value="Delete Professor">
    </form>
    <?php
    mysqli_close($connection);
    ?>
    <hr>
    <h2>Assign Professors to TAs:</h2>
    <form action="deleteTA.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>TA userid:</td>
                <td>
                    <input type="text" name="tauserid"></td>
                <td>&nbsp;&nbsp;
                    Prof userid</td>
                <td>
                    <input type="text" name="profuserid"></td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>OR</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>TA firstname:</td>
                <td>
                    <input type="text" name="ta_firstname"></td>
                <td>&nbsp;&nbsp; Prof firstname&nbsp;</td>
                <td>
                    <input type="text" name="prof_firstname"></td>

            </tr>
            <tr>
                <td>TA lastname:</td>
                <td>
                    <input type="text" name="ta_lastname"></td>
                <td>&nbsp;&nbsp; Prof lastname&nbsp;</td>
                <td>
                    <input type="text" name="prof_lastname"></td>
            </tr>
        </table>
        <br />
        <?php
        include 'getdata.php';
        ?>
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
    <form action="addnewpet.php" method="post" enctype="multipart/form-data">
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
        <?php
        include 'getdata.php';
        ?>
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
    <form action="addnewpet.php" method="post" enctype="multipart/form-data">
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
        <?php
        include 'getdata.php';
        ?>
        <table>
            <tr>
                <td>
                    <button type="submit" value="0">Add Course Info and assign TA</button></td>
                <td>
                    <button type="submit" value="1">Remove TA from Course</button></td>
            </tr>
        </table>
    </form>
</body>
</html>
