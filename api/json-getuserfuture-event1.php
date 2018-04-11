<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cnn = new connection();
    $headers = array("Content-Type:multipart/form-data");
    $user_id=$_REQUEST['user_id'];
    $allEvent= array();

    $selectEvent1 = $cnn -> countrow("SELECT * FROM  booking_master bm ,event_master em where bm.event_id=em.event_id and bm.end_date > CURDATE() and bm.user_id = '$user_id 'and bm.status='1' ");
    echo "SELECT * FROM  booking_master bm ,event_master em where bm.event_id=em.event_id and bm.end_date > CURDATE() and bm.user_id = '$user_id 'and bm.status='1'";
   
    if($selectEvent1 > 0)
    {
   	$selectEvent = $cnn -> getrows("SELECT * FROM  booking_master bm ,event_master em where bm.event_id=em.event_id and bm.end_date > CURDATE() and bm.user_id = '$user_id 'and bm.status='1' ");
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
?>`