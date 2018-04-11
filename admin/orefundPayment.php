<?php
	include("../include/config.php");
	include("../include/session.php");
	$cnn = new connection();

	if(isset($_POST['refund']))
	{
		$receiver_id = $_SESSION['user_id'];
		$sender_id = $_POST['sender_id'];
		$event_id = $_POST['event_id'];
		$book_id = $_POST['book_id'];
		$payment_status = '1';
		$refund_amount=$_POST['refundAmount'];
		$pay_type = 'refund';
		$payment_date = date('Y-m-d H:i:s');
		
		$selectEmail = $cnn -> getrows("SELECT email,first_name FROM user_master WHERE user_id = '$sender_id'");
		$getEmail = mysqli_fetch_array($selectEmail);
		$email = $getEmail['email'];
		$first_name = $getEmail['first_name'];
		
		$makePayment = array("event_id" => $event_id, "sender_id" => $sender_id, "receiver_id" => $receiver_id, "book_id"=>$book_id, "pay_type"=>$pay_type,"refund_amount" => $refund_amount, "payment_date" => $payment_date, "payment_status" => $payment_status);
		
		$insertData = $cnn -> insertRec($makePayment, "booking_payment_master");

		if($insertData > 0)
		{
			$to = $email;
		        $subject = 'Refund Payment.';
		        $message .= '<h4 style="text-align:center;">hi '.$first_name.', Your Payment Is Refund By Admin. Your Paid Amount Is '.$refund_amount.' Rupees.</h4>';
		        $headers = 'From: support@stallsbook.com' . "\r\n" .
		                    'Reply-To: '.$email.'' . "\r\n" .
		                    'X-Mailer: PHP/' . phpversion();
		        $headers  .= 'MIME-Version: 1.0' . "\r\n";
		        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		        mail($to, $subject, $message, $headers);
		        
		        echo json_encode("success");
		}
	}
?>