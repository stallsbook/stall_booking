<?php
	header('Access-Control-Allow-Origin: *');
	include("../include/config.php");
	$cnn=new connection();
	$email=$_REQUEST["email"];
	$password=$_REQUEST["password"];
	$user_type=$_REQUEST["user_type"];
	

  	if($email == '' || $password == ''  || $user_type == '')
  	{
  		echo json_encode(array("ResponseCode"=>"0","ResponseMsg"=> "Parameter missing.","Result"=>"False"));  
  	}
  	else
  	{
	  	
	  	$selectuser = $cnn -> countrow("SELECT *FROM user_master WHERE email= '$email' and user_type='$user_type' ");
		if($selectuser > 0)
		{
		  	 $cnt = $cnn->updatedeleterows("update user_master set password= '$password' where email= '$email' and user_type='$user_type'");
	   		if($cnt)
			{
			echo json_encode(array("ResponseCode"=>"1","ResponseMsg"=> "Password Change successfully.","Result"=>"True"));  	
			}
			else
			{
			echo json_encode(array("ResponseCode"=>"2","ResponseMsg"=> "Password can not change.","Result"=>"False"));  
			}
			
		}
		else
		{
		echo json_encode(array("ResponseCode"=>"3","ResponseMsg"=> "plz enter valid email.","Result"=>"False"));  
		}
	}
  	
 ?> 	