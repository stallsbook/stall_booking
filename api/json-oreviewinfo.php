<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cnn = new connection();
    $headers = array("Content-Type:multipart/form-data");
    $data = array();
    $user_id = $_REQUEST['user_id'];
    
   	$selectEvent = $cnn -> getrows("SELECT * FROM review_ratting_master rm, event_master em,user_master um where rm.event_id=em.event_id and rm.user_id = um.user_id and em.user_id='$user_id'");
	while($getEvent = mysqli_fetch_assoc($selectEvent))
	{
		
                $data[] = $getEvent ;
	}
	echo json_encode(array("allEvent" => $data, "ResponseCode" => "1", "Result" => "True"));
   
   
   
    ?>