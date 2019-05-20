<footer class="footer footer-black">
        <div class="container-fluid">
          <div class="row">
            <div class="credits ml-auto">
              <span class="copyright">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by DELUXAN
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
	<!-- AJAX	-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="../assets/js/core/jquery-3.4.1.js"></script>
  <!--  SELECT2 PLUGIN-->
  <script src='../../select2/dist/js/select2.min.js' type='text/javascript'></script>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
      demo.initChartsPages();
    });
  </script>
  <!-- Datatable start -->
  <script>
    $(document).ready(function() {
      $('#locations').DataTable({
        "columnDefs": [
          {
            "className": "dt-center", 
            "targets": [1, 2, 3, 4, 5]
          }
        ],
        "lengthMenu": [
          [5, 10, -1],
          [5, 10, "All"]
        ]
      });
    });
  </script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <!-- Datatable end -->
  
  
<script type="text/javascript">
  function fetch_select(val) {
    $.ajax({
    type: 'post',
    url: 'fetch_data.php',
    data: {
      get_option: val
    },
    success: function (response) {
      document.getElementById("user").innerHTML=response; 
    }
    });
  }

</script>
</body>

</html>