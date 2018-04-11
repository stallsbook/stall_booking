<?php
	include("../include/config.php");
	include("include/session.php");
	   $cnn = new connection();
	   $user_id = $_GET['user_id'];
	   $event_id = $_GET['event_id'];
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
		<title>StallsBook - View Review And Ratting</title>
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
			.fa-star{
				font-size: 15px;
				border: 1px solid #4267b2;
				border-radius: 3px;
				padding: 2px;
				background: #4267b2;color: #f9a763;
			}
			b{
				font-size:15px;
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
					<h1>Vendor Review Details</h1>
				</section>
				<!-- Main content -->
				<div class="col-xl-12 col-lg-12">
					<div class="tab-pane" id="review">
						<div class="row">
							<div class="col-xl-12 col-lg-12">
								<!-- Box Comment -->
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
                                    <?php } } else{?> No Rating and Review <?php }?>
									<!-- /.box-header -->
								</div>
								<!-- /.box -->
							</div>
							<hr>
							<!-- /.col -->
						</div>
					</div>
				</div>
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
		<!-- jQuery 3 -->
		<script src="../assets/vendor_components/jquery/dist/jquery.min.js"></script>
		<!-- popper -->
		<script src="../assets/vendor_components/popper/dist/popper.min.js"></script>
		<!-- Sparkline -->
		<script src="../assets/vendor_components/jquery-sparkline/dist/jquery.sparkline.js"></script>
		<!-- Bootstrap 4.0-->
		<script src="../assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- Slimscroll -->
		<script src="../assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js"></script>
		<script src="../assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
		<!-- FastClick -->
		<script src="../assets/vendor_components/fastclick/lib/fastclick.js"></script>
		<!-- apro_admin App -->
		<script src="../js/template.js"></script>
		<!-- apro_admin for demo purposes -->
		<script src="../js/demo.js"></script>
	</body>
</html>