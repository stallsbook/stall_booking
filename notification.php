<?php
function sendnotification($gcmRegID,$Message)
{
   define( 'API_ACCESS_KEY','dQ5BPQvtkq0:APA91bFCwGCe6tCTjSX2GgDXYSJ4UFTjEEvvpZ3WSlnqINSNOq5dkv7_WhyxJeDlvh-M8_4e8dEtDG3_ijw38RmmnXxqQJKHdO8_KGtxrDiIxeCsPUK-Mz8MIXl3RrZsrMr6Xt-EOQch');
		
			$registrationIds = $gcmRegID;
			$msg = array
				(
					'body'   => $Message,
					'icon'   => 'myicon',/*Default Icon*/
					'sound' => 'mySound'/*Default sound*/
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
  
}		
    ?>

	