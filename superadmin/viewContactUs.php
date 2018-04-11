<?php
	include("../include/config.php");
	include("include/session.php");
    $cnn = new connection();
    
    $selectuser = $cnn -> getrows("SELECT * FROM contact_us_master WHERE con_id = '1'");
    $getus = mysqli_fetch_array($selectuser);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="images/favicon.ico">
		<title>StallsBook - View Profile</title>
		<!-- Bootstrap 4.0-->
		<link rel="stylesheet" href="../assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">
		<!-- Bootstrap 4.0-->
		<link rel="stylesheet" href="../assets/vendor_components/bootstrap/dist/css/bootstrap-extend.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="../assets/vendor_components/font-awesome/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="../assets/vendor_components/Ionicons/css/ionicons.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="../css/master_style.css">
		<!-- apro_admin Skins. Choose a skin from the css/skins
			folder instead of downloading all of them to reduce the load. -->
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
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<h1>
						Contact Us
					</h1>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
						
						<li class="breadcrumb-item active">Contact Us</li>
					</ol>
				</section>
				<!-- Main content -->
				<section class="content">
					<div class="row">
						<div class="col-md-12">
							<!-- Profile Image -->
							<div class="box box-primary">
								<div class="box-body box-profile">
                                <div class="container">
					<h1>Edit Contact Us</h1>
					<hr>
					<form action="editcontactusScript.php" method="POST" class="" role="form">
					<div class="row">
						
						<div class="col-md-6">
						<div class="form-group">
							<label class="col-md-4">Postal Address:</label>
							<div class="col-md-8">
								<textarea class="form-control" name="con_address" type="text" row='2' col='2'><?php echo $getus['con_address']; ?></textarea>
							</div>
						</div>
						</div>
						<div class="col-md-6">
						<div class="form-group">
							<label class="col-md-4 control-label">Mobile:</label>
							<div class="col-md-8">
								<input class="form-control" name="con_mobile" type="text" value="<?php echo $getus['con_mobile']; ?>">
							</div>
						</div>
						</div>
						
						<div class="col-md-6">
						<div class="form-group">
							<label class="col-md-4 control-label">Email:</label>
							<div class="col-md-8">
								<input class="form-control" name="con_email"  type="text" value="<?php echo $getus['con_email']; ?>">
							</div>
						</div>
						</div>
						<div class="col-md-6">
						<div class="form-group">
							<label class="col-md-4 control-label">Open Hours:</label>
							<div class="col-md-8">
								<input class="form-control" type="text" name="con_open"  value="<?php echo $getus['con_open']; ?>">
							</div>
						</div>
						</div>
						
						</div>
						
					
					<div class="form-group col-md-12">
							<label class="col-md-3 control-label"></label>
							<center>
							<button  type="submit" name="profile" class="btn btn-primary" value="Save Changes" style="margin-right: 16%;">Save Changes</button>
							</center>
							
							<!--<a href="index.php" class="btn btn-danger" style="color:white;">Cancel</a>-->
							
						</div>
					</div>
					</form>
				</div>
									
								</div>
								<!-- /.box-body -->
							</div>
							<!-- /.box -->
						</div>
						<!-- /.col -->
						
						<!-- /.col -->
					</div>
					<!-- /.row -->
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->
			<!-- /.content-wrapper -->
			<?php include("../include/footer.php"); ?>
			<!-- Control Sidebar -->
			<aside class="control-sidebar control-sidebar-light">
				<!-- Create the tabs -->
				<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
					<li class="nav-item"><a href="#control-sidebar-home-tab" data-toggle="tab">Home</a></li>
					<li class="nav-item"><a href="#control-sidebar-settings-tab" data-toggle="tab">Settings</a></li>
				</ul>
				<!-- Tab panes -->
				
			</aside>
			<!-- /.control-sidebar -->
			<!-- Add the sidebars background. This div must be placed immediately after the control sidebar -->
			<div class="control-sidebar-bg"></div>
		</div>
		<!-- ./wrapper -->
		<!-- jQuery 3 -->
		<script src="../assets/vendor_components/jquery/dist/jquery.min.js"></script>
		<!-- popper -->
		<script src="../assets/vendor_components/popper/dist/popper.min.js"></script>
		<!-- Bootstrap 4.0-->
		<script src="../assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- SlimScroll -->
		<script src="../assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
		<!-- FastClick -->
		<script src="../assets/vendor_components/fastclick/lib/fastclick.js"></script>
		<!-- apro_admin App -->
		<script src="../js/template.js"></script>
		<!-- apro_admin for demo purposes -->
        <script src="../js/demo.js"></script>
        <script>
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		
		        reader.onload = function (e) {
		            $('#blah').attr('src', e.target.result);
		        }
		
		        reader.readAsDataURL(input.files[0]);
		    }
		}
		
		$("#image").change(function(){
		    readURL(this);
		});
		
		</script>
	</body>
</html>