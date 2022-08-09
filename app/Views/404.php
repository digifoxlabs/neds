<?= $this->extend("admin/template/login") ?>

<?= $this->section("page-title") ?>
    <?= 'Page Not Found'; ?>
<?= $this->endSection() ?>

<?= $this->section("content") ?>

               <!-- Main content -->
    <section class="content">
      <div class="error-page">
        <h2 class="headline text-warning"> 404</h2>

        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>

          <p>
            We could not find the page you were looking for.
            Meanwhile, you may <a href="">return to dashboard</a> or try using the search form.
          </p>

          <div class="row m-2">

                <a href="<?= base_url(); ?>" class="btn btn-primary btn-block">Home</a>

                  
            </div>

        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?= $this->endSection() ?>