<?php
	include("../include/config.php"); 
	include("../include/session.php"); 
	$cnn = new connection();

	if(isset($_POST['addCategory']))
	{
		$cat_name = $_POST['cat_name'];
		$status = 0;

		$insertST = array("cat_name" => $cat_name, "status" => $status);
		$insertData = $cnn -> insertRec($insertST, "category_master");

		if($insertData)
		{
			header("Location: oaddEventCategory.php");
		}
	}
	if($_POST['cat_id'])
	{
		$cat_id = $_POST['cat_id'];

		$selectCat = $cnn ->getrows("SELECT *FROM category_master WHERE cat_id = '$cat_id'");
		$getCat = mysqli_fetch_array($selectCat);

		$data = array("cat_id" => $getCat['cat_id'],"cat_name" => $getCat['cat_name']);
		echo json_encode($data);
	}
	if(isset($_GET['deleteCate']))
	{
		$cat_id = $_GET['cat_id'];

		$deleteCT = $cnn -> updatedeleterows("DELETE FROM category_master WHERE cat_id = '$cat_id'");

		if($deleteCT)
		{
			header("Location: oaddEventCategory.php");
		}	
	}
	if(isset($_POST['addCategory1']))
	{
		$cat_id = $_POST['cat_id'];
		$cat_name = $_POST['cat_name1'];
		
		$updateState = $cnn -> updatedeleterows("UPDATE category_master SET cat_name = '$cat_name' WHERE cat_id = '$cat_id'");

		if($updateState)
		{
			header("Location: oaddEventCategory.php");
		}
	}
?>