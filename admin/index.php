<?php
  include("../include/config.php");
  include("../include/session.php");
  $user_id = $_SESSION['user_id'];
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

    <title>StallsBook - Dashboard</title>
    
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
	
	<!-- weather weather -->
	<link rel="stylesheet" href="../assets/vendor_components/weather-icons/weather-icons.css">
	
	<!-- jvectormap -->
	<link rel="stylesheet" href="../assets/vendor_components/jvectormap/jquery-jvectormap.css">
	
	<!-- date picker -->
	<link rel="stylesheet" href="../assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">
	
	<!-- daterange picker -->
	<link rel="stylesheet" href="../assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css">
	
	<!-- bootstrap wysihtml5 - text editor -->
	<link rel="stylesheet" href="../assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css">

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
        Dashboard
        <small>Control panel</small>
      </h1>
      <!-- <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
     
        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua" style="background-color: #3f51b5d1;"><i class="ion ion-stats-bars"></i></span>

            <div class="info-box-content">
            <a href="oviewEvent.php">
              <span class="info-box-number" style="font-size: 13px;"><b> <?php
              	$selectState = $cnn -> countrow("SELECT * FROM event_master where user_id ='$user_id'");
              	echo $selectState;
              	?> </b></span>
              <span class="info-box-text">
              Event
              	
              </span>
              </a>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <!-- /.col -->
       
        <!--<div class="col-xl-3 col-md-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-server" aria-hidden="true"></i></span>

            <div class="info-box-content">
             <a href="oviewVender.php">
              <span class="info-box-number" style="font-size: 13px;"><b>	 <?php 
					

              		$selectV = $cnn -> countrow("SELECT *FROM user_master where user_type='Vendor'");
              		echo $selectV;
              	?> </b></span>
              <span class="info-box-text">
              
              	Vendor
              </span>
              </a>
            </div>
            
          </div>
          
        </div>-->
        
        </a>
       
       
        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-blue" style="background-color: #ff5722b8;"><i class="fa fa-thumb-tack" aria-hidden="true"></i></span>

            <div class="info-box-content">
               <a href="allreview.php">
              <span class="info-box-number" style="font-size: 13px;">
              <b>
              <?php 
              	$selectEvent = $cnn ->countrow("SELECT *FROM event_master em, user_master um, review_ratting_master rrm WHERE rrm.event_id=em.event_id AND em.user_id=um.user_id AND um.user_id='$user_id'");
             	 echo $selectEvent;
              	?> 
              </b>
              </span>
              <span class="info-box-text">
              
              	Review
              </span>
              </a>
            </div>
          </div>
        </div>
        
        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-blue" style="background-color: #009688;"><i class="fa fa-inr" aria-hidden="true"></i></span>

            <div class="info-box-content">
               <a href="oviewPaymentNotification.php">
              <span class="info-box-number" style="font-size: 13px;"><b>
              <?php 
              		$selectNoti = $cnn -> countrow("SELECT  um.first_name,um.last_name,bm.shop_no,bm.book_id,bm.shop_name,em.event_name,em.event_id,em.stall_charge,um.user_id,um.email,bpm.sender_id,bpm.book_amount,bpm.pay_type,bpm.bank_name,bpm.txn_id,bpm.payment_status,bpm.bookpay_id,bpm.receiver_id FROM booking_payment_master bpm, user_master um,event_master em,booking_master bm WHERE bpm.book_id=bm.book_id AND bpm.sender_id=um.user_id AND bpm.event_id=em.event_id AND bpm.payment_status='0' AND bpm.receiver_id='$user_id'");
              		echo $selectNoti;
              	?>
              	</b></span>
              <span class="info-box-text">
              
              	Payment Notification
              </span>
              </a>
            </div>
          </div>
        </div>

        <!-- /.col -->
         <!-- <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-server" aria-hidden="true"></i></span>

            <div class="info-box-content">
              <span class="info-box-number" style="font-size: 13px;"><b>4</b></span>
              <span class="info-box-text">
              	 <?php 
              		// $selectCity = $cnn -> countrow("SELECT *FROM ad_master");
              		// echo $selectCity;
              	?> -->
              <!-- </span>
            </div>
            <!-- /.info-box-content -->
          <!-- </div>
          <!-- /.info-box -->
        <!-- </div>  --> 
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <!-- <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-purple"><i class="ion ion-bag"></i></span>

            <div class="info-box-content">
              <span class="info-box-number">760</span>
              <span class="info-box-text">Monthly Sales</span>
            </div>
            
          </div>
          
        </div>
        
        <div class="col-xl-3 col-md-6 col-12">
          <div class="info-box">
       
            <span class="info-box-icon bg-red"><i class="ion ion-person-stalker"></i></span>

            <div class="info-box-content">
              <span class="info-box-number">2,000</span>
              <span class="info-box-text">Join Members</span>
            </div>
           
          </div>
          
        </div> -->
        
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
	
	<!-- ChartJS -->
	<script src="../assets/vendor_components/chart-js/chart.js"></script>
	
	<!-- Sparkline -->
	<script src="../assets/vendor_components/jquery-sparkline/dist/jquery.sparkline.js"></script>
	
	<!-- jvectormap -->
	<script src="../assets/vendor_plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>	
	<script src="../assets/vendor_plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
	
	<!-- jQuery Knob Chart -->
	<script src="../assets/vendor_components/jquery-knob/js/jquery.knob.js"></script>
	
	<!-- daterangepicker -->
	<script src="../assets/vendor_components/moment/min/moment.min.js"></script>
	<script src="../assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<!-- datepicker -->
	<script src="../assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
	
	<!-- Bootstrap WYSIHTML5 -->
	<script src="../assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js"></script>
	
	<!-- Slimscroll -->
	<script src="../assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js"></script>
	
	<!-- FastClick -->
	<script src="../assets/vendor_components/fastclick/lib/fastclick.js"></script>
	
	<!-- apro_admin App -->
	<script src="../js/template.js"></script>
	
	<!-- apro_admin dashboard demo (This is only for demo purposes) -->
	<script src="../js/pages/dashboard.js"></script>
	
	<!-- apro_admin for demo purposes -->
	<script src="../js/demo.js"></script>
	
	<!-- weather for demo purposes -->
	<script src="../assets/vendor_plugins/weather-icons/WeatherIcon.js"></script>
	
	<script type="text/javascript">
	
		WeatherIcon.add('icon1'	, WeatherIcon.SLEET , {stroke:false , shadow:false , animated:true } );
		WeatherIcon.add('icon2'	, WeatherIcon.SNOW , {stroke:false , shadow:false , animated:true } );
		WeatherIcon.add('icon3'	, WeatherIcon.LIGHTRAINTHUNDER , {stroke:false , shadow:false , animated:true } );

	</script>

	
</body>

</html>
