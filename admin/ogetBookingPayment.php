<?php
	include("../include/config.php");
	include("../include/session.php");
	$cnn = new connection();
	
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
		<title>StallsBook - View Venders</title>
		<!-- Bootstrap 4.0-->
		<link rel="stylesheet" href="../assets/vendor_components/bootstrap/dist/css/bootstrap.css">
		<!-- Bootstrap 4.0-->
		<link rel="stylesheet" href="../assets/vendor_components/bootstrap/dist/css/bootstrap-extend.css">
		<!-- font awesome -->
		<link rel="stylesheet" href="../assets/vendor_components/font-awesome/css/font-awesome.css">
		<!-- ionicons -->
		<link rel="stylesheet" href="../assets/vendor_components/Ionicons/css/ionicons.css">
		<!-- theme style -->
		<link rel="stylesheet" href="../css/master_style.css">
		<!-- apro_admin skins. choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
		<link rel="stylesheet" href="../css/skins/_all-skins.css">
		<!-- google font -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
		
		<script src="../assets/vendor_components/jquery/dist/jquery.js"></script>
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
						Payment
						<small>Control panel</small>
					</h1>
					
				</section>
				<!-- Main content -->
				<section class="content">
				
				<!-- Small boxes (Stat box) -->
				<div class="row">
					<div class="col-12">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Payment And Refunds</h3>
								<!--<a href="ogetRefundPayment.php?event_id=<?php echo $event_id; ?>" class="btn btn-danger" style="float:right;">Refund Payment</a>-->
								<button  class="btn btn-danger" data-toggle="modal" data-target="#myModal1" style="float:right;">Refund Payment</button>
								<h6 class="box-subtitle"></h6>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
									<thead>
										<tr>
											<th>No</th>
											<!--<th>Event Name</th>-->
											<th>Vendor Name</th>
											<th>Pay Amount</th>
											<th>Remain Amount</th>
											<!--<th>Comment</th>-->
											<!--<th>Refund Amount</th>-->
						                                        <th>Action</th>
										</tr>
									</thead>
									<tbody>
									<?php
									$selectData1 = $cnn->getRows("SELECT distinct bpm.sender_id FROM booking_payment_master bpm,event_master em WHERE em.event_id=bpm.event_id AND  em.event_id='$event_id'");
									$i=1;
	while($getData1 = mysqli_fetch_array($selectData1))
	{
	$sender_id = $getData1['sender_id'];
	//$book_id = $getData1['book_id'];
									
									
									$selectData = $cnn->getrows("SELECT  DISTINCT um.first_name,um.last_name,bm.shop_no,bm.shop_name,em.event_name,em.event_id,em.stall_charge,um.user_id,bpm.sender_id,sum(bpm.book_amount) as book_amount1,bm.book_id,bpm.comment FROM booking_payment_master bpm, user_master um,event_master em,booking_master bm WHERE bpm.book_id=bm.book_id AND bpm.sender_id=um.user_id AND bpm.event_id=em.event_id AND bpm.sender_id='$sender_id' AND bpm.event_id='$event_id' AND bpm.payment_status='1'");
									$a=1;
									while($getData = mysqli_fetch_array($selectData))
									{
									$event_id = $getData['event_id'];
									$sender_id = $getData['sender_id'];
									$book_id = $getData['book_id'];
									
									$stall_charge = $getData['stall_charge'];
									$total_amount = $getData['book_amount1'];
									$remain_amount = $stall_charge - $total_amount;
									?>
										<tr>
										<td><?php echo $i; ?></td>
										<!--<td><?php echo $getData['event_name']; ?></td>	-->
										<td><?php echo $getData['first_name']." ".$getData['last_name']; ?></td>
										<td><?php echo $getData['book_amount1']; ?></td>
										<td><?php echo $remain_amount; ?></td>
										<!--<td><?php echo $getData['comment']; ?></td>-->
										<td>
                                            					<a href="oviewAllPayment.php?event_id=<?php echo $event_id; ?>&sender_id=<?php echo $sender_id; ?>" class="btn btn-success" data-toggle="model" data-target="myModel">View All Payment</a>	
                                            					<a href="oviewAllRefundPayment.php?event_id=<?php echo $event_id; ?>&sender_id=<?php echo $sender_id; ?>&book_id=<?php echo $book_id; ?>" class="btn btn-success" data-toggle="model" data-target="myModel">View All Refund</a>
                                            								</td>
                                            					
                                            					<!--<td>
                                            		<input type="text" name="refundAmount" id="refundAmount<?php echo $i; ?>" value="0">
                                            		<input type="hidden" name="event_id" id="event_id<?php echo $i; ?>" value="<?php echo $event_id; ?>">
                                            		<input type="hidden" name="sender_id" id="sender_id<?php echo $i; ?>" value="<?php echo $sender_id; ?>">
                                            		<input type="hidden" name="book_id" id="book_id<?php echo $i; ?>" value="<?php echo $book_id; ?>">
                                            					</td>
                                            					
                                            					<td><button class="btn btn-success" id="refundPaise<?php echo $i; ?>">Refund <i class="fa fa-thumbs-up fa-lg" style="color:#ff5f5f;"></i></button></td>-->
                                <!--<td><a href="ogetBookingPayment.php?sender_id=<?php echo $sender_id; ?>&event_id=<?php echo $event_id; ?>" class="btn btn-success btn-flat" style="font-size:12px;"> View More<i class="fa fa-fw fa-arrow-circle-o-right"></i> </td>-->
										</tr>
										<script>
										$(document).ready(function(){
											$("#refundPaise<?php echo $i; ?>").click(function(){
												var refundAmount = $("#refundAmount<?php echo $i; ?>").val();
												var event_id = $("#event_id<?php echo $i; ?>").val();
												var sender_id = $("#sender_id<?php echo $i; ?>").val();
												var book_id = $("#book_id<?php echo $i; ?>").val();
												var refund = "refund";
												
												$.ajax({
													url : 'orefundPayment.php',
													type : 'POST',
													data : {
														refundAmount:refundAmount,event_id:event_id,
														sender_id:sender_id,book_id:book_id,refund:refund
													},
													success:function(data)
													{
														alert("Refund Payment SuccessFull...");
														$("#refundAmount<?php echo $i; ?>").val(0);
													}
												});
											});
										});
										</script>
									<?php $a++; } $i++; }?>	
										</tfoot>
								</table>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->          
					</div>
				</div>
				<!-- /.row -->
				<!-- /.content -->
			</div>
			
			</div>
			<!-- /.modal -->
			
			<div id="myModal1" class="modal fade" role="dialog">
			  <div class="modal-dialog">
			
			   
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
				<center><h4 class="modal-title">Refund Payment</h4></center>
			      </div>
			      <div class="modal-body">
			        <form name="refundPay" id="refundPay" action="osendRefundPayment.php" method="POST">
			       
				
			        <input type="hidden" name="event_id" id="event_id" value="<?php echo $event_id; ?>">
			        
			        <div class="row">
			            <div class="col-md-12 form-group">
			               	    <label>Select Vendor</label>
			               	    <select class="form-control" name="user_id" id="user_id">
			               	    <?php
			               	    $selectVendor = $cnn->getrows("SELECT *FROM event_master em,user_master um,booking_master bm WHERE bm.user_id=um.user_id 
 AND bm.event_id= em.event_id AND bm.event_id='$event_id' AND user_type='Vendor'");
			               	    while($getVendor = mysqli_fetch_array($selectVendor))
			               	    {
			               	    ?>
			               	    	<option value="<?php echo $getVendor['user_id']; ?>"><?php echo $getVendor['first_name']; ?></option>
			               	    <?php } ?>
			               	    </select>
			                </div>
			        </div>
			        <div class="row">
			            <div class="col-md-12 form-group">
			               	    <label>Amount</label>
			               		<input class="form-control" type="text" id="refundAmount" name="refundAmount" placeholder="Amount" required>
			                </div>
			        </div>
			        <div class="row">
			            <div class="col-md-12 form-group">
			               	    <label>Comment</label>
			               		<textarea class="form-control" type="text" id="comment" name="comment" placeholder="Comment" required></textarea>
			                </div>
			        </div>
			        <div class="row">
			            <div class="col-md-12 col-md-offset-3">
			               		<center><button type="submit" name="refundPayMoney" id="refundPayMoney" class="btn btn-danger">Refund</button></center>
			            </div>
			        </div>   
			        
			        </form>
			      </div>
			      
			    </div>
			
			  </div>
			</div>
			
			<!-- /.content-wrapper -->
			<?php include("../include/footer.php"); ?>
			<!-- Add the sidebars background. This div must be placed immediately after the control sidebar -->
			<div class="control-sidebar-bg"></div>
		</div>
		<!-- ./wrapper -->
		<!-- jQuery 3 -->
<!--		<script src="../assets/vendor_components/jquery/dist/jquery.js"></script>-->
		<!-- jQuery UI 1.11.4 -->
		<script src="../assets/vendor_components/jquery-ui/jquery-ui.js"></script>
		<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
		<script>
			$.widget.bridge('uibutton', $.ui.button);
		</script>
		<!-- popper -->
		<script src="../assets/vendor_components/popper/dist/popper.min.js"></script>
		<!-- Bootstrap 4.0-->
		<script src="../assets/vendor_components/bootstrap/dist/js/bootstrap.js"></script>	
		<!-- Sparkline -->
		<script src="../assets/vendor_components/jquery-sparkline/dist/jquery.sparkline.js"></script>
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