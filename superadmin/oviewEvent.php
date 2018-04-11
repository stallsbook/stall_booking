<?php
	include("../include/config.php");
	include("include/session.php");
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
		<title>Stall Booking - View Stalls</title>
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
						Stalls
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
								<h3 class="box-title">Stalls</h3>
								<h6 class="box-subtitle"></h6>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
									<thead>
										<tr>
											<th>No</th>
											<th>Name</th>
											<th>Address</th>
											<th>City</th>
											<th>Start Date</th>
											<th>End Date</th>
											<th>Banner</th>
                                            <th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$selectEvent = $cnn -> getrows("SELECT *FROM event_master em,category_master cm where em.cat_id = cm.cat_id AND user_id = '$user_id'");
											$i = 1;
											while($getEvent = mysqli_fetch_array($selectEvent))
											{ 
											    $event_id = $getEvent['event_id'];
											?>
										<tr>
											<td><?php echo $i; ?></td>
											
											<td><?php echo $getEvent['event_name']; ?></td>
											<td><?php echo $getEvent['event_address']; ?></td>
											<td><?php echo $getEvent['city']; ?></td>
											<td><?php echo date('d-m-y',strtotime($getEvent['start_date'])); ?></td>
											<td><?php echo date('d-m-y',strtotime($getEvent['end_date'])); ?></td>
                                            <td><img src="../<?php echo $getEvent['banner']; ?>" height="50" width="50"></td>
											
                                            <td>
                                            	<!-- <a href="oEditEvent.php?event_id=<?php echo $event_id; ?>" class="btn btn-danger btn-flat" style="font-size:14px;">Edit <i class="fa fa-fw fa-arrow-circle-o-right"></i></a> -->
                                            	<!-- <a href="oaddEventScript.php?event_id=<?php echo $event_id; ?>" class="btn btn-danger btn-flat" style="font-size:14px;">Delete <i class="fa fa-fw fa-arrow-circle-o-right"></i></a> -->
                                            	<a href="oviewmoreEventDetail.php?event_id=<?php echo $event_id; ?>" class="btn btn-danger btn-flat" style="font-size:14px;">View More <i class="fa fa-fw fa-arrow-circle-o-right"></i></a>
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
		
		<script src="../js/pages/data-table.js"></script>
	</body>
</html>