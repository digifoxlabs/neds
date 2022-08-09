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