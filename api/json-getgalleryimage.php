<?php
header('Access-Control-Allow-Origin: *');

    include("../include/config.php");
    $cn=new connection();
    $res = $cn->getrows("SELECT * FROM gallery_image");
    
    $galleryImage=array();
    $response=array();
    
    while($r = mysqli_fetch_assoc($res))
    {
        $galleryImage[] = $r;
    }
    if(!empty($galleryImage))
    {
        $response=array("responsecode"=>"1","message"=>"success","GalleryImage"=>$galleryImage);
        echo json_encode($response);
    }
    else
    {
        $response=array("responsecode"=>"0","message"=>"No Any Image In Gallery","GalleryImage"=>array());
        echo json_encode($response);
    }

?>