<?php
	include("../include/config.php"); 
	include("../include/session.php"); 
	$cnn = new connection();

	if(isset($_POST['pay_done']))
	{
		$receiver_id = $_SESSION['user_id'];
		$sender_id = $_POST['sender_id'];
		$event_id = $_POST['event_id'];
		$book_id = $_POST['book_id'];
		$book_amount = $_POST['book_amount'];
		$payment_date = date('Y-m-d H:i:s');
		$payment_status = 1;
		
		$selectAmount = $cnn->getrows("SELECT *FROM event_master WHERE event_id='$event_id'");
		$getAmount = mysqli_fetch_array($selectAmount);
		$stall_charge = $getAmount['stall_charge'];
		
		$selectAmount1 = $cnn->getrows("SELECT sum(book_amount) as amt FROM booking_payment_master WHERE sender_id='$sender_id' AND event_id='$event_id'");
		$getAmount1 = mysqli_fetch_array($selectAmount1);
		$amt = $getAmount1['amt'];
		
		$p_amount = $stall_charge - $amt;
		
		if($p_amount < $book_amount)
		{
			echo "<script>";
			echo "alert('Please Enter Less or Equal Amount of Stall Charge.')";
			echo "</script>";
			echo "<script> window.location.href = 'oviewmoreEventDetail.php?event_id=$event_id'; </script>";
		}
		else
		{
					
			$insertData = array("sender_id"=>$sender_id,"receiver_id"=>$receiver_id,"event_id"=>$event_id,"book_id"=>$book_id,"book_amount"=>$book_amount,"payment_date"=>$payment_date,"payment_status"=>$payment_status);
			$res=$cnn->insertRec($insertData,"booking_payment_master");
	
			if($res>0)
			{
				
			$select=$cnn->getrows("select * from user_master where user_id = '$sender_id'");
			$u_detail=mysqli_fetch_assoc($select);
			$name=$u_detail['first_name'].' '.$u_detail['last_name'];
			$email=$u_detail['email'];
			$gcmRegID=$u_detail['deviceid'];
			$Message='Your'.' '.$book_amount.' '.'amount paid successfully';
			define( 'API_ACCESS_KEY', 'AAAAGr0e46s:APA91bG0aXlhxI3da4zCm14VEGJJA8m-5Qy2tTRftdbkE8tDmlDKAWQDbr5kwjopzkwBrV67aFnD_3vGdsaS_qFfysuol-ZJvECdmY0N0v7TlJ7tbhkzFDocOuetgH5pNvs4WHmy2Ji6');
		
			$registrationIds = $gcmRegID;
			$msg = array
			  (
					'body'   => $Message,
				   'icon'   => 'myicon',
				   'sound' => 'mySound'
			  );
			$fields = array
			 (
				'to'     => $registrationIds,
				'data' => $msg
			 );
			$headers = array
			 (
				'Authorization: key=' . API_ACCESS_KEY,
				'Content-Type: application/json'
			 );

			$ch = curl_init();
		  curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
		  curl_setopt( $ch,CURLOPT_POST, true );
		  curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		  curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		  curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		  curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		  $result = curl_exec($ch );
		  curl_close( $ch );
		  
		        $to = $email;
			$subject = 'Booking Payment';
			$message = '<div style="background-color:silver; height:250px; width:650px; padding:1%;">';
			$message .= '<h2 style="text-align:center;">Hi, '.$name.' </h2>';
			$message .= '<div style="background-color:#fff; height:170px; width:638px; padding:5px;">';
			$message .= '<p>Your'.$book_amount .'amount paid successfully';
			$message .= '</p>';
			
			$message .= '</div>';
			$message .= '</div>';
			$headers = 'From: support@stallsbook.com' . "\r\n" .
			'Reply-To: '.$email.'' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
			$headers  .= 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			mail($to,$subject,$message,$headers);
				
				echo '<script>';
				echo 'alert("Booking Payment Successful.")';
				echo '</script>';
				echo "<script> window.location.href = 'oviewmoreEventDetail.php?event_id=$event_id'; </script>";	
			}
			else
			{
				echo '<script>';
				echo 'alert("Something Want To Wrong.")';
				echo '</script>';
				echo "<script> window.location.href = 'oviewmoreEventDetail.php?event_id=$event_id'; </script>";	
			}
		}
	}
?>