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
		<title>StallsBook - Add Testimonial</title>
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
                         Testimonial   
						<small>Control panel</small>
					</h1>
					<!-- <ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
						<li class="breadcrumb-item active">User</li>
						</ol> -->
				</section>
				<!-- Main content -->
                <section class="content" style="min-height: 0px;">
                    <div class="box box-default">
					    <div class="box-header with-border">
						<h3 class="box-title">Add Testimonial</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
						</div>
					</div>
                    <div class="box-body">
						<div class="row">
							<div class="col-12">
								<form name="testimonial" id="testimonial" method="post" action="addtestimonialScript.php" enctype="multipart/form-data">
									<div class="form-group row">
                                        <div class="col-sm-12">
                                            <span>Name</span>
                                            <input class="form-control col-sm-6" type="text" id="t_name" name="t_name" required>
                                        </div>
                                        <div class="col-sm-12">
                                            <span>Description</span>
                                            <input class="form-control col-sm-6" type="text" id="t_desc" name="t_desc" required>
                                        </div>
										<div class="col-sm-12">
                                            <span>Image</span>
                                            <input class="form-control col-sm-6" type="file" id="image" accept="image/x-png,image/gif,image/jpeg,image/jpg,image/png" name="image" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
									    <button type="submit" id="testimonial" name="testimonial" class="btn btn-danger btn-flat" style="font-size: 14px;">Submit <i class="fa fa-fw fa-arrow-circle-o-right"></i></button>
                                    </div>
								</form>
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->
					</div>
                </section>    
				<section class="content">
					<!-- Small boxes (Stat box) -->
					<div class="row">
						<div class="col-12">
							<div class="box">
								<div class="box-header">
									<h3 class="box-title">testimonial View</h3>
									<h6 class="box-subtitle"></h6>
								</div>
								<!-- /.box-header -->
								<div class="box-body">
									<table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
										<thead>
											<tr>
												<th>No</th>
												<th>Name</th>
												<th>Description</th>
												<th>Image</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$selectimage = $cnn -> getrows("SELECT * FROM testimonial");
												$i = 1;
												while($getimage = mysqli_fetch_array($selectimage))
												{ 
                                                    $t_id = $getimage['t_id'];
												?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $getimage['t_name']; ?></td>
												<td><?php echo $getimage['t_desc']; ?></td>
												<td><img src="../<?php echo $getimage['t_image']; ?>" height="50" width="50"></td>
                                                <td><a href="#" data-toggle="modal" onclick="edit(<?php echo $getimage['t_id']; ?>)" data-target="#modal-default" class="btn btn-success">Edit&nbsp;&nbsp;<i class="fa fa-pencil"></i></a>
                                                <a href="addtestimonialScript.php?t_id=<?php echo $getimage['t_id']; ?>" class="btn btn-danger btn-flat">Delete&nbsp;&nbsp;<i class="fa fa-trash"></i></a></td>
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
			<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
			<div class="control-sidebar-bg"></div>
		</div>

        <!-- Edit Model -->                                            
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Testimonial</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form name="cat1" id="cat1" method="POST" action="addtestimonialScript.php" enctype="multipart/form-data">
                            <input type="hidden" name="t_id" id="t_id1">
                            <div class="form-group row">
                                <label for="cat_name1" class="col-sm-4 col-form-label">Name</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" id="t_name1" name="t_name1" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cat_name1" class="col-sm-4 col-form-label">Description</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="text" id="t_desc1" name="t_desc1" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cat_name1" class="col-sm-4 col-form-label">Image</label>
                                <div class="col-sm-8">
                                    <input class="form-control" type="file" id="t_image1" name="t_image1">
                                    <img id="img12" src="" width="50" height="50">
                                </div>
                            </div>
                            <center>
                                <button type="submit" id="testimonial1" name="testimonial1" class="btn btn-danger btn-flat" style="font-size: 14px;margin-left: 30%;">Submit <i class="fa fa-fw fa-arrow-circle-o-right"></i></button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>		                                        
        <!-- Edit Model Over -->                                            
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
			var t_id = id;

			$.ajax({
					url:'addtestimonialScript.php',
					type:'POST',
					data : {
							t_id : t_id
                    },
					success:function(data)
					{
                        var data = $.parseJSON(data);
                        $("#t_id1").val(data.t_id);
						$("#t_name1").val(data.t_name);
						$("#t_desc1").val(data.t_desc);
						$("#img12").prop('src','../'+data.t_image);
                        
					}
			});
		}
	</script>
	</body>
</html>