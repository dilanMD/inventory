<?php require 'connection.php'; ?>
<?php
//INSERT LOCATION
$location = mysqli_real_escape_string('$conn', $_POST["name"]);
$floor = mysqli_real_escape_string('$conn', $_POST["floor"]);
$users = mysqli_real_escape_string('$conn', $_POST["users"]);

$insertLocation = "INSERT INTO `inventory`.`locations` (`location_id`, `location_name`, `floor`, `users`) VALUES (NULL, '$location', '$floor', '$users');";
$conn->query($insertLocation);