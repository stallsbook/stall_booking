<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cnn = new connection();
    $headers = array("Content-Type:multipart/form-data");
 
    $data = array();
    $event_id = $_REQUEST['event_id'];

    $selectData1 = $cnn->getRows("SELECT distinct bpm.sender_id FROM booking_payment_master bpm,event_master em,booking_master bm,payment_master pm WHERE em.event_id=bpm.event_id AND  em.event_id='$event_id' AND bm.book_id=bpm.book_id AND pm.sender_id=bpm.sender_id AND pm.event_id=bpm.event_id");
	while($getData1 = mysqli_fetch_assoc($selectData1))
	{
		$sender_id = $getData1['sender_id'];
		 	
		$selectData = $cnn->getrows("SELECT DISTINCT um.first_name,bm.shop_no,bm.shop_name,em.event_name,em.event_id,em.stall_charge,um.user_id,bpm.sender_id,sum(bpm.book_amount) as book_amount1,bm.book_id,bpm.comment,bpm.payment_status,bpm.event_id,bpm.book_id,pm.sender_id,pm.amount FROM booking_payment_master bpm, user_master um,event_master em,booking_master bm,payment_master pm WHERE bpm.book_id=bm.book_id AND bpm.sender_id=um.user_id AND bpm.event_id=em.event_id AND bpm.sender_id='$sender_id' AND bpm.event_id='$event_id' AND bpm.payment_status='1' AND pm.sender_id=bpm.sender_id AND pm.event_id=bpm.event_id");
									
		while($getData = mysqli_fetch_assoc($selectData))
		{
	             $stall_charge = $getData['amount'];
	             $total_amount = $getData['book_amount1'];
		     $remain_amount = $stall_charge - $total_amount;
		     $getData['remain_amount']=$remain_amount;
		     $getData['total_amount']=$total_amount;
	             $getData['sender_id']=$sender_id;
	             $data[] = $getData;
		}
	}
	echo json_encode(array("allEvent" => $data, "ResponseCode" => "1", "Result" => "True"));
?>