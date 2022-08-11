<!-- Logout Modal -->
<div class="modal fade" id="modal-logout">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h4 class="modal-title">Confirm Logout</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Are you sure?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel</button>
                
                <a href="<?php echo base_url('admin/logout') ?>" class="btn btn-outline-light">Logout</a>
<!--              <button type="button" class="btn btn-outline-light">Logout</button>-->
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->




  <!-- Crop Image Modal -->
  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crop Image Before Upload</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <div class="row">
                            <div class="col-md-8">
                                <img src="" id="sample_image" />
                            </div>
                            <div class="col-md-4">
                                <div class="preview"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="crop" class="btn btn-primary">Crop</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>




    <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.2
    </div>
    <strong><?= $footerTitle; ?></strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?= script_tag('public/assets/js/script.js') ?>

<!-- Bootstrap 4 -->
<?= script_tag('public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>

<!-- AdminLTE App -->
<?= script_tag('public/assets/dist/js/adminlte.min.js') ?>

<!-- overlayScrollbars -->
<?= script_tag('public/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>

<!-- AdminLTE for demo purposes -->
<?= script_tag('public/assets/dist/js/demo.js') ?>

<!-- Nanobar -->
<?= script_tag('public/assets/dist/js/nanobar.js') ?>
<script>
	var simplebar = new Nanobar();
			simplebar.go(100);
</script>

<!-- DataTables -->
<script src="<?= base_url("public/assets/plugins/datatables/jquery.dataTables.min.js")  ?>"></script>
<script src="<?= base_url("public/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")  ?>"></script>
<script src="<?= base_url("public/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js")  ?>"></script>
<script src="<?= base_url("public/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")  ?>"></script>

<!--Datatable Button-->

<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>

  </body>
</html>