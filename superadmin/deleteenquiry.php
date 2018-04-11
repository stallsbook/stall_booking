<?php
	include("../include/config.php"); 
	include("include/session.php"); 
	$cnn = new connection();

	$enquiry_id= $_GET['enquiry_id'];

	$deleteCT = $cnn -> updatedeleterows("DELETE FROM enquiry_master WHERE enquiry_id= '$enquiry_id'");
	

	if($deleteCT)
	{
		header("Location: viewEnquiry.php");
	}	
	
?>