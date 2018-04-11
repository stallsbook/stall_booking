<?php
	include("../include/config.php");
	include("../include/session.php");
	$cnn = new connection();
	
	$event_id = $_GET['event_id'];
	$sender_id = $_GET['sender_id'];
	
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
								<h3 class="box-title">
								<?php
								$selectname= $cnn->getrows("SELECT *FROM user_master WHERE user_id='$sender_id'");
								$getname = mysqli_fetch_array($selectname);
								$first_name = $getname['first_name'];
								?>
								All Payment Of Vendor <span style="color:red;"><?php echo $first_name; ?>.</span>
								</h3>
								
								<h6 class="box-subtitle"></h6>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<table id="" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
									<thead>
										<tr>
											<th>No</th>
											<!--<th>Event Name</th>-->
											<!--<th>Vendor Name</th>-->
											<!--<th>Remain Amount</th>-->
											<th>Date</th>
											<th>Comment</th>
											<th>Amount</th>
											<!--<th>Refund Amount</th>-->
						                                       
										</tr>
									</thead>
									<tbody>
									<?php
									/*$selectData1 = $cnn->getRows("SELECT distinct bpm.sender_id FROM booking_payment_master bpm,event_master em WHERE em.event_id=bpm.event_id AND  em.event_id='$event_id' bpm.sender_id = '$sender_id'");
									$i=1;
	while($getData1 = mysqli_fetch_array($selectData1))
	{
	$sender_id = $getData1['sender_id'];
	//$book_id = $getData1['book_id'];*/
									
									
									$selectData = $cnn->getrows("SELECT  um.first_name,em.event_name,em.event_id,em.stall_charge,um.user_id,bpm.sender_id,bpm.book_amount,bm.book_id,bpm.comment,bpm.payment_date FROM booking_payment_master bpm, user_master um,event_master em,booking_master bm WHERE bpm.book_id=bm.book_id AND bpm.sender_id=um.user_id AND bpm.event_id=em.event_id AND bpm.sender_id='$sender_id' AND bpm.event_id='$event_id' AND bpm.payment_status='1' AND bpm.book_amount > 0 order by bpm.payment_date ASC");
									$a=1;
									$sum=0;
									while($getData = mysqli_fetch_array($selectData))
									{
									$event_id = $getData['event_id'];
									$sender_id = $getData['sender_id'];
									$book_id = $getData['book_id'];
									
									$stall_charge = $getData['stall_charge'];
									$total_amount = $getData['book_amount'];
									$sum=$sum+$total_amount;
									$remain_amount = $stall_charge - $sum;
									?>
										<tr>
										<td><?php echo $a; ?></td>
										<!--<td><?php echo $getData['event_name']; ?></td>	-->
										<!--<td><?php echo $getData['first_name']; ?></td>-->
										<td><?php echo date('d-m-Y',strtotime($getData['payment_date'])); ?></td>
										<!--<td><?php echo $remain_amount; ?></td>-->
										<td><?php echo $getData['comment']; ?></td>
										<td><?php echo $getData['book_amount']; ?></td>
										</tr>
										
										</script>
									<?php $a++; } ?>
									<tr style="background-color: #d6e8f1;"><td></td><td></td><td><b>Total Paid</b></td><td style="color:green;"><b><?php echo $sum; ?></b></td></tr>	
									<tr style="background-color: #c8dbe4;"><td></td><td></td><td><b>Remain Amount</b></td><td style="color:red;"><b><?php echo $remain_amount; ?></b></td></tr>	
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