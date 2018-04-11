<?php
	include("../include/config.php"); 
	include("include/session.php"); 
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
		$city = $_POST['city'];
		$start_date = $_POST['start_date'];
		$end_date = $_POST['end_date'];
		$event_time = $_POST['event_time'];
		$stall_charge = $_POST['stall_charge'];
		$event_desc = $_POST['event_desc'];
		$avai_stall = $_POST['avai_stall'];
		$banner = time().$_FILES['banner']['name'];
		$images = implode(",",$_FILES['images']['name']);
		$total_stall = $_POST['total_stall'];
		$create_date = date("Y-m-d H:i:s");
		$status = 0;

		$path = "images/event/".$banner;

		$insertEvent = array("event_id" => $event_id, "user_id" => $user_id, "event_name" => $event_name, "cat_id" => $cat_id, "event_address" => $event_address, "city" => $city, "start_date" => $start_date, "end_date" => $end_date, "event_time" => $event_time, "stall_charge" => $stall_charge, "event_desc" => $event_desc, "avai_stall" => $avai_stall, "banner" => $path, "images" => $images, "total_stall" => $total_stall, "create_date" => $create_date, "status" => $status);

		$insertData = $cnn -> insertRec($insertEvent, "event_master");

		$path1 = "../images/event/";
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
			header("Location: viewEvent.php.php");
		}
	}
	
	if(isset($_GET['event_id']))
	{
		$event_id = $_GET['event_id'];
		$deleteEvent = $cnn -> updatedeleterows("DELETE FROM event_master WHERE event_id = '$event_id'");

		if($deleteEvent)
		{
			header("Location: viewEvent.php");
		}	
	}

	if(isset($_POST['editEvent']))
	{
		$event_id = $_POST['event_id'];
		$user_id = $_SESSION['user_id'];
		$event_name = $_POST['event_name'];
		$cat_id = $_POST['cat_id'];
		$event_address = $_POST['event_address'];
		$city = $_POST['city'];
		$start_date = $_POST['start_date'];
		$end_date = $_POST['end_date'];
		$event_time = $_POST['time'];
		$stall_charge = $_POST['stall_charge'];
		$event_desc = $_POST['event_desc'];
		$avai_stall = $_POST['avai_stall'];
		$banner = time().$_FILES['banner']['name'];
		$images = implode(",",$_FILES['images']['name']);
		$total_stall = $_POST['total_stall'];

		if($_FILES['banner']['name'] != "")
		{
			$path = "images/event/".$banner;
			$updatePro = $cnn -> updatedeleterows("UPDATE event_master SET event_name = '$event_name', cat_id = '$cat_id', event_address = '$event_address', city = '$city', start_date = '$start_date', end_date = '$end_date', event_time = '$event_time', stall_charge = '$stall_charge', event_desc = '$event_desc', avai_stall = '$avai_stall', total_stall = '$total_stall', banner = '$path' WHERE event_id = '$event_id' AND user_id = '$user_id'");
			
			$path1 = "../images/";
			move_uploaded_file($_FILES['banner']['tmp_name'], $path1.$banner);
		}
		else if(isset($_FILES['images']))
		{
			$updatePro = $cnn -> updatedeleterows("UPDATE event_master SET images = '$images' WHERE event_id = '$event_id' AND user_id = '$user_id'");
			$path1 = "../images/";
			foreach($_FILES['images']['tmp_name'] as $key => $tmp_name)
			{
				$file_name = $_FILES['images']['name'][$key];
				$file_tmp =$_FILES['images']['tmp_name'][$key];
				move_uploaded_file($file_tmp,$path1.$file_name);
			}
		}
		else
		{
			$updatePro = $cnn -> updatedeleterows("UPDATE event_master SET event_name = '$event_name', cat_id = '$cat_id', event_address = '$event_address', city = '$city', start_date = '$start_date', end_date = '$end_date', event_time = '$event_time', stall_charge = '$stall_charge', event_desc = '$event_desc', avai_stall = '$avai_stall', total_stall = '$total_stall' WHERE event_id = '$event_id' AND user_id = '$user_id'");
		}	
		if(@$updatePro)
		{
			header("Location: viewEvent.php");
		}
	}
?>