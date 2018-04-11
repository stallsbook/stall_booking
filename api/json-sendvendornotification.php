<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cnn = new connection();
    
    $event_id=$_REQUEST['event_id'];
    $ouser_id= $_REQUEST['user_id'];

    $u_info1=$cnn->countrow("SELECT distinct um.email,um.deviceid,em.event_name,em.start_date,em.event_address,um.noti_counter FROM user_master um,event_master em,booking_master bm WHERE bm.event_id=em.event_id and bm.user_id=um.user_id AND bm.event_id='$event_id' and um.user_type='Vendor' AND em.enoti_counter = '2'");
    if($u_info1 > 0)
    {
    	echo json_encode(array("ResponseCode"=>"2","ResponseMsg"=> "Message Limit Over.","Result"=>"True"));
    }
    else
    {
    	$selectEvent_id1 = $cnn->getrows("SELECT *FROM event_master WHERE event_id='$event_id'");
    	$getDtdt = mysqli_fetch_array($selectEvent_id1);
    	$noti_counter11 = $getDtdt['enoti_counter'];
	$noti_cnt11 = $noti_counter11+1;
	$update1 = $cnn->updatedeleterows("UPDATE event_master SET enoti_counter='$noti_cnt11' WHERE event_id='$event_id'");
    	
    	$u_info1=$cnn->getrows("SELECT distinct *FROM user_master um,event_master em WHERE  em.user_id=um.user_id AND em.event_id='$event_id' and um.user_type='Organizer'");
    
        $getUser = mysqli_fetch_assoc($u_info1);
        $cmp_name = $getUser['event_org_cmp_name'];
        $em = array();
        $selectEvent_id = $cnn->getrows("SELECT *FROM event_master WHERE user_id='$ouser_id'");
			
        while($getEvent_id = mysqli_fetch_array($selectEvent_id))
        {
        	$event_idid = $getEvent_id['event_id'];
        	
        	$u_infovend=$cnn->getrows("SELECT distinct um.user_id,um.email,um.deviceid,em.event_name,em.start_date,em.event_address,um.noti_counter FROM user_master um,event_master em,booking_master bm WHERE bm.event_id=em.event_id and bm.user_id=um.user_id AND bm.event_id='$event_idid' and um.user_type='Vendor'");
        	
        	while($u_get1= mysqli_fetch_assoc($u_infovend))
	       	{
			$em[]=$u_get1['user_id'];
		}
		}
		$vendorData = array_unique($em);
		foreach($vendorData as $dtd)
		{
			$selectData = $cnn->getrows("SELECT *FROM user_master um,event_master em WHERE um.user_id='$dtd'");
			$getData = mysqli_fetch_array($selectData);
			$email1=$getData['email'];
			
			$user_id11=$getData['user_id'];
			$gcmRegID=$getData['deviceid'];
			
			$u_info23=$cnn->getrows("SELECT distinct event_name,start_date,event_address FROM event_master WHERE event_id='$event_id'");
			$u_get23= mysqli_fetch_assoc($u_info23);
			$event_name11=$u_get23['event_name'];
			$start_date11=date('d/M/Y',strtotime($u_get23['start_date']));
			$event_address11=$u_get23['event_address'];
			
			
			
			$subject11 = 'Book your Stall: '.$event_name11.' event by '.$cmp_name.' on '.$start_date11.' @ '.$event_address11;
			
			$Message11=  $subject11;
				define( 'API_ACCESS_KEY', 'AAAAGr0e46s:APA91bG0aXlhxI3da4zCm14VEGJJA8m-5Qy2tTRftdbkE8tDmlDKAWQDbr5kwjopzkwBrV67aFnD_3vGdsaS_qFfysuol-ZJvECdmY0N0v7TlJ7tbhkzFDocOuetgH5pNvs4WHmy2Ji6');
			
				$registrationIds = $gcmRegID;
				$msg = array
				  (
						'body'   => $Message11,
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
				  curl_close( $ch );
				  
				  $to = $email1;
				$subject = 'Master';
				 $message = '<div style="background-color:silver; height:250px; width:650px; padding:1%;">';
				$message .= '<img src="http://alexinfosoft.com/stall_booking/stall_live/images/logo.png" style="width:100px;height:40px;float:left;" ><h2 style="text-align:center;">Hi</h2>';
					$message .= '<div style="background-color:#fff; height:170px; width:638px; padding:5px;">';
					$message .= '<p> '.$subject11.'</p>';
					$message .= '<p> This is system generated mail please do not reply </p>';
					$message .= '</div>';
					$message .= '</div>';
			      $headers = 'From: stallsbook.com' . "\r\n" .
			                    'Reply-To: '.$to.'' . "\r\n" .
			                    'X-Mailer: PHP/' . phpversion();
			        $headers  .= 'MIME-Version: 1.0' . "\r\n";
			        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				mail($to, $subject, $message, $headers); 
		}
		
			
  	$u_info=$cnn->getrows("SELECT distinct um.user_id,um.email,um.deviceid,em.event_name,em.start_date,em.event_address,um.noti_counter FROM user_master um,event_master em,booking_master bm WHERE bm.event_id=em.event_id and bm.user_id=um.user_id AND bm.event_id='$event_id' and um.user_type='Vendor' and um.user_id 
 not in(".implode(',',$vendorData).")");
    	
        while($u_get= mysqli_fetch_assoc($u_info))
       	{
		echo $email=$u_get['email']."<br/>";
		$gcmRegID=$u_get['deviceid'];
		$event_name=$u_get['event_name'];
		$start_date=date('d/M/Y',strtotime($u_get['start_date']));
		$event_address=$u_get['event_address'];
		$enoti_counter = $u_get['enoti_counter'];
		$enoti_cnt = $enoti_counter+1;
		$user_id=$u_get['user_id'];
	
		$update = $cnn->updatedeleterows("UPDATE event_master SET enoti_counter='$enoti_cnt' WHERE user_id='$user_id'");
	
	
		$subject1 = 'Book your Stall: '.$event_name.' event by '.$cmp_name.' on '.$start_date.' @ '.$event_address;
	
		$Message=  $subject1;
			define( 'API_ACCESS_KEY', 'AAAAGr0e46s:APA91bG0aXlhxI3da4zCm14VEGJJA8m-5Qy2tTRftdbkE8tDmlDKAWQDbr5kwjopzkwBrV67aFnD_3vGdsaS_qFfysuol-ZJvECdmY0N0v7TlJ7tbhkzFDocOuetgH5pNvs4WHmy2Ji6');
		
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
			  curl_close( $ch );
		
			$to = $email;
			$subject = 'Master';
			 $message = '<div style="background-color:silver; height:250px; width:650px; padding:1%;">';
			$message .= '<img src="http://alexinfosoft.com/stall_booking/stall_live/images/logo.png" style="width:100px;height:40px;float:left;" ><h2 style="text-align:center;">Hi</h2>';
				$message .= '<div style="background-color:#fff; height:170px; width:638px; padding:5px;">';
				$message .= '<p> '.$subject1.'</p>';
				$message .= '<p> This is system generated mail please do not reply </p>';
				$message .= '</div>';
				$message .= '</div>';
		      $headers = 'From: stallsbook.com' . "\r\n" .
		                    'Reply-To: '.$to.'' . "\r\n" .
		                    'X-Mailer: PHP/' . phpversion();
		        $headers  .= 'MIME-Version: 1.0' . "\r\n";
		        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			mail($to, $subject, $message, $headers);
			
		
   }
     	
      	echo json_encode(array("ResponseCode"=>"1","ResponseMsg"=> "Message Send successfully.","Result"=>"True"));
     }
?>    