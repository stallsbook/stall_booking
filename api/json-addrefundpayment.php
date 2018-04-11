<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cnn = new connection();
    
   		$sender_id = $_REQUEST['sender_id'];
		$receiver_id = $_REQUEST['receiver_id'];
		$first_name = $_REQUEST['first_name'];
		$event_id = $_REQUEST['event_id'];
		$refundAmount= $_REQUEST['refundAmount'];
		$comment= $_REQUEST['comment'];
		$pay_type= 'refund';
		
		$payment_date= date('Y-m-d H:i:s');
		$payment_status= '1';

		$selectBook = $cnn->getrows("SELECT *FROM booking_master bm,user_master um WHERE bm.user_id=um.user_id AND bm.user_id='$sender_id'");
		$getBook = mysqli_fetch_array($selectBook);
		$book_id = $getBook['book_id'];
		$email= $getBook['email'];
		$first_name= $getBook['first_name'];
		
		$makePayment = array("event_id" => $event_id, "sender_id" => $sender_id, "receiver_id" => $receiver_id, "book_id"=>$book_id, "pay_type"=>$pay_type,"pay_by" => $first_name,"refund_amount" => $refundAmount,"comment" => $comment, "payment_date" => $payment_date, "payment_status" => $payment_status);
		
		$insertData = $cnn -> insertRec($makePayment, "booking_payment_master");

		if($insertData > 0)
		{
			$to = $email;
		        $subject = 'Refund Payment.';
		      /*  $message .= '<img src="http://alexinfosoft.com/stall_booking/stall_live/images/logo.png" style="width:100px;height:40px;float:left;" ><h4 style="text-align:center;">hi '.$first_name.', Your Payment Is Refund By Admin. Your Paid Amount Is '.$refund_amount.' Rupees.</h4>';
		        $headers = 'From: vb4dholariya@gmail.com' . "\r\n" .*/
		        $message = '<div style="background-color:silver; height:250px; width:650px; padding:1%;">';
			$message .= '<img src="http://alexinfosoft.com/stall_booking/stall_live/images/logo.png" style="width:100px;height:40px;float:left;" ><h2 style="text-align:center;">Hi, '.$first_name.' </h2>';
			$message .= '<div style="background-color:#fff; height:170px; width:638px; padding:5px;">';
			$message .= '<p> Your Payment Is Refund By Admin. Your Paid Amount Is '.$refund_amount.' Rupees.</p>';
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
		echo json_encode(array("ResponseCode" => "2", "Result" => "True"));
		}
?>		