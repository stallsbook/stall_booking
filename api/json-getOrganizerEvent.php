<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cnn = new connection();
    $headers = array("Content-Type:multipart/form-data");
    $event_id=$_REQUEST['event_id'];
    $user_id=$_REQUEST['user_id'];  		
    $allEvent= array();

    if($event_id != "" && $user_id !="")
    {
	    $selectEvent1 = $cnn -> countrow("SELECT *FROM event_master WHERE user_id='$user_id' AND event_id != '$event_id' AND status = '1'");
	    if($selectEvent1 > 0)
	    { 	
	   	$selectEvent = $cnn -> getrows("SELECT *FROM event_master WHERE user_id='$user_id' AND event_id != '$event_id' AND status = '1' and event_status ='1'");
		while($getEvent = mysqli_fetch_assoc($selectEvent))
		{	
	                $data[] = $getEvent;
		}
		$selectEvent = $cnn -> getrows("SELECT *FROM event_master WHERE user_id='$user_id' AND event_id != '$event_id' AND status = '1' and event_status ='0'");
		while($getEvent = mysqli_fetch_assoc($selectEvent))
		{	
	                $data[] = $getEvent;
		}
		$selectEvent = $cnn -> getrows("SELECT *FROM event_master WHERE user_id='$user_id' AND event_id != '$event_id' AND status = '1' and event_status ='2'");
		while($getEvent = mysqli_fetch_assoc($selectEvent))
		{	
	                $data[] = $getEvent;
		}
		
		
		$allEvent=$data;
		echo json_encode(array("eventList" => $allEvent, "ResponseCode" => "1", "Result" => "True"));
	    }
	    else
	    {
		echo json_encode(array("eventList" => "Data Not Found..!", "ResponseCode" => "2", "Result" => "False"));
	    }
    }
    else
    {
    	echo json_encode(array("eventList" => [], "ResponseCode" => "3", "Result" => "False"));
    }
?>