<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cnn = new connection();
    $headers = array("Content-Type:multipart/form-data");
    $event_id=$_REQUEST['event_id'];  	
    $sender_id = $_REQUEST['sender_id'];	
    $paymentData = array();
    $paymentData1 = array();

	//echo "select * from payment_master pm, booking_payment_master bpm , event_master em where bpm.event_id=em.event_id and bpm.event_id = '$event_id' and bpm.sender_id ='$sender_id' AND bpm.payment_status='1' AND pm.book_id=bpm.book_id AND pm.sender_id=bpm.sender_id";
	//echo "select * from payment_master pm, booking_payment_master bpm , event_master em where bpm.event_id=em.event_id and bpm.event_id = '$event_id' and bpm.sender_id ='$sender_id'  and bpm.book_amount != '0' AND bpm.payment_status='1' AND pm.event_id=bpm.event_id AND pm.sender_id='$sender_id'";
	$selectPayment1 = $cnn->countrow("select * from payment_master pm, booking_payment_master bpm , event_master em where bpm.event_id=em.event_id and bpm.event_id = '$event_id' and bpm.sender_id ='$sender_id'  and bpm.book_amount != '0' AND bpm.payment_status='1' AND pm.event_id=bpm.event_id AND pm.sender_id=bpm.sender_id");
	
	if($selectPayment1 > 0)
	{
		$selectPayment = $cnn->getrows("select * from payment_master pm, booking_payment_master bpm , event_master em where bpm.event_id=em.event_id and bpm.event_id = '$event_id' and bpm.sender_id ='$sender_id'  and bpm.book_amount != '0' AND bpm.payment_status='1' AND pm.event_id=bpm.event_id AND pm.sender_id=bpm.sender_id");
		
		$sum=0;
		while($getPayment = mysqli_fetch_assoc($selectPayment))
		{
			$paymentData[] = $getPayment;
			
			$stall_charge = $getPayment['amount'];
			$total_amount = $getPayment['book_amount'];
			$sum = $sum+$total_amount;
			$remain_amount = $stall_charge - $sum;
		}
		$paymentData1 = $paymentData;
		//$paymentData[] = paymentData;
		echo json_encode(array("paymentData" => $paymentData1,"sum"=>$sum,"remain_amount"=>$remain_amount, "ResponseCode" => "1", "Result" => "True"));
	}
	else
	{
		echo json_encode(array("paymentData" => [], "ResponseCode" => "2", "Result" => "False"));
	}