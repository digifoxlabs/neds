<?= $this->extend("admin/template/login") ?>

<?= $this->section("page-title") ?>
    <?= $pageTitle; ?>
<?= $this->endSection() ?>

<?= $this->section("content") ?>

            <div class="login-box">
            <div class="login-logo">
                <a href="#"><b>Admin</b>NEDS</a>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                <p class="login-box-msg">NEDEGITAL SERVICE</p>

                <?php if (isset($validation)) : ?>
                    <div class="col-12">
                        <div class="alert alert-danger" role="alert">
                            <?= $validation->listErrors() ?>
                        </div>
                    </div>
                <?php endif; ?>


                <form action="<?= base_url('admin/login'); ?>" method="post">

                    <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" placeholder="User ID">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    </div>

                    <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    </div>

                    <div class="row m-2">

                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>

                    </div>
        
                    
                </form>

                </div>
                <!-- /.login-card-body -->

         


            </div>
            </div>
            <!-- /.login-box -->

<?= $this->endSection() ?>