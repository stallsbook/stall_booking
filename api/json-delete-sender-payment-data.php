<?php
	header('Access-Control-Allow-Origin: *');
	include("../include/config.php");
	$cnn=new connection();
	$event_id = $_REQUEST['event_id'];
	$sender_id = $_REQUEST['sender_id'];
	$bookpay_id = $_REQUEST['bookpay_id'];
	
  	if($event_id == '' || $sender_id == '' || $bookpay_id == '')
  	{
  		echo json_encode(array("ResponseCode"=>"0","ResponseMsg"=> "Parameter missing.","Result"=>"False"));  
  	}
  	else
  	{
	  	$deletePayment = $cnn -> updatedeleterows("DELETE FROM booking_payment_master WHERE event_id='$event_id' AND sender_id='$sender_id' AND bookpay_id = '$bookpay_id'");
		  	
   		if($deletePayment > 0)
		{
			echo json_encode(array("ResponseCode"=>"1","ResponseMsg"=> "Data deleted.","Result"=>"True"));  	
		}
		else
		{
			echo json_encode(array("ResponseCode"=>"2","ResponseMsg"=> "Data is not deleted","Result"=>"False"));  
		}	
	}
 ?> 	