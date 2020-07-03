<?php 
	include('../server/server.php');
	$error  = array();

	if(isset($_POST['edit_submit'])){
		$code_ins 	= mysqli_real_escape_string($db, $_POST['code_ins']);
		$old_code 	= mysqli_real_escape_string($db, $_POST['old_code']);
		$name	 	= mysqli_real_escape_string($db, $_POST['name']);
		$surname	= mysqli_real_escape_string($db, $_POST['surname']);
		$cin 		= mysqli_real_escape_string($db, $_POST['cin']);
		$etab 	 	= mysqli_real_escape_string($db, $_POST['etab']);
		$date_exam	= mysqli_real_escape_string($db, $_POST['date_exam']);
		$hrs_exam 	= mysqli_real_escape_string($db, $_POST['hrs_exam']);
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


		$date = strtotime($date_exam);

        $new_date = date('n/j/Y', $date);

		if (count($error) == 0){

			$sql  = "UPDATE student SET code_inscription='$code_ins',name='$name',surname='$surname',cin='$cin',etablissement='$etab',date_exam='$new_date',heure_examen='$hrs_exam',university='$uni',exam_type='$exam_type',semester='$semester',session='$session',module='$module',formation='$forma',promotion='$promo',niveau='$niveau',year='$year',salle='$salle',emplacement='$emplace' WHERE code_inscription='$old_code'";

	  		$update = mysqli_query($db, $sql);
	  		if($update){
	  			header('location: ../dashboard.php?success=4');
	  		}
		}
	}