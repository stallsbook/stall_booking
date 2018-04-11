<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cnn = new connection();
    $headers = array("Content-Type:multipart/form-data");
 
    $data= array();
    $sender_id=$_REQUEST['sender_id'];

    $selectData2 = $cnn->countrow("SELECT DISTINCT em.event_id,em.event_name,em.event_address,em.city,em.start_date,em.end_date,em.banner,em.event_status,bpm.sender_id FROM booking_payment_master bpm,event_master em WHERE em.event_id=bpm.event_id AND bpm.sender_id='$sender_id'");
    if($selectData2 > 0)
    {
        $selectData1 = $cnn->getRows("SELECT DISTINCT em.event_id,em.event_name,em.event_address,em.city,em.start_date,em.end_date,em.banner,em.event_status,bpm.sender_id FROM booking_payment_master bpm,event_master em WHERE em.event_id=bpm.event_id AND bpm.sender_id='$sender_id' ORDER BY em.event_status ASC");
	while($getData1 = mysqli_fetch_assoc($selectData1))
	{
		$data[] = $getData1;
	}
	echo json_encode(array("allEvent" => $data, "ResponseCode" => "1", "Result" => "True"));	
    }
    else
    {
	echo json_encode(array("allEvent" => [], "ResponseCode" => "2", "Result" => "False"));	
    }
?>