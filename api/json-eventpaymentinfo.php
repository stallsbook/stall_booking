<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cnn = new connection();
    $headers = array("Content-Type:multipart/form-data");
    $user_id=$_REQUEST['user_id'];	
    $data= array();

    $selectEvent1 = $cnn->countrow("SELECT *FROM event_master where user_id = '$user_id'");
		$current_date = date('Y-m-d');
		 $selectEvent = $cnn->getrows("SELECT *FROM event_master where user_id = '$user_id' and status='1' and event_status ='1' order by event_status ASC");
		
		 while($getEvent = mysqli_fetch_assoc($selectEvent))
		 {
		 	/*if($current_date >= $start_date && $current_date <= $end_date)
			{
				$time_status = "Running";
			}
			else if($end_date <= $current_date)
			{
				$time_status = "Past";
			}
			else if($start_date >= $current_date)
			{
				$time_status ="Future";
			
			}*/
			
			$getEvent['time_status']="Future";
                	$data[] = $getEvent ;
		}
		 $selectEvent = $cnn->getrows("SELECT *FROM event_master where user_id = '$user_id' and status='1' and event_status ='0' order by event_status ASC");
		
		 while($getEvent = mysqli_fetch_assoc($selectEvent))
		 {
		 	
			
			$getEvent['time_status']="Running";
                	$data[] = $getEvent ;
		}
		 $selectEvent = $cnn->getrows("SELECT *FROM event_master where user_id = '$user_id' and status='1' and event_status ='2' order by event_status ASC");
		
		 while($getEvent = mysqli_fetch_assoc($selectEvent))
		 {
		 	
			$getEvent['time_status']="Past";
                	$data[] = $getEvent ;
		}
	
	
	echo json_encode(array("allEvent" => $data, "ResponseCode" => "1", "Result" => "True"));
    
?>