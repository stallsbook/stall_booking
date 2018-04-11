<?php 
    include("../include/config.php");
    include("../include/session.php");
    $cnn = new connection();

    if(isset($_POST['galleryImage']))
    { 
        $images = explode(",",$_FILES['images']['name']);  
     
        if(isset($_FILES['images']))
		{
			foreach($_FILES['images']['tmp_name'] as $key => $tmp_name)
			{
               
                $path1 = "../images/gallery/";
                move_uploaded_file($_FILES['images']['tmp_name'], $path1.$banner);  

			    $file_name = $_FILES['images']['name'][$key];
			    $file_tmp =$_FILES['images']['tmp_name'][$key];
                move_uploaded_file($file_tmp,$path1.$file_name);
                $data=array("image" => $file_name);
                $res=$cnn->insertRec($data,"gallery_image"); 
			}
		}	
        
		if($res>0)
		{
			header("location:addGalleryImage.php?msg=success");
		}
		else
		{
			header("location:addGalleryImage.php?msg=error");
		}
    }

    if(isset($_GET["g_id"]))
	{
		$gid=$_GET["g_id"];
		$res=$cnn->updatedeleterows("delete from gallery_image where g_id='$gid'");
		
		if($res>0)
		{
			header("Location:addGalleryImage.php?msg=success");
		}
		else
		 {
			header("Location:addGalleryImage.php.php?msg=error");
		}
    }
    
?>