<?php
	include("../include/config.php"); 
	//include("../include/session.php"); 
	$cnn = new connection();

	$event_id = $_POST['event_id'];
	
	$selectDescription = $cnn ->getrows("SELECT *FROM event_master WHERE event_id='$event_id'");
	$getDesc = mysqli_fetch_array($selectDescription);
		
	echo $event_desc = $getDesc['event_desc'];
	/*$data = array(
			"event_desc" => $event_desc
		     );     
	echo json_encode($data);
	*/
?>