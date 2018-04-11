<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cn=new connection();
    
    $email= $_REQUEST["email"];
    $user_type= $_REQUEST["user_type"];
    if($email == '')
    {
    	echo json_encode(array("ResponseCode"=>"0","ResponseMsg"=> "Email Must be Required.","Result"=>"False"));
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
	$check=$cn->countrow("SELECT * FROM user_master WHERE email='$email' and user_type = '$user_type'");
	if($check == '0') 
	{
		echo json_encode(array("ResponseCode"=>"2","ResponseMsg"=> "Wrong EmailID.","Result"=>"False"));
	}
	else
	{
		$Password=randStrGen(8);
		$cnt = $cn->updatedeleterows("UPDATE user_master SET password='$Password' WHERE email='$email' and user_type = '$user_type'");
		$check1=$cn->countrow("SELECT * FROM user_master WHERE email='$email'");
		$user=mysqli_fetch_assoc($check1);
		$name1=$user['First_Name'].' '.$user['Last_Name'];
		$name=ucfirst($name1);
		$to      = $email;
		$subject = 'Forgot your Password';
		$message = '<div style="background-color:silver; height:250px; width:650px; padding:1%;">';
		$message .= '<img src="http://alexinfosoft.com/stall_booking/stall_live/images/logo.png" style="width:100px;height:40px;float:left;" ><h2 style="text-align:center;">Hi, '.$name.' </h2>';
		$message .= '<div style="background-color:#fff; height:170px; width:638px; padding:5px;">';
		$message .= '<p>Your Password is '.$Password.;
		$message .= '</p>';
		$message .= '</div>';
		$message .= '</div>';
		$headers = 'From: stallsbook.com' . "\r\n" .
		'Reply-To: '.$eid.'' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();
		$headers  .= 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		mail($to,$subject,$message,$headers);
		if(mail)
		{
			echo json_encode(array("ResponseCode"=>"1","ResponseMsg"=> "Password is send to respective email..","Result"=>"True"));
		}
		else
		{
			echo json_encode(array("ResponseCode"=>"3","ResponseMsg"=> "Mail could not be sent.","Result"=>"False"));	
		}
	}
	}	
	
    
    
?>