<?php
	include("../include/config.php"); 
	include("../include/session.php"); 
	$cnn = new connection();

	if(isset($_POST['done']))
	{
		$receiver_id = $_SESSION['user_id'];
		$sender_id = $_POST['sender_id'];
		$event_id = $_POST['event_id'];
		$shop_id = $_POST['shop_id'];
		$pay_amount = $_POST['amount'];
		$pay_date = date('Y-m-d');
		$pay_status = 1;

		$selectPay = $cnn -> countrow("SELECT *FROM collection_master WHERE event_id='$event_id' AND shop_id='$shop_id'");
		if($selectPay > 0)
		{
			echo json_encode("already");
		}
		else
		{
			$insertData = array("sender_id"=>$sender_id,"receiver_id"=>$receiver_id,"event_id"=>$event_id,"shop_id"=>$shop_id,"pay_date"=>$pay_date,"pay_amount"=>$pay_amount,"pay_status"=>$pay_status);
			$res=$cnn->insertRec($insertData,"collection_master");

			if($res>0)
			{
				$selectAmount = $cnn->getrows("SELECT *FROM collection_master WHERE event_id='$event_id' AND shop_id='$shop_id'");
				$getAmount = mysqli_fetch_array($selectAmount);
				$amount = $getAmount['pay_amount'];
				$data = array("amount"=>$amount,"success"=>"success");
				echo json_encode($data);
				//echo json_encode("success");
			}
			else
			{
				echo json_encode("error");	
			}
		}
	}
	if(isset($_POST['update']))
	{
		$receiver_id = $_SESSION['user_id'];
		$sender_id = $_POST['sender_id'];
		$event_id = $_POST['event_id'];
		$shop_id = $_POST['shop_id'];
		$pay_amount = $_POST['amount'];

		$updatePay = $cnn -> updatedeleterows("UPDATE collection_master SET pay_amount='$pay_amount' WHERE event_id='$event_id' AND shop_id='$shop_id' AND sender_id='$sender_id'");
		if($updatePay > 0)
		{
			echo json_encode("success");
		}
		else
		{
			echo json_encode("error");
		}
	}
?>