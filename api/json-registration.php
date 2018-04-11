  <?php 
   header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    require '../stall_live/include/class.phpmailer.php';
    require "../stall_live/include/PHPMailerAutoload.php";
    $cn=new connection();
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
    $user_data=array();
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
	$first_name = $_REQUEST['first_name'];
	$last_name = $_REQUEST['last_name'];
        $full_name = $first_name . ' ' . $last_name;
	$sex= $_REQUEST['sex'];
	$email = $_REQUEST['email'];
	$password =$_REQUEST['password'];
	$mobile = $_REQUEST['mobile'];
	$city = $_REQUEST['city'];
	$user_type = $_REQUEST['user_type'];
	$event_org_cmp_name = $_REQUEST['event_org_cmp_name'];
	$description = $_REQUEST['description'];
	$address = $_REQUEST['address'];
	$deviceid= $_REQUEST['deviceid'];
	
	$file_type = time().$_FILES["image"]["name"];
	$src = $_FILES["image"]["tmp_name"];
	$dest = $_FILES["image"]["name"];
	$image_file="images/userProfile/".$file_type;
	move_uploaded_file($src,"../stall_live/images/userProfile/".$file_type);
	
	if($_FILES["image1"]["name"] != "")
	{
		$file_type1 = time().$_FILES["image1"]["name"];
		$src1 = $_FILES["image1"]["tmp_name"];
		$dest1 = $_FILES["image1"]["name"];
		$image_file1=$file_type1;
		move_uploaded_file($src1,"../stall_live/images/userProfile/".$file_type1);
	}
	if($_FILES["image2"]["name"] != "")
	{
		$file_type2 = time().$_FILES["image2"]["name"];
		$src2 = $_FILES["image2"]["tmp_name"];
		$dest2 = $_FILES["image2"]["name"];
		$image_file2=$file_type2;
		move_uploaded_file($src2,"../stall_live/images/userProfile/".$file_type2);
	}
	if($_FILES["image3"]["name"] != "")
	{
		$file_type3 = time().$_FILES["image3"]["name"];
		$src3 = $_FILES["image3"]["tmp_name"];
		$dest3 = $_FILES["image3"]["name"];
		$image_file3=$file_type3;
		move_uploaded_file($src3,"../stall_live/images/userProfile/".$file_type3);
	}
	if($_FILES["image4"]["name"] != "")
	{
		$file_type4 = time().$_FILES["image4"]["name"];
		$src4 = $_FILES["image4"]["tmp_name"];
		$dest4 = $_FILES["image4"]["name"];
		$image_file4=$file_type4;
		move_uploaded_file($src4,"../stall_live/images/userProfile/".$file_type4);
	}
	if($image_file1 != "")
	{
		$b_image = $image_file1;
	}
	if($image_file1 != "" && $image_file2 != "")
	{
		$b_image =  $image_file1.','.$image_file2;
	}
	if($image_file1 != "" && $image_file2 != "" && $image_file3 != "" )
	{
		$b_image =  $image_file1.','.$image_file2.','.$image_file3;
	}
	if($image_file1 != "" && $image_file2 != "" && $image_file3 != "" && $image_file4 != "" )
	{
		$b_image = $image_file1.','.$image_file2.','.$image_file3.','.$image_file4;
	}
		
	$bo_file1= substr("$file_type1",-3);
	$bo_file1= substr("$image",-3);
	$create_date = date("Y-m-d H:i:s");
	$status = 0;
	
	if($first_name == ''|| $sex== ''|| $email == ''|| $mobile == ''|| $city == ''|| $user_type == ''|| $password == '')
	{
		echo json_encode(array("ResponseCode"=>"0","ResponseMsg"=> "All Filed Must be Required.","Result"=>"False"));	
	}
	else
	{
		$m_cnt=$cn->countrow("select * from user_master where mobile='$mobile' and user_type='$user_type'");
		$e_cnt=$cn->countrow("select * from user_master where email='$email' and user_type='$user_type'");
		if($e_cnt > 0)
		{
			echo json_encode(array("ResponseCode"=>"3","ResponseMsg"=> "Email is already exist.","Result"=>"False","userinfo"=>array()));	
		}
		else if($m_cnt > 0)
		{
			echo json_encode(array("ResponseCode"=>"4","ResponseMsg"=> "Mobile No is already exist.","Result"=>"False","userinfo"=>array()));
		}
		else
		{
			$registration = array("user_id" => $user_id, "first_name" => $first_name, "last_name" => $last_name, "sex"=>$sex, "email" => $email, "password " => $password , "mobile"=>$mobile, "city" => $city, "user_type" => $user_type, "event_org_cmp_name" => $event_org_cmp_name,"description"=>$description,"address" => $address,"image" => $image_file, "business_image" =>$b_image,"create_date" => $create_date, "status" => $status,"deviceid"=>$deviceid);
		
			$insertData = $cn -> insertRec($registration, "user_master");
				
			if($insertData)
			{	
                                $mail->Subject = "Verification link for your StallsBook registration";
                                $mail->AddAddress($email);

                                if ($user_type == 'Organizer') {
                                    $message .= 'Dear '.$full_name.',';
			   	    $message .= '<h4>Thank you for registering as an Organizer on StallsBook.</h4>';
			   	    $message .= '<h4>As a next step please <a href=http://stallsbook.com/stall_live/changeStatus.php?user_id='.$user_id.'&status=1>Click here</a> to verify your email address.</h4>';
                                    $message .= 'Many Thanks,' . "\n";
                                    $message .= '';
                                    $message .= 'Team StallsBook';
			            $mail->Body = $message;
                                }

                                if ($user_type == 'Vendor') {
                                    $message .= 'Dear '.$full_name.',';
			   	    $message .= '<h4>Thank you for registering as a Vendor on StallsBook.</h4>';
			   	    $message .= '<h4>As a next step please <a href=http://stallsbook.com/stall_live/changeStatus.php?user_id='.$user_id.'&status=1>Click here</a> to verify your email address.</h4>';
                                    $message .= 'Many Thanks,' . "\n";
                                    $message .= '';
                                    $message .= 'Team StallsBook';
			            $mail->Body = $message;
                                }
                                   
			        if(!$mail->Send()) {
                                   echo "Mailer Error: " . $mail->ErrorInfo;
                                   } else {
                                    echo json_encode(array("ResponseCode"=>"1","ResponseMsg"=> "Data Insert successfully.Please Check Mail To Verify Your Acccount.","Result"=>"True","userinfo"=>$user_data));
                                  }
			    	$u_info=$cn->getrows("select * from user_master where email='$email' and mobile='$mobile' and user_type ='$user_type'");
			    	while($u_get=mysqli_fetch_assoc($u_info))
			    	{
			    		$user_data[]=$u_get;
			    	}
			    	
			}
			else
			{
		    		echo json_encode(array("ResponseCode"=>"2","ResponseMsg"=> "Could not enter data.","Result"=>"False","userinfo"=>array()));
			}
		}	
	}
                                // $to = $email;
				// $subject = 'Master';
			   	// $message .= '<h4>Account Verification For StallBooks.</h4>';
			   	// $message .= '<h4>Your Registration Successfull.<a href=http://alexinfosoft.com/stall_booking/stall_live/changeStatus.php?user_id='.$user_id.'&status=1>Click To Login</a></h4>';
				// $headers = 'From: vb4dholariya@gmail.com' . "\r\n" . 'Reply-To: '.$to.'' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
				// $headers  .= 'MIME-Version: 1.0' . "\r\n";
				// $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				// mail($to, $subject, $message, $headers);
?>