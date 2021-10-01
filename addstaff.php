<?php 
  require_once "header.php";
  require_once "object.php";
  if (isset($_POST['addItem'])) {
    $err = [];
    if (isset($_POST['name']) && !empty($_POST['name'])) {
      if (preg_match("/^[a-zA-Z-' ]*$/",$_POST['name'])){ 
      $staff->set('name',$_POST['name']);

    }else{
      $err['name']="Invalid name format";
    }
     }else{
      $err['name'] = "Please enter staff name";
    }
    if (isset($_POST['email']) && !empty($_POST['email'])) {
      if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
      $staff->set('email',$_POST['email']);
    }else{
      $err['email'] = "Invalid Email Format";
    }  }
    else{
      $err['email'] = "Please Enter Staff Email";
    }
    if (isset($_POST['address']) && !empty($_POST['address'])) {
      if (preg_match("/^[A-Za-z0-9\-\\,.]*$/",$_POST['address'])){
      $staff->set('address',$_POST['address']);
    }else{
     $err['address'] = "Invalid Address Format"; 
    } }
    else{
      $err['address'] = "Please enter staff address";
    }
    if (isset($_POST['phone']) && !empty($_POST['phone'])) {
      if (preg_match("/^(98)([0-9]{8})$/", $_POST['phone'])) {
        $staff->set('phone',$_POST['phone']);     
      } else{
      $err['phone'] = "Invalid Phone Format";          
      }
    } else{
      $err['phone'] = "Please Enter Staff Phone";
    }
  
    $id = ($_SESSION['id']);
    $staff->set('status',$_POST['status']);
    $staff->set('created_at',date('Y-m-d H:i:s'));
    $staff->set('created_by',$_SESSION['id']);
    if (count($err)==0) {
      $status = $staff->create();
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
                Add Staff
                <a href="liststaff.php" class="btn btn-success">List</a>
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
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?php echo isset($_POST["name"]) ? $_POST["name"] : ''; ?>">
                    <?php if (isset($err['name'])) { ?>
                      <label class="error">
                        <?php echo $err['name']; ?>
                      </label>
                    <?php } ?>
                  </div>
                  <div class="form-group">
                    <label for="rate">Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>">
                    <?php if (isset($err['email'])) { ?>
                      <label class="error">
                        <?php echo $err['email']; ?>
                      </label>
                    <?php } ?>
                  </div>
                  <div class="form-group">
                    <label for="quantity">Address</label>
                    <input type="text" name="address" id="address" class="form-control" value="<?php echo isset($_POST["address"]) ? $_POST["address"] : ''; ?>">

                    <?php if (isset($err['address'])) { ?>
                      <label class="error">
                        <?php echo $err['address']; ?>
                      </label>
                    <?php } ?>
                  </div>
                 
                   <div class="form-group">
                    <label for="quantity">Phone</label>
                    <input type="number" name="phone" id="phone" class="form-control"value="<?php echo isset($_POST["phone"]) ? $_POST["phone"] : ''; ?>">
                    <?php if (isset($err['phone'])) { ?>
                      <label class="error">
                        <?php echo $err['phone']; ?>
                      </label>
                    <?php } ?>
                  </div>
                   <div class="form-group">
                    <label for="quantity">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                    <?php if (isset($err['image'])) { ?>
                      <label class="error">
                        <?php echo $err['image']; ?>
                      </label>
                    <?php } ?>
                  </div>
                  <div class="form-group">
                    <label for="status">Status</label>
                    <input type="radio" name="status" id="active" value="1">Active
                    <input type="radio" name="status" id="deactive" value="0" checked>De Active
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-success" name="addItem" id="addItem">
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

<!-- <script type="text/javascript">
        // add row
        $("#addRow").click(function () {
            var html = '';
            html += '<div id="inputFormRow">';
            html += '<div class="input-group mb-3">';
            html += '<table id="dynamic">';

            html += '<input type="checkbox" name="title2[]" autocomplete="off">';
            html += '<input type="text" name="title[]" class="form-control" placeholder="Enter quantity"autocomplete="off">';
            html += '<input type="text" name="title[]" class="form-control" placeholder="Price"autocomplete="off">';

            html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
            html += '</div>';
            html += '</div>';

            $('#newRow').append(html);
        });

        // remove row
        $(document).on('click', '#removeRow', function () {
            $(this).closest('#inputFormRow').remove();
        });
    </script> -->
</body>
</html>
