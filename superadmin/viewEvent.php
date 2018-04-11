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
		<title>StallsBook - Stall Details</title>
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
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<!-- google font -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
		<style>
			.btn-center{
			margin-top:auto;
			margin-bottom:auto;
			display:block;
			}
			.form-content{
			margin-left: auto;width: 30%; margin-right: auto;display: block;
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
						Stall Detail
						<small>Control panel</small>
					</h1>
					<!-- <ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
						<li class="breadcrumb-item active">User</li>
						</ol> -->
					<!-- <div class="box-body">
						<div class="row">
							<div class="col-md-6 col-12">
								
							</div>
						</div>
						</div> -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Small boxes (Stat box) -->
					<div class="row">
						<div class="col-12">
							<div class="box">
								<div class="box-header">
									<h3 class="box-title">Stall Detail</h3>
									<h6 class="box-subtitle"></h6>
								</div>
								<div class="col-md-12">
									<div class="form-group form-content">
										<label>Select Stall User</label>
										<select class="form-control" id="user_id" name="user_id">
											<option>Select Stall User</option>
											<?php $viewEventuser = $cnn -> getrows("SELECT DISTINCT user_id,first_name,last_name FROM user_master WHERE user_type='Organizer'"); 
												while($getEventuser = mysqli_fetch_array($viewEventuser))
												{
												?>
											<option value="<?php echo $getEventuser['user_id']; ?>">
												<?php echo $getEventuser['first_name'].' '.$getEventuser['last_name'];  ?>
											</option>
											<?php } ?>
										</select>
									</div>
								</div>
								<hr>
								<section id="stallList">
									<!-- </div> -->
								</section>
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
		<script src="../assets/vendor_components/select2/dist/js/select2.full.js"></script>
		<!-- InputMask -->
		<script src="../assets/vendor_plugins/input-mask/jquery.inputmask.js"></script>
		<script src="../assets/vendor_plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
		<script src="../assets/vendor_plugins/input-mask/jquery.inputmask.extensions.js"></script>
		<script>
			$(document).ready(function(){
				$("#user_id").change(function(){
					var user_id = $("#user_id option:selected").val();
					$.ajax({
						url: 'getEventuser.php',
						type:'POST',
						data:{
							user_id:user_id	
						},
						success:function(data)
						{
							$('#stallList').html(data);
						}
					});
				});
			});
		</script>
	</body>
</html>