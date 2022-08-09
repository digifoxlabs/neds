 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Settings</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Settings Page</li>
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
          <h3 class="card-title">Settings Page</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
       
          </div>
        </div>
        <div class="card-body">


        <div class="row">
   
                <div class="col-sm-6 col-md-4">
                    <!-- Horizontal Form -->
                    <div class="card card-primary">
                        <div class="card-header bg-lightblue">
                            <h3 class="card-title">SITE TITLE</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" method="POST" action="">

                            <div class="card-body">                    
                            <?php if ($session->getFlashdata('siteTitle')) { ?>
                                <div class="alert alert-info"><?= $session->getFlashdata('siteTitle') ?></div>
                            <?php } ?>

                                <div class="form-group">
                                <label for="siteTitle">Site Title</label>
                        
                                <input type="text" class="form-control" id="siteTitle" name="siteTitle" value="<?= $site_title; ?>" >
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-default float-right">Save</button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                    <!-- /.card -->
                </div>

               <div class="col-sm-6 col-md-4">
                    <!-- Horizontal Form -->
                    <div class="card card-primary">
                        <div class="card-header bg-lightblue">
                            <h3 class="card-title">SITE FOOTER</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form class="form-horizontal" method="POST" action="">

                            <div class="card-body">                    
                            <?php if ($session->getFlashdata('siteFooter')) { ?>
                                <div class="alert alert-info"><?= $session->getFlashdata('siteFooter') ?></div>
                            <?php } ?>

                                <div class="form-group">
                                <label for="siteTitle">Site Title</label>
                        
                                <input type="text" class="form-control" id="siteTitle" name="siteFooter" value="<?= $site_footer; ?>" >
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-default float-right">Save</button>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                    <!-- /.card -->             

               </div>
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