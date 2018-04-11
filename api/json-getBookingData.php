<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cnn = new connection();
    $headers = array("Content-Type:multipart/form-data");
    $event_id=$_REQUEST['event_id'];  	
    $user_id = $_REQUEST['user_id'];	
    $booking = array();

	$selectBooking1 = $cnn->countrow("SELECT * FROM booking_master WHERE event_id='$event_id' AND user_id='$user_id'");
	if($selectBooking1 > 0)
	{
		$selectBooking = $cnn->getrows("SELECT * FROM booking_master WHERE event_id='$event_id'");
		$getBook[] = mysqli_fetch_assoc($selectBooking);
		echo json_encode(array("booking" => $getBook, "ResponseCode" => "1", "Result" => "True"));
	}
	else
	{
		echo json_encode(array("booking" => [], "ResponseCode" => "2", "Result" => "False"));
	}