<?php require 'assets/connection.php' ?>
<?php
//TOTAL PC
$pc = mysqli_query($conn, "SELECT * FROM inventories WHERE 
  device = 'All in one PC' || 
  device = 'CPU' || 
  device = 'Server PC'");
$pcCount = mysqli_num_rows($pc);

//TOTAL UPS
$laptop = mysqli_query($conn, "SELECT * FROM inventories WHERE device = 'Laptop'");
$laptopCount = mysqli_num_rows($laptop);
  
//TOTAL LOCATIONS
$location = mysqli_query($conn, "SELECT * FROM locations");
$locationCount = mysqli_num_rows($location);

//TOTAL USERS
$users = mysqli_query($conn, "SELECT * FROM users");
$usersCount = mysqli_num_rows($users);


//DATA FOR CHART
$dataPoints = array( 
	array("label"=>"PC", "symbol" => "pc","y"=>"$pcCount"),
	array("label"=>"UPS", "symbol" => "ups","y"=>"$laptopCount"), 
)
  
?>
<?php require './blocks/nav.php'; ?>
      <div class="content">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-tv-2 text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">PC</p>
                      <p class="card-title"><?php echo $pcCount; ?>
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <!-- <i class="fa fa-refresh"></i> --> Updated on <span class="text-warning"><strong>18-05-2019</strong></span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-laptop text-primary"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">LAPTOP</p>
                      <p class="card-title"><?php echo $laptopCount; ?>
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <!-- <i class="fa fa-refresh"></i> --> Updated on <span class="text-primary"><strong>18-05-2019</strong></span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-pin-3 text-success"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">LOCATIONS</p>
                      <p class="card-title"> <?php echo $locationCount; ?>
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <!-- <i class="fa fa-refresh"></i> --> Updated on <span class="text-success"><strong>18-05-2019</strong></span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-single-02 text-danger"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">USERS</p>
                      <p class="card-title"> <?php echo $usersCount; ?>
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <!-- <i class="fa fa-refresh"></i> --> Updated on <span class="text-danger"><strong>18-05-2019</strong></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col col-md-6">
            <div id="chartContainer" style="width: 100%; height: 300px;"></div>
          </div>
        </div>
			</div>
<?php require './blocks/footer.php'; ?>     