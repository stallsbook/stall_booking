<?php
	include("../include/config.php"); 
	include("include/session.php"); 
	$cnn = new connection();

	if(isset($_POST['profile']))
	{
		$user_id = $_POST['user_id'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$mobile = $_POST['mobile'];
		$state = $_POST['state'];
		$city = $_POST['city'];
		$event_org_cmp_name = $_POST['event_org_cmp_name'];
		$address = $_POST['address'];
        $password = $_POST['password'];
        
        	
		if($_FILES["image"]["name"] != "")
		{
		$file_type1 = time().$_FILES["image"]["name"];
		$path = "images/".$file_type1;
		$updateuser = $cnn -> updatedeleterows("UPDATE user_master SET first_name = '$first_name',last_name = '$last_name', email = '$email',mobile = '$mobile', state = '$state', city = '$city', event_org_cmp_name = '$event_org_cmp_name',address = '$address',password = '$password', image='$path' WHERE user_id = '$user_id'");
		$path1 = "../images/";
		move_uploaded_file($_FILES["image"]["tmp_name"],$path1.$file_type1);
		}else
		{
		$updateuser = $cnn -> updatedeleterows("UPDATE user_master SET first_name = '$first_name',last_name = '$last_name', email = '$email',mobile = '$mobile', state = '$state', city = '$city', event_org_cmp_name = '$event_org_cmp_name',address = '$address',password = '$password' WHERE user_id = '$user_id'");
		}
        
        

		
		
		if($updateuser)
		{
			header("Location: viewProfile.php?msg=success");
        }
        else{
            header("Location: viewProfile.php?msg=error");
        }
	}
	

?>