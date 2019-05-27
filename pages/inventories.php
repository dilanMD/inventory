<?php require './assets/connection.php'; ?>
<?php require './blocks/nav.php'; ?>
<?php

//RETRIEVE LOCATIONS
$selectLocation = "SELECT * FROM `locations`";
$selectLocationResult = $conn->query($selectLocation);
$selectLocationResultForTransfer = $conn->query($selectLocation);

//RETRIEVE USERS
$selectUser = "SELECT * FROM users";
$selectUserResult = $conn->query($selectUser);

//INSERT INVENTORY
if (isset($_POST['submit'])) {
  $device = $_POST['device'];
  $brand = $_POST['brand'];
  $serial = $_POST['serial'];
  $location = $_POST['location'];
  $user = $_POST['user'];

  $insertInventory = "INSERT INTO `inventory`.`inventories` (`inventory_id`, `device`, `brand`, `serial`, `location_id`, `user_id`) VALUES (NULL, '$device', '$brand', '$serial', '$location', '$user');";

  $conn->query($insertInventory);
}

if (isset($_POST['transfer'])) {
  $transferLocation = $_POST['transferLocation'];
  $transferUser = $_POST['transferUser'];
  $inventoryID = $_POST['inventoryID'];
  
  $transferInventory = "UPDATE inventories SET location_id = '$transferLocation', user_id = '$transferUser' WHERE inventory_id = '$inventoryID'";
  $conn->query($transferInventory);
}

//EDIT INVENTORY
date_default_timezone_set("Asia/Colombo");
$currentDateAndTime = date("Y-m-d h:i:s");
if(isset($_POST['edit'])) {
  $inventoryID = $_POST['inventoryID'];
  $brandEdit = $_POST['brandEdit'];
  $serialEdit = $_POST['serialEdit'];

  $editInventory = "UPDATE `inventories` SET `brand` = '$brandEdit', `serial` = '$serialEdit', `updated_on` = '$currentDateAndTime' WHERE `inventories`.`inventory_id` = '$inventoryID'";
  $conn->query($editInventory);
}

//TRANSFER INVENTORY
if(isset($_POST['transfer'])) {
  $inventoryID = $_POST['inventoryID'];
  $transferLocation = $_POST['transferLocation'];
  $transferUser = $_POST['transferUser'];

  $editInventory = "UPDATE `inventories` SET `location_id` = '$transferLocation', `user_id` = '$transferUser' WHERE `inventories`.`inventory_id` = '$inventoryID'";
  $conn->query($editInventory);
}

//DELETE INVENTORY
if(isset($_GET['deleteID'])) {
  echo $deleteID = $_POST['deleteID'];
  $deleteInventory = "DELETE FROM `inventories` WHERE `inventory_id` = '$deleteID'";
  $conn->query($deleteInventory);
}

//RETRIEVE INVENTORIES
$selectInventory = "SELECT 
                          `inventories`.`inventory_id`, 
                          `inventories`.`device`, 
                          `inventories`.`brand`, 
                          `inventories`.`serial`, 
                          `locations`.`location_name`, 
                          `users`.`user_name` 
                    FROM `inventories` 
                    INNER JOIN `users` 
                    ON `inventories`.`user_id` = `users`.`user_id` 
                    INNER JOIN `locations` 
                    ON `users`.`location_id` = `locations`.`location_id`";
$selectInventoryResult = $conn->query($selectInventory);
$selectInventoryResultForEdit = $conn->query($selectInventory);

?>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addLocationModal">
              Add Inventory
            </button>

            <!-- Modal -->
            <div class="modal fade" id="addLocationModal" tabindex="-1" role="dialog" aria-labelledby="addLocationModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="addLocationModalLabel">Add Inventory</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="inventories.php">
                      <div class="row">
                        <div class="col col-md-4">
                          <label for="device">Device</label>
                          <select id="device" name="device" class="form-control" required>
                            <option value="All in one PC">All in one PC</option>
                            <option value="Cash Registration Machine">Cash Registration Machine</option>
                            <option value="Monitor">Monitor</option>
                            <option value="Mouse">Mouse</option>
                            <option value="Keyboard">Keyboard</option>
                            <option value="UPS">UPS</option>
                            <option value="CPU">CPU</option>
                            <option value="Dot Matrix Printer">Dot Matrix Printer</option>
                            <option value="LaserJet">LaserJet</option>
                            <option value="Colour Printer">Colour Printer</option>
                            <option value="Sticker Printer">Sticker Printer</option>
                            <option value="Network Switch">Network Switch</option>
                            <option value="Network Hub">Network Hub</option>
                            <option value="Extension Cord">Extension Cord</option>
                            <option value="UPS Battery">UPS Battery</option>
                            <option value="Server PC">Server PC</option>
                            <option value="Network Cable">Network Cable</option>
                            <option value="Network Clip">Network Clip</option>
                            <option value="Punching Tool">Punching Tool</option>
                            <option value="Network Cutter">Network Cutter</option>
                            <option value="Brush">Brush</option>
                            <option value="Screwdriver">Screwdriver</option>
                            <option value="Finger Printer">Finger Printer</option>
                            <option value="Projector">Projector</option>
                            <option value="VGA Cable">VGA Cable</option>
                            <option value="Power Cable">Power Cable</option>
                            <option value="USB Cable">USB Cable</option>
                            <option value="USB Network Adapter">USB Network Adapter</option>
                            <option value="USB Hub">USB Hub</option>
                            <option value="Harddisk">Harddisk</option>
                            <option value="Power Supply">Power Supply</option>
                            <option value="Power Adapter">Power Adapter</option>
                            <option value="CMOS Battery">CMOS Battery</option>
                            <option value="Processor Paste">Processor Paste</option>
                            <option value="Blower">Blower</option>
                            <option value="Catridge">Catridge</option>
                            <option value="Toner">Toner</option>
                            <option value="DVR">DVR</option>
                            <option value="Laptop">Laptop</option>
                            <option value="Scanner">Scanner</option>
                          </select>
                        </div>
                        <div class="form-group col col-md-4">
                            <label for="brand">Brand</label>
                            <input type="text" name="brand" class="form-control" id="brand" placeholder="">
                        </div>
                        <div class="form-group col col-md-4">
                            <label for="serial">Serial</label>
                            <input type="text" name="serial" class="form-control" id="serial" placeholder="">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col col-md-6">
                          <label for="location">Location</label>
                          <select class="form-control" name="location" id="location" onchange="fetch_select(this.value);">
                            <?php
                              if($selectLocationResult->num_rows > 0) { 
                              while($row = $selectLocationResult->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $row['location_id']; ?>"><?php echo $row['location_name']; ?></option>
                            <?php }} ?>
                          </select>
                        </div>
                        <div class="col col-md-6">
                          <label for="user">User</label>
                          <select class="form-control" name="user" id="user">
                            <!-- Data is loading from "fetch_data.php" -->
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                          <input type="submit" name="submit" class="btn btn-primary btn-md" value="ADD">
                      </div>
                  </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-body">
                <!-- Datatable start -->
                <table id="locations" class="table table-striped table-bordered table-sm" style="width:100%">
                  <thead>
                      <tr>
                          <th>Device</th>
                          <th>Brand</th>
                          <th>Serial</th>
                          <th>Location</th>
                          <th>User</th>
                          <th>Maintenance</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                        if($selectInventoryResult->num_rows > 0) { 
                        while($row = $selectInventoryResult->fetch_assoc()) {
                      ?>
                      <tr>
                          <td><?php echo $row['device']; ?></td>
                          <td><?php echo $row['brand']; ?></td>
                          <td><?php echo $row['serial']; ?></td>
                          <td><?php echo $row['location_name']; ?></td>
                          <td><?php echo $row['user_name']; ?></td>
                          <td>
                            <a href="edit_inventory.php?editID=<?php echo $row['inventory_id']; ?>" title="Edit Brand and Serial">
                              <i class="fas fa-edit text-warning" class="editModalToggle"></i>
                            </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="transfer_inventory.php?editID=<?php echo $row['inventory_id']; ?>" title="Transfer to another location">
                              <i class="fas fa-exchange-alt text-info"></i>
                            </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<!--
                            <a href="" data-toggle="modal" data-target="#deleteInventoryModal" data-toggle="tooltip" title="Remove from this location">
                              <i class="fas fa-trash-alt text-danger"></i>
                            </a>
-->
                        </td>
                      </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="deleteInventoryModal" tabindex="-1" role="dialog" aria-labelledby="deleteInventoryModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="deleteInventoryModalLabel">Do you want to remove this inventory?</h5>
                              </div>
                              <div class="modal-footer">
                                <form method="post" action="inventories.php">
                                  <input type="hidden" name="deleteID" value="<?php echo $row['inventory_id']; ?>" />
                                  <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cancel" />
                                  <input type="submit" class="btn btn-danger" name="delete" data-dismiss="modal" value="Remove Inventory" />
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php }} ?>
                  </tbody>
              </table>
                <!-- Datatable end -->
              </div>
            </div>
          </div>
        </div>

<?php require './blocks/footer.php'; ?>