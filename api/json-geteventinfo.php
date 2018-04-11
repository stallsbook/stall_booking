<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cnn = new connection();
    $headers = array("Content-Type:multipart/form-data");
    $event_id=$_REQUEST['event_id'];  		
    $allEvent= array();
	
    $selectEvent1 = $cnn -> countrow("SELECT *FROM event_master WHERE event_id='$event_id' AND status='1'");
    if($selectEvent1 > 0)
    {	
   	$selectEvent = $cnn -> getrows("SELECT *,em.city FROM event_master em,user_master um WHERE em.event_id='$event_id' AND em.user_id=um.user_id AND em.status='1'");
	while($getEvent = mysqli_fetch_assoc($selectEvent))
	{
		
		// count review
		
		$u_id=$getEvent['user_id'];
		/*$count_review=$cnn -> countrow("SELECT * FROM review_ratting_master where event_id='$event_id'");
		// sum of review
		$cnt_review=$cnn -> countrow("SELECT *  FROM review_ratting_master WHERE event_id='$event_id'");
		$total_review['total_review']=$cnt_review;
		$result_sum_reivew=$cnn -> getrows("SELECT sum(o_rating) as overallrating  FROM review_ratting_master WHERE event_id='$event_id'");
		
		$sr=mysqli_fetch_array($result_sum_reivew);
                $overallrating  =$sr["overallrating"];
                
                $total_rating=ceil(intval($overallrating)/intval($count_review));
                $rating['total_rating']=$total_rating;*/
                
                $total_review['total_review']=0;
                $overallrating[]=0;
                $sum=0;
                $r_info=$cnn->getrows("select distinct em.event_id from event_master em ,review_ratting_master  rm  where em.event_id=rm.event_id and  em.user_id ='$u_id'");
		while($r_get=mysqli_fetch_assoc($r_info))
	        {
	        	$event_id = $r_get['event_id'];
	        	//echo "select em.event_id,rm.o_rating  from event_master em ,review_ratting_master  rm  where em.event_id=rm.event_id and  em.user_id ='$u_id'";
	        	$cnt=$cnn->countrow("select distinct em.event_id  from event_master em ,review_ratting_master  rm  where em.event_id=rm.event_id and  em.user_id ='$u_id'");
	        	$total_review['total_review']=$cnt;
	        	//echo "SELECT o_rating FROM review_ratting_master WHERE event_id='$event_id'";
	        	//echo "select rm.o_rating from event_master em ,review_ratting_master  rm  where em.event_id=rm.event_id and  em.user_id ='$u_id'";
	        	$result_sum_reivew=$cnn -> getrows("select distinct em.event_id from event_master em ,review_ratting_master  rm  where em.event_id=rm.event_id and  em.user_id ='$u_id'");
	              	while($result_get_reivew = mysqli_fetch_assoc($result_sum_reivew))
	              	{
	              		$event_id1 = $result_get_reivew['event_id'];
	              		$result_sum_reivew1=$cnn -> getrows("select o_rating from event_master em ,review_ratting_master  rm  where em.event_id=rm.event_id AND em.event_id='$event_id1'");
	              		$result_get_reivew1 = mysqli_fetch_assoc($result_sum_reivew1);
	              		$sum+=$result_get_reivew1['o_rating'];
	              	}
	 		$overallrating[]= $sum;
	 		//echo $sum;
	 		//echo $result_get_reivew['overallrating'];
;  	
	        }
	      	$rate = array_sum($overallrating);
	        $total_rating=ceil(intval($rate )/intval($cnt));
	        $rating['total_rating']=$total_rating;
			
		$start_date = $getEvent['start_date'];
		$end_date = $getEvent['end_date'];
		$current_date = date('Y-m-d');
		
			if($current_date >= $start_date && $current_date <= $end_date)
	                {
	                	$currentEvent["event"] = "running";
	                }
	                else if($end_date <= $current_date)
	                {
	                	$currentEvent["event"] = "Past";
	                }
	                else if($start_date >= $current_date)
	                {
	                	$currentEvent["event"] = "Future";
	                }
               
              $data[] = array_merge($getEvent,$currentEvent,$rating,$total_review);
	}
	
	$allEvent=$data;
	echo json_encode(array("allEvent" => $allEvent, "ResponseCode" => "1", "Result" => "True"));
    }
    else
    {
	echo json_encode(array("allEvent" => [], "ResponseCode" => "2", "Result" => "False"));
    }
?>