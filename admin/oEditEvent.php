<?php
  include("../include/config.php");
  include("../include/session.php");
  $cnn = new connection();
  $event_id = $_GET['event_id'];
  $user_id = $_SESSION['user_id'];
  $selectEvent = $cnn -> getrows("SELECT *FROM event_master em, category_master cm WHERE em.cat_id = cm.cat_id AND em.event_id = '$event_id' AND em.user_id = '$user_id'");
  $getEvent = mysqli_fetch_array($selectEvent);
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

    <title>StallsBook - Edit Event</title>
    
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
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCg51PQrjNhK7arm5xcQAQ0rQ_0qYMQU3Y&sensor=false&libraries=places"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">

	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
     
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
        Event
        <small>Control panel</small>
      </h1>
      
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <!-- Basic Forms -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Event</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="">
            <div class="">
            	<form name="eventEdit" id="eventEdit" method="POST" action="oaddEventScript.php" enctype="multipart/form-data">
              <input type="hidden" id="event_id" name="event_id" value="<?php echo $getEvent['event_id']; ?>">
             <div class="row">
  	            <div class="col-md-6 form-group">
      					   <label>Event Name</label>
      					   <input class="form-control" type="text" id="event_name" name="event_name" value="<?php echo $getEvent['event_name']; ?>" required>
      				</div>
               	<div class="col-md-6 form-group">
               		<label>Event Category</label>
                    <select class="form-control" name="cat_id" id="cat_id" required>
                    	<option selected disabled value="">---Select Category ---</option>
                    	<?php
                    	$selectCat = $cnn -> getrows("SELECT *FROM category_master");
                    	while($getCat = mysqli_fetch_array($selectCat))
                    	{
                    	?>
                      		<option value="<?php echo $getCat['cat_id']; ?>" <?php if($getCat['cat_id'] == $getEvent['cat_id']){ ?> selected <?php } ?>><?php echo $getCat['cat_name']; ?></option>
                      	<?php } ?>
                    </select>
                </div>
              

             </div>

            <div class="row">
            <div class="col-md-6 form-group">
               	    <label>City</label>
               		<input class="form-control" type="text" style="background-color: #e9ecef;"  id="city" name="city" value="<?php echo $getEvent['city']; ?>" required>
                </div>
                <div class="col-md-6 form-group">
                    <label>Event Address</label>
                    <input class="form-control" type="text" id="locality" name="event_address" onFocus="initializeAutocomplete()" value="<?php echo $getEvent['event_address']; ?>" required>
                </div>
                
              	<!-- <div class="col-md-6 form-group">
               	    <label>City</label>
               		<input class="form-control" type="text" id="city" name="city" value="<?php echo $getEvent['city']; ?>" required>
                </div>-->
            </div>    
              
              <div class="row">
    			<div class="col-md-6 form-group">
    				<label>Latitude</label>
    				<input type="text" class="form-control" style="cursor:not-allowed;" name="latitude" id="latitude" value="<?php echo $getEvent['latitude']; ?>" readonly placeholder="Latitude"  required/>
    			</div>
                <div class="col-md-6 form-group">
                        <label>Longitude</label>
                        <input type="text" class="form-control" style="cursor:not-allowed;" name="longitude" id="longitude" value="<?php echo $getEvent['longitude']; ?>" readonly placeholder="Longitude" required/>
                </div>
            </div>
              
            <div class="row">
    			<div class="col-md-6 form-group">
    				<label>Start Date</label>
    					<input class="form-control" type="text" id="datepicker1" name="start_date" value="<?php echo date('d/m/Y',strtotime($getEvent['start_date'])); ?>" required>
    			</div>
                <div class="col-md-6 form-group">
                        <label>End Date</label>
                        <input class="form-control" type="text" id="datepicker2" name="end_date" value="<?php echo date('d/m/Y',strtotime($getEvent['end_date'])); ?>" required>
                </div>
            </div>
            
            <!--<div class="row">
    		<div class="col-md-6 form-group">
    			<label>Start Date</label>
    				<input class="form-control" type="date" id="start_date" name="start_date" value="<?php echo date('Y-m-d',strtotime($getEvent['end_date'])); ?>" required>
    		</div>
                <div class="col-md-6 form-group">
                        <label>End Date</label>
                        <input class="form-control" type="date" id="end_date" name="end_date" required>
                </div>
            </div>-->
            
            
             
            <div class="row">
                <div class="col-md-3 form-group">
                	<label>From</label>
                    <input class="form-control" type="text" id="event_time1" name="event_time1" value="10:00 AM" maxlength="8" required>
              	</div>
              	<div class="col-md-3 form-group">
                	<label>To</label>
                    <input class="form-control" type="text" id="event_time2" name="event_time2" value="08:00 PM" maxlength="8" required>
                    <span style="color:red;" id="error"></span>
              	</div>
                <div class="col-md-6 form-group">
                	<label>Stall Charge</label>
                	<input class="form-control" type="text" id="stall_charge" name="stall_charge"  onkeypress="return isNumber(event)" value="<?php echo $getEvent['stall_charge']; ?>" required>
              	</div>
              	
            </div>

            <div class="row">
            <div class="col-md-6 form-group">
                  <label>Total Stall</label>
                    <input class="form-control" type="number" id="total_stall" name="total_stall" onkeypress="return isNumber(event)" value="<?php echo $getEvent['total_stall']; ?>" required>
                </div>
            <div class="col-md-6 form-group">
                  <label>Description</label>
                    <input class="form-control" type="text" id="event_desc" name="event_desc" value="<?php echo $getEvent['event_desc']; ?>" required>
                </div>
                <!--<div class="col-md-6 form-group">
                	<label>Available Stall</label>
                	<input class="form-control" type="text" id="avai_stall" name="avai_stall" onkeypress="return isNumber(event)" value="<?php echo $getEvent['avai_stall']; ?>" required>
              	</div>-->
                
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                	<label>Banner Photo</label>
                	<input class="form-control" type="file" id="banner" name="banner">
                  <img src="../stall_live/<?php echo $getEvent['banner']; ?>" height="50" width="50"> 
              	</div>
                 <div class="col-md-6 form-group">
                  <label>Event Images</label> <span style="color:red;float:right;">Multiple Image, But Size Must Be (1080px X 450px).</span>
                    <input class="form-control" type="file" id="" name="event_images[]" multiple="multiple">
                    <?php 
                    $images = explode(",",$getEvent['images']);
                    foreach($images as $value)
                    {
                    ?>
                    <img src="../stall_live/images/event/<?php echo $value; ?>" height="50" width="50">
                    <?php } ?>
                </div>
            </div>

            <div class="row">
                
                <div class="col-md-12 form-group">
                	<label></label>
                <center><button type="submit" id="editEvent" name="editEvent" class="btn btn-danger btn-flat" style="font-size: 14px;margin-top: 5.8%;width: 30%;">Submit <i class="fa fa-fw fa-arrow-circle-o-right"></i></button></center>
              	</div>
            </div>
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
	
	<script type="text/javascript">
		  function initializeAutocomplete(){
		    var input = document.getElementById('locality');
		    // var options = {
		    //   types: ['(regions)'],
		    //   componentRestrictions: {country: "IN"}
		    // };
		    var options = {}
		
		    var autocomplete = new google.maps.places.Autocomplete(input, options);
		
		    google.maps.event.addListener(autocomplete, 'place_changed', function() {
		      var place = autocomplete.getPlace();
		      var lat = place.geometry.location.lat();
		      var lng = place.geometry.location.lng();
		      var placeId = place.place_id;
		      // to set city name, using the locality param
		      var componentForm = {
		        locality: 'short_name',
		      };
		      for (var i = 0; i < place.address_components.length; i++) {
		        var addressType = place.address_components[i].types[0];
		        if (componentForm[addressType]) {
		          var val = place.address_components[i][componentForm[addressType]];
		          document.getElementById("city").value = val;
		        }
		      }
		      document.getElementById("latitude").value = lat;
		      document.getElementById("longitude").value = lng;
		      document.getElementById("location_id").value = placeId;
		    });
		  }
		</script>
	<script>        
          function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
       </script>
       
       <script>
		$(document).ready(function(){
			//$("#datepicker1").datepicker({ minDate: 0 });
			
			$( "#datepicker1" ).datepicker({
				defaultDate: "+1w",
				minDate: 0,
				firstDay: 0,
				dateFormat: 'dd/mm/yy',
				changeMonth: true,
				numberOfMonths: 1,
				onClose: function( selectedDate ) {
					
					var minDate = $(this).datepicker('getDate');
			        	var newMin = new Date(minDate.setDate(minDate.getDate() + 1));
					$( "#datepicker2" ).datepicker( "option", "minDate", newMin );
				}
			});
			$( "#datepicker2" ).datepicker({
				defaultDate: "+1w",
				minDate: '+2d',
				changeMonth: true,
				firstDay: 0,
				dateFormat: 'dd/mm/yy',
				numberOfMonths: 1,
				onClose: function( selectedDate ) {
			        var maxDate = $(this).datepicker('getDate');
			        var newMax  = new Date(maxDate.setDate(maxDate.getDate() - 1));
					$( "#datepicker1" ).datepicker( "option", "maxDate",  newMax);
				}
			});
		});
		</script>
	
	<script>
		$(document).ready(function(){
			$("#stall_charge").keyup(function(){
				var stall_charge = $("#stall_charge").val();
				if(stall_charge > 100000)
				{
					alert('Enter Amount Less Then 100000');
					$("#stall_charge").val('');
					$("#stall_charge").focus();
				}
			});
		});
		</script>
		<script>
		$(document).ready(function(){
			$("#total_stall").keyup(function(){
				var total_stall = $("#total_stall").val();
				if(total_stall > 1000)
				{
					alert('Enter Amount Less Then 1000');
					$("#total_stall").val('');
					$("#total_stall").focus();
				}
			});
		});
		
	</script>
	<script>
		$(document).ready(function(){
			$("#event_time2").val("08:00 PM");
			$("#event_time2").keyup(function(){
				var event_time1 = $("#event_time1").val();
				var event_time2 = $("#event_time2").val();
				var a = "01/01/1990 "+event_time1;
				var b = "01/01/1990 "+event_time2;
				
				var aDate = new Date(a).getTime();
				var bDate = new Date(b).getTime();
				
				if(aDate < bDate){
				    //console.log('a happened before b');
				     $("#error").text('');
				}else if (aDate > bDate){
				    //console.log('a happend after b');
				     $("#error").text('Please Enter Time Greater Then From Time');
				    //$("#event_time2").val("08:00 PM");
				}else{
				    //console.log('a and b happened at the same time');
				   
				}
			});
		});
		</script>
	
</body>

</html>
