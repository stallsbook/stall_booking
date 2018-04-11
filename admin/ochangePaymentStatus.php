<?php
	include("../include/config.php");
	include("../include/session.php");
	$cnn = new connection();

	if(isset($_GET['accept']))
	{
		$sender_id = $_GET['sender_id'];
		$bookpay_id = $_GET['bookpay_id'];
		$event_id = $_GET['event_id'];
		$book_id = $_GET['book_id'];
		$payment_status = $_GET['payment_status'];
		$email=$_GET['email'];
		$first_name=$_GET['first_name'];
		$book_amount=$_GET['book_amount'];
		$pay_type=$_GET['pay_type'];
		$event_name=$_GET['event_name'];
		
		if($payment_status == '0')
		{
		
			$to = $email;
		        $subject = 'Accept Payment.';
		        $message .= '<h4 style="text-align:center;">hi '.$first_name.', Your Payment Is Accept. You Paid By '.$pay_type.' For Event '.$event_name.'. Your Paid Amount Is '.$book_amount.' Rupees.</h4>';
		        $headers = 'From: support@stallsbook.com' . "\r\n" .
		                    'Reply-To: '.$email.'' . "\r\n" .
		                    'X-Mailer: PHP/' . phpversion();
		        $headers  .= 'MIME-Version: 1.0' . "\r\n";
		        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		        mail($to, $subject, $message, $headers);
			$changeStatus = $cnn -> updatedeleterows("UPDATE booking_payment_master SET payment_status = '1' WHERE bookpay_id = '$bookpay_id'");

			header("Location: oviewPaymentNotification.php");
		}
	}
	if(isset($_POST['reject']))
	{
		$sender_id = $_POST['sender_id'];
		$bookpay_id = $_POST['bookpay_id'];
		$event_id = $_POST['event_id'];
		$book_id = $_POST['book_id'];
		$payment_status = $_POST['payment_status'];
		$email=$_POST['email'];
		$reason=$_POST['reason'];
		$first_name=$_POST['first_name'];
		$book_amount=$_POST['book_amount'];
		$pay_type=$_POST['pay_type'];
		$event_name=$_POST['event_name'];
		
		if($payment_status == '0')
		{
			$to = $email;
		        $subject = 'Reject Payment.';
		        $message .= '<h4 style="text-align:center;">hi '.$first_name.', Your Payment Is Rejected. You Paid By '.$pay_type.' For Event '.$event_name.'. Your Paid Amount Is '.$book_amount.' Rupees.</h4>';
		        $message .= '<h4 style="text-align:center;">Reason : '.$reason.'</h4>';
		        $headers = 'From: support@stallsbook.com' . "\r\n" .
		                    'Reply-To: '.$email.'' . "\r\n" .
		                    'X-Mailer: PHP/' . phpversion();
		        $headers  .= 'MIME-Version: 1.0' . "\r\n";
		        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		        mail($to, $subject, $message, $headers);
		        
			$changeStatus = $cnn -> updatedeleterows("UPDATE booking_payment_master SET payment_status = '2' WHERE bookpay_id = '$bookpay_id'");

			header("Location: oviewPaymentNotification.php");
		}
	}
?>