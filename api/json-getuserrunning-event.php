<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cnn = new connection();
    $headers = array("Content-Type:multipart/form-data");
    $user_id=$_REQUEST['user_id'];
    $allEvent= array();

    $selectEvent1 = $cnn -> countrow("SELECT * FROM user_master um, event_master em, booking_master bm WHERE um.user_id = bm.user_id AND em.event_id = bm.event_id AND bm.user_id = '$user_id' AND bm.status='1'  and (em.event_status='1' or em.event_status=0) ORDER BY em.event_status ASC");
    if($selectEvent1 > 0)
    {
   	$selectEvent = $cnn -> getrows("SELECT *,em.city FROM user_master um, event_master em, booking_master bm WHERE um.user_id = bm.user_id AND em.event_id = bm.event_id AND bm.user_id = '$user_id' AND bm.status='1'  and (em.event_status='1' or em.event_status=0) ORDER BY em.start_date DESC");
	while($getEvent = mysqli_fetch_assoc($selectEvent))
	{
                $data[] = $getEvent ;
	}
	echo json_encode(array("allEvent" => $data, "ResponseCode" => "1", "Result" => "True"));
    }
    else
    {
	echo json_encode(array("allEvent" => [], "ResponseCode" => "2", "Result" => "False"));
    }
?>