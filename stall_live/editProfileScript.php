<?php
	include("../include/config.php"); 
	include("../include/session.php"); 
	$cnn = new connection();

	if(isset($_POST['profile']))
	{
		$user_id = $_POST['user_id'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		
		$mobile = $_POST['mobile'];
		$state = $_POST['state'];
		$city = $_POST['city'];
		$event_org_cmp_name = $_POST['event_org_cmp_name'];
		$description = $_POST['description'];
		$address = $_POST['address'];
        	$password = $_POST['password'];
        	
		if($_FILES["image"]["name"] != "")
		{
			$file_type1 = time().$_FILES["image"]["name"];
			$path = "images/userProfile/".$file_type1;
			$updateuser = $cnn -> updatedeleterows("UPDATE user_master SET first_name = '$first_name',last_name = '$last_name', mobile = '$mobile', state 		= '$state', city = '$city', event_org_cmp_name = '$event_org_cmp_name',description= '$description',address = '$address',password = '$password', image='$path' WHERE user_id = '$user_id'");
			$path1 = "images/userProfile/";
			move_uploaded_file($_FILES["image"]["tmp_name"],$path1.$file_type1);
		}
		else if($_FILES["biz_photo"]["size"][0] > 0)
		{
			$images = implode(",",$_FILES['biz_photo']['name']);
			$updateuser = $cnn -> updatedeleterows("UPDATE user_master SET business_image = '$images' WHERE user_id = '$user_id'");
			$path1 = "../stall_live/images/userProfile/";
			foreach($_FILES['biz_photo']['tmp_name'] as $key => $tmp_name)
			{
				$file_name = $_FILES['biz_photo']['name'][$key];
				$file_tmp =$_FILES['biz_photo']['tmp_name'][$key];
				move_uploaded_file($file_tmp,$path1.$file_name);
			}
		}
		else
		{
			$updateuser = $cnn -> updatedeleterows("UPDATE user_master SET first_name = '$first_name',last_name = '$last_name', mobile = '$mobile', state = '$state', city = '$city', event_org_cmp_name = '$event_org_cmp_name',description= '$description',address = '$address',password = '$password' WHERE user_id = '$user_id'");
		}
        
		if($updateuser)
		{
			
			echo "<script>";
			echo "alert('Your Profile Change Succesfully');";
			echo "window.location.href='index.php'";
			echo "</script>";
        }
        else{
            		echo "<script>";
			echo "alert('Your Profile is not Change');";
			echo "window.location.href='viewProfile.php'";
			echo "</script>";
        }
	}
	

?>