<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cnn = new connection();
    
    		$sender_id = $_REQUEST['sender_id'];
		$bookpay_id = $_REQUEST['bookpay_id'];
		$event_id = $_REQUEST['event_id'];
		$book_id = $_REQUEST['book_id'];
		$payment_status = $_REQUEST['payment_status'];
		$email=$_REQUEST['email'];
		$first_name=$_REQUEST['first_name'];
		$book_amount=$_REQUEST['book_amount'];
		$pay_type=$_REQUEST['pay_type'];
		$event_name=$_REQUEST['event_name'];
		
		if($payment_status == '1')
		{
		
			$changeStatus = $cnn -> updatedeleterows("UPDATE booking_payment_master SET payment_status = '1' WHERE bookpay_id = '$bookpay_id'");
			$to = $email;
		        $subject = 'Accept Payment.';
		       /* $message .= '<h4 style="text-align:center;">hi '.$first_name.', Your Payment Is Accept. You Paid By '.$pay_type.' For Event '.$event_name.'. Your Paid Amount Is '.$book_amount.' Rupees.</h4>';
		        $headers = 'From: vb4dholariya@gmail.com' . "\r\n" .*/
		        $message = '<div style="background-color:silver; height:250px; width:650px; padding:1%;">';
			$message .= '<img src="http://alexinfosoft.com/stall_booking/stall_live/images/logo.png" style="width:100px;height:40px;float:left;" ><h2 style="text-align:center;">Hi, '.$first_name.' </h2>';
			$message .= '<div style="background-color:#fff; height:170px; width:638px; padding:5px;">';
			$message .= '<p>  Your Payment Is Accept. You Paid By '.$pay_type.' For Event '.$event_name.'. Your Paid Amount Is '.$book_amount.' Rupees </p>';
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