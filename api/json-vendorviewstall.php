<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cnn = new connection();
    $headers = array("Content-Type:multipart/form-data");
    $data = array();
    $event_id = $_REQUEST['event_id'];
    $user_id = $_REQUEST['user_id'];
    
    $selectBook = $cnn -> getrows("SELECT um.user_id,um.first_name,um.last_name,em.event_name,em.event_id,sm.single_Shop_no,sm.shop_name,sm.shop_id,sm.assign_date,sm.description,sm.no_table,sm.no_chair,pm.amount FROM shop_master sm,user_master um,event_master em,payment_master pm  WHERE sm.user_id = '$user_id' AND sm.user_id = um.user_id AND sm.event_id=em.event_id AND sm.shop_id = pm.shop_id and sm.event_id ='$event_id'");
    while($getEvent = mysqli_fetch_assoc($selectBook))
    {
        $data[] = $getEvent ;
    }
    echo json_encode(array("allEvent" => $data, "ResponseCode" => "1", "Result" => "True"));
    ?>