<?php
	include("../include/config.php"); 
	include("include/session.php"); 
	$cnn = new connection();

	
		$con_address= $_POST['con_address'];
		$con_mobile= $_POST['con_mobile'];
		$con_email= $_POST['con_email'];
		$con_open= $_POST['con_open'];
		
		
		$updateuser = $cnn -> updatedeleterows("UPDATE contact_us_master SET con_address = '$con_address',con_mobile = '$con_mobile', con_email = '$con_email',con_open = '$con_open' WHERE con_id = '1'");
		
        
		if($updateuser)
		{
			header("Location: viewContactUs.php");
        }
        

?>