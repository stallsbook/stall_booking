<?php
	include("../include/config.php"); 
	include("include/session.php"); 
	$cnn = new connection();

	if(isset($_POST['addCity']))
	{
		$cName = $_POST['cName'];
		$cStatus = 0;

		$insertST = array("cName" => $cName, "cStatus" => $cStatus);
		$insertData = $cnn -> insertRec($insertST, "city_master");

		if($insertData)
		{
			header("Location: addCity.php");
		}
	}
	if($_POST['cId'])
	{
		$cId = $_POST['cId'];

		$selectCat = $cnn ->getrows("SELECT *FROM city_master WHERE cId = '$cId'");
		$getCat = mysqli_fetch_array($selectCat);

		$data = array("cId" => $getCat['cId'],"cName" => $getCat['cName']);
		echo json_encode($data);
	}
	if(isset($_GET['deleteCate']))
	{
		$cId = $_GET['cId'];

		$deleteCT = $cnn -> updatedeleterows("DELETE FROM city_master WHERE cId = '$cId'");

		if($deleteCT)
		{
			header("Location: addCity.php");
		}	
	}
	if(isset($_POST['addCity1']))
	{
		$cId = $_POST['cId'];
		$cName = $_POST['cName1'];
		
		$updateState = $cnn -> updatedeleterows("UPDATE city_master SET cName = '$cName' WHERE cId= '$cId'");

		if($updateState)
		{
			header("Location: addCity.php");
		}
	}
?>