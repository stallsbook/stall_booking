<?php
	header('Access-Control-Allow-Origin: *');
	include("../include/config.php");
	$cnn=new connection();

  	$user_id=$_REQUEST["user_id"];
  	
        $selectuser = $cnn -> countrow("SELECT *FROM user_master WHERE user_id = '$user_id' and user_type='Vendor' AND status ='1'");
	if($selectuser > 0)
	{
		$images = $_FILES['business_image']['name'];
		$selectuser1 = $cnn -> getrows("SELECT *FROM user_master WHERE user_id = '$user_id' and user_type='Vendor' AND status ='1'");
		$getuser1 = mysqli_fetch_array($selectuser1);
	        $business_image = $getuser1["business_image"].",".$images;
	        
	        $cnt = $cnn->updatedeleterows("update user_master set business_image = '$business_image' where user_id = '$user_id' AND user_type = 'Vendor' AND status ='1'");
			
		$path1="../stall_live/images/userProfile/";
		move_uploaded_file($_FILES['business_image']['tmp_name'],$path1.$images);                                                                                         
		
		if($cnt)
		{
			$response=array("responsecode"=>"1","message"=>"success");
			echo json_encode($response);
		}
		else
		{
			$response=array("responsecode"=>"0","message"=>"error");
			echo json_encode($response);
		}
	}
	else
	{
	        $response=array("responsecode"=>"2","message"=>"User Does Not Metch");
	        echo json_encode($response);   
	}
?>