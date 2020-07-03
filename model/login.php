<?php 
include('server/server.php');

if (isset($_POST['login'])){
	$username 	= mysqli_real_escape_string($db, $_POST['username']);
	$password	= md5(mysqli_real_escape_string($db, $_POST['password']));


	if($username != '' AND $password != ''){
		$query 		= "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
		
		$result 	= mysqli_query($db, $query);
		
		if(mysqli_num_rows($result) == 1){
			while ($row = mysqli_fetch_assoc($result)) {

				$_SESSION['username'] = $row['username'];
				$_SESSION['user_type'] = $row['user_type'];
				header('location: dashboard.php');
			}
		}else{
			$_SESSION['errors'] = array("Your username or password was incorrect.");
			header("location:login.php");
		}
	}else{
		$_SESSION['errors'] = array("Please fill all the fields.");
		header("location:login.php");
	}
}