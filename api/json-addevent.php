<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cn=new connection();

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
		$user_id = $_REQUEST['user_id'];
		$event_name = $_REQUEST['event_name'];
		$cat_id = $_REQUEST['cat_id'];
		$event_address = $_REQUEST['event_address'];
		$latitude = $_REQUEST['latitude'];
		$longitude = $_REQUEST['longitude'];
		$city = $_REQUEST['city'];
		
		$start_date1 = $_REQUEST['start_date'];
		$date1 = str_replace('/', '-', $start_date1);
		$start_date = date('Y-m-d',strtotime($date1));
		
		$end_date1 = $_REQUEST['end_date'];
		$date2 = str_replace('/', '-', $end_date1);
		$end_date = date('Y-m-d',strtotime($date2));
		
		$event_time1 = $_REQUEST['event_time1'];
		$event_time2 = $_REQUEST['event_time2'];
		$time=$event_time1." To ".$event_time2;
		$stall_charge = $_REQUEST['stall_charge'];
		$event_desc = $_REQUEST['event_desc'];
		//$avai_stall = $_REQUEST['avai_stall'];
		$banner = time().$_FILES['banner']['name'];
		$images = implode(",",$_FILES['images']['name']);
		$total_stall = $_REQUEST['total_stall'];
		$create_date = date("Y-m-d H:i:s");
		$status = 0;

		$path = "images/event/".$banner;
		
		if($_FILES["image1"]["name"] != "")
	{
		$file_type1 = time().$_FILES["image1"]["name"];
		$src1 = $_FILES["image1"]["tmp_name"];
		$dest1 = $_FILES["image1"]["name"];
		$image_file1=$file_type1;
		move_uploaded_file($src1,"../stall_live/images/event/".$file_type1);
	}
	if($_FILES["image2"]["name"] != "")
	{
		$file_type2 = time().$_FILES["image2"]["name"];
		$src2 = $_FILES["image2"]["tmp_name"];
		$dest2 = $_FILES["image2"]["name"];
		$image_file2=$file_type2;
		move_uploaded_file($src2,"../stall_live/images/event/".$file_type2);
	}
	if($_FILES["image3"]["name"] != "")
	{
		$file_type3 = time().$_FILES["image3"]["name"];
		$src3 = $_FILES["image3"]["tmp_name"];
		$dest3 = $_FILES["image3"]["name"];
		$image_file3=$file_type3;
		move_uploaded_file($src3,"../stall_live/images/event/".$file_type3);
	}
	if($_FILES["image4"]["name"] != "")
	{
		$file_type4 = time().$_FILES["image4"]["name"];
		$src4 = $_FILES["image4"]["tmp_name"];
		$dest4 = $_FILES["image4"]["name"];
		$image_file4=$file_type4;
		move_uploaded_file($src4,"../stall_live/images/event/".$file_type4);
	}
	if($image_file1 != "")
	{
		$b_image = $image_file1;
	}
	if($image_file1 != "" && $image_file2 != "")
	{
		$b_image =  $image_file1.','.$image_file2;
	}
	if($image_file1 != "" && $image_file2 != "" && $image_file3 != "" )
	{
		$b_image =  $image_file1.','.$image_file2.','.$image_file3;
	}
	if($image_file1 != "" && $image_file2 != "" && $image_file3 != "" && $image_file4 != "" )
	{
		$b_image = $image_file1.','.$image_file2.','.$image_file3.','.$image_file4;
	}
		

	if($event_name == ''|| $user_id == '' || $cat_id== ''|| $event_address == ''|| $start_date1 == ''|| $end_date1 == ''|| $stall_charge == '')
	{
		echo json_encode(array("ResponseCode"=>"0","ResponseMsg"=> "All Filed Must be Required.","Result"=>"False"));	
		
	}
	else
	{	
		$insertEvent = array("event_id" => $event_id, "user_id" => $user_id, "event_name" => $event_name, "cat_id" => $cat_id, "event_address" => $event_address,"latitude" => $latitude,"longitude" => $longitude, "city" => $city, "start_date" => $start_date, "end_date" => $end_date, "event_time" => $time, "stall_charge" => $stall_charge, "event_desc" => $event_desc, "avai_stall" => $total_stall, "banner" => $path, "images" => $b_image, "total_stall" => $total_stall, "create_date" => $create_date, "status" => $status);

		$insertData = $cn -> insertRec($insertEvent, "event_master");

		$path1 = "../stall_live/images/event/";
		move_uploaded_file($_FILES['banner']['tmp_name'], $path1.$banner);
		
		if($insertData)
		{
			echo json_encode(array("ResponseCode"=>"1","ResponseMsg"=> "Data Insert successfully.","Result"=>"True"));
		}
		
		ELSE
		{
			
			echo json_encode(array("ResponseCode"=>"2","ResponseMsg"=> "Could not enter data.","Result"=>"False"));
			
		}
	}
		
		
?>		