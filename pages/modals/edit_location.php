        <div class="row">
          <div class="col col-md-12">
            <!-- Modal -->
            <div class="modal fade" id="editInventoryModal" tabindex="-1" role="dialog" aria-labelledby="editInventoryModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="transferLocationModalLabel">Edit Inventory</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="inventories.php">
                      <div class="row">
                        <input type="text" name="editID" class="form-control" id="editID" value="" readonly>
                        <div class="form-group col col-md-6">
                            <label for="brand">Brand</label>
                            <input type="text" name="brandEdit" class="form-control" id="brandEdit">
                        </div>
                        <div class="form-group col col-md-6">
                            <label for="serial">Serial</label>
                            <input type="text" name="serialEdit" class="form-control" id="serialEdit">
                        </div>
                      </div>
                      <div class="form-group">
                          <input type="submit" name="edit" class="btn btn-primary btn-md" value="EDIT">
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>