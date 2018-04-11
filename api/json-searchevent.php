<?php
header('Access-Control-Allow-Origin: *');
if(isset($_REQUEST["event_name"]))
{
    $event_name = trim($_REQUEST["event_name"]," ");
    include("../include/config.php");
    $cn=new connection();
    //um.city like '%".$event_name."%' OR 

    $res=$cn->getrows("select *,em.city,em.status as emstatus from event_master em , category_master cm, user_master um where um.user_id = em.user_id AND cm.cat_id = em.cat_id AND (em.event_name like '%".$event_name."%' OR um.state like '%".$event_name."%' OR em.city like '%".$event_name."%' OR  um.first_name like '%".$event_name."%' OR em.event_address like '%".$event_name."%') AND em.status='1' ORDER BY event_name ASC");
    
    $con=array();
    $dt=array();
    $response=array();
    $i=0;
    while($r=mysqli_fetch_array($res))
    {
        $con[$i]["event_id"]=$r["event_id"];
        $con[$i]["user_id"]=$r["user_id"];
        $con[$i]["event_name"]=$r["event_name"];
        $con[$i]["cat_name"]=$r["cat_name"];
        $con[$i]["event_address"]=$r["event_address"];
        $con[$i]["latitude"]=$r["latitude"];
        $con[$i]["longitude"]=$r["longitude"];
        $con[$i]["start_date"]=$r["start_date"];
        $con[$i]["end_date"]=$r["end_date"];
        $con[$i]["stall_charge"]=$r["stall_charge"];
        $con[$i]["event_desc"]=$r["event_desc"];
        $con[$i]["avai_stall"]=$r["avai_stall"];
        $con[$i]["total_stall"]=$r["total_stall"];
        $con[$i]["banner"]=$r["banner"];
         $con[$i]["city"]=$r["city"];
       	
       	if($r["images"] != '')
       	{
       		$images = explode(",",$r['images']);
       		foreach($images as $img)
       		{
       			
       			$dt[] = "images/event/".$img;
       			$con[$i]["images"]=$dt;
       		}
       						
       	}
       	else
       	{
       		$con[$i]["images"]="";
       	}
       	
        $con[$i]["create_date"]=$r["create_date"];
        $con[$i]["status"]=$r["status"];
        $i++;
    }
    if(!empty($con))
    {
        $response=array("responsecode"=>"1","message"=>"success","eventview"=>$con);
        echo json_encode($response);
    }
    else
    {
        $response=array("responsecode"=>"0","message"=>"No Record Found","eventview"=>array());
        echo json_encode($response);
    }
}

?>