<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cnn = new connection();
    
    		$event_id = $_REQUEST['event_id'];
		$user_id = $_REQUEST['user_id'];
		$single_Shop_no = $_REQUEST['single_Shop_no'];
		$shop_name = $_REQUEST['shop_name'];
		$no_table = $_REQUEST['no_table'];
		$no_chair = $_REQUEST['no_chair'];
		$description = $_REQUEST['description'];
		$assign_date = date('Y-m-d');
		$shop_status = 0;
 	
		$selectShop = $cnn -> countrow("SELECT *FROM shop_master WHERE single_Shop_no = '$single_Shop_no' AND event_id='$event_id'");
		if($selectShop > 0)
		{
			echo json_encode(array("ResponseCode" => "3", "Result" => "True"));
   
		}
		else
		{
			$insertShop = array('event_id' => $event_id, "user_id"=>$user_id, "single_Shop_no"=>$single_Shop_no, "shop_name"=>$shop_name, "no_table"=>$no_table, "no_chair"=>$no_chair, "description"=>$description, "assign_date"=>$assign_date, "shop_status"=>$shop_status);
			$res = $cnn->insertRec($insertShop,"shop_master");

			$selectBookId=$cnn -> getrows("SELECT *FROM booking_master WHERE user_id= '$user_id'");
			$getBookId = mysqli_fetch_array($selectBookId);
			$book_id = $getBookId['book_id'];

			$selectLastId=$cnn -> getrows("SELECT shop_id FROM shop_master ORDER BY shop_id DESC LIMIT 1");
			$getId = mysqli_fetch_array($selectLastId);
			$shop_id = $getId['shop_id'];
			$reciver_id = $_REQUEST['receiver_id'];
			$amount = $_REQUEST['amount'];
			$create_date = date('Y-m-d H:i:s');
			$status = 1;
			$insertBookPayment = array("shop_id"=>$shop_id,"event_id"=>$event_id,"book_id"=>$book_id,"sender_id"=>$user_id,"receiver_id"=>$reciver_id,"amount"=>$amount,"date"=>$create_date,"status"=>$status);
			$res1 = $cnn->insertRec($insertBookPayment,"payment_master");

			if($res && $res1)
			{
				echo json_encode(array("ResponseCode" => "1", "Result" => "True"));
			}
			else
			{
				echo json_encode(array("ResponseCode" => "2", "Result" => "False"));
			}
			
			
				
		}
    
?>    