<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cnn = new connection();
    $headers = array("Content-Type:multipart/form-data");
    $data = array();
    $user_id = $_REQUEST['user_id'];
    
   	$selectEvent = $cnn -> getrows("SELECT * ,em.city,em.status as estatus,em.city as ecity FROM event_master em,category_master cm,user_master um  where em.cat_id = cm.cat_id AND em.user_id = um.user_id and em.user_id = '$user_id' and em.event_status='1' and em.status='1' ORDER BY em.start_date DESC");
	while($getEvent = mysqli_fetch_assoc($selectEvent))
	{
		/*$current_date = date('Y-m-d');
		$start_date = date('Y-m-d',strtotime($getEvent['start_date']));
		$end_date = date('Y-m-d',strtotime($getEvent['end_date']));
		if($current_date >= $start_date && $current_date <= $end_date)
		{
			$event_message="Your Event Is Running.";
		}
		else if($end_date <= $current_date)
		{
			$event_message="Your Event Was Past.";
		}
		else if($start_date >= $current_date)
		{
			$event_message="Your Event In Future.";
		}*/
		$getEvent['event_message']="Your Event In Future."; 
                $data[] = $getEvent ;
	}
	$selectEvent = $cnn -> getrows("SELECT * ,em.city,em.status as estatus,em.city as ecity FROM event_master em,category_master cm,user_master um  where em.cat_id = cm.cat_id AND em.user_id = um.user_id and em.user_id = '$user_id' and em.event_status='0' and em.status='1' ORDER BY em.start_date DESC");
	while($getEvent = mysqli_fetch_assoc($selectEvent))
	{
		
		$getEvent['event_message']="Your Event Is Running."; 
                $data[] = $getEvent ;
	}
	$selectEvent = $cnn -> getrows("SELECT * ,em.city,em.status as estatus,em.city as ecity FROM event_master em,category_master cm,user_master um  where em.cat_id = cm.cat_id AND em.user_id = um.user_id and em.user_id = '$user_id' and em.event_status='2' and em.status='1' ORDER BY em.start_date DESC");
	while($getEvent = mysqli_fetch_assoc($selectEvent))
	{
		
		$getEvent['event_message']="Your Event Was Past."; 
                $data[] = $getEvent ;
	}
	echo json_encode(array("allEvent" => $data, "ResponseCode" => "1", "Result" => "True"));
    ?>