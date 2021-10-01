
<?php 
require_once "header.php";
  if (isset($_POST['editRoles'])) {
    $err = [];
    if (isset($_POST['name']) && !empty($_POST['name'])) {
      $roles->set('name',$_POST['name']);
    } else{
      $err['name'] = "Please enter item name";
    }
    

  
    $roles->set('id',$_POST['roles_id']);
    $roles->set('status',$_POST['status']);
    $roles->set('updated_at',date('Y-m-d H:i:s'));
    $roles->set('updated_by',$_SESSION['id']);
    if (count($err)==0) {
      $status = $roles->edit();
    }
  }

  if (isset($_GET['id'])) {
    $roles->set('id',$_GET['id']);
    $data = $roles->getRolesById();
    if (count($data) == 0) {
      header('location:listroles.php');
    }
  } else{
    header('location:listroles.php');
  }

?>
<!DOCTYPE html>
<html>
<head>
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="../plugins/jquery/jquery.min.js"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="dist/css/custom.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">
                Edit Roles
                 <a href="listroles.php" class="btn btn-success">List</a>
              </h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <!-- main item -->
            <div class="card-body">
              <?php if (isset($status) && $status == true){ ?>
                <div class="alert alert-success">Edit Successfully</div>
              <?php  }?>
              <?php if (isset($status) && $status !== true){ ?>
                <div class="alert alert-danger">Edit Failed</div>
              <?php  }?>
              <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?id=<?php echo $_GET['id'] ?>" enctype="multipart/form-data">
                <input type="hidden" name="roles_id" id="roles_id" value="<?php echo $data[0]->id ?>">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?php echo $data[0]->name ?>">
                    <?php if (isset($err['name'])) { ?>
                      <label class="error">
                        <?php echo $err['name']; ?>
                      </label>
                    <?php } ?>
                  </div>
                  <div class="form-group">
                    <label for="status">Status</label>
                    <?php if ($data[0]->status == 1) { ?>
                      <input type="radio" name="status" id="active" value="1" checked>Active
                      <input type="radio" name="status" id="deactive" value="0">De Active
                    <?php } else{?>
                      <input type="radio" name="status" id="active" value="1">Active
                      <input type="radio" name="status" id="deactive" value="0" checked>De Active
                    <?php  }?>
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-success" name="editRoles" id="editRoles">
                  </div>
                </form>
              </div>

            </div>
          </div>
          <!-- /.card -->
        </div>

      </div>
      
    </section>
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
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->

<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>


</body>
</html>
