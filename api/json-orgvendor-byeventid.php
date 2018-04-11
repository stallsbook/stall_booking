<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cnn = new connection();
    $headers = array("Content-Type:multipart/form-data");
    $data = array();
    $event_id = $_REQUEST['event_id'];
    
    
    $selectBook = $cnn -> getrows("SELECT bm.status,bm.shop_no,bm.shop_name,bm.start_date as sd,bm.end_date as ed,bm.user_id,um.first_name,um.last_name,um.mobile,um.email,um.state,um.city,um.image,um.business_image,um.event_org_cmp_name,bm.event_id,bm.book_id,um.user_type FROM booking_master bm,event_master em,user_master um where bm.event_id = em.event_id AND um.user_id = bm.user_id AND bm.event_id='$event_id' AND um.user_type='Vendor' ORDER BY bm.status ASC");
	while($getEvent = mysqli_fetch_assoc($selectBook))
	{
		
                $data[] = $getEvent ;
	}
	echo json_encode(array("allEvent" => $data, "ResponseCode" => "1", "Result" => "True"));
   
   
   
    ?>