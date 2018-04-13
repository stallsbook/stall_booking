<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cnn = new connection();
    $headers = array("Content-Type:multipart/form-data");
    $city=$_REQUEST['city']; 
    $event_id=$_REQUEST['event_id'];  		
    $allEvent= array();

    if($city != "")
    {
	    $selectEvent1 = $cnn -> countrow("SELECT *FROM event_master WHERE event_address like '".$city."%' AND event_id != '$event_id' AND status != '0'");
	    if($selectEvent1 > 0)
	    { 	
	   	$selectEvent = $cnn -> getrows("SELECT *FROM event_master WHERE event_address like '".$city."%' AND event_id != '$event_id' AND status != '0'");
		while($getEvent = mysqli_fetch_assoc($selectEvent))
		{	
	                $data[] = $getEvent;
		}
		$allEvent=$data;
		echo json_encode(array("eventList" => $allEvent, "ResponseCode" => "1", "Result" => "True"));
	    }
	    else
	    {
		echo json_encode(array("eventList" => [], "ResponseCode" => "2", "Result" => "False"));
	    }
    }
    else
    {
    	echo json_encode(array("eventList" => [], "ResponseCode" => "3", "Result" => "False"));
    }
?>
