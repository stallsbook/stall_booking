<?php
	include("../include/config.php");
	include("../include/session.php");
	$cnn = new connection();
	
	if(isset($_POST['refundPayMoney']))
	{
		$sender_id = $_POST['user_id'];
		$receiver_id = $_SESSION['user_id'];
		$pay_by = $_SESSION['first_name'];
		$event_id = $_POST['event_id'];
		$refundAmount= $_POST['refundAmount'];
		$comment= $_POST['comment'];
		$pay_type= 'refund';
		$comment= $_POST['comment'];
		$payment_date= date('Y-m-d H:i:s');
		$payment_status= '1';

		$selectBook = $cnn->getrows("SELECT *FROM booking_master bm,user_master um WHERE bm.user_id=um.user_id AND bm.user_id='$sender_id' AND bm.event_id='$event_id'");
		$getBook = mysqli_fetch_array($selectBook);
		$book_id = $getBook['book_id'];
		$email= $getBook['email'];
		$first_name= $getBook['first_name'];
		
		$makePayment = array("event_id" => $event_id, "sender_id" => $sender_id, "receiver_id" => $receiver_id, "book_id"=>$book_id, "pay_type"=>$pay_type,"pay_by" => $pay_by,"refund_amount" => $refundAmount,"comment" => $comment, "payment_date" => $payment_date, "payment_status" => $payment_status);
		
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
		        
		        //echo json_encode("success");
		        
		        //header("Location:ogetBookingPayment.php?event_id=$event_id");
		        echo '<script>';
			echo 'alert("Payment Refund Successfully...")';
			echo '</script>';
			echo "<script> window.location.href = 'ogetBookingPayment.php?event_id=$event_id'; </script>";
		}
	}
	?>
