<?php 
	include('server/server.php');
	
	$sql = "SELECT * FROM student";
	$result	= mysqli_query($db, $sql);