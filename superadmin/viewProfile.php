<?php
	include("../include/config.php");
	include("include/session.php");
    $cnn = new connection();
    $user_id = $_SESSION['user_id'];
    $selectuser = $cnn -> getrows("SELECT * FROM user_master WHERE user_id = '$user_id'");
    $getuser = mysqli_fetch_array($selectuser);
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
						User Profile
					</h1>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
						<li class="breadcrumb-item"><a href="#">Examples</a></li>
						<li class="breadcrumb-item active">User profile</li>
					</ol>
				</section>
				<!-- Main content -->
				<section class="content">
					<div class="row">
						<div class="col-xl-12 col-lg-12">
							<!-- Profile Image -->
							<div class="box box-primary">
								<div class="box-body box-profile">
                                <div class="container">
					<h1>Edit Profile</h1>
					<hr>
					<form action="editProfileScript.php" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-9">
						
						<div class="form-group">
							<label class="col-lg-3 control-label">First name:</label>
							<div class="col-lg-8">
								<input class="form-control" name="first_name" type="text" value="<?php echo $getuser['first_name']; ?>">
							</div>
						</div>
						<input class="form-control" type="hidden" name="user_id" value="<?php echo $getuser['user_id']; ?>">
						<div class="form-group">
							<label class="col-lg-3 control-label">Last name:</label>
							<div class="col-lg-8">
								<input class="form-control" name="last_name" type="text" value="<?php echo $getuser['last_name']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">Email:</label>
							<div class="col-lg-8">
								<input class="form-control" name="email"  type="text" value="<?php echo $getuser['email']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-3 control-label">Mobile:</label>
							<div class="col-lg-8">
								<input class="form-control" type="text" name="mobile"  value="<?php echo $getuser['mobile']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">State:</label>
							<div class="col-md-8">
								<input class="form-control" type="text" name="state"  value="<?php echo $getuser['state']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">City:</label>
							<div class="col-md-8">
								<input class="form-control" type="text" name="city"  value="<?php echo $getuser['city']; ?>">
							</div>
						</div>
						
						<div class="form-group" style="display:none">
							<label class="col-md-3 control-label">Company Name:</label>
							<div class="col-md-8">
								<input class="form-control" type="text" name="event_org_cmp_name" value="<?php echo $getuser['event_org_cmp_name']; ?>">
							</div>
						</div>
						
						
						<div class="form-group" style="display:none">
							<label class="col-md-3 control-label">Line Of Business:</label>
							<div class="col-md-8">
								<input class="form-control" type="text" name="event_org_cmp_name" value="<?php echo $getuser['event_org_cmp_name']; ?>">
							</div>
						</div>
						
						
						<div class="form-group">
							<label class="col-md-3 control-label">Descripation:</label>
							<div class="col-md-8">
								<input class="form-control" type="text" name="event_org_cmp_name" value="<?php echo $getuser['description']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Address:</label>
							<div class="col-md-8">
								<input class="form-control" type="text"  name="address"  value="<?php echo $getuser['address']; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Change Password:</label>
							<div class="col-md-8">
								<input class="form-control" type="text" name="password"  value="<?php echo $getuser['password']; ?>">
							</div>
						</div>
						</div>
						
					<div class="col-md-3 personal-info" style="margin-top: auto;margin-bottom: auto;display: block;margin-left: -9%;">
						<div class="text-center">
							<img src="../<?php echo $getuser['image']; ?>" id="blah" class="avatar img-circle" alt="avatar" height="200" width="200" style="border-radius:50%;">
							<h6>Upload a different photo...</h6>
							<input class="form-control" type="file" id="image" name="image">
						</div>
					</div>
					<div class="form-group col-md-6">
							<label class="col-md-3 control-label"></label>
							
							<button  type="submit" name="profile" class="btn btn-primary" value="Save Changes">Save Changes</button>
							
							
							<a href="index.php" class="btn btn-danger" style="color:white;">Cancel</a>
							
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
			<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
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