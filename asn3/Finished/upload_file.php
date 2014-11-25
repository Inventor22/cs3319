<!--
    File: updload_file.php

    Description:
        Allows the client to upload an image file.
        
        Taken from PHP workshop.
-->

<?php
include ('folders.php');
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
$extension = strtolower($extension);
$uploadholder = dirname(__FILE__) . "/TA_Pictures";
$uploadFolder = new Folder;
if ((($_FILES["file"]["type"] == "image/gif")
    || ($_FILES["file"]["type"] == "image/jpeg")
    || ($_FILES["file"]["type"] == "image/jpg")
    || ($_FILES["file"]["type"] == "image/pjpeg")
    || ($_FILES["file"]["type"] == "image/x-png")
    || ($_FILES["file"]["type"] == "image/png"))
    && ($_FILES["file"]["size"] < 500000)
    && in_array($extension, $allowedExts)) {
    if ($_FILES["file"]["error"] > 0) {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    } else {
        $uploadFolder->createFolder($uploadholder);
        if (file_exists("TA_Pictures/" . $_FILES["file"]["name"])) {
            echo '<p><hr>';
            echo $_FILES["file"]["name"] . " already exists. ";
            echo '<p><hr>';
            $TApic = "NULL";
        } else {
            move_uploaded_file($_FILES["file"]["tmp_name"],"TA_Pictures/" . $_FILES["file"]["name"]);
            $TApic = "TA_Pictures/" . $_FILES["file"]["name"];
        } // end of else
    } // end of else
} else {
    echo "Invalid file";
} //end of else
?>