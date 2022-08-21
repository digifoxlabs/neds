<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- Admin Section -->

    <?php if(session()->get('user_type') == 'admin') { ?>

      <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $totalCustomers; ?></h3>
                <p>Customers</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?= base_url('admin/customers'); ?>" class="small-box-footer">Manage <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= "0"; ?></h3>
                <p>Payment Due</p>
              </div>
              <div class="icon">
               <i class="fas fa-battery-full"></i>
              </div>
              <a href="#" class="small-box-footer">Manage <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $coordinators; ?></h3>
                <p>District Coordinators</p>
              </div>
              <div class="icon">
              <i class="fas fa-border-style"></i>
              </div>
              <a href="<?= base_url('admin/district'); ?>" class="small-box-footer">Manage <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $operators; ?></h3>

                <p>Operators</p>
              </div>
              <div class="icon">
              <i class="fas fa-parachute-box"></i>
              </div>
              <a href="<?= base_url('admin/operator'); ?>" class="small-box-footer">Manage <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

        </div>
      <?php } ?>

      <!-- .End Admin Section -->



      <!-- Coordinator Section -->


     <?php  if(session()->get('user_type') == 'coordinator') {  ?>

      <div class="row">

      <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $operators; ?></h3>

                <p>Operators</p>
              </div>
              <div class="icon">
              <i class="fas fa-parachute-box"></i>
              </div>
              <a href="<?= base_url('admin/operator'); ?>" class="small-box-footer">Manage <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= "0"; ?></h3>
                <p>Payment Due</p>
              </div>
              <div class="icon">
               <i class="fas fa-battery-full"></i>
              </div>
              <a href="#" class="small-box-footer">Manage <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

      </div>
     <?php }  ?>

     <!-- . End Coordinator Section -->

     <!-- Operator Section -->


     <?php  if(session()->get('user_type') == 'operator') {  ?>

      <div class="row">

      <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $totalCustomers; ?></h3>
                <p>Customers</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?= base_url('admin/customers/'.session()->get('id')); ?>" class="small-box-footer">Manage <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= "0"; ?></h3>
                <p>Payment Due</p>
              </div>
              <div class="icon">
              <i class="fas fa-battery-full"></i>
              </div>
              <a href="#" class="small-box-footer">Manage <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

      </div>
      <?php }  ?>


    <!-- ./ End Operator Section -->





    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <script>
$(document).ready(function() {

    //$("#utilityTree").addClass('menu-open');
    $("#dashboardMenu").addClass('active');
    //$("#utilitySubMenuCommission").addClass('active');


});
</script>