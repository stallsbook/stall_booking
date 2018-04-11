<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cnn = new connection();
    $headers = array("Content-Type:multipart/form-data");
    $user_id=$_REQUEST['user_id'];  		
    $allEvent= array();
	
    $selectEvent1 = $cnn -> countrow("select em.event_id  from event_master em ,review_ratting_master  rm  where em.event_id=rm.event_id and  em.user_id ='$user_id'");
    if($selectEvent1 > 0)
    {	
   	
                $r_info=$cnn->getrows("select distinct em.event_id,em.event_name  from event_master em ,review_ratting_master  rm  where em.event_id=rm.event_id and  em.user_id ='$user_id'");
		while($r_get=mysqli_fetch_assoc($r_info))
	        {
	        	$event_id = $r_get['event_id'];
	        	
	        	
			$cnt=$cnn->countrow("SELECT distinct *  FROM review_ratting_master WHERE event_id='$event_id'");
			$total_review['total_review']=$cnt;
			$result_sum_reivew=$cnn -> getrows("SELECT sum(o_rating) as overallrating FROM review_ratting_master WHERE event_id='$event_id'");
			$result_get_reivew = mysqli_fetch_assoc($result_sum_reivew);
			$overallrating= $result_get_reivew['overallrating'];
			$total_rating=ceil(intval($overallrating)/intval($cnt));
			$rating['total_rating']=$total_rating;
			$event['event_name']=$r_get['event_name'];
			$event['event_id']=$r_get['event_id'];
			$data[] = array_merge($event,$rating,$total_review);
			
               		
	        }
	      
	$allEvent=$data;
	echo json_encode(array("allEvent" => $allEvent, "ResponseCode" => "1", "Result" => "True"));
    }
    else
    {
	echo json_encode(array("allEvent" => [], "ResponseCode" => "2", "Result" => "False"));
    }
?>