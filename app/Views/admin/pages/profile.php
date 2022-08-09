<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Profile Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">


    <?php
    $session = session(); ?>
    
    <script type="text/javascript">
            <?php if($session->getFlashdata('success')): ?>
            toastr.success('<?php echo $session->getFlashdata('success'); ?>')
            <?php elseif($session->getFlashdata('error')): ?>
            toastr.warning('<?php echo $session->getFlashdata('error'); ?>')
            <?php endif; ?>
            </script>  




      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Profile Page</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
       
          </div>
        </div>
        <div class="card-body">

        <?php if (isset($validation)) : ?>
                    <div class="col-12">
                        <div class="alert alert-danger" role="alert">
                            <?= $validation->listErrors() ?>
                        </div>
                    </div>
                <?php endif; ?>


        <form role="form" action="<?php echo base_url('admin/profile') ?>" method="post">
                    <div class="card-body">                        
                        
                    <div class="row">                        
   
                             
                        <div class="col-sm-4">
                                                         
                            <div class="form-group">
                                <label for="group_name">Login ID</label>
                                <input type="text" class="form-control" id="email" name="email" autocomplete="off" value="<?php echo $profiledetails['email']; ?>" readonly>
                            </div>
                        </div>
                       
                        <div class="col-sm-4">
                                                         
                            <div class="form-group">
                                <label for="group_name">Display Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" autocomplete="off" value="<?php echo $profiledetails['name']; ?>" required>
                            </div>
                        </div>
                    </div>                    
             
              
                        <div class="row">
                            <div class="col-sm-4">

                                <div class="form-group input-group-sm">
                                    <label for="password">New Password</label>
                                    <input type="text" class="form-control" id="password" name="password" placeholder="Password" value="<?= set_value('password'); ?>" autocomplete="off">
                                    <p class="text-red">Leave the Password field Empty if you do not want to update it</p>
                                </div>                             

                            </div>                        
                      
                        </div>                   
    
                        <button type="submit" name="create" class="btn btn-success">UPDTAE</button>

                    </div>
                </form>


        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
