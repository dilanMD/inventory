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

if(isset($_POST['delete_id']))
{
 require 'assets/connection.php';

 $delete_id = $_POST['delete_id'];
 $deleteInventoryByID = "DELETE FROM `inventories` WHERE `inventory_id` = '$delete_id'";
 $deleteInventoryByIDResult = $conn->query($deleteInventoryByID);
 exit;
}

?>