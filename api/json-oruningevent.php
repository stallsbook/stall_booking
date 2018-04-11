<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cnn = new connection();
    $headers = array("Content-Type:multipart/form-data");
    $data = array();
    $user_id = $_REQUEST['user_id'];
    
   	$selectEvent = $cnn -> getrows("SELECT * ,em.status as estatus FROM event_master em,category_master cm,user_master um  where em.cat_id = cm.cat_id AND em.user_id = um.user_id and em.user_id = '$user_id' and em.start_date <= CURDATE() and em.end_date >= CURDATE()  ORDER BY em.event_status ASC");
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
		}
		$getEvent['event_message']=$event_message; */
                $data[] = $getEvent ;
	}
	echo json_encode(array("allEvent" => $data, "ResponseCode" => "1", "Result" => "True"));
   
   
   
    ?>