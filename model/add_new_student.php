<?php 
	include('../server/server.php');
	$error  = array();

	if(isset($_POST['add_user'])){
		$code_ins 	= mysqli_real_escape_string($db, $_POST['code_ins']);
		$name	 	= mysqli_real_escape_string($db, $_POST['name']);
		$surname	= mysqli_real_escape_string($db, $_POST['surname']);
		$cin 		= mysqli_real_escape_string($db, $_POST['cin']);
		$etab 	 	= mysqli_real_escape_string($db, $_POST['etab']);
		$date_exam	= mysqli_real_escape_string($db, $_POST['date_exam']);
		$hrs_exam1 	= mysqli_real_escape_string($db, $_POST['hrs_exam1']);
		$hrs_exam2 	= mysqli_real_escape_string($db, $_POST['hrs_exam2']);
		$uni	 	= mysqli_real_escape_string($db, $_POST['university']);
		$exam_type	= mysqli_real_escape_string($db, $_POST['exam_type']);
		$semester 	= mysqli_real_escape_string($db, $_POST['semester']);
		$session 	= mysqli_real_escape_string($db, $_POST['session']);
		$module 	= mysqli_real_escape_string($db, $_POST['module']);
		$forma  	= mysqli_real_escape_string($db, $_POST['formation']);
		$promo  	= mysqli_real_escape_string($db, $_POST['promotion']);
		$niveau	 	= mysqli_real_escape_string($db, $_POST['niveau']);
		$year 		= mysqli_real_escape_string($db, $_POST['year']);
		$salle		= mysqli_real_escape_string($db, $_POST['salle']);
		$emplace	= mysqli_real_escape_string($db, $_POST['emplacement']);

		$hrs_exam 	= $hrs_exam1."H".$hrs_exam2."min";
		$sem 		= "Semestre ".$semester;
		$ses 		= "session ".$session;

		$date = strtotime($date_exam);

        $new_date = date('n/j/Y', $date);

		$query = "SELECT code_inscription FROM student WHERE code_inscription='$code_ins'";
		$result = mysqli_query($db, $query);
		if (mysqli_num_rows($result) == 1){
		  array_push($error, "Username already taken");
		  header('location: ../add_student.php?error=4');
		}

		if (count($error) == 0){
			$sql  = "INSERT INTO student (code_inscription,name,surname,cin,etablissement,date_exam,heure_examen,university,exam_type,semester,session,module,formation,promotion,niveau,year,salle,emplacement) VALUES ('$code_ins','$name','$surname','$cin','$etab','$new_date','$hrs_exam','$uni','$exam_type','$sem','$ses','$module','$forma','$promo','$niveau','$year','$salle','$emplace')";
	  		$insert = mysqli_query($db, $sql);
	  		if($insert){
	  			header('location: ../dashboard.php?success=3');
	  		}
		}
	}