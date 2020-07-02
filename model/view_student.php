<?php 
	include('server/server.php');
	
	// view student
	$sql 		= "SELECT * FROM student";
	$result		= mysqli_query($db, $sql);

	// view all formation
	$sql1		= "SELECT DISTINCT formation FROM student";
	$result1	= mysqli_query($db, $sql1);
		// view all formation
	$sql2		= "SELECT DISTINCT promotion FROM `student`";
	$result2	= mysqli_query($db, $sql2);

	$data = array();
	while ($row = mysqli_fetch_array($result1)) {
  		$data[] = $row;
  	}
  	$data1 = array();
	while ($row = mysqli_fetch_array($result2)) {
  		$data1[] = $row;
  	}