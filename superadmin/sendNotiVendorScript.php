<?php
	include("../include/config.php");
	include("include/session.php");
	$cnn = new connection();
	
	if(isset($_POST['send_noti1']))
	{
		$email = $_POST['emailArray'];
		$subject1 = $_POST['messages'];
		
		$to = $email;
		$subject = 'Master';
	   	$message .= '<h4>'.$subject1.'</h4>';
		$headers = 'From: support@stallsbook.com' . "\r\n" . 'Reply-To: '.$to.'' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
		$headers  .= 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		mail($to, $subject, $message, $headers);
		//header("Location: notiVendor.php");
		
		echo '<script>';
			echo 'alert("You have Alreay Booked Shop.You Have Not Book Again.")';
			echo '</script>';
			echo "<script> window.location.href = 'notiVendor.php'; </script>";
	}
?>