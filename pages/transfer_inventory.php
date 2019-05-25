<?php require 'assets/connection.php'; ?>
<?php require './blocks/nav.php'; ?>
<?php
//GET INVENTORY BY ID
$editID = $_GET['editID'];

$getInventoryByID = "SELECT 
                          `inventories`.`device`, 
                          `inventories`.`brand`, 
                          `inventories`.`serial`, 
                          `locations`.`location_name`, 
                          `users`.`user_name` 
                    FROM `inventories` 
                    INNER JOIN `users` 
                    ON `inventories`.`user_id` = `users`.`user_id` 
                    INNER JOIN `locations` 
                    ON `users`.`location_id` = `locations`.`location_id`
                    WHERE `inventories`.`inventory_id` = '$editID'";
$getInventoryByIDResult = $conn->query($getInventoryByID);

//RETRIEVE LOCATIONS
$selectLocation = "SELECT * FROM `locations`";
$selectLocationResult = $conn->query($selectLocation);

?>

<div class="content">
  <div class="row">
      <div class="col-md-12">
        <form method="POST" action="inventories.php">
          <input type="hidden" name="inventoryID" value="<?php echo $editID; ?>" />
          <?php
          if($getInventoryByIDResult->num_rows > 0) { 
          while($row = $getInventoryByIDResult->fetch_assoc()) {
          ?>
          <div class="row">
            <div class="form-group col col-md-4">
                <label for="brand">Device</label>
                <input type="text" class="form-control" value="<?php echo $row['device']; ?>" readonly>
            </div>
            <div class="form-group col col-md-4">
                <label for="brand">Brand</label>
                <input type="text" class="form-control" value="<?php echo $row['brand']; ?>" readonly>
            </div>
            <div class="form-group col col-md-4">
                <label for="serial">Serial</label>
                <input type="text" class="form-control" value="<?php echo $row['serial']; ?>" readonly>
            </div>
          </div>
          <div class="row">
            <div class="col col-md-6">
              <label for="location">Location From</label>
              <input type="text" class="form-control" value="<?php echo $row['location_name']; ?>" readonly />
            </div>
            <div class="col col-md-6">
              <label for="location">Location To</label>
              <select class="form-control" name="transferLocation" id="transferLocation" onchange="fetch_select(this.value);">
                <?php
                  if($selectLocationResult->num_rows > 0) { 
                  while($rows = $selectLocationResult->fetch_assoc()) {
                ?>
                <option value="<?php echo $rows['location_id']; ?>"><?php echo $rows['location_name']; ?></option>
                <?php }} ?>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col col-md-6">
              <label for="user">User From</label>
              <input type="text" class="form-control" value="<?php echo $row['user_name']; ?>" readonly />
            </div>
            <div class="col col-md-6">
              <label for="location">User To</label>
              <select class="form-control" name="transferUser" id="user">
                <!-- Data is loading from "fetch_data.php" -->
              </select>
            </div>
          </div>
          <?php }} ?>
          <div class="form-group">
              <input type="submit" name="transfer" class="btn btn-info btn-md" value="TRANSFER">
          </div>
        </form>
      </div>
  </div>
</div>

<?php require './blocks/footer.php'; ?>