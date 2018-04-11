<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cnn = new connection();
    $headers = array("Content-Type:multipart/form-data");
    $event_id=$_REQUEST['event_id'];  	
    $user_id=$_REQUEST['user_id'];  	
    $allEvent= array();
	
    $selectEvent1 = $cnn -> countrow("SELECT * FROM booking_master WHERE event_id='$event_id' and user_id='$user_id' and status= '1'");
    if($selectEvent1 > 0)
    {	
   		
	echo json_encode(array("payment" => "1", "ResponseCode" => "1", "Result" => "True"));
    }
    else
    {
	echo json_encode(array("payment" => "0", "ResponseCode" => "2", "Result" => "False"));
    }
?>