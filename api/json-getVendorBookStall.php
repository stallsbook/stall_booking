<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cnn = new connection();
    $headers = array("Content-Type:multipart/form-data");
    $event_id=$_REQUEST['event_id'];  		
    $allEvent= array();
	
    $selectEvent1 = $cnn -> countrow("SELECT DISTINCT um.first_name,um.image,bm.shop_name,bm.shop_no,um.event_org_cmp_name,um.business_image,um.user_id,bm.event_id,bm.status FROM user_master um,booking_master bm WHERE bm.event_id='$event_id' AND bm.user_id=um.user_id AND bm.status='1'");
    if($selectEvent1 > 0)	
    { 	
   	$selectEvent = $cnn -> getrows("
SELECT DISTINCT um.first_name,um.image,bm.shop_name,bm.shop_no,um.event_org_cmp_name,um.business_image,um.user_id,bm.event_id FROM user_master um,booking_master bm WHERE bm.event_id='$event_id' AND bm.user_id=um.user_id AND bm.status='1'");

   	
	while($getEvent = mysqli_fetch_assoc($selectEvent))
	{	
		$uid=$getEvent["user_id"];
		$selectShopNo=$cnn->getrows("select single_Shop_no from shop_master where user_id='$uid' AND event_id='$event_id'");
		$shopN="0";
		while($rselectShopNo=mysqli_fetch_assoc($selectShopNo))
		{
			$shopN=$rselectShopNo["single_Shop_no"];	
		}
		$shopNo=array("book_shop_no"=>$shopN);
                $data[] = array_merge($getEvent,$shopNo);
                
	}
	$allEvent=$data;
	echo json_encode(array("vendorList" => $allEvent, "ResponseCode" => "1", "Result" => "True"));
    }
    else
    {
	echo json_encode(array("allEvent" => [], "ResponseCode" => "2", "Result" => "False"));
    }
    
    
    //echo "SELECT DISTINCT um.first_name,um.image,bm.shop_name,bm.shop_no,um.event_org_cmp_name,um.business_image,sm.single_Shop_no,sm.user_id,sm.event_id FROM user_master um,booking_master bm,shop_master sm WHERE bm.event_id='$event_id' AND bm.user_id=um.user_id AND bm.status='1' AND sm.user_id=bm.user_id AND sm.event_id='$event_id'";
    
    //SELECT DISTINCT um.first_name,um.image,bm.shop_name,bm.shop_no,um.event_org_cmp_name,um.business_image,um.user_id,bm.event_id FROM user_master um,booking_master bm WHERE bm.event_id='$event_id' AND bm.user_id=um.user_id AND bm.status='1'
?>