<?php
	header('Access-Control-Allow-Origin: *');
	include("../include/config.php");
	$cnn=new connection();
	$book_id = $_REQUEST['book_id'];
	$event_id = $_REQUEST['event_id'];
	$shop_no = $_REQUEST['shop_no'];
	$shop_name = $_REQUEST['shop_name'];
	$start_date = $_REQUEST['start_date'];
	$end_date = $_REQUEST['end_date'];
	

  	if($book_id == '' || $event_id == ''  || $shop_no == ''|| $shop_name == ''|| $start_date == ''|| $end_date== '')
  	{
  		echo json_encode(array("ResponseCode"=>"0","ResponseMsg"=> "Parameter missing.","Result"=>"False"));  
  	}
  	else
  	{
	  	
	  	$selectuser = $cnn -> updatedeleterows("UPDATE booking_master SET shop_no = '$shop_no',shop_name = '$shop_name' ,start_date = '$start_date',end_date = '$end_date' WHERE book_id = '$book_id' ");
		
		
   		if($selectuser)
		{
			echo json_encode(array("ResponseCode"=>"1","ResponseMsg"=> "Data Update.","Result"=>"True"));  	
		}
		else
		{
			echo json_encode(array("ResponseCode"=>"2","ResponseMsg"=> "Data is not update","Result"=>"False"));  
		}
			
		
		
	}
  	
 ?> 	