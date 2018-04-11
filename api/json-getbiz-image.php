<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cnn = new connection();
    $headers = array("Content-Type:multipart/form-data");
    $user_id=$_REQUEST['user_id'];  		
    $allEvent= array();

    $selectEvent1 = $cnn -> countrow("SELECT * FROM user_master where user_id='$user_id' ");
    if($selectEvent1 > 0)
    {
   	$selectEvent = $cnn -> getrows("SELECT * FROM user_master where user_id='$user_id'");
	while($getEvent = mysqli_fetch_assoc($selectEvent))
	{
		
		
                $data[] = $getEvent ;
	}
	
	
	echo json_encode(array("image" => $data, "ResponseCode" => "1", "Result" => "True"));
    }
    else
    {
	echo json_encode(array("allEvent" => [], "ResponseCode" => "2", "Result" => "False"));
    }
?>