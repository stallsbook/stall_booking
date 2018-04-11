<?php
	header('Access-Control-Allow-Origin: *');
	include("../include/config.php");
	$cnn=new connection();
	$event_id = $_REQUEST['event_id'];
	$receiver_id = $_REQUEST['receiver_id'];
	$bookpay_id= $_REQUEST['bookpay_id'];
	$pay_type = $_REQUEST['pay_type'];
	
  	if($event_id == '' || $receiver_id == '' || $pay_type == '' || $bookpay_id == '')
  	{
  		echo json_encode(array("ResponseCode"=>"0","ResponseMsg"=> "Parameter missing.","Result"=>"False"));  
  	}
  	else
  	{
	  	$deletePayment = $cnn -> updatedeleterows("DELETE FROM booking_payment_master WHERE event_id='$event_id' AND receiver_id='$receiver_id' AND pay_type= '$pay_type' AND bookpay_id='$bookpay_id'");
		  	
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