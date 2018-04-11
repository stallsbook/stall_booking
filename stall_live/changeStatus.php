<?php
	include("../include/config.php"); 
	include("../include/session.php"); 
	session_start();
	$cnn = new connection();

	if(isset($_GET['status']))
	{	
		$user_id = $_GET['user_id'];
		$status = $_GET['status'];    		
		
		$updateLoginStatus = $cnn->updatedeleterows("UPDATE user_master SET status='$status' WHERE user_id='$user_id'");
		
		if(@$updateLoginStatus)
		{
			header("Location:login.php");
			
		}
	}
?>