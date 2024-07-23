<?php
include "connection.php";
session_start();
if(isset($_SESSION['full_name']) && !empty($_SESSION['full_name'])){

} 
else {
  header("Location: login.php");
  exit();
}
?>

<?php
$currentPage = 'banners'; // current page is about, do the same for other page
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="cssmain/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="cssmain/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck --> 
  <link rel="stylesheet" href="cssmain/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="cssmain/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="cssmain/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="cssmain/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="cssmain/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="cssmain/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
      <li class="nav-item -none d-sm-inline-block">
    <a class="nav-link" href="logout.php" > Logout </a>
  </li>
    </ul>    
  </nav>
  <!-- /.navbar -->
<?php include "sidebar.php"; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Navigation</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action = "banner_handler.php" method="POST" enctype = "multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Banner Heading</label>
                    <input type="text" class="form-control" name="heading" placeholder="Banner Heading">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Content</label>
                    <input type="text" class="form-control" name="content" placeholder="Content">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      
                    </div>
                  </div>

                  <div class="card-footer">
                <button type="submit" class="btn btn-primary" name="navigate">Submit</button>
                </div>

                
                </div>
                <!-- /.card-body -->

              </form>
            </div>
            <!-- /.card -->

            <!-- general form elements -->

  <!-- Control Sidebar -->
  <!-- <aside class="control-sidebar control-sidebar-dark">
  </aside> -->
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="jsmain/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="jsmain/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="jsmain/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="jsmain/Chart.min.js"></script>
<!-- Sparkline -->
<script src="jsmain/sparkline.js"></script>
<!-- JQVMap -->
<script src="jsmain/jquery.vmap.min.js"></script>
<script src="jsmain/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="jsmain/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="jsmain/moment.min.js"></script>
<script src="jsmain/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="jsmain/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="jsmain/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="jsmain/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="jsmain/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="jsmain/dashboard.js"></script>
</body>
</html>
