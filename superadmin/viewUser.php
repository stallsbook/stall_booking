<?php
	include("include/config.php");
	include("include/session.php");
	$cnn = new connection();
	?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../images/favicon.png">
		<title>StallsBook - View User</title>
		<!-- Bootstrap 4.0-->
		<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap.css">
		<!-- Bootstrap 4.0-->
		<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap-extend.css">
		<!-- font awesome -->
		<link rel="stylesheet" href="assets/vendor_components/font-awesome/css/font-awesome.css">
		<!-- ionicons -->
		<link rel="stylesheet" href="assets/vendor_components/Ionicons/css/ionicons.css">
		<!-- theme style -->
		<link rel="stylesheet" href="css/master_style.css">
		<!-- apro_admin skins. choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
		<link rel="stylesheet" href="css/skins/_all-skins.css">
		<!-- google font -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
	</head>
	<body class="hold-transition skin-black sidebar-mini">
		<div class="wrapper">
			<!-- header -->
			<?php include("include/header.php"); ?>
			<!-- End header -->
			<!-- Left side column. contains the logo and sidebar -->
			<?php include("include/leftbar.php"); ?>
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1>
						Silver User Details
						<small>Control panel</small>
					</h1>
					<!-- <ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
						<li class="breadcrumb-item active">State</li>
						</ol> -->
				</section>
				<!-- Main content -->
				<section class="content">
				<!-- Small boxes (Stat box) -->
				<!-- Basic Forms -->
				<!-- <div class="box box-default">
					<div class="box-header with-border">
						<h3 class="box-title">Add PlanDetail Post</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
						</div>
					</div>
					
				</div> -->
				<!-- /.box -->
				<!-- /.row -->
				<!-- Display State Data -->
				<!-- Main content -->
				<!-- Small boxes (Stat box) -->
				<div class="row">
					<div class="col-12">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Silver User Details</h3>
								<h6 class="box-subtitle"></h6>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
									<thead>
										<tr>
											<th>No</th>
											<th>Full Name</th>
											<th>Email</th>
											<th>Mobile</th>
											<th>Gender</th>
											<th>DOB</th>
                                            <th>Image</th>
                                            <th>Create Date</th>
                                            <th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$selectEntPost = $cnn -> getrows("SELECT * FROM user_master where user_type='Silver'");
											$i = 1;
											while($getEntPost = mysqli_fetch_array($selectEntPost))
											{ 
											    $user_id = $getEntPost['user_id'];
											?>
										<tr>
											<td><?php echo $i; ?></td>
											<td><?php echo $getEntPost['first_name']?> <?php echo $getEntPost ['last_name']; ?></td>
											<td><?php echo $getEntPost['email']; ?></td>
											<td><?php echo $getEntPost['mobile']; ?></td>
											<td><?php echo $getEntPost['gender']; ?></td>
											<td><?php echo date("d-m-Y", strtotime($getEntPost['DOB'])); ?></td>
                                            <td><img src="../<?php echo $getEntPost['user_image']; ?>" height="50" width="50"></td>
											<td><?php echo date("d-m-Y", strtotime($getEntPost['create_date'])); ?></td>
                                            <!-- <td><a href="viewReview.php?user_id=<?php echo $getEntPost['user_id']; ?>" class="btn btn-primary btn-flat" >Review</a></td> -->
                                            <td><a href="viewReview.php?user_id=<?php echo $getEntPost['user_id'];?>" class="btn btn-primary btn-flat">Review<i class="fa fa-fw fa-arrow-circle-o-right"></i></a></td>
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
			<?php include("include/footer.php"); ?>
			<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
			<div class="control-sidebar-bg"></div>
		</div>
		<!-- ./wrapper -->
		<!-- jQuery 3 -->
		<script src="assets/vendor_components/jquery/dist/jquery.js"></script>
		<!-- jQuery UI 1.11.4 -->
		<script src="assets/vendor_components/jquery-ui/jquery-ui.js"></script>
		<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
		<script>
			$.widget.bridge('uibutton', $.ui.button);
		</script>
		<!-- popper -->
		<script src="assets/vendor_components/popper/dist/popper.min.js"></script>
		<!-- Bootstrap 4.0-->
		<script src="assets/vendor_components/bootstrap/dist/js/bootstrap.js"></script>	
		<!-- Sparkline -->
		<script src="assets/vendor_components/jquery-sparkline/dist/jquery.sparkline.js"></script>
		<!-- Slimscroll -->
		<script src="assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js"></script>
		<!-- FastClick -->
		<script src="assets/vendor_components/fastclick/lib/fastclick.js"></script>
		<!-- apro_admin App -->
		<script src="js/template.js"></script>
		<!-- apro_admin for demo purposes -->
		<script src="js/demo.js"></script>
		<!-- This is data table -->
		<script src="assets/vendor_plugins/DataTables-1.10.15/media/js/jquery.dataTables.min.js"></script>
		<!-- start - This is for export functionality only -->
		<script src="assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/dataTables.buttons.min.js"></script>
		<script src="assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.flash.min.js"></script>
		<script src="assets/vendor_plugins/DataTables-1.10.15/ex-js/jszip.min.js"></script>
		<script src="assets/vendor_plugins/DataTables-1.10.15/ex-js/pdfmake.min.js"></script>
		<script src="assets/vendor_plugins/DataTables-1.10.15/ex-js/vfs_fonts.js"></script>
		<script src="assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.html5.min.js"></script>
		<script src="assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.print.min.js"></script>
		<!-- end - This is for export functionality only -->
		<!-- apro_admin for Data Table -->
		<script src="js/pages/data-table.js"></script>
	</body>
</html>