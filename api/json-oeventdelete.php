<?php
	header('Access-Control-Allow-Origin: *');
	include("../include/config.php");
	$cnn=new connection();
	$event_id = $_GET['event_id'];
	
	
	

  	if($event_id == '' )
  	{
  		echo json_encode(array("ResponseCode"=>"0","ResponseMsg"=> "Parameter missing.","Result"=>"False"));  
  	}
  	else
  	{
	  	
	  	$selectuser = $cnn -> countrow("DELETE FROM event_master WHERE event_id = '$event_id' ");
		
		  	
   		if($selectuser )
		{
			echo json_encode(array("ResponseCode"=>"1","ResponseMsg"=> "Data delete.","Result"=>"True"));  	
		}
		else
		{
			echo json_encode(array("ResponseCode"=>"2","ResponseMsg"=> "Data is not delete","Result"=>"False"));  
		}
			
		
		
	}
  	
 ?> 	