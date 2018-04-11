<?php
	include("../include/config.php"); 
	include("include/session.php"); 
	$cnn = new connection();

	if (isset($_POST["eventid"]))
	{
		$eventid= $_POST['eventid'];
		$reason= $_POST['reason'];
		
		$selectEntPost = $cnn -> getrows("select * from user_master um , event_master em where um.user_id = em.user_id and em.event_id='$eventid'");
		$user=mysqli_fetch_assoc($selectEntPost );
		$email=$user['email'];
		$event_name=$user['event_name'];
		$uname=$user['first_name'].' '.$user['last_name'];
		
		$deleteCT1 = $cnn -> updatedeleterows("DELETE FROM event_master WHERE event_id= '$eventid'");
		$deleteCT2 = $cnn -> updatedeleterows("DELETE FROM booking_master WHERE event_id= '$eventid'");
		$deleteCT3 = $cnn -> updatedeleterows("DELETE FROM booking_payment_master WHERE event_id= '$eventid'");
		$deleteCT4 = $cnn -> updatedeleterows("DELETE FROM collection_master WHERE event_id= '$eventid'");
		$deleteCT5 = $cnn -> updatedeleterows("DELETE FROM favourite_master WHERE event_id= '$eventid'");
		$deleteCT6 = $cnn -> updatedeleterows("DELETE FROM payment_master WHERE event_id= '$eventid'");
		$deleteCT7 = $cnn -> updatedeleterows("DELETE FROM review_ratting_master WHERE event_id= '$eventid'");
		$deleteCT8 = $cnn -> updatedeleterows("DELETE FROM payment_master WHERE event_id= '$eventid'");
		$deleteCT9 = $cnn -> updatedeleterows("DELETE FROM shop_master WHERE event_id= '$eventid'");
	
		
			$to      = $email;
			$subject = 'Delete Event';
			$message = '<div style="background-color:silver; height:250px; width:650px; padding:1%;">';
			$message .= '<h2 style="text-align:center;">Hi, '.$uname.' </h2>';
			$message .= '<div style="background-color:#fff; height:170px; width:638px; padding:5px;">';
			$message .= '<p>Your '.$event_name.' Event is Deleted by Admin';
			$message .= '</p>';
			$message .= '<p>because '.$reason.'';
			$message .= '</p>';
			$message .= '</div>';
			$message .= '</div>';
			$headers = 'From: stallBooking.com' . "\r\n" .
			'Reply-To: '.$email.'' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
			$headers  .= 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			mail($to,$subject,$message,$headers);
			header("Location: allevents.php");
		
	}
	else if (isset($_POST["neventid"]))
	{
		$neventid= $_POST['neventid'];
		$reason= $_POST['reason'];
		
		$selectEntPost = $cnn -> getrows("select * from user_master um , event_master em where um.user_id = em.user_id and em.event_id='$neventid'");
		$user=mysqli_fetch_assoc($selectEntPost );
		$email=$user['email'];
		$event_name=$user['event_name'];
		$uname=$user['first_name'].' '.$user['last_name'];
		

		$deleteCT = $cnn -> updatedeleterows("DELETE FROM event_master WHERE event_id= '$neventid'");
		$deleteCT2 = $cnn -> updatedeleterows("DELETE FROM booking_master WHERE event_id= '$neventid'");
		$deleteCT3 = $cnn -> updatedeleterows("DELETE FROM booking_payment_master WHERE event_id= '$neventid'");
		$deleteCT4 = $cnn -> updatedeleterows("DELETE FROM collection_master WHERE event_id= '$neventid'");
		$deleteCT5 = $cnn -> updatedeleterows("DELETE FROM favourite_master WHERE event_id= '$neventid'");
		$deleteCT6 = $cnn -> updatedeleterows("DELETE FROM payment_master WHERE event_id= '$neventid'");
		$deleteCT7 = $cnn -> updatedeleterows("DELETE FROM review_ratting_master WHERE event_id= '$neventid'");
		$deleteCT8 = $cnn -> updatedeleterows("DELETE FROM payment_master WHERE event_id= '$neventid'");
		$deleteCT9 = $cnn -> updatedeleterows("DELETE FROM shop_master WHERE event_id= '$neventid'");
		
	
		if($deleteCT)
		{
			$to      = $email;
			$subject = 'Delete Event';
			$message = '<div style="background-color:silver; height:250px; width:650px; padding:1%;">';
			$message .= '<h2 style="text-align:center;">Hi, '.$uname.' </h2>';
			$message .= '<div style="background-color:#fff; height:170px; width:638px; padding:5px;">';
			$message .= '<p>Your '.$event_name.' Event is Deleted by Admin';
			$message .= '</p>';
			$message .= '<p>because '.$reason.'';
			$message .= '</p>';
			$message .= '</div>';
			$message .= '</div>';
			$headers = 'From: stallBooking.com' . "\r\n" .
			'Reply-To: '.$email.'' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
			$headers  .= 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			mail($to,$subject,$message,$headers);
			header("Location: alldeactiveevents.php");
		}
		
	}	
	
?>