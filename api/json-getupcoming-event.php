<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cnn = new connection();
    $headers = array("Content-Type:multipart/form-data");
  	
    $allEvent= array();

    $selectEvent1 = $cnn -> countrow("SELECT * FROM `event_master` where start_date >= CURDATE() and status='1' order by start_date asc ");
    if($selectEvent1 > 0)
    {
   	$selectEvent = $cnn -> getrows("SELECT * FROM `event_master` em,user_master um  where em.user_id=um.user_id and em.start_date >= CURDATE() and em.status='1' order by em.start_date asc ");
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