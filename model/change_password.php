<?php 
	include('../server/server.php');

	$error		= array();
	if (isset($_POST['changepass'])){
		$username 		= mysqli_real_escape_string($db, $_POST['username']);
		$newpass 		= mysqli_real_escape_string($db, $_POST['new_pass']);
		$confirmpass	= mysqli_real_escape_string($db, $_POST['conf_pass']);
		
		$query 		= "SELECT * FROM user WHERE username = '$username'";
		$result 	= mysqli_query($db, $query);
		$row 		= mysqli_fetch_array($result);

		if ($newpass != $confirmpass){
			array_push($error, "The Password did not match!");
			$_SESSION['pass_error'] = array("The Password did not match!");
			header("location: ../dashboard.php?error=1");
		}
		if (md5($confirmpass) == $row['password'] AND md5($confirmpass) == $row['password']){
			array_push($error, "The Password is still the same! Nothing change.");
			header("location: ../dashboard.php?error=2");
		}

		if (count($error) == 0){
			$newpass = md5($confirmpass);
			$sql  = "UPDATE user SET password='$newpass' WHERE username = '$username'";
			$update = mysqli_query($db ,$sql);
			header("location: ../dashboard.php?success=1");
		}
}
