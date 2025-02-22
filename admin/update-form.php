
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
  <title>AdminLTE 3 | Dashboard</title>

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

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

    <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
       Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
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
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
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
                <h3 class="card-title">Update Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <?php 
               $id = $_GET['id'];
               $fetch_query = "SELECT * FROM banner_tbl WHERE id='$id'";
               $result = mysqli_query($conn,$fetch_query);

               if(mysqli_num_rows($result)>0) {
                   foreach($result as $row){
                    ?>
<form action = "banner_handler.php" method="POST" enctype = "multipart/form-data">

<div class="card-body">
  <div class="form-group">
    <input type="hidden" class="form-control" name="id" value="<?php echo $row['id']?>">
  </div>

<div class="card-body">
  <div class="form-group">
    <label for="">Banner Heading</label>
    <input type="text" class="form-control" name="heading" value="<?php echo $row['heading']?>" placeholder="Banner Heading">
  </div>

  <div class="form-group">
    <label for="">Content</label>
    <input type="text" class="form-control" name="content"  value="<?php echo $row['content']?>" placeholder="Content">
  </div>

  <div class="form-group">
    <label for="">File input</label>
    
      <div class="custom-file">
        <label class="custom-file-label" for=""> Choose File </label>
        <input type="file" class="custom-file-input" name="image">
        <input type="hidden" name="old_image" value="<?php echo $row['image']?>" >
        
      </div>
      
  </div>

  <div class="card-footer">
<button type="submit" class="btn btn-primary" name="update">Submit</button>
</div>


</div>
<!-- /.card-body -->

</form>
                    <?php 
                   }
               }

               else {
                echo "no data found";
               }
               ?>
          
            </div>
            <!-- /.card -->

            <!-- general form elements -->
           
            




    <!-- /.content -->

    
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
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
