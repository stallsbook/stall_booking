<?php
	include("../include/config.php"); 
	include("../include/session.php"); 
	$cnn = new connection();

	if(isset($_POST['cash']))
	{	
	        $book_amount= $_POST['cash_amount'];
	        $comment= $_POST['comment'];
	        $event_id = $_POST['event_id'];
	        $receiver_id = $_POST['receiver_id'];
	        $book_id = $_POST['book_id'];
	        $stall_charge = $_POST['stall_charge'];
	        $pay_by = $_SESSION['first_name'];
	        $sender_id = $_SESSION['user_id'];
	        $payment_date = date('Y-m-d H:i:s');
	        $pay_type = "cash";
	        $payment_status = '0';
		
		$makePayment = array("event_id" => $event_id, "sender_id" => $sender_id, "receiver_id" => $receiver_id, "book_id"=>$book_id, "pay_by" => $pay_by, "pay_type"=>$pay_type,"book_amount" => $book_amount,"comment" => $comment, "payment_date" => $payment_date, "payment_status" => $payment_status);

		$insertData = $cnn -> insertRec($makePayment, "booking_payment_master");

		if($insertData > 0)
		{
			$selectAmount = $cnn->getrows("SELECT sum(book_amount) as total_amount FROM booking_payment_master WHERE event_id='$event_id' AND sender_id='$sender_id'");
			$getAmount = mysqli_fetch_array($selectAmount);
			$totalAmount = $getAmount['total_amount'];
			$remainAmount = $stall_charge - $totalAmount;
			echo $remainAmount;
		}
		else
		{
			echo json_encode("error");
		}
	}
	if(isset($_POST['bank']))
	{	
	        $txn_id= $_POST['txn_id'];
	        $bank_name= $_POST['bank_name'];
	        $book_amount= $_POST['bank_amount'];
	        $bankComment= $_POST['bankComment'];
	        $event_id = $_POST['event_id'];
	        $receiver_id = $_POST['receiver_id'];
	        $stall_charge = $_POST['stall_charge'];
	        $book_id = $_POST['book_id'];
	        $pay_by = $_SESSION['first_name'];
	        $sender_id = $_SESSION['user_id'];
	        $payment_date = date('Y-m-d H:i:s');
	        $pay_type = "bank";
	        $payment_status = '0';
		
		$makePayment = array("event_id" => $event_id, "sender_id" => $sender_id, "receiver_id" => $receiver_id, "book_id"=>$book_id, "txn_id" => $txn_id, "bank_name" => $bank_name, "pay_by" => $pay_by, "pay_type"=>$pay_type,"book_amount" => $book_amount,"comment" => $bankComment, "payment_date" => $payment_date, "payment_status" => $payment_status);

		$insertData = $cnn -> insertRec($makePayment, "booking_payment_master");

		if($insertData > 0)
		{
			$selectAmount = $cnn->getrows("SELECT sum(book_amount) as total_amount FROM booking_payment_master WHERE event_id='$event_id' AND sender_id='$sender_id'");
			$getAmount = mysqli_fetch_array($selectAmount);
			$totalAmount = $getAmount['total_amount'];
			$remainAmount = $stall_charge - $totalAmount;
			echo $remainAmount;
		}
		else
		{
			echo json_encode("error");
		}
	}
?>