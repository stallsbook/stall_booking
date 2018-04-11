<?php
	include("../include/config.php"); 
	include("../include/session.php"); 
	$cnn = new connection();

	if(isset($_POST['addShop']))
	{
		$event_id = $_POST['event_id'];
		$user_id = $_POST['user_id'];
		$single_Shop_no = $_POST['single_Shop_no'];
		$shop_name = $_POST['shop_name'];
		$no_table = $_POST['no_table'];
		$no_chair = $_POST['no_chair'];
		$description = $_POST['description'];
		$assign_date = date('Y-m-d');
		$shop_status = 0;
 	
		$selectShop = $cnn -> countrow("SELECT *FROM shop_master WHERE single_Shop_no = '$single_Shop_no' AND event_id='$event_id'");
		if($selectShop > 0)
		{
			echo '<script>';
			echo 'alert("Stall Number Already Booked....")';
			echo '</script>';
			echo "<script> window.location.href = 'oviewmoreEventDetail.php?event_id=$event_id'; </script>";
			//header("Location:oaddShopForVendor.php?event_id=$event_id");
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
			$reciver_id = $_SESSION['user_id'];
			$amount = $_POST['amount'];
			$create_date = date('Y-m-d H:i:s');
			$status = 1;
			$insertBookPayment = array("shop_id"=>$shop_id,"event_id"=>$event_id,"book_id"=>$book_id,"sender_id"=>$user_id,"receiver_id"=>$reciver_id,"amount"=>$amount,"date"=>$create_date,"status"=>$status);
			$res1 = $cnn->insertRec($insertBookPayment,"payment_master");

			if($res && $res1)
			{
				echo '<script>';
				echo 'alert("Stall Assignment Successful!!")';
				echo '</script>';
				echo "<script> window.location.href = 'oviewmoreEventDetail.php?event_id=$event_id'; </script>";
				//header("Location:oviewmoreEventDetail.php?event_id=$event_id");	
			}
				
		}
	}
	if(isset($_POST['addShop1']))
	{
		$event_id = $_POST['event_id'];
		$user_id = $_POST['user_id'];
		$shop_id = $_POST['shop_id'];
		$single_Shop_no = $_POST['single_Shop_no'];
		$shop_name = $_POST['shop_name'];
		$no_table = $_POST['no_table'];
		$no_chair = $_POST['no_chair'];
		$description = $_POST['description'];
		$amount = $_POST['amount'];
		
		$updateShop = $cnn->updatedeleterows("UPDATE shop_master SET single_Shop_no='$single_Shop_no',shop_name='$shop_name',no_table='$no_table',no_chair='$no_chair',description='$description' WHERE shop_id='$shop_id' AND user_id='$user_id' AND event_id='$event_id'");
		
		$updatepayment = $cnn->updatedeleterows("UPDATE payment_master SET amount='$amount' WHERE shop_id='$shop_id'");
 	
		if($updateShop && $updatepayment)
		{
			echo '<script>';
			echo 'alert("Update Data Successfully!")';
			echo '</script>';
			echo "<script> window.location.href = 'oshopDetail.php?user_id=$user_id&event_id=$event_id'; </script>";
		}
	}
	if(isset($_GET['delete']))
	{
		$event_id = $_GET['event_id'];
		$user_id = $_GET['user_id'];
		$shop_id = $_GET['shop_id'];
		
		$deleteShop = $cnn->updatedeleterows("DELETE FROM shop_master WHERE shop_id='$shop_id' AND user_id='$user_id' AND event_id='$event_id'");
		$deletePayment = $cnn->updatedeleterows("DELETE FROM payment_master WHERE shop_id='$shop_id'");
		
		if($deleteShop && $deletePayment )
		{
			echo '<script>';
			echo 'alert("Delete Data Successfully!")';
			echo '</script>';
			echo "<script> window.location.href = 'oshopDetail.php?user_id=$user_id&event_id=$event_id'; </script>";
		}
	}
?>