<?php
    header('Access-Control-Allow-Origin: *');
    date_default_timezone_set("Asia/Kolkata");
    include("../include/config.php");
    include("../notification.php");
    $cn=new connection();
	
	$user_id= $_REQUEST["user_id"];
	$event_id= $_REQUEST["event_id"];
	$shop_no = $_REQUEST["shop_no"];
	$start_date= $_REQUEST["start_date"];
	$end_date= $_REQUEST["end_date"];
	$create_date= date('Y-m-d H:i:s');
	$shop_name= $_REQUEST["shop_name"];
	$status= 0;
	
	
	if($user_id != '' && $event_id != '' && $shop_no != '' && $start_date != '' && $end_date != '' && $create_date != '')
	{
	
	$selectData = $cn->getrows("SELECT *FROM event_master WHERE event_id='$event_id'");
	$getData = mysqli_fetch_array($selectData);
	$avai_stall = $getData['avai_stall'];
	$total = $avai_stall - $shop_no;
	
	$data = array("user_id"=>$user_id, "event_id"=>$event_id, "shop_no"=>$shop_no,"start_date"=>$start_date, "end_date"=>$end_date, "create_date"=>$create_date,"shop_name"=>$shop_name,"status"=>$status);
		$res=$cn->insertRec($data,"booking_master");
	//$updateStall = $cn->updatedeleterows("UPDATE event_master SET avai_stall = '$total' WHERE event_id='$event_id'");
		if($res)
		{		
			/*$custmsg = "Hi ".$vfirst_name." ".$vlast_name.", Booking successfully.Wait For Approval.";
			$custurl = "http://login.arihantsms.com/vendorsms/pushsms.aspx?user=saurabhsw&password=saurabh_sw&msisdn=".$vmobile."&sid=SRWALA&msg=".urlencode($custmsg)."&fl=0&gwid=2";
			$ch1 = curl_init($custurl);
			curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
			$curl_scraped_page = curl_exec($ch1);
			curl_close($ch1);
			$custmsg  = $curl_scraped_page;*/
			
			$select=$cn->getrows("select * from user_master where user_id = '$user_id'");
			$u_detail=mysqli_fetch_assoc($select);
			$name=$u_detail['first_name'].' '.$u_detail['last_name'];
			$uname=ucfirst($name);
			$email=$u_detail['email'];
			$gcmRegID=$u_detail['deviceid'];
			$Message='Your Booking successfully.Wait For Approval';
			/*define( 'API_ACCESS_KEY', 'AAAAGr0e46s:APA91bG0aXlhxI3da4zCm14VEGJJA8m-5Qy2tTRftdbkE8tDmlDKAWQDbr5kwjopzkwBrV67aFnD_3vGdsaS_qFfysuol-ZJvECdmY0N0v7TlJ7tbhkzFDocOuetgH5pNvs4WHmy2Ji6');
		
			$registrationIds = $gcmRegID;
			$msg = array
			  (
					'body'   => $Message,
				   'icon'   => 'myicon',
				   'sound' => 'mySound'
			  );
			$fields = array
			 (
				'to'     => $registrationIds,
				'data' => $msg
			 );
			$headers = array
			 (
				'Authorization: key=' . API_ACCESS_KEY,
				'Content-Type: application/json'
			 );

			$ch = curl_init();
		  curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
		  curl_setopt( $ch,CURLOPT_POST, true );
		  curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		  curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		  curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		  curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		  $result = curl_exec($ch );
		  curl_close( $ch );*/
		  
		    $to      = $email;
			$subject = 'Event Booking';
			$message = '<div style="background-color:silver; height:250px; width:650px; padding:1%;">';
			$message .= '<img src="http://alexinfosoft.com/stall_booking/stall_live/images/logo.png" style="width:100px;height:40px;float:left;" ><h2 style="text-align:center;">Hi, '.$uname.' </h2>';
			$message .= '<div style="background-color:#fff; height:170px; width:638px; padding:5px;">';
			$message .= '<p>Your Booking successfully.Wait For Approval </p>';
			$message .= '<p> This is system generated mail please do not reply </p>';
			$message .= '</div>';
			$message .= '</div>';
			$headers = 'From: stallsbook.com' . "\r\n" .
			'Reply-To: '.$email.'' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
			$headers  .= 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			mail($to,$subject,$message,$headers);
			//header("Location: allevents.php");
		  
			echo json_encode(array("ResponseCode"=>"1","ResponseMsg"=> "Waiting For Admin Aproval.","Result"=>"True"));
		}
		else
		{
	    	echo json_encode(array("ResponseCode"=>"2","ResponseMsg"=> "Could not enter data.","Result"=>"False"));
		}
		
	}
	else
	{
		echo json_encode(array("ResponseCode"=>"0","ResponseMsg"=> "All Filed Must be Required.","Result"=>"False"));	
	}     
?>