<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cn=new connection();
	
	$user_id= $_REQUEST["user_id"];
	$event_id= $_REQUEST["event_id"];
	$o_rating = $_REQUEST["o_rating"];
	$o_review = $_REQUEST["o_review"];
	$v_rating= $_REQUEST["v_rating"];
	$v_review= $_REQUEST["v_review"];
	$date= $_REQUEST["date"];
	$status= 0;
	
	if($user_id != '' && $event_id != '' && $o_rating != '' && $o_review	 != '' && $v_rating != '' && $v_review != '')
	{
	    $data = array("user_id"=>$user_id, "event_id"=>$event_id, "o_rating"=>$o_rating,"o_review"=>$o_review, "v_rating"=>$v_rating, "v_review"=>$v_review,"date"=>$date,"status"=>$status);
        $res=$cn->insertRec($data,"review_ratting_master");

        if($res)
        {
           	//$selectUser = $cnn->getrows("SELECT *FROM event_master WHERE event_id='$event_id'");
         	$select=$cn->getrows("select * from user_master where user_id = '$user_id'");
		$u_detail=mysqli_fetch_assoc($select);
		$name1=$u_detail['first_name'].' '.$u_detail['last_name'];
		$name2=ucfirst($name1);
		
		
		
		$select1=$cn->getrows("SELECT um.email,um.deviceid,em.event_name,um.first_name,um.last_name FROM `event_master` em,user_master um where em.user_id=um.user_id and em.event_id = '$event_id' AND um.user_type='Organizer'");
		$u_detail1=mysqli_fetch_assoc($select1);
		$email=$u_detail1['email'];
		$name1=$u_detail1['first_name'].' '.$u_detail1['last_name'];
		$name=ucfirst($name1);
		$event_name=$u_detail1['event_name'];
		$gcmRegID=$u_detail1['deviceid'];
		
		
		$Message= $name2.' '.'wrote a review to your'.' '.$event_name.' '.event;
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
			$subject = 'Event Rating';
			$message = '<div style="background-color:silver; height:250px; width:650px; padding:1%;">';
			$message .= '<img src="http://alexinfosoft.com/stall_booking/stall_live/images/logo.png" style="width:100px;height:40px;float:left;" ><h2 style="text-align:center;">Hi, '.$name.' </h2>';
			$message .= '<div style="background-color:#fff; height:170px; width:638px; padding:5px;">';
			$message .= '<p> '.$name2.' wrote a review to your '.$event_name.' event </p>';
			$message .= '<p> This is system generated mail please do not reply </p>';
			
			$message .= '</div>';
			$message .= '</div>';
			$headers = 'From: stallsbook.com' . "\r\n" .
			'Reply-To: '.$to.'' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
			$headers  .= 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			mail($to,$subject,$message,$headers);
           
            echo json_encode(array("ResponseCode"=>"1","ResponseMsg"=> "Data Insert successfully.","Result"=>"True"));
        }
        else
        {
           echo json_encode(array("ResponseCode"=>"2","ResponseMsg"=> "Could not enter data.","Result"=>"False"));
        }
       
    }
    else
    {
        echo json_encode(array("ResponseCode"=>"3","ResponseMsg"=> "All Filed Must be Required.","Result"=>"False"));
    }
	  
?>