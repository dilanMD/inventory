<?php require './assets/connection.php'; ?>
<?php require './blocks/nav.php'; ?>
<?php
//RETRIEVE LOCATIONS
$selectLocation = "SELECT * FROM `locations`";
$selectLocationResult = $conn->query($selectLocation);
?>
      <div class="content">
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
                  <form method="POST" id="addLocationForm">
                    <div class="form-group">
                        <label for="location">Location name</label>
                        <input type="text" name="location" class="form-control" id="location" placeholder="Location name" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="location">Floor</label>
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="floor" id="floor" value="Ground">
                            <label class="form-check-label" for="ground">
                                Ground Floor
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="floor" id="floor" value="First">
                            <label class="form-check-label" for="first">
                                First Floor
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="floor" id="floor" value="Second">
                            <label class="form-check-label" for="second">
                                Second Floor
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="floor" id="floor" value="Third">
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
                        <input type="number" name="users" class="form-control" id="users" placeholder="No.of PC users">
                    </div>
                  </form>
                  </div>
                  <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <button type="button" id="addLocationBtn" class="btn btn-primary">Add</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
  $('#addLocationModal').on('click','#addLocationBtn', function (e) {
      e.preventDefault();
      if($('#location').val() == '') {
        alert('Location cannot be empty');
      } else if($('#floor').val() == '') {
        alert('Floor cannot be non set');
      } else if ($('#users').val() == '') {
        alert('Users cannot be empty');
      } else {
        $.ajax({
        url:"assets/dB.php",
        method:"POST",
        data:$('#addLocationForm').serialize(),
        beforeSend:function(){
        $('#addLocationBtn').val("Inserting");
        },
        success:function(){
        $('#addLocationForm')[0].reset();
        $('#addLocationModal').modal('hide');
      }
  });
</script>

<?php require './blocks/footer.php'; ?>