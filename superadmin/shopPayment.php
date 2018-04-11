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
		<style>
			.shop-payment{
					padding: 12px;
					background: #5f9ea01f;
			}
			.userinfo{
				border-right:1px solid;
			}
			.shopinfo{
				font-weight: 500;
				font-size: 16px;    
				color: #d14836;
			}
			p{
				text-align:center;
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
					<h1>Payment Details</h1>
				</section>
				<!-- Main content -->
                <section class="content">
                    <div class="box box-primary">
                        <h4>Shop Name</h4>
                        <div class="row" >
                            <div class="col-sm-12">
                                <div class="shop-payment">
                                    <div class="row">
										<div class="col-sm-6">
											<div class="row">
												<div class="col-sm-3 userinfo">
													<p class="shopinfo">Full Name :</p>
													<p class="">Adem Bridge</p>
												</div>
												<div class="col-sm-3 userinfo">
													<p class="shopinfo"> Event Name:</p>
													<p>Bookcraft</p>
												</div>
												<div class="col-sm-3 userinfo">
													<p class="text-center shopinfo">Shop No :</p>
													<p>15</p>
												</div>
												<div class="col-sm-3 userinfo">
													<p class="shopinfo">Date :</p>
													<p>01/01/2017</p>
												</div>
											</div>
										</div>
                                        <div class="col-sm-6">
											<div class="row">
												<div class="col-sm-3 userinfo">
													<p class="shopinfo">Shop Name :</p>
													<p>Rudraks</p>
												</div>
												<div class="col-sm-3 userinfo">
													<p class="shopinfo" >Discription :</p>
													<p>This My Shop</p>
												</div>
												<div class="col-sm-3 userinfo">
													<p class="shopinfo">Total Table:</p>
													<p>10</p>
												</div> 
												<div class="col-sm-3">
													<p class="shopinfo">Total Chair:</p>
													<p>10</p>
												</div>
											</div>
										</div>
                                   </div>    
                                </div>       
                            </div>
                        </div>
                    </div>    
                </section>    
                <!-- /.col -->
                <!-- fix for small devices only -->
                <div class="clearfix visible-sm-block"></div>
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