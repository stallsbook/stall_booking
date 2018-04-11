<?php
	include("../include/config.php");
	include("../include/session.php");
	$cnn = new connection();

	if(isset($_GET['user_id']) && isset($_GET['status']))
	{
		$user_id = $_GET['user_id'];
		$status = $_GET['status'];

		if($status == '1')
		{
			$change = $cnn -> updatedeleterows("UPDATE user_master SET status = '0' WHERE user_id = '$user_id'");

			header("Location: oviewVender.php");
		}
		if($status == '0')
		{
			$change = $cnn -> updatedeleterows("UPDATE user_master SET status = '1' WHERE user_id = '$user_id'");

			header("Location: oviewVender.php");	
		}
	}
?>