<?php
	include("../include/config.php"); 
	include("../include/session.php"); 
	$cnn = new connection();

	if(isset($_POST['insertBook']))
	{
		$user_id = $_SESSION['user_id'];
		$event_id = $_POST['event_id'];
		$shop_no = $_POST['shop_no'];
		$shop_name = $_POST['shop_name'];
		$start_date = $_POST['start_date'];
		$end_date = $_POST['end_date'];
		$create_date = date('Y-m-d H:i:s');
		$status = 0;

		$countUser = $cnn->countrow("SELECT *FROM booking_master WHERE user_id='$user_id' AND event_id='$event_id'");
		if($countUser > 0)
		{
			echo '<script>';
			echo 'alert("You Have Alreay Booked a Stall For This Event.")';
			echo '</script>';
			echo "<script> window.location.href = 'viewEvent.php?event_id=$event_id'; </script>";
		}
		else
		{
			$selectEvent = $cnn->getrows("SELECT *FROM event_master WHERE event_id='$event_id'");
			$getEvent = mysqli_fetch_array($selectEvent);
			$avai_stall = $getEvent['avai_stall'];
	
			if($avai_stall < $shop_no)
			{
					echo '<script>';
					echo 'alert("Please Enter Less or Equal No of Shop.")';
					echo '</script>';
					echo "<script> window.location.href = 'viewEvent.php?event_id=$event_id'; </script>";
			}
			else
			{
				$insertData = array("event_id"=>$event_id,"user_id"=>$user_id,"shop_no"=>$shop_no,"shop_name"=>$shop_name,"start_date"=>$start_date,"end_date"=>$end_date,"create_date"=>$create_date,"status"=>$status);
				$data = $cnn->insertRec($insertData,"booking_master");
		
				if($data > 0)
				{
					$selectEmail=$cnn->getrows("SELECT email FROM user_master WHERE user_id='$user_id'");
					$getEmail = mysqli_fetch_array($selectEmail);
					$email = $getEmail['email'];
					$to = $email;
					$subject = 'Event Organizer';
				   	$message .= '<h4>Your booking successfull. your Shop Name is '.$shop_name.'.</h4>';
					$headers = 'From: support@stallsbook.com' . "\r\n" . 'Reply-To: '.$to.'' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
					$headers  .= 'MIME-Version: 1.0' . "\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
					mail($to, $subject, $message, $headers);
					echo "<script> alert('Booking request sent successfully,Check Your Mail, Please wait for Organizer approval.'); </script>";
					echo "<script> window.location.href = 'viewEvent.php?event_id=$event_id'; </script>";
				}
				else
				{
					echo '<script>';
					echo 'alert("Something Want To Wrong.")';
					echo '</script>';
					echo "<script> window.location.href = 'viewEvent.php?event_id=$event_id'; </script>";
				}
			}
		}
	}
?>