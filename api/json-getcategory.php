<?php
header('Access-Control-Allow-Origin: *');
  
    include("../include/config.php");
    $cn=new connection();
    $res=$cn->getrows("select * from category_master");
    
    $cat=array();
    $response=array();
   
    while($r=mysqli_fetch_assoc($res))
    {
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