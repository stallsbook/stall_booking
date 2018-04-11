<?php
	include("../include/config.php");
	include("../include/session.php");
	$cnn = new connection();
	$user_id = $_SESSION['user_id'];
	$event_id = $_GET['event_id'];
	?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../images/favicon.ico">
		<title>Stall Booking - Shop Collection Payment</title>
		<!-- Bootstrap 4.0-->
		<link rel="stylesheet" href="../assets/vendor_components/bootstrap/dist/css/bootstrap.css">
		<!-- Bootstrap 4.0-->
		<link rel="stylesheet" href="../assets/vendor_components/bootstrap/dist/css/bootstrap-extend.css">
		<!-- font awesome -->
		<link rel="stylesheet" href="../assets/vendor_components/font-awesome/css/font-awesome.css">
		<!-- ionicons -->
		<link rel="stylesheet" href="../assets/vendor_components/Ionicons/css/ionicons.css">
		<link href="../assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.css" rel="stylesheet">
		<!-- theme style -->
		<link rel="stylesheet" href="../css/master_style.css">
		<!-- apro_admin skins. choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
		<link rel="stylesheet" href="../css/skins/_all-skins.css">
		<!-- google font -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
		<!-- toast CSS -->
    
		<script src="../assets/vendor_components/jquery/dist/jquery.js"></script>
		<script src="../assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.js"></script>
    	<script src="../js/pages/toastr.js"></script>
	</head>
	<body class="hold-transition skin-black sidebar-mini">
		<div class="wrapper">
		<!-- header -->
		<?php include("../include/header.php"); ?>
		<!-- End header -->
		<!-- Left side column. contains the logo and sidebar -->
		<?php include("../include/leftbar.php"); ?>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					Shop Payment
					<small>Control panel</small>
				</h1>
				
			</section>
			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-12">
						<div class="box">
							<div class="box-header with-border">
								<h3 class="box-title">Shop Payment</h3>
							</div>
							<div class="box-body">
								<table class="table table-bordered table-responsive">
									<thead>
										<tr>
											<th style="width: 10px">No</th>
											<th>Shop No</th>
											<th>Shopname</th>
											<th>Date</th>
											<th>Amount</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									<?php 
									$selectData = $cnn -> getrows("SELECT *FROM shop_master sm WHERE event_id = '$event_id'");
									$i=1;
									while($getData = mysqli_fetch_array($selectData))
									{	$sender_id = $getData['user_id'];
										$event_id = $getData['event_id'];
										$shop_id = $getData['shop_id'];

										$selectPay = $cnn -> countrow("SELECT *FROM collection_master WHERE event_id='$event_id' AND shop_id='$shop_id'");

									?>
										<tr>
											<td><?php echo $i; ?></td>
											<td><?php echo $getData['single_Shop_no']; ?></td>
											<td><?php echo $getData['shop_name']; ?></td>
											<td><?php echo date('d-m-Y'); ?></td>
											<td>
												<?php if($selectPay > 0)
												{
													$selectPay1 = $cnn -> getrows("SELECT *FROM collection_master WHERE event_id='$event_id' AND shop_id='$shop_id'");
													$getPay = mysqli_fetch_array($selectPay1); ?>
													<input type="text" name="amount" id="amount<?php echo $i; ?>" value="<?php echo $getPay['pay_amount']; ?>"></td>
												<?php } else { ?>
													<input type="text" name="amount" id="amount<?php echo $i; ?>"></td>
												<?php } ?>
											<input type="hidden" name="sender_id" id="sender_id<?php echo $i; ?>" value="<?php echo $sender_id; ?>">
											<input type="hidden" name="event_id" id="event_id<?php echo $i; ?>" value="<?php echo $event_id; ?>">
											<input type="hidden" name="shop_id" id="shop_id<?php echo $i; ?>" value="<?php echo $shop_id; ?>">
	                                        <td>
	                                        	<?php
	                                        	if($selectPay > 0)
	                                        	{ ?>
	                                        		<button name="makePayment" id="makePayment<?php echo $i; ?>" disabled class="btn btn-danger btn-flat tst3" style="font-size: 13px;cursor:none;"> Payment <i class="fa fa-thumbs-up fa-lg mp<?php echo $i; ?>" aria-hidden="true" style="color:darkblue;"></i>
	                                        	</button>
	                                        	<?php }else
	                                        	{ ?>
	                                        		<button name="makePayment" id="makePayment<?php echo $i; ?>" class="btn btn-danger btn-flat tst3" style="font-size: 13px;"> Payment <i class="fa fa-thumbs-down fa-lg mp<?php echo $i; ?>" aria-hidden="true" style="color:darkblue;"></i>
	                                        	</button>
	                                        	<?php } ?>
	                                        	
	                                        <button name="editPayment" id="editPayment<?php echo $i; ?>" class="btn btn-danger btn-flat tst4" style="font-size: 13px;"> Edit <i class="fa fa-edit fa-lg" aria-hidden="true" style="color:darkblue;"></i></button> 
	                                        </td>
										</tr>
								<script type="text/javascript">
									$(document).ready(function(){
										$("#makePayment<?php echo $i; ?>").click(function(){
											var sender_id = $("#sender_id<?php echo $i; ?>").val();
											var event_id = $("#event_id<?php echo $i; ?>").val();
											var shop_id = $("#shop_id<?php echo $i; ?>").val();
											var amount = $("#amount<?php echo $i; ?>").val();
											var done = "done";
											$.ajax({
													url : 'omakeShopPayment.php',
													type : 'POST',
													data :
													{
														sender_id:sender_id,event_id:event_id,shop_id:shop_id,amount:amount,done:done
													},
													success:function(data)
													{
														var data = $.parseJSON(data);
														if(data.success == "success")
														{
															var amountdata = $("#amount<?php echo $i; ?>").val(data.amount);
															
															$("#showtopright").click(function() {
        													$("#alerttopright").fadeToggle(350);
   															});

   															$("i.mp<?php echo $i; ?>").removeClass("fa-thumbs-down");
   															$("i.mp<?php echo $i; ?>").addClass("fa-thumbs-up");
   															
															$("#makePayment<?php echo $i; ?>").prop("disabled",true);
															$("#makePayment<?php echo $i; ?>").css("cursor","none");
														}
														if(data == "error")
														{
															alert("Something Want To Wrong.");	
														}
													}
											});
										});
									});
									$(document).ready(function(){
										$("#editPayment<?php echo $i; ?>").click(function(){
											var sender_id = $("#sender_id<?php echo $i; ?>").val();
											var event_id = $("#event_id<?php echo $i; ?>").val();
											var shop_id = $("#shop_id<?php echo $i; ?>").val();
											var amount = $("#amount<?php echo $i; ?>").val();
											var update = "update";

											$.ajax({
													url : 'omakeShopPayment.php',
													type : 'POST',
													data :
													{
														sender_id:sender_id,event_id:event_id,shop_id:shop_id,amount:amount,update:update
													},
													success:function(data)
													{
														var data = $.parseJSON(data);
														if(data == "success")
														{
															$("#showtopright").click(function() {
        													$("#alerttopright").fadeToggle(350);
   															});
														}
														if(data == "error")
														{
															alert("Something Want To Wrong.");	
														}
													}
											});
										});
									});
								</script>
									<?php $i++; } ?>
									</tbody>
								</table>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->
					</div>
					<!-- /.col -->
			</section>
			</div>
			<!-- /.content -->
			<!-- </div> -->
			<!-- /.content-wrapper -->
			<?php include("../include/footer.php"); ?>
			<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
			<div class="control-sidebar-bg"></div>
		</div>
		<!-- ./wrapper -->
		<!-- jQuery 3 -->
		<!-- <script src="../assets/vendor_components/jquery/dist/jquery.js"></script> -->
		<!-- popper -->
		<script src="../assets/vendor_components/popper/dist/popper.min.js"></script>
		<!-- Bootstrap 4.0-->
		<script src="../assets/vendor_components/bootstrap/dist/js/bootstrap.js"></script>	
		<!-- DataTables -->
		<script src="../assets/vendor_components/datatables.net/js/jquery.dataTables.min.js"></script>
		<script src="../assets/vendor_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
		<!-- Slimscroll -->
		<script src="../assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js"></script>
		<!-- FastClick -->
		<script src="../assets/vendor_components/fastclick/lib/fastclick.js"></script>
		<!-- apro_admin App -->
		<script src="../js/template.js"></script>
		<!-- apro_admin for demo purposes -->
		<script src="../js/demo.js"></script>
		<!-- This is data table -->
		<script src="../assets/vendor_plugins/DataTables-1.10.15/media/js/jquery.dataTables.min.js"></script>
		<!-- start - This is for export functionality only -->
		<script src="../assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/dataTables.buttons.min.js"></script>
		<script src="../assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.flash.min.js"></script>
		<script src="../assets/vendor_plugins/DataTables-1.10.15/ex-js/jszip.min.js"></script>
		<script src="../assets/vendor_plugins/DataTables-1.10.15/ex-js/pdfmake.min.js"></script>
		<script src="../assets/vendor_plugins/DataTables-1.10.15/ex-js/vfs_fonts.js"></script>
		<script src="../assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.html5.min.js"></script>
		<script src="../assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.print.min.js"></script>
		<!-- end - This is for export functionality only -->
		<!-- apro_admin for Data Table -->
		<script src="../js/pages/data-table.js"></script>
	</body>
</html>