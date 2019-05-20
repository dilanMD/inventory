<?php require './assets/connection.php'; ?>
<?php require './blocks/nav.php'; ?>
<?php

//RETRIEVE LOCATIONS
$selectLocation = "SELECT * FROM `locations`";
$selectLocationResult = $conn->query($selectLocation);

//RETRIEVE USERS
$selectUser = "SELECT * FROM users";
$selectUserResult = $conn->query($selectUser);

//RETRIEVE INVENTORIES
$selectInventory = "SELECT * FROM inventories";
$selectInventoryResult = $conn->query($selectInventory);

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
                          <th>Edit</th>
                          <th>Delete</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                        if($selectInventoryResult->num_rows > 0) { 
                        while($row = $selectInventoryResult->fetch_assoc()) {
                          $locationID = $row['location_id'];
                          $userID = $row['user_id'];
                      ?>
                      <tr>
                          <td><?php echo $row['device']; ?></td>
                          <td><?php echo $row['brand']; ?></td>
                          <td><?php echo $row['serial']; ?></td>
                          <td>
                            <?php
                              $selectLocationByID = "SELECT * FROM `locations` WHERE `location_id` = '$locationID'";
                              $selectLocationByIDResult = $conn->query($selectLocationByID);
                              if($selectLocationByIDResult->num_rows > 0) {
                                $row = $selectLocationByIDResult->fetch_assoc();
                                echo $row['location_name'];
                              }
                            ?>
                          </td>
                          <td>
                            <?php
                              $selectUserByID = "SELECT * FROM `users` WHERE `user_id` = '$userID'";
                              $selectUserByIDResult = $conn->query($selectUserByID);
                              if($selectUserByIDResult->num_rows > 0) {
                                $row = $selectUserByIDResult->fetch_assoc();
                                echo $row['user_name'];
                              }
                            ?>
                          </td>
                          <td></td>
                          <td></td>
                      </tr>
                      <?php }} ?>
                  </tbody>
              </table>
                <!-- Datatable end -->
              </div>
            </div>
          </div>
        </div>
      </div>

<?php require './blocks/footer.php'; ?>