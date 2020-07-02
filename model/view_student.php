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

	$sql3		= "SELECT DISTINCT module FROM student";
	$result3	= mysqli_query($db, $sql3);
		// view all formation
	$sql4		= "SELECT DISTINCT exam_type FROM `student`";
	$result4	= mysqli_query($db, $sql4);

		// view all formation
	$sql5		= "SELECT DISTINCT semester FROM `student`";
	$result5	= mysqli_query($db, $sql5);

	$sql6		= "SELECT DISTINCT session FROM `student`";
	$result6	= mysqli_query($db, $sql6);

	$sql7		= "SELECT DISTINCT university FROM `student`";
	$result7	= mysqli_query($db, $sql7);

	$sql8		= "SELECT DISTINCT year FROM student";
	$result8	= mysqli_query($db, $sql8);


	$data = array();
	while ($row = mysqli_fetch_array($result1)) {
  		$data[] = $row;
  	}
  	$data1 = array();
	while ($row = mysqli_fetch_array($result2)) {
  		$data1[] = $row;
  	}

  	$sig = array();
	while ($row = mysqli_fetch_array($result3)) {
  		$sig[] = $row;
  	}
  	$sig1 = array();
	while ($row = mysqli_fetch_array($result4)) {
  		$sig1[] = $row;
  	}
  	$sig2 = array();
	while ($row = mysqli_fetch_array($result5)) {
  		$sig2[] = $row;
  	}
  	$sig3 = array();
	while ($row = mysqli_fetch_array($result6)) {
  		$sig3[] = $row;
  	}
  	$sig4 = array();
	while ($row = mysqli_fetch_array($result7)) {
  		$sig4[] = $row;
  	}
  	$sig5 = array();
	while ($row = mysqli_fetch_array($result8)) {
  		$sig5[] = $row;
  	}