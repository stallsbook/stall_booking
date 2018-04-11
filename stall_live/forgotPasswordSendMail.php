<?php
	include("../include/config.php"); 
	//include("../include/session.php"); 
	$cnn = new connection();

	if(isset($_POST['sendMail']))
	{	
		$email = $_POST['emailData'];
		$user_type = $_POST['user_type1'];
		$countemail = $cnn->countrow("SELECT *FROM user_master WHERE email='$email' AND user_type='$user_type'");
		if($countemail == 0)
		{
			echo "<script>";
			echo "alert('Email Not Found. Please Enter Valid Email Address.');";
			echo "window.location.href='login.php'";
			echo "</script>";
		}
		else
		{
			$countemail = $cnn->getrows("SELECT *FROM user_master WHERE email='$email' AND user_type='$user_type'");
			$getEmail = mysqli_fetch_array($countemail);
			$name= $getEmail['first_name'];
				$to = $email;
				$subject = 'Master';
			   	$message .= '<h4>Hi, '.$name.'</h4>';
			   	$message .= '<h4>Please Click On Link To Change Your Password.<a href=http://alexinfosoft.com/stall_booking/stall_live/changePassword.php?email='.$email.'&user_type='.$user_type.'>Click Here..!!</a></h4>';
				$headers = 'From: support@stallsbook.com' . "\r\n" . 'Reply-To: '.$to.'' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
				$headers  .= 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				mail($to, $subject, $message, $headers);
			
				echo "<script>";
				echo "alert('Mail Send Successfully.Please Check Mail To Forgot Your Password.');";
				echo "window.location.href='login.php'";
				echo "</script>";
		}
	 }
	if(isset($_POST['forPass']))
	{	
		$email = $_POST['email'];
		$user_type = $_POST['user_type'];
		echo "SELECT *FROM user_master WHERE email='$email' AND user_type='$user_type'";
		$countemail1 = $cnn->countrow("SELECT *FROM user_master WHERE email='$email' AND user_type='$user_type'");
		if($countemail1 > 0)
		{
			$password = $_POST['password'];
			
			$updatePassword = $cnn->updatedeleterows("UPDATE user_master SET password='$password' WHERE email='$email' AND user_type='$user_type'");
		
			$countemail = $cnn->getrows("SELECT *FROM user_master WHERE email='$email' AND user_type='$user_type'");
			$getEmail = mysqli_fetch_array($countemail);
			$name= $getEmail['first_name'];
			
				$to = $email;
				$subject = 'Master';
			   	$message .= '<h4>Hi, '.$name.'</h4>';
			   	$message .= '<h4>Your Password Change Successfully.</h4>';
				$headers = 'From: vb4dholariya@gmail.com' . "\r\n" . 'Reply-To: '.$to.'' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
				$headers  .= 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				mail($to, $subject, $message, $headers);
			
				echo "<script>";
				echo "alert('Your Password Change Successfully.');";
				echo "window.location.href='login.php'";
				echo "</script>";
		}
		else
		{
			echo "<script>";
			echo "alert('Email Not Found. Please Enter Valid Email Address.');";
			echo "window.location.href='login.php'";
			echo "</script>";
		}
	 }
?>