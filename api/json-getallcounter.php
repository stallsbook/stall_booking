<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cnn = new connection();
    $headers = array("Content-Type:multipart/form-data");
  	
  $user_id = $_REQUEST['user_id'];

	$cntevent= $cnn -> countrow("SELECT * FROM event_master where user_id ='$user_id'");
	$cntvendor= $cnn -> countrow("SELECT *FROM user_master where user_type='Vendor'");
	$cntreview= $cnn -> countrow("SELECT * FROM review_ratting_master rm, event_master em,user_master um where rm.event_id=em.event_id and rm.user_id = um.user_id and em.user_id='$user_id'");
	$cntpayment= $cnn -> countrow("SELECT * FROM booking_payment_master WHERE payment_status = '0'");
    
    echo json_encode(array("allEvent" => $cntevent,"vendor" => $cntvendor, "review" => $cntreview, "payment" => $cntpayment,  "ResponseCode" => "1", "Result" => "True"));
   
   
?>