<?php
	header('Access-Control-Allow-Origin: *');
	include("../include/config.php");
	$cnn = new connection();

  	$user_id=$_REQUEST["user_id"];
  	$user_type=$_REQUEST["user_type"];
  	$user=array();
      	
        $selectuser = $cnn -> countrow("SELECT *FROM user_master WHERE user_id = '$user_id' and user_type='$user_type' AND status ='1'");
	if($selectuser > 0)
	{
		
		
		$first_name=$_REQUEST["first_name"];
		$last_name=$_REQUEST["last_name"];
		$email=$_REQUEST["email"];
		$mobile=$_REQUEST["mobile"];
		$city=$_REQUEST["city"];
	        $address=$_REQUEST["address"];
	        $description=$_REQUEST["description"];
	        $sex=$_REQUEST["sex"];
       
   
       if($_FILES["image"]["name"]!="")
        {
		$file_type1 = time().$_FILES["image"]["name"];
		$src = $_FILES["image"]["tmp_name"];
		$dest = $_FILES["image"]["name"];
		$path="images/userProfile/".$file_type1;
		move_uploaded_file($src,"../stall_live/images/userProfile/".$file_type1);                                                                                         
        }
        else  
        {
		
		 $getimage=$cnn->getrows("select * from user_master where user_id = '$user_id'");
		 $image=mysqli_fetch_assoc($getimage);
		 $u_image=$image['image'];
		 $path=$u_image;
        }
       
      	   
        $cnt = $cnn->updatedeleterows("update user_master set first_name = '$first_name', last_name = '$last_name',email = '$email' , mobile = '$mobile', city = '$city', address = '$address', event_org_cmp_name= '$description', sex = '$sex',image='$path' where user_id = '$user_id' AND user_type = '$user_type' AND status ='1'");
   

		if($cnt)
		{
			
			 $selectuser1 = $cnn -> getrows("SELECT * FROM user_master WHERE user_id = '$user_id' and user_type='$user_type' AND status ='1'");
			 while($r=mysqli_fetch_assoc($selectuser1))
			 {
			 	$user[]=$r;
			 }
			
			$response=array("responsecode"=>"1","message"=>"success","profile"=>$user,"path"=>$u_image);
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