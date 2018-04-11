<?php 
    include("../include/config.php");
    include("include/session.php");
    $cnn = new connection();

    if(isset($_POST['portimage']))
    { 
        $images = explode(",",$_FILES['images']['name']);  
     
        // $file_type1 = time().implode(",",$_FILES["image"]["name"]);
		// $src = $_FILES["image"]["tmp_name"];
		// $dest = $_FILES["image"]["name"];
		// move_uploaded_file($src,"../images/gallery/".$file_type1);
		// $bo_file1= substr("$file_type1",-3);
        
        
        if(isset($_FILES['images']))
		{
			foreach($_FILES['images']['tmp_name'] as $key => $tmp_name)
			{
               
                $path1 = "../images/gallery/";
                move_uploaded_file($_FILES['images']['tmp_name'], $path1.$banner);  

			    $file_name = $_FILES['images']['name'][$key];
			    $file_tmp =$_FILES['images']['tmp_name'][$key];
                move_uploaded_file($file_tmp,$path1.$file_name);
                $data=array("images" => $file_name);
                $res=$cnn->insertRec($data,"port_master"); 
			}
		}	
        
		if($res>0)
		{
			header("location:addPortfolio.php?msg=success");
		}
		else
		{
			header("location:addPortfolio.php?msg=error");
		}
    }

    if(isset($_GET["po_id"]))
	{
		$po_id=$_GET["po_id"];
		$res=$cnn->updatedeleterows("delete from port_master where po_id='$po_id'");
		
		if($res>0)
		{
			header("Location:addPortfolio.php?msg=success");
		}
		else
		 {
			header("Location:addPortfolio.php?msg=error");
		}
    }
    
?>