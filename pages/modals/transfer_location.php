<div class="row">
          <div class="col col-md-12">
            <!-- Modal -->
            <div class="modal fade" id="transferLocationModal" tabindex="-1" role="dialog" aria-labelledby="transferLocationModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="transferLocationModalLabel">Transfer Inventory</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="#">
                      <input type="hidden" name="inventoryID" id="inventoryID" value="" />
                      <?php
                        if(isset($_POST[inventoryID])) {
                          $inventoryID = $_POST[inventoryID];
                        } else {
                          $inventoryID = 0;
                        }
                        $selectInventoryByID = "SELECT 
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
                        ON `users`.`location_id` = `locations`.`location_id`
                        WHERE `inventories`.`inventory_id` = '$inventoryID'";
                        $selectInventoryResultByID = $conn->query($selectInventoryByID);
                        $parentRow = $selectInventoryResultByID->fetch_assoc();
                      ?>
                      <div class="row">
                        <div class="col col-md-6">
                          <label for="location">Location To</label>
                          <select class="form-control" name="transferLocation" id="transferLocation" onchange="fetch_select(this.value);">
                            <?php
                              if($selectLocationResultForTransfer->num_rows > 0) { 
                              while($row = $selectLocationResultForTransfer->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $row['location_id']; ?>"><?php echo $row['location_name']; ?></option>
                            <?php }} ?>
                          </select>
                        </div>
                        <div class="col col-md-6">
                          <label for="location">User To</label>
                          <select class="form-control" name="transferUser" id="transferUser">
                            <!-- Data is loading from "fetch_data.php" -->
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                          <input type="submit" name="transfer" class="btn btn-primary btn-md" value="TRANSFER">
                      </div>
                      <?php
                        if(isset($_POST['transfer'])) {
                          $inventoryID = 
                          $location = $_POST['transferLocation'];
                          $user = $_POST['transferUser'];
                        }
                        $inventoryTransfer = "UPDATE inventories SET location_id = '$location', user_id = '$user' WHERE inventory_id = '$inventoryID'";
                        $inventoryTransferResult = $conn->query($inventoryTransfer);
                      ?>
                  </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>