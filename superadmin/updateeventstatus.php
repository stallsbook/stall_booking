<?php
	include("../include/config.php"); 
	include("include/session.php"); 
	$cnn = new connection();

	$eventid = $_GET['eventid'];
	$status = $_GET['status'];
	$email = $_GET['email'];
	$user_id = $_GET['user_id'];
		
	$updateStatus = $cnn -> updatedeleterows("UPDATE event_master SET status = '$status' WHERE event_id = '$eventid' ");

	$selectuser = $cnn -> getrows("SELECT * FROM user_master where user_id = '$user_id' limit 1");
	$userdata = mysqli_fetch_array($selectuser);
	$selectevent = $cnn -> getrows("SELECT * FROM event_master where event_id = '$eventid' limit 1");
	$eventdata = mysqli_fetch_array($selectevent);
	$name = $userdata['first_name'];
	$event = $eventdata['event_name'];
	$start_date = date('d-m-Y', strtotime($eventdata['start_date']));
	$end_date = date('d-m-Y', strtotime($eventdata['end_date']));

	if($status == '1')
	{
		$to = $email;
	        $subject = 'Approve Booking.';
	        $message .= '<h4 style="text-align:center;">Congratulation '.$name.', Your '.$event.' Event Approved By Admin.</h4>';
	        $headers = 'From: support@stallsbook.com' . "\r\n" .
	                    'Reply-To: '.$email.'' . "\r\n" .
	                    'X-Mailer: PHP/' . phpversion();
	        $headers  .= 'MIME-Version: 1.0' . "\r\n";
	        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	        mail($to, $subject, $message, $headers);
	}

	if($updateStatus)
	{
		header("Location: allevents.php");
	}

?>