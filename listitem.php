<?php
	require_once "header.php";
	$data = $item->list();
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
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
	<div class="wrapper">
  		<!-- Content Wrapper. Contains page content -->
  		<div class="content-wrapper">
	    	<!-- Main content -->
	   	 	<section class="content">
	      		<div class="row">
	      			<div class="col-md-12">
          				<div class="card card-secondary">
            				<div class="card-header">
              					<h3 class="card-title">
              						All Items
              						<a href="additem.php" class="btn btn-success">Add</a>
              					</h3>
              					<div class="card-tools">
                					<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  					<i class="fas fa-minus"></i></button>
              					</div>
              					<!-- card-tools ends -->
            				</div>
            				<!-- card-header ends -->
            				<div class="card-body">
            					<div class="form-group">
								<!-- test form part -->
              						<form method="post" action="">
             	 						<div class="row">
                							<div class="col-lg-12">
                    							<div id="inputFormRow">
                        							<div class="input-group mb-3">
                            							<table class="table table-bordered">
                            								<tr>
                            									<th>SN</th>
                            									<th>Name</th>
                            									<th>Rate</th>
                            									<th>Quantity</th>
                            									<th>Status</th>
                            									<th>Created By</th>
                            									<th>Action</th>
                            								</tr>
                            								<?php foreach ($data as $sn => $d) {?>
	                            								<tr>
	                            									<td><?php echo $sn+1; ?></td>
	                            									<td><?php echo $d->name; ?></td>
	                            									<td><?php echo $d->rate; ?></td>
	                            									<td><?php echo $d->quantity; ?></td>
	                            									<td>
	                            										<?php if ($d->status == 1) { ?>
	                            											<label class="text text-success">Active</label>
	                            										<?php } else{ ?>
	                            											<label class="text text-danger">Deactive</label>
	                            										<?php } ?>
	                            									<td><?php echo $d->uname; ?></td>
	                            									<td>
	                            										<a href="edititem.php?id=<?php echo $d->id; ?>" class="btn btn-warning">Edit</a>
	                            										<a href="deleteitem.php?id=<?php echo $d->id; ?>" class="btn btn-danger">Delete</a>
	                            									</td>
	                            								</tr>
	                            							<?php } ?>
                            							</table>
                        							</div>
                    							</div>
                							</div>
            							</div>
          							</form>
              					</div>
				            </div>
           	 				<!-- /.card-body -->
          				</div>
          				<!-- /.card -->
        			</div>
	     	 	</div>
	     	 	<!-- row ends -->
	    	</section>
	    	<!-- section content ends -->
  		</div>
  		<!-- content-wrapper ends -->

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
