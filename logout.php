<?php
	session_start();

	if(@$_SESSION['email'] != "")
	{
		session_destroy();
		header("Location: stall_live/index.php");
	}
?>