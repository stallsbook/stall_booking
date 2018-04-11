<?php
	include("../include/config.php");
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
					Shop Payment
					<small>Control panel</small>
				</h1>
				<!-- <ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="breadcrumb-item active">User</li>
					</ol> -->
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
									<tr>
										<th style="width: 10px">No</th>
										<th>Shop No</th>
										<th>Shopname</th>
										<th>Date</th>
										<th>Amount</th>
										<th>Action</th>
									</tr>
									<tr>
										<td>1.</td>
										<td>150</td>
										<td>TwoBrother</td>
										<td>01/01/2017</td>
										<td>150000</td>
                                        <td><a href="#" class="btn btn-danger btn-flat"> Payment </a> 
                                        <a href="#" class="btn btn-success btn-flat"> Report </a></td>
									</tr>
									<tr>
										<td>1.</td>
										<td>150</td>
										<td>TwoBrother</td>
										<td>01/01/2017</td>
										<td>150000</td>
                                        <td><a href="#" class="btn btn-danger btn-flat"> Payment </a>
                                         <a href="#" class="btn btn-success  btn-flat"> Report </a></td>
									</tr>
									<tr>
										<td>1.</td>
										<td>150</td>
										<td>TwoBrother</td>
										<td>01/01/2017</td>
										<td>150000</td>
                                        <td><a href="#" class="btn btn-danger btn-flat"> Payment </a> 
                                        <a href="#" class="btn btn-success btn-flat"> Report </a></td>
									</tr>
									<tr>
										<td>1.</td>
										<td>150</td>
										<td>TwoBrother</td>
										<td>01/01/2017</td>
										<td>150000</td>
                                        <td><a href="#" class="btn btn-danger btn-flat"> Payment </a> 
                                        <a href="#" class="btn btn-success btn-flat"> Report </a></td>
									</tr>
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