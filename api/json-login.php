<?php
 	header('Access-Control-Allow-Origin: *');
 	include("../include/config.php");
 	$cnn = new connection();
	
 	$type = $_REQUEST['type'];
 	$email= $_REQUEST["email"];
	$password= $_REQUEST["password"];
	$deviceid= $_REQUEST["deviceid"];
	$user_type= $_REQUEST["user_type"];  

			
 	if($type == 'Vendor')
 	{
		$user_detail = array();
		
		$countUser = $cnn-> countrow("SELECT * FROM  user_master WHERE (email= '$email' or mobile='$email') AND password= '$password' AND user_type= '$type' AND status='1'");
		if($countUser > 0)
		{
			$result = $cnn -> getrows("SELECT * FROM  user_master WHERE (email= '$email' or mobile='$email') AND password= '$password' AND user_type= '$type' AND status='1'");
			$r1 = mysqli_fetch_assoc($result);
			if($password== $r1['password'])
			{
				$user_detail['user_id'] = $r1['user_id'];
				$user_detail['first_name'] = $r1['first_name'];
				$user_detail['last_name'] = $r1['last_name'];
				$user_detail['mobile'] = $r1['mobile'];
				$user_detail['sex'] = $r1['sex'];
				$user_detail['email'] = $r1['email'];
				$user_detail['city'] = $r1['city'];
				$user_detail['user_type'] = $r1['user_type'];
				$user_detail['description'] = $r1['event_org_cmp_name'];
				$user_detail['address'] = $r1['address'];
				$user_detail['image'] = $r1['image'];
				$user_detail['password'] = $r1['password'];
				$user_detail['create_date'] = $r1['create_date'];
				$user_detail['status'] = $r1['status'];	
				
				 $cnt = $cnn->updatedeleterows("update user_master set deviceid= '$deviceid', type= '$user_type' where email= '$email' AND user_type= '$type' ");	
					
				echo json_encode(array("user_detail" => $user_detail, "ResponseCode" => "1", "ResponseMsg" => "Login Is succesfully.", "Result" => "True"));
			}
			else
			{
				echo json_encode(array("ResponseCode" => "2", "ResponseMsg" => "User can not Login.", "Result" => "False"));

			}	
		}
		else
		{
			echo json_encode(array("ResponseCode" => "2", "ResponseMsg" => "User can not Login.", "Result" => "False"));
		}
 	}
 	if($type == 'Organizer')
 	{
		$user_detail = array();
		
		$countUser = $cnn-> countrow("SELECT * FROM  user_master WHERE (email= '$email' or mobile='$email') AND password= '$password' AND user_type= '$type' AND status='1'");
		if($countUser > 0)
		{
			$result = $cnn -> getrows("SELECT * FROM  user_master WHERE (email= '$email' or mobile='$email') AND password= '$password' AND user_type= '$type' AND status='1'");
			$r1 = mysqli_fetch_assoc($result);
			if($password== $r1['password'])
			{
				$user_detail['user_id'] = $r1['user_id'];
				$user_detail['first_name'] = $r1['first_name'];
				$user_detail['last_name'] = $r1['last_name'];
				$user_detail['mobile'] = $r1['mobile'];
				$user_detail['sex'] = $r1['sex'];
				$user_detail['email'] = $r1['email'];
				$user_detail['city'] = $r1['city'];
				$user_detail['user_type'] = $r1['user_type'];
				$user_detail['description'] = $r1['event_org_cmp_name'];
				$user_detail['address'] = $r1['address'];
				$user_detail['image'] = $r1['image'];
				$user_detail['password'] = $r1['password'];
				$user_detail['create_date'] = $r1['create_date'];
				$user_detail['status'] = $r1['status'];	
				
				 $cnt = $cnn->updatedeleterows("update user_master set deviceid= '$deviceid', type= '$user_type' where email= '$email' AND user_type= '$type' ");	
					
				echo json_encode(array("user_detail" => $user_detail, "ResponseCode" => "1", "ResponseMsg" => "Login Is succesfully.", "Result" => "True"));
			}
			else
			{
				echo json_encode(array("ResponseCode" => "2", "ResponseMsg" => "User can not Login.", "Result" => "False"));

			}	
		}
		else
		{
			echo json_encode(array("ResponseCode" => "2", "ResponseMsg" => "User can not Login.", "Result" => "False"));
		}
 	}
?>