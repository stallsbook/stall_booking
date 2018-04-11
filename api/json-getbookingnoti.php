<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cnn = new connection();
    $headers = array("Content-Type:multipart/form-data");
    $user_id=$_REQUEST['user_id'];	
    $data= array();

    $selectEvent = $cnn->getrows("SELECT em.event_name,em.start_date as st,em.end_date as ed,em.create_date as cd,bm.*,um.* FROM event_master em,booking_master bm,user_master um where em.event_id = bm.event_id and bm.user_id=um.user_id and em.user_id= '$user_id' and bm.status='0' ORDER BY bm.create_date DESC");
		
	while($getEvent = mysqli_fetch_assoc($selectEvent))
	{
              $data[] = $getEvent ;
	}
	echo json_encode(array("allEvent" => $data, "ResponseCode" => "1", "Result" => "True"));
?>