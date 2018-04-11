<?php
	include("include/config.php"); 
	include("include/session.php"); 
	$cnn = new connection();

	if(isset($_POST['changePs']))
	{
		$password = $_POST['password'];

		$updatePass = $cnn -> updatedeleterows("UPDATE admin_master SET password = '$password' WHERE id = '".$_SESSION['id']."'");

		if(@$updatePass)
		{
			header("Location: editProfile.php");
		}
	}
?>