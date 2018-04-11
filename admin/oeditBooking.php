<?php
  include("../include/config.php");
  include("../include/session.php");
  $cnn = new connection();
  $book_id = $_GET['book_id'];
  $event_id = $_GET['event_id'];
  $selectBook = $cnn -> getrows("SELECT *FROM booking_master WHERE book_id = '$book_id' AND event_id = '$event_id'");
  $getBook = mysqli_fetch_array($selectBook);
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

    <title>StallsBook - Edit Booking</title>
    
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
        Booking
        <small>Control panel</small>
      </h1>
      
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- Basic Forms -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Booking</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="">
            <div class="">
            	<form name="eventEdit" id="eventEdit" method="POST" action="oeditDeleteBookingScript.php" enctype="multipart/form-data">
              <input type="hidden" id="book_id" name="book_id" value="<?php echo $getBook['book_id']; ?>">
              <input type="hidden" id="event_id" name="event_id" value="<?php echo $event_id; ?>">

              <!--<div class="row">
                <div class="col-md-6 form-group">
                    <label>First Name</label>
                    <input class="form-control" type="text" id="vfirst_name" name="vfirst_name" value="<?php echo $getBook['vfirst_name']; ?>" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>Last Name</label>
                    <input class="form-control" type="text" id="vlast_name" name="vlast_name" value="<?php echo $getBook['vlast_name']; ?>" required>
                </div>
            </div>  -->  

             <!--<div class="row">
  	            <div class="col-md-6 form-group">
      					   <label>Email</label>
      					   <input class="form-control" type="text" id="vemail" name="vemail" value="<?php echo $getBook['vemail']; ?>" required>
      				</div>
               	<div class="col-md-6 form-group">
               		 <label>Mobile</label>
                   <input class="form-control" type="text" id="vmobile" name="vmobile" value="<?php echo $getBook['vmobile']; ?>" required>
                </div>
             </div>-->
             <div class="row">
                <div class="col-md-6 form-group">
                   <label>No of Stall</label>
                   <input class="form-control" type="text" id="shop_no" name="shop_no" value="<?php echo $getBook['shop_no']; ?>" required>
              </div>
                <div class="col-md-6 form-group">
                   <label>Stall Name</label>
                   <input class="form-control" type="text" id="shop_name" name="shop_name" value="<?php echo $getBook['shop_name']; ?>" required>
                </div>
             </div>
              
            <div class="row">
    			<div class="col-md-6 form-group">
    				<label>Start Date</label>
    					<input class="form-control" type="text" id="start_date" name="start_date" value="<?php echo date('Y-m-d',strtotime($getBook['start_date'])); ?>" required>
    			</div>
                <div class="col-md-6 form-group">
                        <label>End Date</label>
                        <input class="form-control" type="text" id="end_date" name="end_date" value="<?php echo date('Y-m-d',strtotime($getBook['end_date'])); ?>" required>
                </div>
            </div>
             
                	<button type="submit" id="editBooking" name="editBooking" class="btn btn-danger btn-flat" style="font-size: 14px;width: 30%;
    				margin-left: 34%;">Submit <i class="fa fa-fw fa-arrow-circle-o-right"></i></button>
              	
    			</form>
            </div>
          </div>
        </div>
      </div>
      </section>
  </div>

    <!-- /.content-wrapper -->
  <?php include("../include/footer.php"); ?>
  
  
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
	
</body>

</html>
