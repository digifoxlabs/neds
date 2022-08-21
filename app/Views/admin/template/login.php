<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $this->renderSection("page-title") ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url('assets') ?>/plugins/toastr/toastr.min.css">


  <!-- jQuery -->
  <script src="<?= base_url('assets') ?>/plugins/jquery/jquery.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="<?= base_url('assets') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>

  <!-- Toastr -->
  <script src="<?= base_url('assets') ?>/public/assets/plugins/toastr/toastr.min.js"></script>


</head>
<body class="hold-transition login-page">


    <?= $this->renderSection("content") ?>



<!-- Bootstrap 4 -->
<script src="<?= base_url('assets') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets') ?>/dist/js/adminlte.min.js"></script>

</body>
</html>
