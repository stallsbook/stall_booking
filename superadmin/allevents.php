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
		<title>StallsBook - Dashboard</title>
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
						Events 
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
									<h3 class="box-title">All Events</h3>
									<h6 class="box-subtitle"></h6>
								</div>
								<!-- /.box-header -->
								<div class="box-body">
									<table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
										<thead>
											<tr>
												<th>No</th>
												<th>Event Name</th>
												<th>User Name</th>
												<th>Address</th>
												<th>Description</th>
												<th>Start Date</th>
												<th>End Date</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
										<?php
											$selecteve = $cnn -> getrows("SELECT um.user_id,um.email,um.first_name,um.last_name,em.event_id,
											em.event_name,em.event_address,em.event_desc,em.status,em.user_id,DATE_FORMAT(em.start_date,'%d-%m-%Y') as s_date,DATE_FORMAT(em.end_date,'%d-%m-%Y') as e_date FROM event_master em,user_master um where um.user_id=em.user_id and em.status = '1'");
											$i = 1;
											while($geteve = mysqli_fetch_array($selecteve))
											{
										?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $geteve['event_name']; ?></td>
												<td><?php echo $geteve['first_name']; ?></td>
												<td><?php echo $geteve['event_address']; ?></td>
												<td><?php echo substr($geteve['event_desc'],0,20); ?>..</td>
												<td><?php echo $geteve['s_date']; ?></td>
												<td><?php echo $geteve['e_date']; ?></td>
												   <td><a data-toggle="modal" style="color:white" onclick="edit('<?php echo $geteve["event_id"]; ?>')" data-target="#modal-default"  class="btn btn-danger btn-flat">Delete&nbsp;&nbsp;<i class="fa fa-trash"></i></a><br/><br/>
												   <a href="eventinfo.php?eventid=<?php echo $geteve["event_id"];?>" style="color:white" class="btn btn-warning btn-flat">View Info&nbsp;&nbsp;</a><br/><br/>
												   
													<?php if($geteve["status"] == '1') { ?>
													<a class="btn btn-success" href="updateeventstatus.php?eventid=<?php echo $geteve["event_id"]; ?>&email=<?php echo $geteve["email"]; ?>&user_id=<?php echo $geteve["user_id"]; ?>&status=0">DeActive</a>
													<?php } else { ?>
													<a class="btn btn-danger" href="updateeventstatus.php?eventid=<?php echo $geteve["event_id"]; ?>&email=<?php echo $geteve["email"]; ?>&user_id=<?php echo $geteve["user_id"]; ?>&status=1">Active</a>
													<?php } ?>
												</td>
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
			
			<div class="control-sidebar-bg"></div>
		</div>
		 <div class="modal fade" id="modal-default">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h4 class="modal-title">Add Reason</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span></button>
					  </div>
					  <div class="modal-body">
						<form name="cat1" id="cat1" method="POST" action="deleteevent.php" enctype="multipart/form-data">
							<input type="hidden" name="eventid" id="eventid" value="">
	            	<div class="form-group row">
					  <label for="cat_name1" class="col-sm-2 col-form-label">Reason</label>
					  <div class="col-sm-10">
						<textarea class="form-control" type="text" id="reason" name="reason" placeholder="Enter Reason" required></textarea>
					  </div>
					</div>
					<center>
						<button type="submit" name="addCategory1" class="btn btn-danger btn-flat" style="font-size: 14px;    margin-left: 30%;">Submit <i class="fa fa-fw fa-arrow-circle-o-right"></i></button>
					</center>
				</form>
					  </div>
					  
					</div>
					<!-- /.modal-content -->
				  </div>
				  <!-- /.modal-dialog -->
			 <!-- </div> -->
			  <!-- /.modal -->

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
		<script>
		function edit(id)
		{
			var event_id = id;
			
			$("#eventid").val(event_id);	
		}
		</script>	
	</body>
</html>