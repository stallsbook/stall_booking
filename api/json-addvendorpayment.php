<?php
	include("../include/config.php"); 
	$cnn = new connection();
	
	$pay_type = $_REQUEST['pay_type'];
	if($pay_type == "cash")
	{	
		$event_id = $_REQUEST['event_id'];
		$sender_id = $_REQUEST['user_id'];
		$receiver_id = $_REQUEST['receiver_id'];
		$book_id = $_REQUEST['book_id'];
		$pay_by = $_REQUEST['pay_by'];
		$pay_type = $_REQUEST['pay_type'];
	        $book_amount= $_REQUEST['cash_amount'];
	        $comment= $_REQUEST['comment'];
	        $payment_date = date('Y-m-d H:i:s');
	        $payment_status = '0';
	        
		$makePayment = array("event_id" => $event_id, "sender_id" => $sender_id, "receiver_id" => $receiver_id, "book_id"=>$book_id, "pay_by" => $pay_by, "pay_type"=>$pay_type,"book_amount" => $book_amount,"comment" => $comment, "payment_date" => $payment_date, "payment_status" => $payment_status);

		$insertData = $cnn -> insertRec($makePayment, "booking_payment_master");

		if($insertData > 0)
		{
			echo json_encode(array("message"=>"Your Payment Is Done.","ResponseCode" => "1", "Result" => "True"));
		}
		else
		{
			echo json_encode(array("message"=>"Your Payment Is Not Done.","ResponseCode" => "2", "Result" => "False"));
		}
	}
	if($pay_type == "bank")
	{	
		$event_id = $_REQUEST['event_id'];
		$sender_id = $_REQUEST['user_id'];
		$receiver_id = $_REQUEST['receiver_id'];
		$book_id = $_REQUEST['book_id'];
	        $txn_id= $_REQUEST['txn_id'];
	        $bank_name= $_REQUEST['bank_name'];
	        $pay_by = $_REQUEST['pay_by'];
	        $pay_type = $_REQUEST['pay_type'];
	        $book_amount= $_REQUEST['cash_amount'];
	        $bankComment= $_REQUEST['comment'];
	        $payment_date = date('Y-m-d H:i:s');
	        $payment_status = '0';
	       
		$makePayment = array("event_id" => $event_id, "sender_id" => $sender_id, "receiver_id" => $receiver_id, "book_id"=>$book_id, "txn_id" => $txn_id, "bank_name" => $bank_name, "pay_by" => $pay_by, "pay_type"=>$pay_type,"book_amount" => $book_amount,"comment" => $bankComment, "payment_date" => $payment_date, "payment_status" => $payment_status);

		$insertData = $cnn -> insertRec($makePayment, "booking_payment_master");

		if($insertData > 0)
		{
			echo json_encode(array("message"=>"Your Payment Is Done.","ResponseCode" => "1", "Result" => "True"));
		}
		else
		{
			echo json_encode(array("message"=>"Your Payment Is Not Done.","ResponseCode" => "2", "Result" => "False"));
		}
	}
?>