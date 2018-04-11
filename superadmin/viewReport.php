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
		<title>StallsBook - Report Master</title>
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
			.btn-center{
				margin-top:auto;
				margin-bottom:auto;
				display:block;
			}
			.form-content{
				margin-left: auto;width: 30%; margin-right: auto;display: block;
			}
		    .dayTime
			{
				border:1px solid;
				background: #33cabb;
				color: white;
				box-shadow: 5px 3px #c8ece9;
			}
			/* .table-bordered, .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
				border: 1px solid #00000078;
			} */
			#example_wrapper{
				width:100%;
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
						Report View
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
									<h3 class="box-title">Report View</h3>
									<h6 class="box-subtitle"></h6>
								</div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group ">
                                            <label>Select Year</label>
                                            <select class="form-control" id="event_year" name="event_year">
                                                <option>Select Year</option>
                                                <?php
                                                    $yearArray = range(2015, 2050);
                                                    foreach ($yearArray as $year) {
                                                        $selected = ($year == 2018) ? 'selected' : '';
                                                        echo '<option '.$selected.' value="'.$year.'">'.$year.'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group ">
                                            <label>Select Month</label>
                                            <select class="form-control" id="event_month" name="event_month">
                                                <option>Select Month</option>
                                                <?php
                                                    $i = 1;
                                                    $month = strtotime("01-01-2017");
                                                    while($i <= 12)
                                                    {
                                                        $month_name = date('F', $month);
                                                        echo '<option'.$selected.' value="'.date('n', $month).'">'.date('F', $month).'</option>'."\n";
                                                        $month = strtotime('+1 month', $month);
                                                        $i++;
                                                    }
                                                ?>
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group ">
                                            <label>Select Date</label>
                                            <input class="form-control" type="date" value="2017-12-31" id="start_date">
                                        </div>
                                    </div>
								</div>
								<hr>
								<div class="row">
									<div class="col-sm-12">				
										<table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
											<thead>
												<tr>
													<th>No</th>
													<th>Event Name</th>
													<th>Organizer Name</th>
													<th>Address</th>
													<th>Image</th>
												</tr>
											</thead>
											<tbody id="eventReport"></tbody>
										</table>
									</div>	
								</div>
							</div>
							<!-- /.box -->          
						</div>
					<!-- </div> -->
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
		<script style"text/javascript">
			$(document).ready(function(){
				$("#event_year").change(function(){
					var event_year = $("#event_year").val();
                    $.ajax({
						url: 'getCustomReport.php',
						type:'POST',
						data:{
							start_year:event_year
						},
						success:function(data)
						{
							$('#eventReport').html(data);
						}
					});
				});
			});
		</script>
		<script>
			$(document).ready(function(){
				$("#event_month").change(function(){
					var event_month = $("#event_month").val();
                    $.ajax({
						url: 'getCustomReport.php',
						type:'POST',
						data:{
							event_month:event_month	
						},
						success:function(data)
						{
							$('#eventReport').html(data);
						}
					});
				});
			});
		</script>
		<script>
			$(document).ready(function(){
				$("#start_date").change(function(){
					var start_date = $("#start_date").val();
                    $.ajax({
						url: 'getCustomReport.php',
						type:'POST',
						data:{
							start_date:start_date	
						},
						success:function(data)
						{
							$('#eventReport').html(data);
						}
					});
				});
			});
		</script>
	</body>
</html>