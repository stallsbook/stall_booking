<?php
	include("../include/config.php");
	include("include/session.php");
	$cnn = new connection();

	$eventid = $_GET['eventid'];
	$selectevent = $cnn -> getrows("SELECT * FROM user_master um, event_master em, category_master cm  WHERE um.user_id = em.user_id AND cm.cat_id = em.cat_id AND em.event_id = '$eventid'");
	  $getevent = mysqli_fetch_array($selectevent);
	  
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
		<title>StallsBook - View Event Details</title>
		<!-- Bootstrap 4.0-->
		<link rel="stylesheet" href="../assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">
		<!-- Bootstrap 4.0-->
		<link rel="stylesheet" href="../assets/vendor_components/bootstrap/dist/css/bootstrap-extend.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="../assets/vendor_components/font-awesome/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="../assets/vendor_components/Ionicons/css/ionicons.min.css">
		<!-- glyphicons -->
		<link rel="stylesheet" href="../assets/vendor_components/glyphicons/glyphicon.css">
		<!-- gallery -->
		<link rel="stylesheet" type="text/css" href="../assets/vendor_components/gallery/css/animated-masonry-gallery.css" />
		<!-- theme style -->
		<link rel="stylesheet" href="../css/master_style.css">
		<!-- apro_admin skins. choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
		<link rel="stylesheet" href="../css/skins/_all-skins.css">
		<!-- google font -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
		<style type="text/css">
		@media only screen and (max-width: 700px) {
		    .setPhoto{
		            width: 80% !important;
    			    height: 222px !important;
		    }
		    .setBottom
		    {
		    	margin-bottom: 5px !important;
		    }
		}
		</style>
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
						Event Details
						<small>Control panel</small>
					</h1>
					<!-- <ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
						<li class="breadcrumb-item active">State</li>
						</ol> -->
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
												<img src="../stall_live/<?php echo $getevent['image']; ?>" class="img-responsive img-thumbnail setPhoto" style="border-radius: 50%; width: 100%;height:128px;">
											</div>
										</div>
										<div class="col-md-8 hotel">
											<h4 style="color: #d14836;"><?php echo $getevent['first_name']." ".$getevent['last_name']  ?></h4>
											<b>Event Name :&nbsp;</b> <span style="color: slategray;"><?php echo $getevent['event_name']; ?></span>
											<br>
											<b>Event Description :&nbsp;</b><span style="color: slategray;"> <?php echo $getevent['event_desc']; ?></span>
                      <br>
											<b>Event Category :&nbsp;</b><span style="color: slategray;"> <?php echo $getevent['cat_name']; ?></span>
                      <br>
											<b>Available Stall :&nbsp;</b><span style="color: slategray;"> <?php echo $getevent['avai_stall']; ?></span>
                      <br>
											<b>Total Stall :&nbsp;</b><span style="color: slategray;"> <?php echo $getevent['total_stall']; ?></span>
											<br>
											<div class="row">
												<div class="col-md-6" style="margin-top: 1%;">
													<div class="locations">
														<i class="fa fa-map-marker fa-lg" aria-hidden="true" style="color: #d14836;"></i> &nbsp;<?php echo $getevent['event_address']; ?>
													</div>
                          	<div class="locations">
														<i class="fa fa-calendar fa-lg" aria-hidden="true" style="color:#d14836;"></i> &nbsp;<?php echo date('d M, Y', strtotime($getevent['start_date'])); ?> <b style="color:red;">To</b> <?php echo date('d M, Y', strtotime($getevent['end_date'])); ?>   
													</div>
													
												</div>
												<div class="col-md-6" style="margin-top: 1%;">
													<div class="locations">
														<i class="fa fa-phone fa-lg" aria-hidden="true" style="color:#d14836; "></i> &nbsp;<?php echo $getevent['mobile']; ?>
													</div>
												
													<div class="locations">
														<i class="fa fa-clock-o" aria-hidden="true" style="color:#d14836;"></i> &nbsp;<?php echo $getevent['event_time']; ?>   
													</div>
												</div>
											</div>
										</div>
									
										
									</div>
								</div>
								
							</div>
							<!-- /.box-body -->
						</div>
					</div>
					<!-- /.row -->
					<!-- Tab Data -->
					
					<div class="row">
					<div class="col-md-12">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Event Banner & Images</h3>
								<h6 class="box-subtitle"></h6>
							</div>
							<!-- /.box-header -->
							<div class="row">
							
									<div class="col-md-3 setBottom">
									
														<img class="img-thumbnail" src="../stall_live/<?php echo $getevent['banner']; ?>" style="height:150px;width:100%;border-radius: 2%;">
														</div>
							<?php 
										$image = $getevent ['images'];
										$new_image = explode(",",$image);
										
										foreach($new_image as $imgimg)
										{ ?>
										<div class="col-md-3 setBottom">
											<img class="img-thumbnail" src="../stall_live/images/event/<?php echo $imgimg; ?>" style="height:150px;width:100%;border-radius: 2%;">
											</div>
										<?php } ?>
						</div>
						
						<!-- /.box -->          
					</div>
				</div>
				
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->
			<?php include("../include/footer.php"); ?>
			<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
			<div class="control-sidebar-bg"></div>
		</div>
		<!-- jQuery 3 -->
		<script src="../assets/vendor_components/jquery/dist/jquery.js"></script>
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