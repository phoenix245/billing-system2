
<?php 
  require_once "header.php";
  require_once "object.php";
  if (isset($_POST['addVat'])) {
    $err = [];
   if (isset($_POST['vatamt']) && !empty($_POST['vatamt'])) {
      if (preg_match("/^([0-9])$/",$_POST['vatamt'])){ 
      $item->set('vatamt',$_POST['vatamt']);

    }else{
      $err['vatamt']="Invalid name format";
    }
     }else{
      $err['vatamt'] = "Please enter amount";
    }
    
    
    $id = ($_SESSION['id']);
    $vatamt->set('status',$_POST['status']);
    $vatamt->set('created_at',date('Y-m-d H:i:s'));
    $vatamt->set('created_by',$_SESSION['id']);
    if (count($err)==0) {
      $status = $vatamt->create();
    }
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
                Add Vat
                <a href="listvat.php" class="btn btn-success">List</a>
              </h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <!-- main item -->
            <div class="card-body">
              <?php if (isset($status) && $status == true){ ?>
                <div class="alert alert-success">Insert Successfully</div>
              <?php  }?>
              <?php if (isset($status) && $status !== true){ ?>
                <div class="alert alert-danger">Insert Failed</div>
              <?php  }?>
              <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="name">Vatamt</label>
                    <input type="text" name="vatamt" id="vatamt" class="form-control">
                    <?php if (isset($err['vatamt'])) { ?>
                      <label class="error">
                        <?php echo $err['vatamt']; ?>
                      </label>
                    <?php } ?>
                  </div>
                  
                  <div class="form-group">
                    <input type="submit" class="btn btn-success" name="addVat" id="addVat">
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
