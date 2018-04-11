<?php
    include("../include/config.php");
header('Access-Control-Allow-Origin: *');
if(isset($_REQUEST["event_address"]))
{
    
    $event_address=$_REQUEST["event_address"];

    $cn=new connection();
    $res=$cn->getrows("SELECT * FROM user_master um, event_master em, review_ratting_master rm WHERE um.user_id = rm.user_id AND em.event_id = rm.event_id AND em.event_address like '".$event_address."%'");
	
    $event=array();
    $response=array();
    $i=0;
    while($r=mysqli_fetch_array($res))
    {
        $event[$i]["rr_id"]=$r["rr_id"];
        $event[$i]["first_name"]=$r["first_name"];
        $event[$i]["last_name"]=$r["last_name"];
        $event[$i]["event_name"]=$r["event_name"];
        $event[$i]["o_rating"]=$r["o_rating"];
        $event[$i]["o_review"]=$r["o_review"];
        $event[$i]["v_rating"]=$r["v_rating"];
        $event[$i]["v_review"]=$r["v_review"];
        $event[$i]["date"]=$r["date"];
        $event[$i]["status"]=$r["status"];
        $i++;
    }

    if(!empty($event))
    {
        $response=array("responsecode"=>"1","message"=>"success","RatingReview"=>$event);
        echo json_encode($response);
    }
    else
    {
        $response=array("responsecode"=>"0","message"=>"No rating-review","RatingReview"=>array());
        echo json_encode($response);
    }
}
else
{
    $response=array("responsecode"=>"2","message"=>"empty","RatingReview"=>array());
    echo json_encode($response);
}
?>