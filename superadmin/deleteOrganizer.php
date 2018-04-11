<?php
	include("../include/config.php"); 
	include("include/session.php"); 
	$cnn = new connection();

	$user_id = $_GET['user_id'];

	$deleteCT = $cnn -> updatedeleterows("DELETE FROM user_master WHERE user_id = '$user_id'");
	$deleteCT1 = $cnn -> updatedeleterows("DELETE FROM event_master WHERE user_id = '$user_id'");

	if($deleteCT)
	{
		header("Location: viewOrganizer.php");
	}	
	
?>