<?php
	include("../include/config.php"); 
	include("../include/session.php"); 
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
		$latitude = $_POST['latitude'];
		$longitude = $_POST['longitude'];
		$city = $_POST['city'];
		
		$start_date1 = $_POST['start_date'];
		$date1 = str_replace('/', '-', $start_date1);
		$start_date = date('Y-m-d',strtotime($date1));
		
		$end_date1 = $_POST['end_date'];
		$date2 = str_replace('/', '-', $end_date1);
		$end_date = date('Y-m-d',strtotime($date2));
		
		$event_time1 = $_POST['event_time1']." AM";
		$event_time2 = date("g:i",strtotime($_POST['event_time2']))." PM";
		$time=$event_time1." To ".$event_time2;
		$stall_charge = $_POST['stall_charge'];
		$event_desc = $_POST['event_desc'];
		//$avai_stall = $_POST['avai_stall'];
		$banner = time().$_FILES['banner']['name'];
		$images = implode(",",$_FILES['images']['name']);
		$total_stall = $_POST['total_stall'];
		$create_date = date("Y-m-d H:i:s");
		$status = 0;

		
		$path = "images/event/".$banner;

		$insertEvent = array("event_id" => $event_id, "user_id" => $user_id, "event_name" => $event_name, "cat_id" => $cat_id, "event_address" => $event_address,"latitude" => $latitude,"longitude" => $longitude, "city" => $city, "start_date" => $start_date, "end_date" => $end_date, "event_time" => $time, "stall_charge" => $stall_charge, "event_desc" => $event_desc, "avai_stall" => $total_stall, "banner" => $path, "images" => $images, "total_stall" => $total_stall, "create_date" => $create_date, "status" => $status);

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
			header("Location: oviewEvent.php");
		}
	}
	
	if(isset($_GET['event_id']))
	{
		$event_id = $_GET['event_id'];
		$deleteEvent = $cnn -> updatedeleterows("DELETE FROM event_master WHERE event_id = '$event_id'");

		if($deleteEvent)
		{
			header("Location: oviewEvent.php");
		}	
	}

	if(isset($_POST['editEvent']))
	{
	
	
		$event_id = $_POST['event_id'];
		$user_id = $_SESSION['user_id'];
		$event_name = $_POST['event_name'];
		$cat_id = $_POST['cat_id'];
		$event_address = $_POST['event_address'];
		$latitude = $_POST['latitude'];
		$longitude = $_POST['longitude'];
		$city = $_POST['city'];
		
		$start_date1 = $_POST['start_date'];
		$date1 = str_replace('/', '-', $start_date1);
		$start_date = date('Y-m-d',strtotime($date1));
		
		$end_date1 = $_POST['end_date'];
		$date2 = str_replace('/', '-', $end_date1);
		$end_date = date('Y-m-d',strtotime($date2));
		
		$event_time1 = $_POST['event_time1'];
		$event_time2 = $_POST['event_time2'];
		$time1 = $event_time1." To ".$event_time2;
		$stall_charge = $_POST['stall_charge'];
		$event_desc = $_POST['event_desc'];
		//$avai_stall = $_POST['avai_stall'];
		$banner = time().$_FILES['banner']['name'];
		$images = implode(",",$_FILES['event_images']['name']);
		$total_stall = $_POST['total_stall'];

		if($_FILES['banner']['name'] != "")
		{
			$path = "images/event/".$banner;
			$updatePro = $cnn -> updatedeleterows("UPDATE event_master SET event_name = '$event_name', cat_id = '$cat_id', city = '$city', event_address = '$event_address',latitude = '$latitude',longitude = '$longitude', start_date = '$start_date', end_date = '$end_date', event_time = '$time1', stall_charge = '$stall_charge', event_desc = '$event_desc', avai_stall = '$total_stall', total_stall = '$total_stall', banner = '$path' WHERE event_id = '$event_id' AND user_id = '$user_id'");
			
			$path1 = "../stall_live/images/event/";
			move_uploaded_file($_FILES['banner']['tmp_name'], $path1.$banner);
		}
		/*if(isset($_FILES["event_images"]))
		{
		print_r($_FILES["event_images"]);
		echo "count ".$_FILES["event_images"]["size"][0];
		} else { echo "else"; }
		exit;*/
		if($_FILES["event_images"]["size"][0] > 0)
		{
			$updatePro = $cnn -> updatedeleterows("UPDATE event_master SET images = '$images' WHERE event_id = '$event_id' AND user_id = '$user_id'");
			$path1 = "../stall_live/images/event/";
			foreach($_FILES['event_images']['tmp_name'] as $key => $tmp_name)
			{
				$file_name = $_FILES['event_images']['name'][$key];
				$file_tmp =$_FILES['event_images']['tmp_name'][$key];
				move_uploaded_file($file_tmp,$path1.$file_name);
			}
		}
		if($_FILES['banner']['name'] == "")
		{
			$updatePro = $cnn -> updatedeleterows("UPDATE event_master SET event_name = '$event_name', cat_id = '$cat_id', city = '$city', event_address = '$event_address', latitude = '$latitude',longitude = '$longitude', start_date = '$start_date', end_date = '$end_date', event_time = '$time1', stall_charge = '$stall_charge', event_desc = '$event_desc', avai_stall = '$total_stall', total_stall = '$total_stall' WHERE event_id = '$event_id' AND user_id = '$user_id'");
		}	
		
			header("Location: oviewEvent.php");
		}
?>