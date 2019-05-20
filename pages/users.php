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
if (isset($_POST['submit'])){
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
              Add User
            </button>

            <!-- Modal -->
            <div class="modal fade" id="addLocationModal" tabindex="-1" role="dialog" aria-labelledby="addLocationModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="addLocationModalLabel">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="users.php">
                      <div class="form-group">
                          <label for="location">User name</label>
                          <input type="text" name="username" class="form-control" id="username" placeholder="">
                      </div>
                      <div class="">
                        <select class="form-control" name="location" id="location">
<!--                          <option value="0">Select a location</option>-->
                          <?php
                            if($selectLocationResult->num_rows > 0) { 
                            while($row = $selectLocationResult->fetch_assoc()) {
                          ?>
                          <option value="<?php echo $row['location_id']; ?>"><?php echo $row['location_name']; ?></option>
                          <?php }} ?>
                        </select>
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
                          <th>User</th>
                          <th>Location</th>
                          <th>Full View</th>
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
                          <td><?php echo $row['user_name']; ?></td>
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

<script>
  $(document).ready(function(){

    // Initialize select2
    $("#selUser").select2();

    // Read selected option
    $('#but_read').click(function(){
      var username = $('#selUser option:selected').text();
      var userid = $('#selUser').val();

      $('#result').html("id : " + userid + ", name : " + username);

    });
  });
</script>

<?php require './blocks/footer.php'; ?>