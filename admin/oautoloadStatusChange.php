<?php
	include("../include/config.php");
	include("../include/session.php");
	$cnn = new connection();				 
	$selectEvent1 = $cnn->countrow("SELECT *FROM event_master");
	if($selectEvent1 > 0)
	{	
		$current_date = date('Y-m-d');
		$selectEvent = $cnn->getrows("SELECT *FROM event_master");
		
		while($getEvent = mysqli_fetch_array($selectEvent))
		{
			$event_id=$getEvent['event_id'];
								
			$current_date = date('Y-m-d');
			$start_date = date('Y-m-d',strtotime($getEvent['start_date']));
			$end_date = date('Y-m-d',strtotime($getEvent['end_date']));
			if($current_date >= $start_date && $current_date <= $end_date)
			{
				$updateStatus = $cnn->updatedeleterows("UPDATE event_master SET event_status='0' WHERE event_id='$event_id'");
			} 
			else if($end_date <= $current_date)
			{
				$updateStatus = $cnn->updatedeleterows("UPDATE event_master SET event_status='2' WHERE event_id='$event_id'");
			} 
			else if($start_date >= $current_date)
			{ 
				$updateStatus = $cnn->updatedeleterows("UPDATE event_master SET event_status='1' WHERE event_id='$event_id'");
			} 
		} 
	}
?>