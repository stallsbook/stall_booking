<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cnn = new connection();
    $headers = array("Content-Type:multipart/form-data");
  	
    $data= array();
   if (isset($_REQUEST["name"]))
   {
   
   	$name1 = $_REQUEST['name'];
   	$selectVend = $cnn -> getrows("SELECT * FROM user_master where  user_type='Vendor' and (first_name  LIKE '%" . $name1 . "%'  or event_org_cmp_name LIKE '%" . $name1 . "%' or mobile LIKE '%" . $name1 . "%') ");

	while($getuser  = mysqli_fetch_assoc($selectVend))
	{
											
		 $user_id = $getuser['user_id'];	
		$selectevent = $cnn->getrows("select * from booking_master bm,event_master em,user_master um where bm.event_id = em.event_id and bm.user_id='$user_id' ");
		$getevent = mysqli_fetch_assoc($selectevent);
		$event_name = $getevent['event_name'];
		
		$getuser['event_name']=$event_name;
		  $data[] = $getuser;
	}
	
	
	echo json_encode(array("allVendor" => $data, "ResponseCode" => "1", "Result" => "True"));
   
   }
   else
   {

   
	$selectVend = $cnn -> getrows("SELECT * FROM user_master where  user_type='Vendor'");
	while($getuser  = mysqli_fetch_assoc($selectVend))
	{
											
		 $user_id = $getuser['user_id'];	
		$selectevent = $cnn->getrows("select * from booking_master bm,event_master em,user_master um where bm.event_id = em.event_id and bm.user_id='$user_id'");
		$getevent = mysqli_fetch_assoc($selectevent);
		$event_name = $getevent['event_name'];
		
		$getuser['event_name']=$event_name;
		  $data[] = $getuser;
	}
	
	
	echo json_encode(array("allVendor" => $data, "ResponseCode" => "1", "Result" => "True"));
   }
   
?>