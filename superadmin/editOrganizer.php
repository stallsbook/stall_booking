<?php
	include("../include/config.php");
    include("include/session.php");
    $cn = new connection();
	
    if(isset($_GET["user_id"]))
	{
		function randStrGen($len)
		{
			$result = "";
			$chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
			$charArray = str_split($chars);
			for($i = 0; $i < $len; $i++){
				$randItem = array_rand($charArray);
				$result .= "".$charArray[$randItem];
			}
			return $result;
		}
		
		$user_id = $_GET["user_id"];
		$status = $_GET['status']; 
		
		echo $email = $_GET['email']; 
		echo $autopassword= randStrGen(10);
		
		$to = $email;
		$subject = 'Active Your Account.';
		$message .= '<h2 style="text-align:center;">Welcome To The StallBooking.</h2>';
		$message .='<h3>Your Password is : '.$autopassword.' </h3>';
		$message .='<a href=http://alexinfosoft.com/stall_booking/stall_live/index.php>Click To Active Your Account.</a>';
		$headers = 'From: jikadramanish347@gmail.com' . "\r\n" .
		'Reply-To: '.$email.'' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();
		$headers  .= 'MIME-Version: 1.0' . "\r\n";
	   	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	    	mail($to, $subject, $message, $headers);
	    	
	    	header("Location:viewOrganizer.php?msg=success");
	    	
	    	if($status == '0')
		{
			$res=$cn->updatedeleterows("update user_master set status='1',password='$autopassword' where user_id='$user_id'");
			header("Location:viewOrganizer.php?msg=success");
		}
		if($status == '1')
		{
			$res=$cn->updatedeleterows("update user_master set status='0', password='$autopassword' where user_id='$user_id'");
			header("Location:viewOrganizer.php?msg=success");
		}
	}
	
?>


