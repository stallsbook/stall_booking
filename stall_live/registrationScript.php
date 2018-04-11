<?php
	include("../include/config.php"); 
        require 'include/class.phpmailer.php';
        require "include/PHPMailerAutoload.php";
	//include("../include/session.php"); 
	$cnn = new connection();
        $mail = new PHPMailer();
        $mail->IsSMTP(); // enable SMTP
        $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = "cp-in-17.webhostbox.net";
        $mail->Port = 465; // or 587
        $mail->IsHTML(true);
        $mail->Username = "support@stallsbook.com";
        $mail->Password = "Stall@support";
        $mail->SetFrom("support@stallsbook.com");
	if(isset($_POST['register_organizer']))
	{	
		$email = $_POST['email'];
		 $mobile = $_POST['mobile'];
		$m_cnt=$cnn->countrow("select * from user_master where mobile='$mobile' and (user_type='Organizer' OR user_type='Vendor')");
		$countemail = $cnn->countrow("SELECT *FROM user_master WHERE email='$email' AND(user_type='Organizer' OR user_type='Vendor')");
		if($countemail >0)
		{
			echo "<script>";
			echo "alert('Email Already Exist.');";
			echo "window.location.href='registration.php'";
			echo "</script>";
		}
		else if($m_cnt > 0)
		{
			echo "<script>";
			echo "alert('Mobile no already exist, Sign up with different mobile no');";
			echo "window.location.href='registration.php'";
			echo "</script>";
		}
		
		else
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
			$user_id = randStrGen(15);
			$full_name= $_POST['full_name'];
		        //$last_name = $_POST['last_name'];
		        $sex= $_POST['sex'];
		       	$state = $_POST['state'];
			$city = $_POST['city'];
		        $user_type = $_POST['user_type'];
		        $file_type1 = time().$_FILES["image"]["name"];
		        $event_org_cmp_name = $_POST['event_org_cmp_name'];
		        $password = $_POST['password'];
		        $address = $_POST['address'];
			$create_date = date("Y-m-d H:i:s");
			$status = 0;
	
			$path = "images/userProfile/".$file_type1;
			
			
		
			$registration = array("user_id" => $user_id, "first_name" => $full_name, "sex"=>$sex, "email" => $email, "mobile"=>$mobile,"state" => $state, "city" => $city, "user_type" => $user_type, "event_org_cmp_name" => $event_org_cmp_name,"address" => $address,"password"=>$password,"image" => $path, "create_date" => $create_date, "status" => $status);
	
			$path1 = "images/userProfile/";
			move_uploaded_file($_FILES["image"]["tmp_name"],$path1.$file_type1);
		
			$insertData = $cnn -> insertRec($registration, "user_master");
	
			if(@$insertData)
			{
                                $mail->Subject = "Verification link for your StallsBook registration";
                                $mail->AddAddress($email);
				$message .= 'Dear '.$full_name.',';
				$message .= '';
			   	$message .= '<h4>Thank you for registering as Organizer on StallsBook.</h4>';
			   	$message .= '<h4>As a next step please <a href=http://stallsbook.com/stall_live/changeStatus.php?user_id='.$user_id.'&status=1>Click here</a> to verify your email address.</h4>';
                                $message .= 'Many Thanks,' . "\n";
                                $message .= '';
                                $message .= 'Team StallsBook';
			        $mail->Body = $message;
			 //     $mail->send();
                                if(!$mail->Send()) {
                                   echo "Mailer Error: " . $mail->ErrorInfo;
                                   } else {
                                    
                                    echo "<script>";
				    echo "alert('Registration successful, please check mail to verify your acccount.');";
				    echo "window.location.href='index.php'";
				    echo "</script>";
                                  }
			}
			else{
				echo "<script>";
				echo "alert('Registration Failed!');";
				echo "window.location.href='registration.php'";
				echo "</script>";
			}
		}
	 }
	 if(isset($_POST['register_vendor']))
	 {
	 
	 	$email = $_POST['email'];
	 	$mobile = $_POST['mobile'];
		
	 	$m_cnt=$cnn->countrow("select * from user_master where mobile='$mobile' and (user_type='Organizer' OR user_type='Vendor')");
		$countemail = $cnn->countrow("SELECT *FROM user_master WHERE email='$email' AND(user_type='Organizer' OR user_type='Vendor')");
		if($countemail >0)
		{
			echo "<script>";
			echo "alert('Email already exist.');";
			echo "window.location.href='registration.php'";
			echo "</script>";
		}
		else if($m_cnt > 0)
		{
			echo "<script>";
			echo "alert('Mobile no already exist, Sign up with different mobile no');";
			echo "window.location.href='registration.php'";
			echo "</script>";
		}
		else
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
			$user_id = randStrGen(15);
			$full_name= $_POST['full_name'];
		        $sex= $_POST['sex'];
		     	$state = $_POST['state'];
			$city = $_POST['city'];
		        $user_type = $_POST['user_type'];
		        $file_type1 = time().$_FILES["image"]["name"];
		        $event_org_cmp_name = $_POST['event_org_cmp_name'];
		        
		        $images = implode(",",$_FILES['images']['name']);
		        
		        $password = $_POST['password'];
		        $address = $_POST['address'];
			$create_date = date("Y-m-d H:i:s");
			$status = 0;
	
			$path = "images/userProfile/".$file_type1;
			
			$path3 = "images/userProfile/".$file_type2;
		
			$registration = array("user_id" => $user_id, "first_name" => $full_name, "sex"=>$sex, "email" => $email, "mobile"=>$mobile,"state" => $state, "city" => $city, "user_type" => $user_type, "event_org_cmp_name" => $event_org_cmp_name,"address" => $address,"password"=>$password,"image" => $path, "business_image" =>$images ,"create_date" => $create_date, "status" => $status);
	
			$path1 = "images/userProfile/";
			move_uploaded_file($_FILES["image"]["tmp_name"],$path1.$file_type1);
			
			if(isset($_FILES['images']))
			{
				foreach($_FILES['images']['tmp_name'] as $key => $tmp_name)
				{
				    $file_name = $_FILES['images']['name'][$key];
				    $file_tmp =$_FILES['images']['tmp_name'][$key];
				    move_uploaded_file($file_tmp,$path1.$file_name);
				}
			}
		
			$insertData = $cnn -> insertRec($registration, "user_master");
	
			if(@$insertData)
			{
 				$mail->Subject = "Verification link for your StallsBook registration";
                                $mail->AddAddress($email);
				$message .= 'Dear '.$full_name.',';
				$message .= '';
			   	$message .= '<h4>Thank you for registering as Vendor on StallsBook.</h4>';
			   	$message .= '<h4>As a next step please <a href=http://stallsbook.com/stall_live/changeStatus.php?user_id='.$user_id.'&status=1>Click here</a> to verify your email address.</h4>';
                                $message .= '';
                                $message .= 'Many Thanks,';
                                $message .= '';
                                $message .= 'Team StallsBook';
			        $mail->Body = $message;
			   //     $mail->send();
                                if(!$mail->Send()) {
                                   echo "Mailer Error: " . $mail->ErrorInfo;
                                   } else {
				echo "<script>";
				echo "alert('Registration successful, please check mail to verify your acccount.');";
				echo "window.location.href='index.php'";
				echo "</script>";
				}
			}
			else{
				echo "<script>";
				echo "alert('Registration Failed!');";
				echo "window.location.href='registration.php'";
				echo "</script>";
			}
		}
	 }
?>