<?php
	include("../include/config.php"); 
	include("../include/session.php"); 
	$cnn = new connection();
// View more detail page

	if(isset($_GET['deleteBook']))
	{
		$book_id = $_GET['book_id'];
		$event_id = $_GET['event_id1'];
		
		$deleteEvent = $cnn -> updatedeleterows("DELETE FROM booking_master WHERE book_id = '$book_id'");

		if($deleteEvent)
		{
			header("Location: oviewmoreEventDetail.php?event_id=$event_id");
		}	
	}

	if(isset($_POST['editBooking']))
	{
		$book_id = $_POST['book_id'];
		$event_id = $_POST['event_id'];
		$shop_no = $_POST['shop_no'];
		$shop_name = $_POST['shop_name'];
		$start_date = $_POST['start_date'];
		$end_date = $_POST['end_date'];
		
		$updateBooking = $cnn -> updatedeleterows("UPDATE booking_master SET shop_no = '$shop_no',shop_name = '$shop_name',start_date = '$start_date',end_date = '$end_date' WHERE book_id = '$book_id'");

		if($updateBooking)
		{
			header("Location: oviewmoreEventDetail.php?event_id=$event_id");
		}	
	}