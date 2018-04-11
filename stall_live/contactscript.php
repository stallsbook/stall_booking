<?php 
    include("../include/config.php");
    $cnn = new connection();

    if(isset($_POST['contact']))
    { 
        $c_name = $_POST['c_name'];
        $c_description = $_POST['c_description'];
        $c_mobile = $_POST['c_mobile']; 
        $c_email = $_POST['c_email']; 
        $c_date = date('Y-m-d H:i:s'); 
        
        $data=array("c_name"=>$c_name, "c_description"=>$c_description, "c_mobile"=>$c_mobile, "c_email"=>$c_email, "c_date"=>$c_date);
		$res=$cnn->insertRec($data,"contact_master");
		if($res>0)
		{
			
			echo "<script>";
			echo "alert('Your Message Send successfully');";
			echo "window.location.href='index.php'";
			echo "</script>";
			
		}
		else
		{
			echo "<script>";
			echo "alert('Sorry Your Message Not Send!');";
			echo "window.location.href='enquiry.php'";
			echo "</script>";
		}
    }

    
    
?>