<?php 
    include("../include/config.php");
    include("include/session.php");
    $cnn = new connection();

    if(isset($_POST['slider']))
    { 
        $file_type1 = rand().jpg;
		$src = $_FILES["image"]["tmp_name"];
		$dest = $_FILES["image"]["name"];
		move_uploaded_file($src,"../images/slider/".$file_type1);
		$bo_file1= substr("$file_type1",-3);
        
        $data=array("image"=>$file_type1);
		$res=$cnn->insertRec($data,"slider");
		if($res>0)
		{
			header("location:addSlider.php?msg=success");
		}
		else
		{
			header("location:addSlider.php?msg=error");
		}
    }

    if(isset($_GET["s_id"]))
	{
		$sid=$_GET["s_id"];
		$res=$cnn->updatedeleterows("delete from slider where s_id='$sid'");
		
		if($res>0)
		{
			header("Location:addSlider.php?msg=success");
		}
		else
		 {
			header("Location:addSlider.php?msg=error");
		}
    }
    
?>