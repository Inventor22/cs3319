<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Dr. Western's Vet Clinic-Your Pets</title>
</head>
<body>
  <?php
    include 'connectdb.php';
  ?>
  <h1>Here are your pets:</h1>
  <ol>
    <?php
      $whichOwner= $_POST["petowners"];
      $query = 'select * from owner, pet where pet.ownerid=owner.ownerid and pet.ownerid="' . $whichOwner . '"';
      $result=mysqli_query($connection,$query);
      if (!$result) {
        die("database query2 failed.");
      }
      while ($row=mysqli_fetch_assoc($result)) {
        echo '<li>';
        echo $row["petname"];
        echo '<img src="' . $row["petpicture"] . '" height="60" width="60">';
      }
      mysqli_free_result($result);
    ?>
  </ol>
  <?php
    mysqli_close($connection);
  ?>
</body>
</html>
