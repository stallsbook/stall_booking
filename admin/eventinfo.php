<?php
	include("../include/config.php");
	include("../include/session.php");
	$cnn = new connection();
	$user_id = $_SESSION['user_id'];
	$event_id = $_GET['event_id'];
	$selectevent = $cnn -> getrows("SELECT * FROM user_master um, event_master em, category_master cm  WHERE um.user_id = em.user_id AND cm.cat_id = em.cat_id AND em.user_id = '$user_id'");
	  $getevent = mysqli_fetch_array($selectevent);
	  $image = $getevent ['images'];
	  $new_image = explode(",",$image);
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
		<title>Stall Booking - View Event Details</title>
		<!-- Bootstrap 4.0-->
		<link rel="stylesheet" href="../assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">
		<!-- Bootstrap 4.0-->
		<link rel="stylesheet" href="../assets/vendor_components/bootstrap/dist/css/bootstrap-extend.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="../assets/vendor_components/font-awesome/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="../assets/vendor_components/Ionicons/css/ionicons.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="../css/master_style.css">
		<!-- apro_admin Skins. Choose a skin from the css/skins
			folder instead of downloading all of them to reduce the load. -->
		<link rel="stylesheet" href="../css/skins/_all-skins.css">
		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
		<script src="../assets/vendor_components/jquery/dist/jquery.min.js"></script>
	</head>
	<body class="hold-transition skin-black sidebar-mini">
		<div class="wrapper">
			<?php include("../include/header.php"); ?>
			<?php include("../include/leftbar.php"); ?>
			<div class="content-wrapper">
				<section class="content-header">
					<h1>
						Event Details
						<small>Control panel</small>
					</h1>
				</section>
				<!-- Main content -->
				<section class="content">
					<div class="row">
						<!-- /.col -->
						<div class="col-md-12">
							<div class="box box-primary">
								<div class="box-body box-profile">
									<div class="row">
										<div class="col-md-2">
											<div class="hotel_img">
												<img src="../stall_live/<?php echo $getevent['image']; ?>" class="img-responsive" style="border-radius: 50%; width: 100%;">
											</div>
										</div>
										<div class="col-md-8 hotel">
											<h4 style="color: #d14836;"><?php echo $getevent['first_name']." ".$getevent['last_name']  ?></h4>
											<b>Event Name:</b> <?php echo $getevent['event_name']; ?>
											<br>
											<b>Event Description:</b> <?php echo $getevent['event_desc']; ?>
											<br>
											<div class="row">
												<div class="col-md-6" style="margin-top: 1%;">
													<div class="locations">
														<i class="fa fa-map-marker fa-lg" aria-hidden="true" style="color: #d14836;"></i> &nbsp;<?php echo $getevent['event_address']; ?>
													</div>
													<br>
													<div class="locations">
														<i class="fa fa-tree" aria-hidden="true"  style="color: #d14836;"></i> &nbsp;<?php echo $getevent['city']; ?>
													</div>
												</div>
												<div class="col-md-6" style="margin-top: 1%;">
													<div class="locations">
														<i class="fa fa-phone fa-lg" aria-hidden="true" style="color:#d14836; "></i> &nbsp;<?php echo $getevent['mobile']; ?>
													</div>
													<br>
													<div class="locations">
														<i class="fa fa-calendar fa-lg" aria-hidden="true" style="color:#d14836;"></i> &nbsp;<?php echo date('d/M/Y', strtotime($getevent['start_date'])); ?> To <?php echo date('d/M/Y', strtotime($getevent['end_date'])); ?>   
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-2">
											<!-- <p style="font-weight: 600;text-decoration: underline;margin: 0% -49%;">Banner Image :</p>
											<img src="../<?php echo $getevent['banner']; ?>" style="margin-left: -48%;;height: 150px;width: 210px;    border-radius: 2%;"> -->
											<a href="omakeVenderCollectionPayment.php?event_id=<?php echo $event_id; ?>" class="btn btn-danger" style="font-size: 14px;margin-top: 40%;"> Collection <i class="fa fa-thumbs-o-up fa-lg" style="color:darkblue;"></i></a>
										</div>
										
									</div>
								</div>
								
							</div>
							<!-- /.box-body -->
						</div>
					</div>
					<!-- /.col -->

					<!-- Small boxes (Stat box) -->
				<div class="row">
					<div class="col-12">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">View Vendor Booking</h3>
								<h6 class="box-subtitle"></h6>
							</div>
							<!-- /.box-header -->

						</div>
						<!-- /.box -->          
					</div>
				</div>
				<!-- /.row -->
			</div>
			<!-- /.row -->


			</section>
			<!-- /.content -->
		</div>
		</div>
		
		
		
		
		<!-- /.content-wrapper -->
		<?php include("../include/footer.php"); ?>
		<!-- /.control-sidebar -->
		<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
		<div class="control-sidebar-bg"></div>
		</div>
		<!-- ./wrapper -->
		<!-- jQuery 3 -->
		<!-- <script src="../assets/vendor_components/jquery/dist/jquery.min.js"></script> -->
		<!-- popper -->
		<script src="../assets/vendor_components/popper/dist/popper.min.js"></script>
		<!-- Bootstrap 4.0-->
		<script src="../assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- SlimScroll -->
		<script src="../assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
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
		
		<script src="../js/pages/data-table.js"></script>
	</body>
</html>