<?php
	include("../include/config.php");
	include("include/session.php");
	$cnn = new connection();
	$event_id = $_GET['event_id'];
	$user_id = $_GET['user_id'];
	$selectEvent = $cnn -> getrows("SELECT * FROM event_master em, category_master cm, user_master um WHERE em.cat_id = cm.cat_id AND um.user_id = em.user_id AND em.event_id = '$event_id'");
	$getEvent = mysqli_fetch_array($selectEvent);
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
		<title>Stall Booking - Dashboard</title>
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
						Event
						<small>Control panel</small>
					</h1>
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Small boxes (Stat box) -->
					<!-- Basic Forms -->
					<div class="box box-default">
						<div class="box-header with-border">
							<h3 class="box-title">Edit Event</h3>
							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
								<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
							</div>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="">
								<div class="">
									<form name="eventEdit" id="eventEdit" method="POST" action="editEventScript.php" enctype="multipart/form-data">
										<input type="hidden" id="event_id" name="event_id" value="<?php echo $getEvent['event_id']; ?>">
										<div class="row">
											<div class="col-md-6 form-group">
												<label>Event Name</label>
												<input class="form-control" type="text" id="event_name" name="event_name" value="<?php echo $getEvent['event_name']; ?>" required>
											</div>
											<div class="col-md-6 form-group">
												<label>Event Category</label>
												<select class="form-control" name="cat_id" id="cat_id" required>
													<option selected disabled>---Select Category ---</option>
													<?php
														$selectCat = $cnn -> getrows("SELECT *FROM Category_master");
														while($getCat = mysqli_fetch_array($selectCat))
														{
														?>
													<option value="<?php echo $getCat['cat_id']; ?>" <?php if($getCat['cat_id'] == $getEvent['cat_id']){ ?> selected <?php } ?>><?php echo $getCat['cat_name']; ?></option>
													<?php } ?>
												</select>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 form-group">
												<label>Event Address</label>
												<input class="form-control" type="text" id="event_address" name="event_address" value="<?php echo $getEvent['event_address']; ?>" required>
											</div>
											<div class="col-md-6 form-group">
												<label>City</label>
												<input class="form-control" type="text" id="city" name="city" value="<?php echo $getEvent['city']; ?>" required>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 form-group">
												<label>Start Date</label>
												<input class="form-control" type="text" id="start_date" name="start_date" value="<?php echo date('Y-m-d',strtotime($getEvent['start_date'])); ?>" required>
											</div>
											<div class="col-md-6 form-group">
												<label>End Date</label>
												<input class="form-control" type="text" id="end_date" name="end_date" value="<?php echo date('Y-m-d',strtotime($getEvent['end_date'])); ?>" required>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 form-group">
												<label>Time</label>
												<input class="form-control" type="text" id="event_time" name="event_time" value="<?php echo $getEvent['time']; ?>" required>
											</div>
											<div class="col-md-6 form-group">
												<label>Stall Charge</label>
												<input class="form-control" type="number" id="stall_charge" name="stall_charge" value="<?php echo $getEvent['stall_charge']; ?>" required>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 form-group">
												<label>Available Stall</label>
												<input class="form-control" type="number" id="avai_stall" name="avai_stall" value="<?php echo $getEvent['avai_stall']; ?>" required>
											</div>
											<div class="col-md-6 form-group">
												<label>Total Stall</label>
												<input class="form-control" type="number" id="total_stall" name="total_stall" value="<?php echo $getEvent['total_stall']; ?>" required>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 form-group">
												<label>Banner Photo</label>
												<input class="form-control" type="file" id="banner" name="banner">
												<img src="../<?php echo $getEvent['banner']; ?>" height="50" width="50"> 
											</div>
											<div class="col-md-6 form-group">
												<label>Event Images</label>
												<input class="form-control" type="file" id="images" name="images[]" multiple>
												<?php 
													$images = explode(",",$getEvent['images']);
													foreach($images as $value)
													{
													?>
												<img src="../<?php echo $value; ?>" height="50" width="50">
												<?php } ?>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 form-group">
												<label>Description</label>
												<input class="form-control" type="text" id="event_desc" name="event_desc" value="<?php echo $getEvent['event_desc']; ?>" required>
											</div>
											<div class="col-md-6 form-group">
												<label></label>
												<button type="submit" id="editEvent" name="editEvent" class="btn btn-danger btn-flat" style="font-size: 14px;margin-top: 5.8%;width: 30%;
													margin-left: 34%;">Submit <i class="fa fa-fw fa-arrow-circle-o-right"></i></button>
											</div>
										</div>
									</form>
								</div>
								<!-- /.col -->
							</div>
							<!-- /.row -->
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</section>
				<!-- /.content -->
			</div>
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
	</body>
</html>