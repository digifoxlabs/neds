<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">   

      <img src=" <?= base_url("public/assets/dist/img/AdminLTELogo.png") ?>"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><?= $siteTitle; ?></span>
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

              <li class="nav-item has-treeview" id="customerTree">
                    <a href="#" class="nav-link" id="customerMenu">
                        <i class="nav-icon fab fa-product-hunt"></i>
                        <p>
                            Customers
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="<?= base_url('admin/customers/new'); ?>" class="nav-link" id="customerSubMenuAdd">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add New</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('admin/customers'); ?>" class="nav-link" id="customerSubMenuManage">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage</p>
                            </a>
                        </li>


                    </ul>
                </li>

          <li class="nav-header">Settings</li>
            <li class="nav-item">
            <a href="<?= base_url('admin/settings') ?>" class="nav-link">
             <i class="nav-icon fas fa-cogs"></i>
              <p>Software Settings</p>
            </a>

          </li>


          <!-- <li class="nav-item">
            <a href=""  class="nav-link">           
             <i class="nav-icon fa fa-users" aria-hidden="true"></i>
              <p>User Roles</p>
            </a>
          </li>  -->

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
