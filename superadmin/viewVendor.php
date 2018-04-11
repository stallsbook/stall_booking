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
		<title>StallsBook - View Vender</title>
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
						Vendor User
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
									<h3 class="box-title">Vendor User</h3>
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
												<th>Line Of business</th>
												<th>Address</th>
												<th>Image</th>
												<th>Verified</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$selectUser = $cnn -> getrows("SELECT * FROM user_master WHERE user_type = 'Vendor'");
												$i = 1;
												while($getUser = mysqli_fetch_array($selectUser))
												{ $user_id = $getUser['user_id'];
												?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $getUser['first_name'].' '.$getUser['last_name']; ?></td>
												<td><?php echo $getUser['email']; ?></td>
												<!--<td><?php echo $getUser['password']; ?></td>-->
												<!--<td><?php echo $getUser['mobile']; ?></td>-->
												
												<td><?php echo $getUser['event_org_cmp_name']; ?></td>
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
													<a href="deletevendor.php?user_id=<?php echo $user_id; ?>" class="btn btn-danger btn-flat" style="font-size: 14px;" >Delete </a>
												
												
													<a data-toggle="modal" data-target="#myModal<?php echo $i;?>" class="btn btn-success btn-flat" style="font-size:14px;width: 56px;color:white;" title="Vendor Information"> Info</a>
													
	
												</td>
												
												<!-- Modal -->
				<div id="myModal<?php echo $i;?>" class="modal fade" role="dialog">
				  <div class="modal-dialog modal-lg">
				
				    <!-- Modal content-->
				    <div class="modal-content" style="background-color:#f6e7d3;">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
<center>				        <h4 class="modal-title">Vendor Profile</h4></center>
				      </div>
				     <span style="color:black;"><hr></span>
				      <div class="modal-body">
				        
				        <div class="row">
				        	
				        		<div class="col-md-12">
				        		<div class="row">
				        			<div class="col-md-3">
				        			
				        				<div class="col-md-2"> Name</div>
				        				<div class="col-md-2">Mobile </div>
				        				<div class="col-md-2">Email</div>
				        				<div class="col-md-2">State</div>
				        				<div class="col-md-2">City</div>
				        				<div class="col-md-2">Business</div>
				        			</div>
				        			
				        			<div class="col-md-6">
				        				<div class="col-md-4">
				        				<span style="color:#1646edb3;"><?php echo $getUser['first_name']; ?></span>
				        				</div>
				        				
				        				<div class="col-md-2">
				        				<span style="color:#1646edb3;"><?php echo $getUser['mobile']; ?></span>
				        				</div>
				        				
				        				<div class="col-md-2">
				        				<span style="color:#1646edb3;"><?php echo $getUser['email']; ?></span>
				        				</div>
				        				
				        				<div class="col-md-2">
				        				<span style="color:#1646edb3;"><?php echo $getUser['state']; ?></span>
				        				</div>
				        				
				        				<div class="col-md-2">
				        				<span style="color:#1646edb3;"><?php echo $getUser['city']; ?></span>
				        				</div>
				        				
				        				<div class="col-md-2">
				        				<span style="color:#1646edb3;"><?php echo $getUser['event_org_cmp_name']; ?></span>
				        				</div>
				        			</div>
				        			
				        			<div class="col-md-3" style="margin-bottom: 7px;">
				        	<center>		Photo
				        			<br>
				        	<img src="../stall_live/<?php echo $getUser['image']; ?>" style="width:100px;height:100px;border-radius:50%;">
				        	</center>
				        			</div>
				        		
				        		</div>
				        		</div>
				        		
				        		<br><br><br>
				        		<button class="btn btn-success" style="width:100%;padding: 0;"></button>
				        		<div class="col-md-12" style="text-align:center;margin-bottom: 15px;">
				        		Business Photos
				        		</div>
				        		
				        		<?php
                  if($getUser['business_image'] != '')
                    { 
				        		$business_image = explode(',',$getUser['business_image']);
				        		foreach($business_image as $imgimg)
				        		{
				        		?>
				        		<div class="col-md-3" style="margin-bottom: 15px;">
				        		<img src="../stall_live/images/userProfile/<?php echo $imgimg; ?>" style="width:150px;height:150px;border-radius:50%;">
				        		</div>
				        		<?php } }?>
				        		
				        	
				        </div>
				        
				      </div>
				      <!--<div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				      </div>-->
				    </div>
				
				  </div>
				</div>
		<!--End-->
												<!--<td>
													<?php 
														if($getUser['status'] == '0')
														{
														?>
													<a href="editvendor.php?user_id=<?php echo $user_id; ?>&status=<?php echo $getUser['status'];?>"
														class="btn btn-danger btn-flat" style="font-size: 14px;" >Active </a>
													<?php } ?>
													<?php
														if($getUser['status']=='1')
														{
														?>
													<a href="editVendor.php?user_id=<?php echo $user_id; ?>&status=<?php echo $getUser['status'];?>"
														class="btn btn-danger btn-flat" style="font-size: 14px;" >DeActivate</a>
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