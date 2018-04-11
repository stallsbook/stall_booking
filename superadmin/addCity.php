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

    <title>StallsBook - Add Event City</title>
    
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
        City
        <small>Control panel</small>
      </h1>
      <!-- <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">State</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- Basic Forms -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add City</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-12">
            	<form name="city" id="city" method="POST" action="addCityScript.php">
	            	<div class="form-group row">
					  <label for="cat_name" class="col-sm-2 col-form-label">City Name</label>
					  <div class="col-sm-10">
						<input class="form-control" type="text" id="cName" name="cName" placeholder="City Name" required>
					  </div>
					</div>
					<center>
						<button type="submit" id="addCity" name="addCity" class="btn btn-danger btn-flat" style="font-size: 14px;">Submit <i class="fa fa-fw fa-arrow-circle-o-right"></i></button>
					</center>
				</form>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
      <!-- /.row -->
      <!-- Display State Data -->
      <!-- Main content -->
    
      <!-- Small boxes (Stat box) -->
      	<div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">View City</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
            <!-- /.box-header -->
            <div class="box-body">
            	
              	<div class="row">
              		<?php 
              		$selectCity = $cnn -> getrows("SELECT *FROM city_master");
              		$i =1;
              		while($getCat = mysqli_fetch_array($selectCity))
              		{ ?>
              			<div class="col-xl-3 col-md-6 col-12">
				          <div class="info-box" style="background: #11ad95;">
				            <span class="info-box-icon bg-aqua" style="background-color: #121149ad;"><?php echo $i; ?></span>

				            <div class="info-box-content">
				              	<span class="info-box-number" style="font-size: 14px;color:white;"></span>
				              	<a title="<?php echo $getCat['cName']; ?>"><span class="info-box-text" style="color:white;"><?php echo $getCat['cName']; ?></span></a>
				              	<a href="addCityScript.php?cId=<?php echo $getCat['cId']; ?>&deleteCate=deleteCate"><i class="fa fa-trash fa-lg" style="color:#d23b19;"></i></a>&nbsp;&nbsp;&nbsp;
				            	<a href="#" data-toggle="modal" onclick="edit(<?php echo $getCat['cId']; ?>)" data-target="#modal-default"><i class="fa fa-pencil fa-lg edit" style="color:#d23b19;"></i></a>
				            </div>
				            
				          </div>
				          
				        </div>
				        
              		<?php $i++; }	?>
			        
			      </div>
			      <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </div>
          </div>
      
    <!-- /.content -->
  </div>
			  <!-- Edit Model -->
			   <div class="modal fade" id="modal-default">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h4 class="modal-title">Edit City</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span></button>
					  </div>
					  <div class="modal-body">
						<form name="cat1" id="cat1" method="POST" action="addCityScript.php">
							<input type="hidden" name="cId" id="cId">
	            	<div class="form-group row">
					  <label for="cat_name1" class="col-sm-4 col-form-label">City Name</label>
					  <div class="col-sm-8">
						<input class="form-control" type="text" id="cName1" name="cName1" placeholder="City Name" required>
					  </div>
					</div>
					<center>
						<button type="submit" id="addCity1" name="addCity1" class="btn btn-danger btn-flat" style="font-size: 14px;    margin-left: 30%;">Submit <i class="fa fa-fw fa-arrow-circle-o-right"></i></button>
					</center>
				</form>
					  </div>
					  
					</div>
					<!-- /.modal-content -->
				  </div>
				  <!-- /.modal-dialog -->
			 <!-- </div> -->
			  <!-- /.modal -->

			
  <!-- /.content-wrapper -->

  
  <!-- Add the sidebars background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
  <?php include("../include/footer.php"); ?>
<!-- ./wrapper -->
	  
	<!-- jQuery 3 -->
	<script src="../assets/vendor_components/jquery/dist/jquery.js"></script>
	
	<!-- jQuery UI 1.11.4 -->
	<script src="../assets/vendor_components/jquery-ui/jquery-ui.js"></script>
	
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
	  $.widget.bridge('uibutton', $.ui.button);
	</script>
	
	<!-- popper -->
	<script src="../assets/vendor_components/popper/dist/popper.min.js"></script>
	
	<!-- Bootstrap 4.0-->
	<script src="../assets/vendor_components/bootstrap/dist/js/bootstrap.js"></script>	
	
	<!-- Sparkline -->
	<script src="../assets/vendor_components/jquery-sparkline/dist/jquery.sparkline.js"></script>
	
	
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
			var cId = id;

			$.ajax({
					url:'addCityScript.php',
					type:'POST',
					data : {
							cId : cId
					},
					success:function(data)
					{
						var data = $.parseJSON(data);
						$("#cId").val(data.cId);
						$("#cName1").val(data.cName);
					}
			});
		}
	</script>
</body>

</html>
