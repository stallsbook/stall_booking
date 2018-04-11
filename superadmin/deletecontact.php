<?php
	include("../include/config.php"); 
	include("include/session.php"); 
	$cnn = new connection();

	$con_id= $_GET['con_id'];

	$deleteCT = $cnn -> updatedeleterows("DELETE FROM contact_master WHERE con_id= '$con_id'");
	

	if($deleteCT)
	{
		header("Location: viewContact.php");
	}	
	
?>