<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $this->renderSection("page-title") ?></title>
    <!-- Font Awesome -->
    <?=link_tag('public/assets/plugins/fontawesome-free/css/all.min.css')?>   
    <!-- Ionicons -->    
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <?=link_tag('public/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')?>   
    <!-- iCheck -->
    <?=link_tag('public/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')?> 
    <!-- JQVMap -->
    <?=link_tag('public/assets/plugins/jqvmap/jqvmap.min.css')?> 
    <!-- Theme style -->
    <?=link_tag('public/assets/dist/css/adminlte.min.css')?> 
    <!-- overlayScrollbars -->
    <?=link_tag('public/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')?>
    <!-- Daterange picker -->
    <?=link_tag('public/assets/plugins/daterangepicker/daterangepicker.css')?>

  <!-- Toastr -->
  <?=link_tag('public/assets/plugins/toastr/toastr.min.css')?>

    <!-- summernote -->
    <?=link_tag('public/assets/plugins/summernote/summernote-bs4.css')?>
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <?=link_tag('public/assets/css/style.css')?>


<!-- jQuery -->
<?= script_tag('public/assets/plugins/jquery/jquery.min.js') ?>
  <!-- jQuery UI 1.11.4 -->
<?= script_tag('public/assets/plugins/jquery-ui/jquery-ui.min.js') ?>
  <!-- SweetAlert2 -->
  <?= script_tag('public/assets/plugins/sweetalert2/sweetalert2.min.js') ?>
  <!-- Toastr -->
  <?= script_tag('public/assets/plugins/toastr/toastr.min.js') ?>

  </head>

  <body class="hold-transition sidebar-mini layout-fixed">

<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">


    <ul class="navbar-nav">
      <li class="nav-item dropdown">          
        <a class="nav-link" data-toggle="dropdown" href="#">
        <?= session()->get('name') ?> <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Manage User</span>
          <div class="dropdown-divider"></div>
          <a href="<?= base_url("admin/profile"); ?>" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i>Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?= base_url("admin/settings"); ?>" class="dropdown-item">
            <i class="fas fa-users mr-2"></i>Settings
          </a>

          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer" data-toggle="modal" data-target="#modal-logout">Logout</a>
       
        </div>
      </li>
  
    </ul>



    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">   

      <img src=" <?= base_url("public/assets/dist/img/AdminLTELogo.png") ?>"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">

        

          <img src="<?= base_url("public/assets/dist/img/user2-160x160.jpg") ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= session()->get('name') ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->         
         
              <li class="nav-item">
                  <a href="<?= base_url('admin/dashboard') ?>" class="nav-link" id="dashboardMenu">
                      <i class="nav-icon fas fa-tachometer-alt"></i>
                      <p>Dashboard</p>
                  </a>
              </li>

          <li class="nav-item">
            <a href="../widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Widgets
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Layout Options
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../layout/top-nav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Top Navigation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../layout/top-nav-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Top Navigation + Sidebar</p>
                </a>
              </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>



    <?= $this->renderSection("content") ?>

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
    <strong>Copyright &copy; 2022 <a href="#">AdminLTE.io</a>.</strong> All rights
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

  </body>
</html>