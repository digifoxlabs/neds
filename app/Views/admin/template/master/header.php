<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $pageTitle; ?></title>
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
    <?=link_tag('public/assets/dist/css/adminlte.css')?> 
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


     <!-- DataTables -->
     <?=link_tag('public/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')?>

     <?=link_tag('public/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')?>


<!-- jQuery -->
<?= script_tag('public/assets/plugins/jquery/jquery.min.js') ?>
  <!-- jQuery UI 1.11.4 -->
<?= script_tag('public/assets/plugins/jquery-ui/jquery-ui.min.js') ?>
  <!-- SweetAlert2 -->
  <?= script_tag('public/assets/plugins/sweetalert2/sweetalert2.min.js') ?>
  <!-- Toastr -->
  <?= script_tag('public/assets/plugins/toastr/toastr.min.js') ?>

  <style> 
       
       .nanobar .bar {
        background: #38f;
        border-radius: 4px;
        box-shadow: 0 0 10px #59d;
        height: 6px;
        margin: 0 auto;
      }
    
    </style> 

  </head>