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
  <!-- Theme style -->
  <link rel="stylesheet" href="cssmain/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <?php include "sidebar.php"; ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  
    

    <!-- Main content -->
    
            <!-- /.row -->
            <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit Home Banner</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Heading</th>
                      <th>Content</th>
                      <th>Image</th>
                      <th>Operation</th>
                    </tr>
                  </thead>
                  <tbody>
                   
                         <?php
                            include_once('connection.php');

                            $a = 1;
                            $stmt = $conn->prepare("SELECT * FROM banner_tbl");
                            $stmt->execute();

                            // Get the result set from the prepared statement
                            $result = $stmt->get_result();

                            // Fetch all rows as an associative array
                            $users = $result->fetch_all(MYSQLI_ASSOC);

                            foreach ($users as $user) {
                            ?>
                    <tr>
                        <td>
                            <?php echo $user['id']; ?>
                        </td>
                        <td>
                            <?php echo $user['heading']; ?>
                        </td>
                        
                        <td>
                            <?php echo $user['content']; ?>
                        </td>

                        <td>
                            <?php echo $user['image']; ?>
                        </td>

                        <td>
                        
                        <a href = "update-form.php?id=<?php echo $user['id']; ?>" class="btn btn-warning btn-sm"> Update </a>
                       
                        <form action="banner_handler.php" method="POST" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                            <button type="submit" name="delete" class="btn btn-danger btn-sm">Delete</button>
                        </form>
        </td>

                        
                    </tr> 
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>


    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="jsmain/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="jsmain/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="jsmain/adminlte.min.js"></script>
</body>
</html>
