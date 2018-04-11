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
		<title>StallsBook - View Events</title>
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
						Booking Payment
						<small>Control panel</small>
					</h1>
					
				</section>
				<hr><br>
				<!-- Main content -->
				<section class="container">
				
				<!-- Small boxes (Stat box) -->
				<div class="col-md-12">
				<div class="row">
					
					 <?php					 
					 $selectEvent1 = $cnn->countrow("SELECT *FROM event_master where user_id = '$user_id' order by event_status ASC");
					 if($selectEvent1 > 0)
					 {	$current_date = date('Y-m-d');
						 $selectEvent = $cnn->getrows("SELECT *FROM event_master where user_id = '$user_id' order by event_status ASC");
						 $i=1;
						 while($getEvent = mysqli_fetch_array($selectEvent))
						 {
						 	$event_id=$getEvent['event_id'];
						 ?>	
						 
							<div class="col-md-4" style="margin-bottom:10px;">
								<img src="../stall_live/<?php echo $getEvent['banner']; ?>" style="height: 183px;width: 100%;">
								<?php
								$current_date = date('Y-m-d');
								$start_date = date('Y-m-d',strtotime($getEvent['start_date']));
								$end_date = date('Y-m-d',strtotime($getEvent['end_date']));
								if($current_date >= $start_date && $current_date <= $end_date)
								{
								?>
								 <div style="position: absolute;top: 8px;right: 16px;color:green;"><label class="label label-danger" style="font-size:12px;">Running</label></div>
								 <?php } else if($end_date <= $current_date){ ?>
								 <div style="position: absolute;top: 8px;right: 16px;color:green;"><label class="label label-danger" style="font-size:12px;">Past</label></div>
								 <?php } else if($start_date >= $current_date){ ?>
								 <div style="position: absolute;top: 8px;right: 16px;color:green;"><label class="label label-danger" style="font-size:12px;">Future</label></div>
								 <?php } ?>
								 
									<div style="padding:2%;background-color:#ff855f;">
										<span style="color:white;"><?php echo $getEvent['event_name']; ?></span><a href="ogetBookingPayment.php?event_id=<?php echo $event_id; ?>" style="float:right;color:white;">View Payment</a>
									</div>
							</div>
					<?php $i++;} }else{ ?> <div><h2 style="text-align: -webkit-center;color: red;">No Data Avilable!</h2></div> <?php } ?>				
								
					 
							<!--<div><h2 style="text-align: -webkit-center;color: red;">No Data Avilable!</h2></div>-->

					
					
				</div>
				</div>
			
				</section>

			</div>
			<!-- /.modal -->
			<!-- /.content-wrapper -->
			<?php include("../include/footer.php"); ?>
			<!-- Add the sidebars background. This div must be placed immediately after the control sidebar -->
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