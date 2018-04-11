<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cnn=new connection();
    $user_id = $_REQUEST['user_id'];
    
    $selectBook1 = $cnn -> countrow("SELECT  um.first_name,um.last_name,bm.book_id,bm.shop_no,bm.shop_name,em.event_name,em.event_id,em.stall_charge,um.user_id,um.email,bpm.sender_id,bpm.book_amount,bpm.pay_type,bpm.bank_name,bpm.txn_id,bpm.payment_status,bpm.bookpay_id,bpm.payment_date FROM booking_payment_master bpm, user_master um,event_master em,booking_master bm WHERE bpm.book_id=bm.book_id AND bpm.sender_id=um.user_id AND bpm.event_id=em.event_id AND bpm.sender_id=um.user_id AND bpm.payment_status='0' and bpm.receiver_id ='$user_id' ORDER BY bpm.payment_date DESC");
   
    if($selectBook1 > 0)
    {
    $selectBook = $cnn -> getrows("SELECT  um.first_name,um.last_name,bm.book_id,bm.shop_no,bm.shop_name,em.event_name,em.event_id,em.stall_charge,um.user_id,um.email,bpm.sender_id,bpm.book_amount,bpm.pay_type,bpm.pay_type,bpm.comment,bpm.bank_name,bpm.txn_id,bpm.payment_status,bpm.bookpay_id,bpm.payment_date FROM booking_payment_master bpm, user_master um,event_master em,booking_master bm WHERE bpm.book_id=bm.book_id AND bpm.sender_id=um.user_id AND bpm.event_id=em.event_id AND bpm.sender_id=um.user_id AND bpm.payment_status='0' and bpm.receiver_id ='$user_id' ORDER BY bpm.payment_date DESC");
	while($getEvent = mysqli_fetch_assoc($selectBook))
	{
		
                $data[] = $getEvent ;
	}
	echo json_encode(array("allEvent" => $data, "ResponseCode" => "1", "Result" => "True"));
    }
    else
    {
    	echo json_encode(array("allEvent" => [], "ResponseCode" => "2", "Result" => "False"));
    }
?>    