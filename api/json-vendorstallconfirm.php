<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cnn = new connection();

	$book_id = $_REQUEST['book_id'];
	$status = $_REQUEST['status'];
	$event_id = $_REQUEST['event_id'];
	
	$selectBooking = $cnn->getrows("SELECT *FROM booking_master bm,user_master um WHERE bm.book_id='$book_id' and bm.event_id='$event_id' and  bm.user_id = um.user_id AND um.user_type='Vendor'");
	$getBook = mysqli_fetch_array($selectBooking);
	$shop_no = $getBook['shop_no'];
	$email = $getBook['email'];
	$name1 = $getBook['first_name']." ".$getBook['last_name'];
	$name=ucfirst($name1);
	
	$selectEvent = $cnn->getrows("SELECT *FROM event_master WHERE event_id='$event_id'");
	$getEvent = mysqli_fetch_array($selectEvent);
	$avai_stall = $getEvent['avai_stall'];
	$event= $getEvent['event_name'];
	$start_date= date('d-m-Y',strtotime($getEvent['start_date']));
	$end_date= date('d-m-Y',strtotime($getEvent['end_date']));
	$minus=$avai_stall-$shop_no;
	$updateStall = $cnn->updatedeleterows("UPDATE event_master SET avai_stall = '$minus' WHERE event_id='$event_id'");
	
	//$updateAvai_stall = $cnn -> updatedeleterows("UPDATE event_master SET avai_stall= '$minus' WHERE event_id = '$event_id'");
	$updateStatus = $cnn -> updatedeleterows("UPDATE booking_master SET status = '$status' WHERE book_id = '$book_id' ");

	if($updateStatus)
	{
		$gcmRegID=$getBook['deviceid'];
		//$Message='Your booking is approved in event by organizer to '.' '.$event.' '.'booking confirmed!';
		$Message=$event.' booking confirmed!';
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
	        $subject = 'Approve Booking.';
	     /*   $message .= '<h4 style="text-align:center;">hi '.$name.',Your Booking Is Approved In '.$event.' Event. Make your payment to assign shop by Organizer.Your event date is '.$start_date.' To '.$end_date.'.</h4>';
	         $message .= '<h4 style="text-align:center;">This is system generated mail please do not reply </h4>';*/
	         	$message = '<div style="background-color:silver; height:250px; width:650px; padding:1%;">';
			$message .= '<img src="http://alexinfosoft.com/stall_booking/stall_live/images/logo.png" style="width:100px;height:40px;float:left;" ><h2 style="text-align:center;">Hi, '.$name.' </h2>';
			$message .= '<div style="background-color:#fff; height:170px; width:638px; padding:5px;">';
			$message .= '<p> Your Booking Is Approved In '.$event.' Event. Make your payment to assign shop by Organizer.Your event date is '.$start_date.' To '.$end_date.'.</p>';
			$message .= '<p> This is system generated mail please do not reply </p>';
			$message .= '</div>';
			$message .= '</div>';
	      		$headers = 'From: stallsbook.com' . "\r\n" .
	                    'Reply-To: '.$email.'' . "\r\n" .
	                    'X-Mailer: PHP/' . phpversion();
	        $headers  .= 'MIME-Version: 1.0' . "\r\n";
	        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	        mail($to, $subject, $message, $headers);
	        
	        
	        echo json_encode(array("ResponseCode" => "1", "Result" => "True"));
   
		
	}
	else
	{
		echo json_encode(array("ResponseCode" => "2", "Result" => "False"));
   
	}
 
    ?>