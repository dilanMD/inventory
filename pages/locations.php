<?php require './assets/connection.php'; ?>
<?php require './blocks/nav.php'; ?>
<?php

//RETRIEVE LOCATIONS
$selectLocation = "SELECT * FROM `locations`";
$selectLocationResult = $conn->query($selectLocation);

//INSERT LOCATION
if (isset($_POST['submit'])){
    $location = $_POST['location'];
    $floor = $_POST['floor'];
    $users = $_POST['users'];
    
    $insertLocation = "INSERT INTO `inventory`.`locations` (`location_id`, `location_name`, `floor`, `users`) VALUES (NULL, '$location', '$floor', '$users');";
    
    $conn->query($insertLocation);
}

?>
      <div class="content" onload="addRecord()">
        <div class="row">
          <div class="col-md-12">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addLocationModal">
              Add Location
            </button>

            <!-- Modal -->
            <div class="modal fade" id="addLocationModal" tabindex="-1" role="dialog" aria-labelledby="addLocationModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="addLocationModalLabel">Add Location</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="locations.php">
                      <div class="form-group">
                          <label for="location">Location name</label>
                          <input type="text" name="location" class="form-control" id="location" placeholder="">
                      </div>
                      <div class="form-group">
                          <div class="form-check">
                              <input class="form-check-input" type="radio" name="floor" id="ground" value="Ground">
                              <label class="form-check-label" for="ground">
                                  Ground Floor
                              </label>
                          </div>
                          <div class="form-check">
                              <input class="form-check-input" type="radio" name="floor" id="first" value="First">
                              <label class="form-check-label" for="first">
                                  First Floor
                              </label>
                          </div>
                          <div class="form-check">
                              <input class="form-check-input" type="radio" name="floor" id="second" value="Second">
                              <label class="form-check-label" for="second">
                                  Second Floor
                              </label>
                          </div>
                          <div class="form-check">
                              <input class="form-check-input" type="radio" name="floor" id="third" value="Third">
                              <label class="form-check-label" for="third">
                                  Third Floor
                              </label>
                          </div>
                          <div class="form-check">
                              <input class="form-check-input" type="radio" name="floor" id="fourth" value="Fourth">
                              <label class="form-check-label" for="fourth">
                                  Fourth Floor
                              </label>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="users">No.of users</label>
                          <input type="number" name="users" class="form-control" id="users" placeholder="">
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
                          <th>Location</th>
                          <th>Floor</th>
                          <th>PC Users</th>
                          <th>Full View</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php
                        if($selectLocationResult->num_rows > 0) { 
                        while($row = $selectLocationResult->fetch_assoc()) {
                      ?>
                      <tr>
                          <td><?php echo $row['location_name']; ?></td>
                          <td><?php echo $row['floor']; ?></td>
                          <td><?php echo $row['users']; ?></td>
                          <td><i class="fas fa-table text-info"></i></td>
                          <td><i class="fas fa-pencil-alt text-warning"></i></td>
                          <td><i class="fas fa-trash-alt text-danger"></i></td>
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