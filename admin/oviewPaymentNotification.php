<?php
	include("../include/config.php");
	include("../include/session.php");
	$cnn = new connection();
	$user_id = $_SESSION['user_id'];
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
						Payment Notification
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
								<h3 class="box-title">Notification</h3>
								<h6 class="box-subtitle"></h6>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
									<thead>
										<tr>
											<th>No</th>
											<th>Event Name</th>
											<th>Vendor Name</th>
											<th>Type</th>
											<th>Bank</th>
											<th>Txn ID</th>
											<th>Pay Amount</th>
											<!--<th>Remain Amount</th>-->
						                                        <th>Action</th>
										</tr>
									</thead>
									<tbody>
									<?php
									$i=1;
									
									$selectData = $cnn->getrows("SELECT  um.first_name,um.last_name,bm.shop_no,bm.book_id,bm.shop_name,em.event_name,em.event_id,em.stall_charge,um.user_id,um.email,bpm.sender_id,bpm.book_amount,bpm.pay_type,bpm.bank_name,bpm.txn_id,bpm.payment_status,bpm.bookpay_id,bpm.receiver_id FROM booking_payment_master bpm, user_master um,event_master em,booking_master bm WHERE bpm.book_id=bm.book_id AND bpm.sender_id=um.user_id AND bpm.event_id=em.event_id AND bpm.payment_status='0' AND bpm.receiver_id='$user_id'");
									
									while($getData = mysqli_fetch_array($selectData))
									{
								 	$bookpay_id = $getData['bookpay_id'];
									$event_id = $getData['event_id'];
									$sender_id = $getData['sender_id'];
									 $book_id = $getData['book_id'];
									$payment_status = $getData['payment_status'];
									$email = $getData['email'];
									$pay_type = $getData['pay_type'];
									$event_name = $getData['event_name'];
									$book_amount = $getData['book_amount'];
									$first_name = $getData['first_name'];
									
									//$stall_charge = $getData['stall_charge'];
									//$total_amount = $getData['book_amount'];
									//$remain_amount = $stall_charge - $total_amount;
									?>
										<tr>
										<td><?php echo $i; ?></td>
										<td><?php echo $getData['event_name']; ?></td>	
										<td><?php echo $getData['first_name']; ?></td>
										<td><?php echo $getData['pay_type']; ?></td>
										<td><?php echo $getData['bank_name']; ?></td>
										<td><?php echo $getData['txn_id']; ?></td>
										<td><?php echo $getData['book_amount']; ?></td>
                                            					<!--<td><?php echo $remain_amount; ?></td>-->
                                <td>
                                <a href="ochangePaymentStatus.php?sender_id=<?php echo $sender_id; ?>&bookpay_id=<?php echo $bookpay_id; ?>&event_id=<?php echo $event_id; ?>&book_id=<?php echo $book_id; ?>&payment_status=<?php echo $payment_status; ?>&email=<?php echo $email; ?>&accept=accept&pay_type=<?php echo $pay_type; ?>&event_name=<?php echo $event_name; ?>&book_amount=<?php echo $book_amount; ?>&first_name=<?php echo $first_name; ?>" class="btn btn-success btn-flat" style="font-size:12px;"> Accept <i class="fa fa-fw fa-arrow-circle-o-right"></i></a>
                                
                                <!--<a href="ochangePaymentStatus.php?sender_id=<?php echo $sender_id; ?>&bookpay_id=<?php echo $bookpay_id; ?>&event_id=<?php echo $event_id; ?>&book_id=<?php echo $book_id; ?>&payment_status=<?php echo $payment_status; ?>&email=<?php echo $email; ?>&reject=reject" class="btn btn-success btn-flat" style="font-size:12px;"> Reject <i class="fa fa-fw fa-arrow-circle-o-right"></i></a>-->
                                
                                <a data-toggle="modal" data-target="#myModal<?php echo $i;?>" class="btn btn-danger btn-flat" style="font-size:14px;color:white;" title="Change Status"> Reject</a>
                                
                                <!-- Reject Request Modal -->
				<div id="myModal<?php echo $i;?>" class="modal fade" role="dialog">
				  <div class="modal-dialog modal-md">
				
				    <!-- Modal content-->
				    <div class="modal-content" style="">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
<center>				        <h4 class="modal-title">Reject Payment</h4></center>
				      </div>
				     
				      <div class="modal-body">
				        <form name="frm1" id="frm1" action="ochangePaymentStatus.php" method="post">
				        <input type="hidden" name="event_id" id="event_id" value="<?php echo $event_id; ?>">
				        <input type="hidden" name="sender_id" id="sender_id" value="<?php echo $sender_id; ?>">
				        <input type="hidden" name="book_id" id="book_id" value="<?php echo $book_id; ?>">
				        <input type="hidden" name="bookpay_id" id="bookpay_id" value="<?php echo $bookpay_id; ?>">
				        <input type="hidden" name="payment_status" id="payment_status" value="<?php echo $payment_status; ?>">
				        <input type="hidden" name="email" id="email" value="<?php echo $email; ?>">
				        <input type="hidden" name="reject" id="reject" value="<?php echo $reject; ?>">
				        <input type="hidden" name="first_name" id="first_name" value="<?php echo $getData['first_name']; ?>">
				        <input type="hidden" name="book_amount" id="book_amount" value="<?php echo $getData['book_amount']; ?>">
				        <input type="hidden" name="pay_type" id="pay_type" value="<?php echo $getData['pay_type']; ?>">
				        <input type="hidden" name="event_name" id="event_name" value="<?php echo $getData['event_name']; ?>">
				        
					<div class="row">
				        	<div class="col-md-3">
				        		Rejection Reason...
				        	</div>
				        	<div class="col-md-9">
				        		<textarea type="text" name="reason" id="reason" style="width: inherit;" size="10"></textarea>
				        	</div>
				        </div>
				        <br>
				        
				        <div class="row">
				        	<div class="col-md-12">
				        		<center><button type="submit" name="rejectRequest" id="rejectRequest" class="btn btn-success">Reject</button></center>
				        	</div>
				        </div>
				        
				        </form>
				        
				      </div>
				      
				    </div>
				
				  </div>
				</div>
		<!--End-->
                                 </td>
										</tr>
									<?php $i++; } ?>	
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
			<!-- /.content-wrapper -->
			<?php include("../include/footer.php"); ?>
			<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
			<div class="control-sidebar-bg"></div>
		</div>
		<!-- ./wrapper -->
		<!-- jQuery 3 -->
		<script src="../assets/vendor_components/jquery/dist/jquery.js"></script>
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