<?php
	include("../include/config.php"); 
	//include("include/session.php"); 
	$cnn = new connection();

	if(isset($_POST['enquiry']))
	{	
		$name = $_POST['name'];
        $email = $_POST['email'];
        $mobile_no= $_POST['mobile_no'];
        $home_town = $_POST['home_town'];
        $child_name = $_POST['child_name'];
		$child_age = $_POST['child_age'];
        $additional	 = $_POST['additional'];
		$create_date=date('Y-m-d');
       

		
		$registration = array("name" => $name, "email" => $email, "mobile_no" => $mobile_no, "home_town"=>$home_town,"child_name"=>$child_name,
							"child_age" => $child_age,"additional" => $additional,"create_date" => $create_date);

		$insertData = $cnn -> insertRec($registration,"enquiry_master");

		if(@$insertData)
		{
			echo "<script>";
			echo "alert('Your Equiry Form Send successfully');";
			echo "window.location.href='index.php'";
			echo "</script>";
			
		}
		else{
			echo "<script>";
			echo "alert('Sorry Your Equiry Form Not Send!');";
			echo "window.location.href='enquiry.php'";
			echo "</script>";
		}
	}
?>