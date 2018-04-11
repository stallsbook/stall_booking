<?php 
    include("../include/config.php");
    include("include/session.php");
    $cnn = new connection();

    if(isset($_POST['testimonial']))
    { 
        $t_name = $_POST['t_name'];
        $t_desc = $_POST['t_desc'];

        $file_type1 = time().$_FILES["image"]["name"];
        $path= 'images/testimonial/'.$file_type1;
		$src = $_FILES["image"]["tmp_name"];
		$dest = $_FILES["image"]["name"];
		move_uploaded_file($src,"../images/testimonial/".$file_type1);
		$bo_file1= substr("$file_type1",-3);;

        $data=array("t_name" => $t_name,"t_desc" => $t_desc,"t_image"=>$path);
        $res=$cnn->insertRec($data,"testimonial"); 

        if($res>0)
		{
			header("location:addTestimonial.php?msg=success");
		}
		else
		{
			header("location:addTestimonial.php?msg=error");
		}
    }
    
    if($_POST['t_id'])
	{
		$t_id = $_POST['t_id'];
        
		$selectTest = $cnn ->getrows("SELECT * FROM testimonial WHERE t_id = '$t_id'");
		$gettest = mysqli_fetch_array($selectTest);

		$data = array("t_id" => $gettest['t_id'],"t_desc" => $gettest['t_desc'],"t_name" => $gettest['t_name'],"t_image" => $gettest['t_image']);
		echo json_encode($data);
    }
    if(isset($_GET["t_id"]))
	{
		$t_id=$_GET["t_id"];
		$res=$cnn->updatedeleterows("delete from testimonial where t_id='$t_id'");
		
		if($res>0)
		{
			header("Location:addTestimonial.php?msg=success");
		}
		else
		 {
			header("Location:addTestimonial.php?msg=error");
		}
    }

    if(isset($_POST['testimonial1']))
	{
		$t_id= $_POST['t_id'];
        $t_name = $_POST['t_name1'];
        $t_desc = $_POST['t_desc1'];
		$t_image = time().$_FILES['t_image1']['name'];
        
       
        if($_FILES["t_image1"]["name"] != "")
		{
            $file_type1 = time().$_FILES["t_image1"]["name"];
            $path = "images/testimonial/".$file_type1;
            $updateuser = $cnn -> updatedeleterows("UPDATE testimonial SET t_name = '$t_name',t_desc = '$t_desc',t_image = '$path' WHERE t_id = '$t_id'");
            $path1 = "../images/testimonial/";
		    move_uploaded_file($_FILES["t_image1"]["tmp_name"],$path1.$file_type1);
        }
        else
		{
		$updateuser = $cnn -> updatedeleterows("UPDATE testimonial SET t_name = '$t_name',t_desc = '$t_desc' WHERE t_id = '$t_id'");
        }
        

        if($updateuser)
        {
            header("Location: addTestimonial.php");
        }
    }
?>