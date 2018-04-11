<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cnn = new connection();
    $user_id =$_REQUEST['user_id'];
  
   $selectEvent1 = $cnn -> countrow("SELECT distinct event_id   FROM `booking_payment_master` where sender_id = '$user_id' ");
    if($selectEvent1 > 0)
    {
   	$selectEvent = $cnn -> getrows("SELECT distinct bpm.event_id,em.stall_charge,em.event_name,um.first_name,um.last_name,um.city FROM booking_payment_master bpm,event_master em,user_master um where bpm.event_id = em.event_id and em.user_id = um.user_id and  bpm.sender_id = '$user_id' ");
	while($getEvent = mysqli_fetch_assoc($selectEvent))
	{
		$e_id = $getEvent['event_id'];
		$s_charge = $getEvent['stall_charge'];
		$t_amount=$cnn -> getrows("SELECT sum(book_amount) as total_amount  FROM `booking_payment_master` where event_id= '$e_id ' ");
		$s_amount=mysqli_fetch_assoc($t_amount);
		$amount = $s_amount['total_amount'];
		$r_amount = $s_charge - $amount;
		
		
		
		$getEvent['paid_amount']=$amount ;
		$getEvent['remain_amount']=$r_amount ;
                $data[] = $getEvent ;
	}
	echo json_encode(array("allEvent" => $data, "ResponseCode" => "1", "Result" => "True"));
   
    }
    else
    {
    	echo json_encode(array("allEvent" => [], "ResponseCode" => "2", "Result" => "False"));
    }
    
?>    