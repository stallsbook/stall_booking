<?php
	include("../include/config.php"); 
	include("../include/session.php"); 
	$cnn = new connection();
	$user_id = $_SESSION['user_id'];
	if(isset($_POST['changePass']))
	{	
		$newPassword = $_POST['newPassword'];
	echo "UPDATE user_master SET password = '$newPassword' WHERE user_id = '$user_id' AND user_type='Organizer'";
		$updatePass = $cnn -> updatedeleterows("UPDATE user_master SET password = '$newPassword' WHERE user_id = '$user_id' AND user_type='Organizer'");

		if($updatePass)
		{
			session_destroy();
			header("Location: ../stall_live/index.php");
		}
	}
?>