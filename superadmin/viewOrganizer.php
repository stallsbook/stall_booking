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
		<title>StallsBook - View Organizer</title>
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
						Organizer User
						<small>Control panel</small>
					</h1>
					<!-- <ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
						<li class="breadcrumb-item active">User</li>
						</ol> -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Small boxes (Stat box) -->
					<div class="row">
						<div class="col-12">
							<div class="box">
								<div class="box-header">
									<h3 class="box-title">Organizer User</h3>
									<h6 class="box-subtitle"></h6>
								</div>
								<!-- /.box-header -->
								<div class="box-body">
									<table id="example1" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
										<thead>
											<tr>
												<th>No</th>
												<th>Name</th>
												<th>Email</th>
												<th>Mobile</th>
												<!--<th>Password</th>-->
												<th>Company Name</th>
												<!--<th>Description</th>-->
												<th>Address</th>
												<th>Image</th>
												<th>Verified</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$selectUser = $cnn -> getrows("SELECT * FROM user_master WHERE user_type = 'Organizer'");
												$i = 1;
												while($getUser = mysqli_fetch_array($selectUser))
												{ $user_id = $getUser['user_id'];
												?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $getUser['first_name']; ?></td>
												<td><?php echo $getUser['email']; ?></td>
												<td><?php echo $getUser['mobile']; ?></td>
												<!--<td><?php echo $getUser['password']; ?></td>-->
												<td><?php echo $getUser['event_org_cmp_name']; ?></td>
												<!--<td><?php echo $getUser['description']; ?></td>-->
												<td><?php echo $getUser['address']; ?></td>
												<td><img src="../stall_live/<?php echo $getUser['image']; ?>" height="50" width="50"></td>
												<td>
												<?php
												if($getUser['status'] == '1')
												{ ?>
													<i class="fa fa-thumbs-up fa-lg" style="color:green;"></i>
												<?php } else { ?>
													<i class="fa fa-thumbs-down fa-lg" style="color:red;"></i>
												<?php }
												?>
												</td>
												<td>
													<a href="deleteOrganizer.php?user_id=<?php echo $user_id; ?>" class="btn btn-danger btn-flat" style="font-size: 14px;" ><i class="fa fa-trash"></i></a>
												</td>
												
												<!--<td>
													<?php 
														if($getUser['status'] == '0')
														{
														?>
													<a href="editOrganizer.php?user_id=<?php echo $user_id; ?>&email=<?php echo $getUser['email'];?>&status=<?php echo $getUser['status'];?>"
														class="btn btn-danger btn-flat" style="font-size: 14px;" >Active &nbsp;<i class="fa fa-fw fa-arrow-circle-o-right"></i></a>
													<?php } ?>
													<?php
														if($getUser['status']=='1')
														{
														?>
													<a href="editOrganizer.php?user_id=<?php echo $user_id; ?>&email=<?php echo $getUser['email'];?>&status=<?php echo $getUser['status'];?>"
														class="btn btn-danger btn-flat" style="font-size: 14px;" >DeActivate&nbsp;<i class="fa fa-fw fa-arrow-circle-o-right"></i></a>
													<?php } ?>
												</td>-->
											</tr>
											<?php $i++; } ?>
										</tbody>
									</table>
								</div>
								<!-- /.box-body -->
							</div>
							<!-- /.box -->          
						</div>
					</div>
					<!-- /.row -->
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->
			<?php include("../include/footer.php"); ?>
			<!-- Add the sidebars background. This div must be placed immediately after the control sidebar -->
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