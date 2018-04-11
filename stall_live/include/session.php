<?php
	session_start();

	
	if(@$_SESSION['email'] == "")
	{
		header("Location: ../stall_live/login.php");
	}
?>