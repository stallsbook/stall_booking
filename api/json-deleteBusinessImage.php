<?php
	header('Access-Control-Allow-Origin: *');
	include("../include/config.php");
	$cnn=new connection();
	$user_id = $_REQUEST['user_id'];
	$bImage = $_REQUEST['bImage'];
	
  	if($user_id != '' && $bImage != '')
  	{
  		/*$selectBusinessImage = $cnn -> getrows("SELECT *FROM user_master WHERE user_id = '$user_id'");
		$getBusinessImage = mysqli_fetch_array($selectBusinessImage);
		$businessImage = $getBusinessImage['business_image'];
		$images = str_replace($bImage, '', $businessImage);
		*/
		$updateBusinessImage = $cnn -> updatedeleterows("UPDATE user_master SET business_image='$bImage' WHERE user_id='$user_id'");
		  	
   		if($updateBusinessImage)
		{
			echo json_encode(array("ResponseCode"=>"1","ResponseMsg"=> "Data delete.","Result"=>"True"));  	
		}
		else
		{
			echo json_encode(array("ResponseCode"=>"2","ResponseMsg"=> "Data is not delete","Result"=>"False"));  
		}
  	}
  	else
  	{
	  	echo json_encode(array("ResponseCode"=>"0","ResponseMsg"=> "Parameter missing.","Result"=>"False"));
	}
 ?> 	