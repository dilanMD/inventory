<?php
if(isset($_POST['get_option']))
{
 require 'assets/connection.php';

 $location = $_POST['get_option'];
 $selectUserByLocationID = "SELECT * FROM `users` WHERE `location_id` = '$location'";
 $selectUserByLocationIDResult = $conn->query($selectUserByLocationID);
 while($row = $selectUserByLocationIDResult->fetch_assoc())
 {
  echo "<option value='".$row['user_id']."'>".$row['user_name']."</option>";
 }
 exit;
}

?>