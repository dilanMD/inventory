<?php require './assets/connection.php'; ?>
<?php require './blocks/nav.php'; ?>
<?php
//GET ID FROM URL
$editID = $_GET['editID'];

//GET LOCATION BY ID
$selectLocation = "SELECT * FROM `locations` WHERE `location_id` = '$editID'";
$selectLocationResult = $conn->query($selectLocation);

?>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <form method="POST" action="locations.php">
        <?php
          if($selectLocationResult->num_rows > 0) {
            while($row = $selectLocationResult->fetch_assoc()) {
        ?>
        <input type="hidden" name="location_id" value="<?php echo $editID; ?>">
        <div class="row">
          <div class="form-group col col-md-6">
              <label for="location">Location name</label>
              <input type="text" name="editLocation" class="form-control" id="location" value="<?php echo $row['location_name']; ?>">
          </div>
          <div class="form-group col col-md-6">
              <label for="users">No.of users</label>
              <input type="number" name="editUsers" class="form-control" id="users" value="<?php echo $row['users']; ?>">
          </div>
        </div>
        <div class="row">
          <div class="form-group">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="editFloor" id="ground" value="Ground">
                <label class="form-check-label" for="ground">
                    Ground Floor
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="editFloor" id="first" value="First">
                <label class="form-check-label" for="first">
                    First Floor
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="editFloor" id="second" value="Second">
                <label class="form-check-label" for="second">
                    Second Floor
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="editFloor" id="third" value="Third">
                <label class="form-check-label" for="third">
                    Third Floor
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="editFloor" id="fourth" value="Fourth">
                <label class="form-check-label" for="fourth">
                    Fourth Floor
                </label>
            </div>
          </div>
        </div>
        <div class="form-group">
            <input type="submit" name="edit" class="btn btn-info btn-md" value="UPDATE">
        </div>
        <?php }} ?>
      </form>
    </div>
  </div>
</div>
<?php require './blocks/footer.php'; ?>