<?php
  include("../include/config.php");
  include("../include/session.php");
  $cnn = new connection();
  $event_id = $_GET['event_id'];
  $user_id = $_GET['user_id'];
  $shop_id = $_GET['shop_id'];
  $selectShop = $cnn->getrows("SELECT *FROM shop_master sm,payment_master pm WHERE sm.shop_id=pm.shop_id AND sm.shop_id='$shop_id' AND sm.user_id='$user_id' AND sm.event_id='$event_id'");
  $getShop = mysqli_fetch_array($selectShop);
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

    <title>StallsBook - Add Shop</title>
    
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
        Stall
        <small>Control panel</small>
      </h1>
      
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- Basic Forms -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Add Stall</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="">
            <div class="">
            	<form name="shop1" id="shop1" method="POST" action="oaddShopForVendorScript.php">

              <input type="hidden" id="event_id" name="event_id" value="<?php echo $getShop['event_id']; ?>">
              <input type="hidden" id="user_id" name="user_id" value="<?php echo $getShop['user_id']; ?>">
              <input type="hidden" id="shop_id" name="shop_id" value="<?php echo $getShop['shop_id']; ?>">

             <div class="row">
  	            <div class="col-md-6 form-group">
      					   <label>Stall No</label>
      					   <input class="form-control" type="text" id="single_Shop_no" name="single_Shop_no" placeholder="Stall Number" value="<?php echo $getShop['single_Shop_no']; ?>">
                  
              
      				</div>

               	<div class="col-md-6 form-group">
               		<label>Stall Name</label>
                  <input class="form-control" type="text" id="shop_name" name="shop_name" placeholder="Stall Name"  value="<?php echo $getShop['shop_name']; ?>">
                </div>
             </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <label>No of Table</label>
                    <input class="form-control" type="text" id="no_table" name="no_table" placeholder="0" value="<?php echo $getShop['no_table']; ?>">
                </div>
              	<div class="col-md-6 form-group">
               	    <label>No of Chair</label>
               		<input class="form-control" type="text" id="no_chair" name="no_chair" placeholder="Chair" value="<?php echo $getShop['no_chair']; ?>">
                </div>
            </div>    
              
            <div class="row">
                <div class="col-md-6 form-group">
                	<label>Description</label>
                    <input class="form-control" type="text" id="description" name="description" placeholder="Description" value="<?php echo $getShop['description']; ?>">
              	</div>
                <div class="col-md-6 form-group">
                  <label>Amount</label>
                    <input class="form-control" type="text" id="amount" name="amount" placeholder="Amount" required value="<?php echo $getShop['amount']; ?>">
                </div>
            </div>
            <button type="submit" id="addShop1" name="addShop1" class="btn btn-danger btn-flat" style="font-size: 14px;width: 25%;
            margin-left:38%;">Submit <i class="fa fa-fw fa-arrow-circle-o-right"></i></button>
           
    			</form>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
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
