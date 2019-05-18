<?php require './assets/connection.php'; ?>
<?php require './blocks/nav.php'; ?>
<?php
//INSERT LOCATION
// if (isset($_POST['submit'])){
//     $location = $_POST['location'];
//     $floor = $_POST['floor'];
//     $users = $_POST['users'];
    
//     $insertLocation = "INSERT INTO `inventory`.`locations` (`location_id`, `location_name`, `floor`, `users`) VALUES (NULL, '$location', '$floor', '$users');";
    
//     $conn->query($insertLocation);
// }

//RETRIEVE LOCATIONS
$selectLocation = "SELECT * FROM `locations`";
$selectLocationResult = $conn->query($selectLocation);
?>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-body ">
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