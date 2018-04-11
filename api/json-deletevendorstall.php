<?php
	header('Access-Control-Allow-Origin: *');
	include("../include/config.php");
	$cnn=new connection();
	$book_id = $_REQUEST['book_id'];
	$user_id= $_REQUEST['user_id'];
	$event_id= $_REQUEST['event_id'];
	$shop_no= $_REQUEST['shop_no'];
	
  	if($book_id == '')
  	{
  		echo json_encode(array("ResponseCode"=>"0","ResponseMsg"=> "Parameter missing.","Result"=>"False"));  
  	}
  	else
  	{ 	$selectShop = $cnn->getrows("SELECT *FROM event_master WHERE event_id='$event_id'");
	  	$getShop = mysqli_fetch_array($selectShop);
	  	$avai_stall = $getShop['avai_stall'];
	  	$plus = $avai_stall+$shop_no;
	  	$updateStall= $cnn -> updatedeleterows("UPDATE event_master SET avai_stall='$plus' WHERE event_id='$event_id'");
	  	
	  	$selectuser = $cnn -> updatedeleterows("DELETE FROM booking_master WHERE book_id = '$book_id' AND user_id='$user_id'");
	  	$selectuser1 = $cnn -> updatedeleterows("DELETE FROM payment_master WHERE book_id = '$book_id' AND sender_id='$user_id' AND event_id='$event_id'");
	  	$selectuser2 = $cnn -> updatedeleterows("DELETE FROM booking_payment_master WHERE book_id = '$book_id' AND sender_id='$user_id' AND event_id='$event_id'");
		$selectuser3 = $cnn -> updatedeleterows("DELETE FROM shop_master WHERE user_id = '$user_id' AND event_id='$event_id'");
		  	
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