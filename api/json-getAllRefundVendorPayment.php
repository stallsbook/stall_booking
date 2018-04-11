<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cnn = new connection();
    $headers = array("Content-Type:multipart/form-data");
    $event_id=$_REQUEST['event_id'];  	
    $sender_id = $_REQUEST['sender_id'];
    $book_id = $_REQUEST['book_id'];	
    $paymentData = array();
    $paymentData1 = array();

	$selectPayment1 = $cnn->countrow("SELECT  um.first_name,em.event_name,em.event_id,em.stall_charge,um.user_id,bpm.sender_id,bpm.book_amount,bm.book_id,bpm.comment,bpm.payment_date,bpm.pay_type,bpm.refund_amount FROM booking_payment_master bpm, user_master um,event_master em,booking_master bm WHERE bpm.book_id=bm.book_id AND bpm.sender_id=um.user_id AND bpm.event_id=em.event_id AND bpm.sender_id='$sender_id' AND bpm.event_id='$event_id' AND bpm.book_id='$book_id' AND bpm.payment_status='1' AND bpm.refund_amount > 0 order by bpm.payment_date ASC");
	if($selectPayment1 > 0)
	{
		$selectPayment = $cnn->getrows("SELECT  um.first_name,em.event_name,em.event_id,em.stall_charge,um.user_id,bpm.sender_id,bpm.book_amount,bm.book_id,bpm.comment,bpm.payment_date,bpm.pay_type,bpm.refund_amount,bpm.bookpay_id FROM booking_payment_master bpm, user_master um,event_master em,booking_master bm WHERE bpm.book_id=bm.book_id AND bpm.sender_id=um.user_id AND bpm.event_id=em.event_id AND bpm.sender_id='$sender_id' AND bpm.event_id='$event_id' AND bpm.book_id='$book_id' AND bpm.payment_status='1' AND bpm.refund_amount > 0 order by bpm.payment_date ASC");
		$sum=0;
		while($getPayment = mysqli_fetch_assoc($selectPayment))
		{
			$paymentData[] = $getPayment;
			
			//$stall_charge = $getPayment['stall_charge'];
			$total_amount = $getPayment['refund_amount'];
			$sum = $sum+$total_amount;
		}
		$paymentData1 = $paymentData;
		echo json_encode(array("paymentData" => $paymentData1,"sum"=>$sum, "ResponseCode" => "1", "Result" => "True"));
	}
	else
	{
		echo json_encode(array("paymentData" => [], "ResponseCode" => "2", "Result" => "False"));
	}