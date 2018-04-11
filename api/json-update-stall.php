<?php
	header('Access-Control-Allow-Origin: *');
	include("../include/config.php");
	$cnn = new connection();

  	$user_id=$_REQUEST["user_id"];
  	$shop_id=$_REQUEST["shop_id"];
  	$user=array();
      	
        $selectuser = $cnn -> countrow("SELECT *FROM shop_master WHERE user_id = '$user_id' and shop_id='$shop_id'");
	if($selectuser > 0)
	{
		$event_id=$_REQUEST["event_id"];
		$single_Shop_no=$_REQUEST["single_Shop_no"];
		$shop_name=$_REQUEST["shop_name"];
		$no_table=$_REQUEST["no_table"];
		$no_chair=$_REQUEST["no_chair"];
	        $description=$_REQUEST["description"];
	        $amount=$_REQUEST["amount"];
	
        $cnt = $cnn->updatedeleterows("update shop_master set single_Shop_no= '$single_Shop_no', shop_name= '$shop_name', no_table= '$no_table', no_chair= '$no_chair', description= '$description' where user_id = '$user_id' AND shop_id= '$shop_id' AND event_id='$event_id'");
   
   	$cnt1 = $cnn->updatedeleterows("update payment_master set amount= '$amount' where shop_id= '$shop_id'");

		if($cnt)
		{
			$response=array("responsecode"=>"1","message"=>"success");
			echo json_encode($response);
		}
		else
		{
			$response=array("responsecode"=>"0","message"=>"error","profile"=>array());
			echo json_encode($response);
		}
    }
    else
    {
        $response=array("responsecode"=>"2","message"=>"User Does Not Metch","profile"=>array());
        echo json_encode($response);   
    }
?>