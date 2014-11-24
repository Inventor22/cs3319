<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>CS3319 - Databases - Asn 3 - Homepage</title>
</head>
<body>
    <h1>Le Assignment</h1>
    <h2>Choose your own Adventure:</h2>
    <form action="getpets.php" method="post">
        <?php
            include 'getdata.php';
        ?>
        <input type="submit" value="Get Pet Namess">
    </form>
    <p>
        <hr>
        <p>
            <h2>ADD A NEW PET:</h2>
            <form action="addnewpet.php" method="post" enctype="multipart/form-data">
                New Pet's Name:
                <input type="text" name="petname"><br>
                New Pet's Species:
                <br>
                <input type="radio" name="species" value="dog">Dog<br>
                <input type="radio" name="species" value="cat">Cat<br>
                <input type="radio" name="species" value="bird">Bird<br>
                <input type="file" name="file" id="file"><br>
                For which customer:
                <br>
                <?php
                    include 'getdata.php';
                ?>
                <input type="submit" value="Add New Pet">
            </form>
            <?php
                mysqli_close($connection);
            ?>
</body>
</html>
