<?php
    include("include/config.php");
    $cnn = new connection();
	session_start();

    if(isset($_POST['logged']))
    {
    	$email = $_POST['email'];
        $password = $_POST['password'];
        $user_type= $_POST['user_type'];
    	
    	if($user_type == 'Master')
	{	
		$query_login_admin = $cnn->countrow("SELECT * FROM user_master WHERE password='$password' AND(email='$email' OR mobile='$email') AND status='1' AND user_type='Master'");
		if($query_login_admin > 0)
		{
			$query_login = $cnn->getrows("SELECT * FROM user_master WHERE password='$password' AND(email='$email' OR mobile='$email') AND status='1' AND user_type='Master'");
				while($login = mysqli_fetch_assoc($query_login))
				{
					$_SESSION['first_name'] = $login['first_name'];
					$_SESSION['last_name'] = $login['last_name'];
					$_SESSION['username'] = $login['first_name']." ".$login['last_name'];
					$_SESSION['user_id'] = $login['user_id'];
					//$_SESSION['username'] = $login['first_name']." ".$login['last_name'];
					$_SESSION['email'] = $login['email'];
					$_SESSION['mobile'] = $login['mobile'];
					$_SESSION['password'] = $login['password'];
					$_SESSION['user_type'] = $login['user_type'];
					$_SESSION['status'] = $login['status'];
					$_SESSION['image'] = $login['image'];
				}
				if($_SESSION['user_type'] == 'Master')
				{
					echo "<script>";
					echo "window.location.href = 'superadmin/index.php';";
					echo "</script>";
				}
			
		}
		else
		{
			echo '<script>';
			echo 'alert("Please Enter Valid Email Or Password")';
			echo '</script>';
			echo "<script>window.location='index.php';</script>";
		}
	}
	if($user_type == 'Organizer')
	{
		$query_login_organizer = $cnn->countrow("SELECT * FROM user_master WHERE password='$password' AND(email='$email' OR mobile='$email') AND status='1' AND user_type='$user_type'");
		if($query_login_organizer > 0)
		{ 
			$query_login = $cnn->getrows("SELECT * FROM user_master WHERE password='$password' AND(email='$email' OR mobile='$email') AND status='1' AND user_type='$user_type'");
				while($login = mysqli_fetch_assoc($query_login))
				{
					$_SESSION['first_name'] = $login['first_name'];
					$_SESSION['last_name'] = $login['last_name'];
					$_SESSION['username'] = $login['first_name']." ".$login['last_name'];
					$_SESSION['user_id'] = $login['user_id'];
					//$_SESSION['username'] = $login['first_name']." ".$login['last_name'];
					$_SESSION['email'] = $login['email'];
					$_SESSION['mobile'] = $login['mobile'];
					$_SESSION['password'] = $login['password'];
					$_SESSION['user_type'] = $login['user_type'];
					$_SESSION['status'] = $login['status'];
					$_SESSION['image'] = $login['image'];
				}
				if($_SESSION['user_type'] == 'Organizer')
				{
					echo "<script>";
					echo "window.location.href = 'stall_live/index.php';";
					echo "</script>";
				}
			
		}
		else
		{
			echo "<script>";
			echo "window.location.href = 'stall_live/login.php';";
			echo 'alert("Please Enter Valid Email Or Password.")';
			echo "</script>";
		}
	}
	if($user_type == 'Vendor')
	{
		$query_login_organizer = $cnn->countrow("SELECT * FROM user_master WHERE password='$password' AND(email='$email' OR mobile='$email') AND status='1' AND user_type='$user_type'");
		if($query_login_organizer > 0)
		{ 
			$query_login = $cnn->getrows("SELECT * FROM user_master WHERE password='$password' AND(email='$email' OR mobile='$email') AND status='1' AND user_type='$user_type'");
				while($login = mysqli_fetch_assoc($query_login))
				{
					$_SESSION['first_name'] = $login['first_name'];
					$_SESSION['last_name'] = $login['last_name'];
					$_SESSION['username'] = $login['first_name']." ".$login['last_name'];
					$_SESSION['user_id'] = $login['user_id'];
					//$_SESSION['username'] = $login['first_name']." ".$login['last_name'];
					$_SESSION['email'] = $login['email'];
					$_SESSION['mobile'] = $login['mobile'];
					$_SESSION['password'] = $login['password'];
					$_SESSION['user_type'] = $login['user_type'];
					$_SESSION['status'] = $login['status'];
					$_SESSION['image'] = $login['image'];
				}
				if($_SESSION['user_type'] == 'Vendor')
				{
					echo '<script>';
					echo "window.location.href = 'stall_live/index.php';";
					echo '</script>';
				}
		}
		else
		{
			echo "<script>";
			echo "window.location.href = 'stall_live/login.php';";
			echo 'alert("Please Enter Valid Email Or Password.")';
			echo "</script>";
		}
	}
}
?>