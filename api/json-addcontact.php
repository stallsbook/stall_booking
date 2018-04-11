<?php
    header('Access-Control-Allow-Origin: *');
    include("../include/config.php");
    $cn=new connection();
        
	$c_name= $_REQUEST["c_name"];
	$c_description = $_REQUEST["c_description"];
	$c_mobile= $_REQUEST["c_mobile"];
	$c_status= 0;
	
	if($c_name == ''|| $c_description == '' || $c_mobile == '')
	{
		echo json_encode(array("ResponseCode"=>"0","ResponseMsg"=> "All Filed Must be Required.","Result"=>"False"));	
	}
	else
	{
		$data = array("c_name"=>$c_name, "c_description"=>$c_description, "c_mobile"=>$c_mobile,"c_status"=>$c_status);
		$res=$cn->insertRec($data,"contact_master");
	
		if($res)
		{		
		    echo json_encode(array("ResponseCode"=>"1","ResponseMsg"=> "Data Insert successfully.","Result"=>"True"));
		}
		else
		{
	    		echo json_encode(array("ResponseCode"=>"2","ResponseMsg"=> "Could not enter data.","Result"=>"False"));
		}
	}
	
        
?>