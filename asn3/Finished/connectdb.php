<!--
    File: connectdb.php

    Description:  This file connects to the database built for this assignment.
        Modified from a file of the same name from the PHP workshop available 
        in the course material.
-->

<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "cs3319";
$dbname = "DoDrew";

$connection = mysqli_connect($dbhost, $dbuser,$dbpass,$dbname);

if (mysqli_connect_errno()) {
    die("database connection failed :" .
        mysqli_connect_error() .
        "(" . mysqli_connect_errno() . ")"
        );
} else {
    //echo 'Successfully connected to database '.$dbname;
}
?>