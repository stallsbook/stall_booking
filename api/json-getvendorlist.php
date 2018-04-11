<?php
header('Access-Control-Allow-Origin: *');
  
    include("../include/config.php");
    $cn=new connection();
    $event_id=$_REQUEST['event_id'];
   //echo "SELECT  distinct bpm.sender_id,um.first_name,um.user_id,bpm.book_id FROM booking_payment_master bpm,event_master em ,user_master um WHERE em.event_id=bpm.event_id AND bpm.sender_id=um.user_id And  em.event_id='$event_id' AND um.user_type='Vendor' AND(bpm.pay_type='cash' OR bpm.pay_type='bank')";
   
    //$res=$cn->getrows("SELECT  distinct bpm.sender_id,um.first_name,um.user_id,bpm.book_id FROM booking_payment_master bpm,event_master em ,user_master um WHERE em.event_id=bpm.event_id AND bpm.sender_id=um.user_id And em.event_id='$event_id' AND um.user_type='Vendor' AND(bpm.pay_type='cash' OR bpm.pay_type='bank')");
    //echo "SELECT  DISTINCT bpm.sender_id,um.first_name,um.user_id,bpm.book_id FROM booking_payment_master bpm, user_master um,event_master em WHERE  bpm.sender_id=um.user_id AND bpm.event_id=em.event_id  AND bpm.event_id='$event_id' AND(bpm.pay_type='cash' OR bpm.pay_type='bank')";
   $res=$cn->getrows("SELECT  DISTINCT bpm.sender_id,um.first_name,um.user_id,bpm.book_id,bm.book_id FROM booking_payment_master bpm, user_master um,event_master em,booking_master bm WHERE  bpm.sender_id=um.user_id AND bpm.event_id=em.event_id AND bm.book_id=bpm.book_id  AND bpm.event_id='$event_id' AND(bpm.pay_type='cash' OR bpm.pay_type='bank')");
    
    $cat=array();
    $response=array();
   
    while($r=mysqli_fetch_assoc($res))
    {
        $sender_id = $r['sender_id']; 
        $book_id= $r['book_id']; 
        $b_info=$cn->getrows("select sum(book_amount) as total_amt from booking_payment_master  where sender_id = '$sender_id' and book_id='$book_id'");
        
        $b_get=mysqli_fetch_assoc($b_info);
        $total_amount=$b_get['total_amt'];
        
        $r['total_amt']=$total_amount;
    	$cat[] = $r;
        
    }
    if(!empty($cat))
    {
        $response=array("responsecode"=>"1","message"=>"success","category"=>$cat);
        echo json_encode($response);
    }
    else
    {
        $response=array("responsecode"=>"0","message"=>"error","category"=>array());
        echo json_encode($response);
    }
?>