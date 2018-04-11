<?php
	include("../include/config.php"); 
	include("../include/session.php"); 
	session_start();
	$cnn = new connection();

	if(isset($_POST['addEvent']))
	{	
		function randStrGen($len)
		{
			$result = "";
			$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
			$charArray = str_split($chars);
			for($i = 0; $i < $len; $i++){
				$randItem = array_rand($charArray);
				$result .= "".$charArray[$randItem];
			}
			return $result;
		}
		$event_id = randStrGen(15);
		$user_id = $_SESSION['user_id'];
		$event_name = $_POST['event_name'];
		$cat_id = $_POST['cat_id'];
		$event_address = $_POST['event_address'];
		// $email = $_POST['email'];
		$city = $_POST['city'];
		
		$start_date1 = $_POST['start_date'];
		$date1 = str_replace('/', '-', $start_date1);
		$start_date = date('Y-m-d',strtotime($date1));
		
		$end_date1 = $_POST['end_date'];
		$date2 = str_replace('/', '-', $end_date1);
		$end_date = date('Y-m-d',strtotime($date2));
		
		$latitude = $_POST['latitude'];
		$longitude = $_POST['longitude'];
		$event_time = $_POST['event_time']." AM";
		$event_to_time= date("g:i",strtotime($_POST['event_to_time']))." PM";;
		$e_time=$event_time.' To '.$event_to_time;
		$stall_charge = $_POST['stall_charge'];
		$event_desc = $_POST['event_desc'];
		// $avai_stall = $_POST['avai_stall'];
		$banner = time().$_FILES['banner']['name'];
		$images = implode(",",$_FILES['images']['name']);
		$total_stall = $_POST['total_stall'];
		$create_date = date("Y-m-d H:i:s");
		$status = 0;

		$path = "images/event/".$banner;
		
    		
		$insertEvent = array("event_id" => $event_id, "user_id" => $user_id, "event_name" => $event_name, "cat_id" => $cat_id, "event_address" => $event_address,"latitude" => $latitude,"longitude" => $longitude, "city" => $city, "start_date" => $start_date, "end_date" => $end_date, "event_time" => $e_time, "stall_charge" => $stall_charge, "event_desc" => $event_desc, "avai_stall" => $total_stall, "banner" => $path, "images" => $images, "total_stall" => $total_stall, "create_date" => $create_date, "status" => $status);

		$insertData = $cnn -> insertRec($insertEvent, "event_master");

		$path1 = "../stall_live/images/event/";
		move_uploaded_file($_FILES['banner']['tmp_name'], $path1.$banner);

		if(isset($_FILES['images']))
		{
			foreach($_FILES['images']['tmp_name'] as $key => $tmp_name)
			{
			    $file_name = $_FILES['images']['name'][$key];
			    $file_tmp =$_FILES['images']['tmp_name'][$key];
			    move_uploaded_file($file_tmp,$path1.$file_name);
			}
		}	
		
		if(@$insertData)
		{
			
			echo "<script>";
			echo "alert('Your Event Added successfully');";
			echo "window.location.href='addEvent.php'";
			echo "</script>";
			
		}
		else{
			echo "<script>";
			echo "alert('Sorry Event Is Not Add!');";
			echo "window.location.href='addEvent.php'";
			echo "</script>";
			
		}
	}
?>