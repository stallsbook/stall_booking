<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cnn = new connection();
    $headers = array("Content-Type:multipart/form-data");
 
    $data = array();
    $event_id = $_REQUEST['event_id'];
    $sender_id = $_REQUEST['sender_id'];

    $selectData2 = $cnn->countrow("SELECT *FROM booking_payment_master WHERE event_id='$event_id' AND sender_id='$sender_id' AND payment_status = '1'");
    if($selectData2 > 0)
    {
        $selectData1 = $cnn->getRows("SELECT *FROM booking_payment_master WHERE event_id='$event_id' AND sender_id='$sender_id'  AND payment_status = '1' AND pay_type != 'refund' ORDER BY payment_date DESC");
	while($getData1 = mysqli_fetch_assoc($selectData1))
	{
		$data[] = $getData1;
	}
	echo json_encode(array("allPayment" => $data, "ResponseCode" => "1", "Result" => "True"));	
    }
    else
    {
	echo json_encode(array("allPayment" => [], "ResponseCode" => "2", "Result" => "False"));	
    }
?>