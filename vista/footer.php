<!--   Core JS Files   -->
<footer class="footer py-4  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script type="text/javascript" src="public/js/script.js"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="public/assets/js/core/popper.min.js"></script>
    <script src="public/assets/js/core/bootstrap.min.js"></script>
    <script src="public/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="public/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="public/assets/js/plugins/chartjs.min.js"></script>
    </script>
    <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="public/assets/js/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>