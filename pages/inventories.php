<?php require './assets/connection.php'; ?>
<?php require './blocks/nav.php'; ?>
<?php

//RETRIEVE LOCATIONS
$selectLocation = "SELECT * FROM `locations`";
$selectLocationResult = $conn->query($selectLocation);

//RETRIEVE USERS
$selectUser = "SELECT * FROM users";
$selectUserResult = $conn->query($selectUser);

//INSERT USER
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $location = $_POST['location'];
    
    $insertUser = "INSERT INTO `inventory`.`users` (`user_id`, `user_name`, `location_id`) VALUES (NULL, '$username', '$location');";
    
    $conn->query($insertUser);
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
                    <form method="POST" action="users.php">
                      <div class="row">
                        <div class="form-group col col-md-4">
                          <label for="device">Device</label>
                          <input type="text" name="device" class="form-control" id="device" placeholder="">
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
                        if($selectUserResult->num_rows > 0) { 
                        while($row = $selectUserResult->fetch_assoc()) {
                          $locationID = $row['location_id'];
                      ?>
                      <tr>
                          <td><?php //echo $row['user_name']; ?></td>
                          <td>
                            <?php
                              $selectLocationByID = "SELECT * FROM `locations` WHERE `location_id` = '$locationID'";
                              $selectLocationByIDResult = $conn->query($selectLocationByID);
                              if($selectLocationByIDResult->num_rows > 0) {
                                $row = $selectLocationByIDResult->fetch_assoc();
                                //echo $row['location_name'];
                              }
                            ?>
                          </td>
                          <td></td>
                          <td></td>
                          <td></td>
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