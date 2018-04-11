<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cnn = new connection();
    $headers = array("Content-Type:multipart/form-data");
  	
    $data= array();

    $selectEvent1 = $cnn -> countrow("SELECT *FROM event_master where status='1'");
    if($selectEvent1 > 0)
    {
   	$selectEvent = $cnn -> getrows("SELECT em.*,em.city FROM event_master em,user_master um  where em.user_id=um.user_id and em.event_status='1' and em.status='1' ORDER BY em.start_date DESC");
	while($getEvent = mysqli_fetch_assoc($selectEvent))
	{
		/*$start_date = $getEvent['start_date'];
		$end_date = $getEvent['end_date'];
		$current_date = date('Y-m-d');
		
		if($current_date >= $start_date && $current_date <= $end_date)
                {
                	$currentEvent["event"] = "running";
                }
                else if($end_date <= $current_date)
                {
                	$currentEvent["event"] = "Past";
                }
                else if($start_date >= $current_date)
                {
                	$currentEvent["event"] = "Future";
                	
             	 }*/
              	$getEvent ["event"] = "Future";
                $data[]=$getEvent;
	}
	$selectEvent = $cnn -> getrows("SELECT em.*,em.city FROM event_master em,user_master um  where em.user_id=um.user_id and em.event_status='0' and em.status='1' ORDER BY em.start_date DESC");
	while($getEvent = mysqli_fetch_assoc($selectEvent))
	{
              	$getEvent ["event"] = "running";
                $data[]=$getEvent;
	}
	$selectEvent = $cnn -> getrows("SELECT em.*,em.city FROM event_master em,user_master um  where em.user_id=um.user_id and em.event_status='2' and em.status='1' ORDER BY em.start_date DESC");
	while($getEvent = mysqli_fetch_assoc($selectEvent))
	{
              	$getEvent ["event"] = "Past";
                $data[]=$getEvent;
	}
	
	echo json_encode(array("allEvent" => $data, "ResponseCode" => "1", "Result" => "True"));
    }
    else
    {
	echo json_encode(array("allEvent" => [], "ResponseCode" => "2", "Result" => "False"));
    }
?>