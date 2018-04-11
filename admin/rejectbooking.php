<?php
	include("../include/config.php"); 
	include("../include/session.php"); 
	$cnn = new connection();

	$book_id = $_POST['book_id'];
	$status = $_POST['status'];
	$event_id = $_POST['event_id'];
	$reason = $_POST['reason'];
	
	$selectBooking = $cnn->getrows("SELECT * FROM booking_master bm,user_master um WHERE bm.book_id='$book_id' and bm.event_id='$event_id' and  bm.user_id = um.user_id");
	$getBook = mysqli_fetch_array($selectBooking);
	$shop_no = $getBook['shop_no'];
	$email = $getBook['email'];
	$name = $getBook['first_name']." ".$getBook['last_name'];
	
	$selectEvent = $cnn->getrows("SELECT *FROM event_master WHERE event_id='$event_id'");
	$getEvent = mysqli_fetch_array($selectEvent);
	$avai_stall = $getEvent['avai_stall'];
	$start_date= date('d-m-Y',strtotime($getEvent['start_date']));
	$end_date= date('d-m-Y',strtotime($getEvent['end_date']));
	$minus=$avai_stall-$shop_no;
	
	
	$updateStatus = $cnn -> updatedeleterows("Delete from  booking_master  WHERE book_id = '$book_id' ");

	if($updateStatus)
	{
		$gcmRegID=$getBook['deviceid'];
		$Message='Your Booking Is Rejected In'.' '.$event.' '.'event by Organizer';
			define( 'API_ACCESS_KEY', 'AAAAGr0e46s:APA91bG0aXlhxI3da4zCm14VEGJJA8m-5Qy2tTRftdbkE8tDmlDKAWQDbr5kwjopzkwBrV67aFnD_3vGdsaS_qFfysuol-ZJvECdmY0N0v7TlJ7tbhkzFDocOuetgH5pNvs4WHmy2Ji6');
		
			$registrationIds = $gcmRegID;
			$msg = array
			  (
					'body'   => $Message,
				   'icon'   => 'myicon',/*Default Icon*/
				   'sound' => 'mySound'/*Default sound*/
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
	        $subject = 'Reject Booking.';
	        $message .= '<h4 style="text-align:center;">hi '.$name.', Your Booking Is Rejected In '.$event.' Event. </h4>';
	        $message .= '<h4 style="text-align:center;">Reason : '.$reason.'</h4>';
	        $headers = 'From: support@stallsbook.com' . "\r\n" .
	                    'Reply-To: '.$email.'' . "\r\n" .
	                    'X-Mailer: PHP/' . phpversion();
	        $headers  .= 'MIME-Version: 1.0' . "\r\n";
	        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	        mail($to, $subject, $message, $headers);
		header("Location: oviewmoreEventDetail.php?event_id=$event_id");
	}

?>