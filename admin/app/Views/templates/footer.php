<footer class="content-footer footer bg-footer-theme">
        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
          <div class="mb-2 mb-md-0">
            © <span id="currentYear"></span>
            , All Rights Reserved
            <script>
              document.getElementById('currentYear').textContent = new Date().getFullYear();
            </script>
          </div>
        </div>
      </footer>
      <!-- / Footer -->

      <div class="content-backdrop fade"></div>
    </div>
    <!-- / Content wrapper -->
  </div>
  <!-- / Layout wrapper -->

  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>

  <!-- Core JS -->
  <script src="<?php echo base_url(); ?>public/assets/vendor/libs/jquery/jquery.js"></script>
  <script src="<?php echo base_url(); ?>public/assets/vendor/libs/popper/popper.js"></script>
  <script src="<?php echo base_url(); ?>public/assets/vendor/js/bootstrap.js"></script>
  <script src="<?php echo base_url(); ?>public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="<?php echo base_url(); ?>public/assets/vendor/js/menu.js"></script>
  <!--<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js" crossorigin="anonymous"></script>


  <!-- Vendors JS -->
  <script src="<?php echo base_url(); ?>public/assets/vendor/libs/apex-charts/apexcharts.js"></script>

  <!-- Main JS -->
  <script src="<?php echo base_url(); ?>public/assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="<?php echo base_url(); ?>public/assets/js/dashboards-analytics.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="<?php echo base_url(); ?>public/assets/js/custom.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>

  <script>
    $(document).ready(function () {
      $('#example').DataTable();
    });
  </script>
</body>
</html>