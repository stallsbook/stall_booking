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
		<style>
		@media only screen and (max-width: 500px) {
		    .chang {
		        margin-bottom:5%;
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
						Events
						<small>Control panel</small>
					</h1>
					
				</section>
				<!-- Main content -->
				<section class="content">
				
				<!-- Small boxes (Stat box) -->
				<div class="">
					<div class="row">
						
					  <?php
						$selectEvent = $cnn -> getrows("SELECT * ,em.status as estatus FROM event_master em,category_master cm where em.cat_id = cm.cat_id AND em.user_id = '$user_id' ORDER BY em.event_status ASC");
						$i = 1;
						if(mysqli_num_rows($selectEvent) != '0')
						{
						while($getEvent = mysqli_fetch_array($selectEvent))
						{
							$user_id = $getEvent['user_id'];
							$event_id = $getEvent['event_id'];
					  ?>
					  <div class="col-md-6">
						<div class="box" style="border: 1px solid #ff855f;background: #ebf4f1;">
							<div class="box-header">
								<div class="row">
									
									<div class="col-md-6">
										<img src="../stall_live/<?php echo $getEvent['banner']; ?>" style="height: 170px;width: 100%;">
										<p style="font-size: 16px;padding: 2px;background: #ff855fb3;color: #fff;"><?php echo $getEvent['event_name']; ?></p>
									</div>
									<div class="col-md-6">
										<!--<p style="font-size: 16px;padding: 14px;background: #ff855fb3;color: #fff;cursor:auto;">Start Date :- <?php echo date('d-m-y',strtotime($getEvent['start_date'])); ?></p>-->
										<div class="row">
											<div class="col-md-6">
										<label class="btn btn-warning" style="padding: 2%;width:100%;font-size: 12px;cursor:auto;">From : <?php echo date('d-m-y',strtotime($getEvent['start_date'])); ?></label>
											</div>
											<div class="col-md-6">
										<label class="btn btn-warning" style="padding: 2%;font-size: 12px;width:100%;cursor:auto;">To : <?php echo date('d-m-y',strtotime($getEvent['end_date'])); ?></label>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-12">
											
												<label class="btn btn-success" style="font-size:14px;color: #fff;width: 100%;cursor:auto;"> 
													<?php if($getEvent['estatus'] == "1"){ ?> Approved <?php } else{ ?> Not Approved </i><?php } ?>
												 	
												</label></div>
										</div> 
												<?php 
													$current_date = date('Y-m-d');
													$start_date = date('Y-m-d',strtotime($getEvent['start_date']));
													$end_date = date('Y-m-d',strtotime($getEvent['end_date']));
													
													if($current_date >= $start_date && $current_date <= $end_date)
													{
                                            	?>
                                            	<span class="" style="font-size:14px;color:#673AB7;font-style:italic;">Your Event Is Running.</span>
												<!--<a title="Running" class="btn-lg btn-danger btn-flat" style="font-size:14px;color: #fff;"> Running <i class="fa fa-fw fa-arrow-circle-o-right"></i></a>-->
												<?php } else if($end_date <= $current_date){ ?>
												<!--<a title="Past" class="btn-lg btn-danger btn-flat" style="font-size:14px;color: #fff;"> Past <i class="fa fa-fw fa-arrow-circle-o-right"></i></a>-->
						<span class="" style="font-size:14px;color:#673AB7;font-style:italic;">Your Event Was Past.</span>
												<?php } else if($start_date >= $current_date){ ?>
						<span class="" style="font-size:14px;color:#673AB7;font-style:italic;">Your Event In Future.</span>
												<!--<a title="Future" class="btn-lg btn-danger btn-flat" style="font-size:14px;color: #fff;"> Future <i class="fa fa-fw fa-arrow-circle-o-right"></i></a>-->
												<?php } ?>
											
										<br><br>
										
										<div class="row">
											<div class="col-md-6 chang">
												<a title="Edit" href="oEditEvent.php?event_id=<?php echo $event_id; ?>" class="btn-lg btn-danger btn-flat" style="font-size:14px;color: #fff;padding-left: 30%;padding-right: 30%;"> Edit </a> &nbsp;&nbsp;
											</div>
											<div class="col-md-6">
												<a title="Delete" href="oaddEventScript.php?event_id=<?php echo $event_id; ?>" class="btn-lg btn-danger btn-flat" style="font-size:14px;color: #fff;padding-left: 26%;padding-right: 26%;"> Delete</a>
											</div>
										</div>
										<br>
										<div class="row">
											<div class="col-md-12">
												<a title="view More" href="oviewmoreEventDetail.php?event_id=<?php echo $event_id; ?>" class="btn btn-danger btn-flat" style="font-size:14px;width: 100%;height: 36px;color:#fff;"> View More <i class="fa fa-fw fa-arrow-circle-o-right"></i></a>
											</div>
										</div>
									</div>
																	
								</div>
							</div>
						</div>
						</div>
					  <?php } }
					  else
					  { ?>
					  <br>
							<div><h2 style="text-align: -webkit-center;color: red;">No Event Avilable!</h2></div>

					<?php  }
					  ?>
					</div>
				</div>
				</section>

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