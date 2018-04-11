<?php
	include("../include/config.php");
	include("include/session.php");
	$cnn = new connection();
	$user_id = $_GET['user_id'];
	$event_id = $_GET['event_id'];
	
	$selectevent = $cnn -> getrows("SELECT * FROM user_master um, event_master em, category_master cm, review_ratting_master rm  WHERE um.user_id = em.user_id AND em.event_id = '$event_id' AND um.user_id = '$user_id'");
	$getevent = mysqli_fetch_array($selectevent);
	
	$selectevent1 = $cnn -> getrows("SELECT * FROM user_master um, event_master em, category_master cm WHERE um.user_id = em.user_id AND em.event_id = '$event_id' AND um.user_id = '$user_id'");
	
	$getevent1 = mysqli_fetch_array($selectevent1);
	  $image = $getevent1 ['images'];
	  $new_image = explode(",",$image);
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
		<title>Stall Booking - View Event Details</title>
		<!-- Bootstrap 4.0-->
		<link rel="stylesheet" href="../assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">
		<!-- Bootstrap 4.0-->
		<link rel="stylesheet" href="../assets/vendor_components/bootstrap/dist/css/bootstrap-extend.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="../assets/vendor_components/font-awesome/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="../assets/vendor_components/Ionicons/css/ionicons.min.css">
		<!-- glyphicons -->
		<link rel="stylesheet" href="../assets/vendor_components/glyphicons/glyphicon.css">
		<!-- gallery -->
		<link rel="stylesheet" type="text/css" href="../assets/vendor_components/gallery/css/animated-masonry-gallery.css" />
		<!-- theme style -->
		<link rel="stylesheet" href="../css/master_style.css">
		<!-- apro_admin skins. choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
		<link rel="stylesheet" href="../css/skins/_all-skins.css">
		<!-- google font -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
		<style type="text/css">
			.dayTime
			{
				border:1px solid;
				background: #33cabb;
				color: white;
				box-shadow: 5px 3px #c8ece9;
			}
			.fa-star
			{
				font-size: 15px;
				border: 1px solid #4267b2;
				border-radius: 3px;
				padding: 2px;
				background: #4267b2;color: #f9a763;
			}
			b{
				font-size:15px;
			}
			.table-bordered, .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
				border: 1px solid #00000078;
			}
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
						Event Details
						<small>Control panel</small>
					</h1>
					<!-- <ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
						<li class="breadcrumb-item active">State</li>
						</ol> -->
				</section>
				<!-- Main content -->
				<section class="content">
					<div class="row">
						<!--<div class="col-xl-4 col-lg-5">
							
							<div class="box box-primary" style="background-color: #f2f6f8;">
								<div class="box-body box-profile">
									<img class="profile-user-img rounded-circle img-fluid mx-auto d-block" src="../stall_live/<?php echo $getevent1['banner']; ?>" alt="User profile picture">
									<h3 class="profile-username text-center" style="margin-top: -12px;"><?php echo $getevent['event_name']; ?></h3>
								</div>
								
							</div>
							
						</div>-->
						
						<div class="col-xl-12 col-lg-11">
							<div class="box box-solid">
								<div class="box-header with-border">
									<i class="fa fa-text-width"></i>
									<h3 class="box-title">Event Details</h3>
								</div>
								<!-- /.box-header -->
								<div class="box-body">
									<dl class="dl-horizontal">
										<dt>Organizer</dt>
										<dd><?php echo $getevent1['first_name'] ." ".$getevent['last_name']; ?></dd>
										<dt>Company Name</dt>
										<dd><?php echo $getevent1['event_org_cmp_name']; ?></dd>
										<dt>Event Name</dt>
										<dd><?php echo $getevent1['event_name']; ?></dd>
										<dt>Event Description</dt>
										<dd><?php echo $getevent1['event_desc']; ?></dd>
										<dt>Duration</dt>
										<dd><?php echo date('d/m/Y',strtotime($getevent1['start_date'])); ?> <b>TO</b> <?php echo date('d/m/Y',strtotime($getevent1['end_date'])); ?> </dd>
										<dt>Overall Review</dt>
										<dd>
											<?php 
												$avgrating = $cnn -> getrows("SELECT AVG(rm.o_rating) AS o_rating FROM review_ratting_master rm, event_master em WHERE em.event_id = rm.event_id ANd em.event_id='$event_id'");
												$getreting = mysqli_fetch_array($avgrating);
												$avgreview = floor($getreting['o_rating']);
												$star = floor($getreting['o_rating']); 
												if($star != '0')
												{
													
												
													for($i = 1; $i <= 5; $i++)
													{
													if($i <= $star)
													{ ?>
													<i class="fa fa-star" aria-hidden="true"></i>
													<?php }
													else
													{ ?>
													<i class="fa fa-star" aria-hidden="true" style="color:#ffffff"></i>
													<?php }
													}
												}
												else
												{?>
													<p style="color:red">No Overall Rating</p>
												<?php
												}
											?>
										</dd>
										<dt>Photo</dt>
										<dd><img class="img-responsive img-thumbnail" style="width:75% !important;height:200px;" src="../stall_live/<?php echo $getevent1['banner']; ?>" alt="User profile picture"></dd>
									</dl>
									<br><br>
								</div>
								<!-- /.box-body -->
							</div>
							<!-- /.box -->
						</div>
					</div>
					<!-- /.row -->
					<!-- Tab Data -->
					<div class="col-xl-12 col-lg-12">
						<div class="nav-tabs-custom">
							<ul class="nav nav-tabs">
								<li><a class="active" href="#venueaddress" data-toggle="tab">Venue Address</a></li>
								<li><a href="#gallery1" data-toggle="tab">Gallery</a></li>
								<li><a href="#vendordetail" data-toggle="tab">Vender Details</a></li>
								<li><a href="#rating" data-toggle="tab">Rating & Review</a></li>
								<li><a href="#payment" data-toggle="tab">Payment</a></li>
							</ul>
							<div class="tab-content">
								<div class="active tab-pane" id="venueaddress">
									<div class="row">
										<div class="col-md-6">
											<div class="box-body">
												<dl class="dl-horizontal">
													<dt>Event Address</dt>
													<dd><?php echo $getevent['event_address']; ?></dd>
												</dl>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane" id="gallery1">
									<div class="row">
									

													<?php 
													$event_photo = explode(",",$getevent1['images']);
													
													foreach($event_photo as $imgimg)
													{ ?>
													<div class="col-md-3">
														<img src="../stall_live/images/event/<?php echo $imgimg; ?>" style="height:150px;width:100%;border-radius: 2%;">
														</div>
													<?php } ?>
												
										
									</div>
								</div>
								<div class="tab-pane" id="vendordetail">
									<section class="content">
										<div class="row">
											<table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
												<thead>
													<tr>
														<th>No</th>
														<th>Stall Number</th>
														<th>Stall Name</th>
														<th>Full Name</th>
														<th>Email</th>
														<th>Mobile</th>
													</tr>
												</thead>
												<tbody>
													<?php
														$selectUser = $cnn -> getrows("SELECT * FROM User_master um, booking_master bm, event_master em WHERE um.user_id = bm.user_id AND em.event_id = bm.event_id AND em.event_id = '$event_id'");
														$i = 1;
														while($getUser = mysqli_fetch_array($selectUser))
														{ 
															$user_id = $getUser['user_id'];
															$event_id = $getUser['event_id'];
														?>
													<tr>
														<td><?php echo $i; ?></td>
														<td><?php echo $getUser['shop_no']; ?></td>
														<td><?php echo $getUser['shop_name']; ?></td>
														<td><?php echo $getUser['first_name'].' '.$getUser['last_name']; ?></td>
														<td><?php echo $getUser['email']; ?></td>
														<td><?php echo $getUser['mobile']; ?></td>
													</tr>
													<?php $i++; } ?>
												</tbody>
											</table>
										</div>
									</section>
								</div>
								<div class="tab-pane" id="vendordetail">
									<section class="content">
										<div class="row">
											<table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
												<thead>
													<tr>
														<th>No</th>
														<th>Stall Number</th>
														<th>Stall Name</th>
														<th>Full Name</th>
														<th>Email</th>
														<th>Mobile</th>
													</tr>
												</thead>
												<tbody>
													<?php
														$selectUser = $cnn -> getrows("SELECT * FROM User_master um, booking_master bm, event_master em WHERE um.user_id = bm.user_id AND em.event_id = bm.event_id AND em.event_id = '$event_id'");
														$i = 1;
														while($getUser = mysqli_fetch_array($selectUser))
														{ 
															$user_id = $getUser['user_id'];
															$event_id = $getUser['event_id'];
														?>
													<tr>
														<td><?php echo $i; ?></td>
														<td><?php echo $getUser['shop_no']; ?></td>
														<td><?php echo $getUser['shop_name']; ?></td>
														<td><?php echo $getUser['first_name'].' '.$getUser['last_name']; ?></td>
														<td><?php echo $getUser['email']; ?></td>
														<td><?php echo $getUser['mobile']; ?></td>
													</tr>
													<?php $i++; } ?>
												</tbody>
											</table>
										</div>
									</section>
								</div>
								<div class="tab-pane" id="rating">
									<div class="row">
										<div class="col-xl-12 col-lg-12">
											<div class="box box-widget">
												<?php
													$viewReview = $cnn -> countrow("SELECT * FROM user_master um , event_master em , review_ratting_master rm where em.event_id = rm.event_id AND um.user_id = rm.user_id AND um.user_id = '$user_id' AND em.event_id='$event_id'");
													if($viewReview > 0)
													{
														$selectevent = $cnn -> getrows("SELECT * FROM user_master um , event_master em , review_ratting_master rm where em.event_id = rm.event_id AND um.user_id = rm.user_id AND um.user_id ='$user_id' AND em.event_id='$event_id'");
														while($getReview = mysqli_fetch_array($selectevent))
														{
													?>
													<div class="box-header with-border" style="background: #37414f1a;margin: 5px 0px; border-radius: 5px;">
													<div class="user-block">
														<!-- <img class="rounded" src="../<?php echo $getReview['image']; ?>" > -->
													</div>
													<div class="row">
														<div class="col-md-12">
															<span class="username" style="font-size:20px"><?php echo $getReview['first_name']." ".$getReview['last_name']; ?></span>
															<small class="description">Publish On -<?php echo date('d M, Y', strtotime($getReview['date'])); ?></small>
														</div>
														<br>
														<br>
													</div>
													<div class="row">
														<div class="col-md-6">
															<span><b>Organizer Rating &nbsp;&nbsp;: &nbsp;&nbsp;</b>
															<?php
																$star = $getReview['o_rating'];
																for($i = 1; $i <= 5; $i++)
																{
																  if($i <= $star)
																  { ?>
															<i class="fa fa-star" aria-hidden="true" style=""></i>
															<?php }
																else
																{ ?>
															<i class="fa fa-star" aria-hidden="true" style="color:#fffff"></i>
															<?php }
																}
																?>
															</span><br>
															<span><b>Organizer Review &nbsp;: &nbsp;&nbsp;</b><?php echo $getReview['o_review']; ?></span>
														</div>
														<div class="col-md-6">
															<span><b>Venue Rating &nbsp;&nbsp;: &nbsp;&nbsp;</b>
															<?php
																$star = $getReview['v_rating'];
																for($i = 1; $i <= 5; $i++)
																{
																if($i <= $star)
																{ ?>
															<i class="fa fa-star" aria-hidden="true"></i>
															<?php }
																else
																{ ?>
															<i class="fa fa-star" aria-hidden="true" style="color:#ffffff"></i>
															<?php }
																}
																?>
															</span><br>
															<span><b>Venue Review &nbsp;: &nbsp;&nbsp;</b><?php echo $getReview['v_review']; ?></span>
														</div>
													</div>
												</div>
												<?php } } else{?> <p style="color:red">No Rating and Review </p><?php }?>
											</div>
										</div>
										<hr>
									</div>
								</div>
								<div class="tab-pane" id="payment">
								<section class="content">
									<div class="row">
										<table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
											<thead>
												<tr>
													<th>No</th>
													<th>Event Name</th>
													<th>Sender Name</th>
													<th>Amount</th>
													<th>Date</th>
												</tr>
											</thead>
											<tbody>
												<?php
													$selectUser = $cnn -> getrows("SELECT *,DATE_FORMAT(pm.date,'%d-%m-%Y') as pdate FROM event_master em, payment_master pm, user_master um WHERE pm.sender_id = um.user_id AND em.event_id = '$event_id'");
													if(mysqli_num_rows($selectUser) != '0')
													{
													$i = 1; 
													$getUser = mysqli_fetch_array($selectUser);
													$user_id = $getUser['user_id'];
													$event_id = $getUser['event_id'];
												?>
												<tr>
													<td><?php echo $i; ?></td>
													<td><?php echo $getUser['event_name']; ?></td>
													<td><?php echo $getUser['first_name']; ?></td>
													<td><?php echo $getUser['amount']; ?></td>
													<td><?php echo $getUser['pdate']; ?></td>
												</tr>
												<?php } 
												else
												{ ?>
												<tr>
												<td colspan="5" style="color:red;">No Data Available
												</td>
												</tr>
												
											<?php	}
												?>
											</tbody>
										</table>
									</div>
								</section>
							</div>
							
							</div>
						</div>
					</div>
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->
			<?php include("../include/footer.php"); ?>
			<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
			<div class="control-sidebar-bg"></div>
		</div>
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