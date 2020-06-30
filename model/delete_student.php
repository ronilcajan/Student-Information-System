<?php include('../server/server.php');

	if(isset($_GET['code'])){ 
		$code	= $_GET['code'];
		$query = "DELETE FROM student WHERE code_inscription='$code'"; 
    	$delete = mysqli_query($db, $query);
    	if($delete){
 			$insert = mysqli_query($db,$logs);
			header("location: ../dashboard.php?success=4");
    	}else{
    		header("location: ../dashboard.php");
    	}
    }	