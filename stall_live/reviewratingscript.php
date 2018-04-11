<?php
	include("../include/config.php"); 
	//include("include/session.php"); 
	$cnn = new connection();

	if(isset($_POST['enquiry']))
	{	
		$o_rating = $_POST['o_rating'];
        $o_review = $_POST['o_review'];
        $v_rating= $_POST['v_rating'];
        $v_review = $_POST['v_review'];
        $user_id = $_POST['user_id'];
        $event_id = $_POST['event_id'];
		
		$create_date = date("Y-m-d H:i:s");
       
		$registration = array("o_rating" => $o_rating, "o_review" => $o_review,"v_rating" => $v_rating, "v_review"=>$v_review,"user_id"=>$user_id,"event_id"=>$event_id,"date" => $create_date,"status"=>'0');

		$insertData = $cnn -> insertRec($registration,"review_ratting_master");

		if(@$insertData)
		{
			echo "<script>";
			echo "alert('Your Review Add Successully!');";
			echo "window.location.href='viewmyBooking.php'";
			echo "</script>";
			
		}
		else{
			echo "<script>";
			echo "alert('Sorry Your Review Not Add!');";
			echo "window.location.href='viewmyBooking.php'";
			echo "</script>";
		}
	}
?>