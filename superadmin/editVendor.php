<?php
	include("../include/config.php");
    include("include/session.php");
    $cn = new connection();
	
    if(isset($_GET["user_id"]))
	{
		$user_id = $_GET["user_id"];
		$status = $_GET['status']; 
		
		if($status == '1')
		{
			$res=$cn->updatedeleterows("update user_master set status='0' where user_id='$user_id'");
			header("Location:viewVendor.php?msg=success");
		}
		if($status == '0')
		{
			$res=$cn->updatedeleterows("update user_master set status='1' where user_id='$user_id'");
			header("Location:viewVendor.php?msg=success");
		}
	}
	
?>
