<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cnn = new connection();
    $headers = array("Content-Type:multipart/form-data");
    $data = array();
    $user_id = $_REQUEST['user_id'];
    $event_id= $_REQUEST['event_id'];
    $book_id= $_REQUEST['book_id'];
    $status= $_REQUEST['status'];
    $shop_no= $_REQUEST['shop_no'];
    
    
        $selectBook = $cnn -> getrows("SELECT * from user_master where user_id = '$user_id'");
	while($getEvent = mysqli_fetch_assoc($selectBook))
	{	
          $selectBook = $cnn -> getrows("select stall_charge from event_master where event_id = '$event_id'");
	  $s_get = mysqli_fetch_assoc($selectBook);
	  $stall_charge = $s_get['stall_charge'];
	  if($status == '1')
		{
			$selectAmount1 = $cnn->getrows("SELECT sum(book_amount) as amt FROM booking_payment_master WHERE sender_id='$user_id' AND event_id='$event_id'");
			$getAmount1 = mysqli_fetch_array($selectAmount1);
			$book_amount = $getAmount1['amt'];
			if($stall_charge == $book_amount)
			{
				//$p_status = "payment disabled";
				$c_status="confirm hidde";
				$r_status="confirm hidde";
			}
			else
			{
				$selectAmount2 = $cnn->getrows("SELECT sum(book_amount) as amt1 FROM booking_payment_master WHERE sender_id='$user_id' AND event_id='$event_id'");
				$getAmount2 = mysqli_fetch_array($selectAmount2);
				$book_amount = $getAmount2['amt1'];		
				
				//$p_status = "payment enabled";
				$c_status="confirm hidde";
				$r_status="reject hidde";
			}
		}
		else
		{
			$c_status="confirm enabled";
			$r_status="reject enabled";
			//$p_status = "payment hidde";
			//$asign_status="Pay To Assign Stall";
		}
		if($status == '1') 
		{
			$countShop = $cnn->countrow("SELECT *FROM shop_master WHERE user_id='$user_id' AND event_id='$event_id'");
			
			if( $countShop > 0)
			{
				$asign_status="Stall Assigned";
			}
			else
			{
				/*$countPay = $cnn->countrow("SELECT *FROM booking_payment_master WHERE event_id='$event_id' AND sender_id='$user_id' AND book_id='$book_id'");
				
				if($countPay > 0)
				{
					$asign_status="Assign Stall";
				}
				else
				{*/
					$asign_status="Assign Stall";
				/*}*/
			}		
		}
		/*else
		{
			$asign_status="Pay To Assign Stall";
		}*/
                //$getEvent['p_status']= $p_status;  
                $getEvent['c_status']= $c_status;  
                $getEvent['r_status']= $r_status;  
                $getEvent['assign_status']= $asign_status;  
                $getEvent['book_amount']= $book_amount;  
		
		$data[] = $getEvent ;  									
	}
	echo json_encode(array("allEvent" => $data, "ResponseCode" => "1", "Result" => "True"));   
?>