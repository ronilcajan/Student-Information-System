<?php

	$database	= 'university';
	$username	= 'root';
	$host		= 'localhost';
	$password	= '';
	$msg 		= '';

	ini_set('display_errors',1);
	error_reporting(E_ALL);
	mysqli_report(MYSQLI_REPORT_ERROR | E_DEPRECATED);

	$db = mysqli_connect($host,$username,$password,$database);

	if($db == false){
		die("Connection Failed: ".mysql_connect_error());
	}