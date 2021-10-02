
<?php 
require_once "header.php";
require_once "object.php";

$data = $item->listItems();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Invoice Page</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/demo.css">

	
	 <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Custom Css -->
  <link rel="stylesheet" type="text/css" href="dist/css/invoice.css">
  <script type="text/javascript" src="../javascript/preview.js"></script>
  <style type="text/css">
        /*if you want to remove some content in print display then use .no_print class on it */
        @media print {
            #datatable_wrapper .row:first-child {display:none;}
            #datatable_wrapper .row:last-child {display:none;}
            .no_print {display:none;}
        }
    </style>
  <link rel="stylesheet" type="text/css" href="../css/Preview.css" />
</head>
</head>
<body>
	

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Home Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Info</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
   <div class="container">
		<div class="card-header">
			<div class="header">
				<h1><img src="assets/image/bakery2.jpg" width="120" height="100">BILLING SYSTEMS</h1>
				<hr size="5" color="gray">
			</div>
		</div>
	</div>
	<div class="content">
      	<div class="container-fluid">
        	<div class="row">
          		<div class="col-lg-4">
	            	<div class="card">
	            		<div class="customer-detail">
	            		  <form action="insert.php" method="post">
							<h2>Customer Details</h2>
							<label>Table.No</label>
							<input type="text" name="table_no" id="table_no" class="form-control">
							<label>Name</label>
							<input type="text" class="form-control" name="cname"id="cname">
							<label>Address</label>
							<input type="text" class="form-control" name="caddress" id="caddress">
							<label>Age</label>
							<input type="text" class="form-control" name="cage" id="cage">
							<label>Gender</label>
						 <input type="radio" name="cgender" id="male" value="male">Male 
				         <input type="radio" name="cgender" id="female" value="female">Female
				           <input type="radio" name="cgender" id="other"value="other">Other
				           <br>
							<label>Phone.No</label>
							<input type="text" class="form-control"name="phone_num" id="phone_num">
							<button class="btn btn-primary" name="submit" id="submit">submit</button>

                          </form>

						</div>
	            	</div>
        		</div>
        		<div class="col-lg-4">
	            	<div class="card" id="card">
	            		<div class="card bodyorder-detail">
							<h2>Order Details</h2>
							<div class="divscroll" id="divscroll">

									<table class="dynamic" id="dynamic" name="dynamic"  value ="hhh">
									
									<?php foreach ($data as $sn => $d) {?>
									<tr>
										<td>
											<input type="checkbox" name="items" id="items" autocomplete="off" >
										</td>
										<td>
											<label><?php echo $d->name ?></label>
										</td>
										<td>
											<div class="data">
											<input type="text" class="form-control" name="quantity"  id="quantity" placeholder="Enter quantity"  autocomplete="off" >

									  		<input type="text"name="rate" id="rate" class="form-control rate"  value="<?php echo $d->rate ?>"  autocomplete="off" readonly>
									  		</div>
										</td>
									</tr>
									<?php } ?>
									
									
									
							
								
									</table>
							</div>
						<label><b><u>Total Cost</u></b></label>
                        <label>Subtotal</label>
					    <input type="text" class="form-control">
					    <label for="subtotal">VAT</label>
					    <input type="text" class="form-control">
					    <button class="btn btn-primary" name="findTotal" id="findTotal"  id="findTotal" />Total</button>
					    <input type="text" class="form-control"  placeholder="Total Amount">
					    <button class="btn btn-primary" type="reset">Reset</button>
					
					  </div>	
					</div>
	            </div>
        		<div class="col-lg-4">
	            	<div class="card">
	            		<div class="receipt">
							
							<table><!--HTML CODE FOR PREVEW     -->

								<tr>
								<div>
                                      <h2>Receipt</h2>
                                      		 <table class="tble" id="printarea">

					         <tr>

					            <td>

					              CLOUD COFFEE SHOP
								
								</td>
								
								</tr>

					        <tr>

					            <td>

					                Radhe Radhe,Madhyapur Thimi

					            </td>
					        </tr>

					        <tr>

					            <td>

					              PHONE NO: 9810002222

					            </td>

					        </tr>

					        

					    </table>

									
								</div>
								</tr>

								
								<tr>
									<th>
										<label>Cash Settlement</label>
									</th>
									<td>	
					                 <input type="checkbox" name="cashreceived" class="cashreceived">
									 </td>
								</tr>
								<tr>
									<th>
									<label>Remarks</label>	
									</th>
									<td>
										
									<textarea style="resize:none;" cols="30px"rows="3px" name="remarks" class="textarea"> </textarea>	
									</td>
								</tr>
							    <tr>
							    	<td>
						              <input type="button" id="printBtn" value="Print" class="btn btn-primary"/>	
						              <!-- onclick="window.print()" -->
							    	</td>
							    </tr>
							
							
							
							</table>
						</div>	
	            	</div>
        		</div>
    		</div>
		</div>
	</div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="dist/js/demo.js"></script>(
<script src="dist/js/pages/dashboard3.js"></script>
<script type="text/javascript">

	$(function() {

            $("#printBtn").on('click', function() {

                $.print("#printable");

            });

        });


	$(function () {
        $("#findTotal").click(function () {
            //Reference the CheckBoxes and determine Total Count of checked CheckBoxes.
            $total = 0;
            var checked = $("#dynamic input[type=checkbox]:checked").length;
           	for (var i = 0; i< checked ;i++){ 
           		var data = $(this).closest("div.data").find("input[name='quantity']").val();
      //      		var row = $(this).closest(".data");
  				// var quantity = row.find("#quantity").value;
  				alert(data);
				var coffeeQuantity = document.getElementById("quantity").value;
				alert(coffeeQuantity);
   				var coffeeRate = document.getElementById("rate").value;
				var coffeeAmt=(coffeeRate*coffeeQuantity);
			} //loop ends
        });
    }); //functionn ends


	// function calculate(){
		
		
	// 	var checked=0;
	// 	var sum=0;

	// 		$("input[type=checkbox][id='items']").each(function(){
 //   			if  (this.checked){
 //   				alert(input[type=checkbox][id='items']);
 //   				for (var i = 0; i<items.length;i++){
 //   					alert(items);
	// 			var coffeeQuantity = document.getElementById("quantity").value;
 //   				var coffeeRate = document.getElementById("rate").value;
	// 			var coffeeAmt=(coffeeRate*coffeeQuantity);
	// 			}
 //  			alert(coffeeAmt);
 //   			}
   			
	// 		})
	// }


		// var coffeeRate = document.getElementById("rate").value;
		// var coffeeQuantity = document.getElementById("quantity").value;
		// var coffeeAmt=rate*quantity;
		// alert(coffeeAmt);


		// var checkbox = table.getElementsById("input");
		// for (var i = 0; i<checkbox.length;i++) {
		// 	if(checkbox[i].checked){
		// 		alert("Hello");
		// 	}
		
		
    //   var remember = document.getElementById('dynamic');
    // if (remember.checked){
    //     alert("checked") ;
    // }else{
    //     alert("You didn't check it! Let me check it for you.")
    // }
    	// var checkboxes = document.querySelectorAll('input[name="'+item_name+'"]:checked'), values = [];
    	// Array.protoype.forEach.call(checkboxes,function(e1){
    	// 	values.push(e1.value);
    	// });
    	// alert(checkboxes);



		//alert('Hello');
		// check 'checked == true' 
		//if true calculate with price
		//set value of subtotal, VAT and total amount
		//end
	// }

// 	function calculate() {
//     var total = 0;
//     for (i=1; i<=total_items; i++) {
         
//         itemID = document.getElementById("qnt_"+i);
//         if (typeof itemID === 'undefined' || itemID === null) {
//             alert("No such item - " + "qnt_"+i);
//         } else {
//             total = total + parseInt(itemID.value) * parseInt(itemID.getAttribute("data-price"));
//         }
         
//     }
//     document.getElementById("ItemsTotal").innerHTML = "$" + total;
     
// }
</script>
</body>
</html>