<?php 
	include('../server/server.php');

	if(isset($_POST['add_user'])){
		$username 	= mysqli_real_escape_string($db, $_POST['username']);
		$password 	= md5(mysqli_real_escape_string($db, $_POST['password']));
		$user_type	= mysqli_real_escape_string($db, $_POST['user_type']);

		$query = "SELECT username FROM user WHERE username='$username'";
		$result = mysqli_query($db, $query);
		if (mysqli_num_rows($result) == 1){
		  array_push($error, "Username already taken");
		  header('location: ../dashboard.php?error=3');
		}

		if (count($error) == 0){
			$sql  = "INSERT INTO user (username,password,user_type) VALUES ('$username','$password','$user_type')";
	  		$insert = mysqli_query($db, $sql);
	  		if($insert){
	  			header('location: ../dashboard.php?success=2');
	  		}
		}
	}

	