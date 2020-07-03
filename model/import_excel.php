<?php
include('../server/server.php');

use \PhpOffice\PhpSpreadsheet\Reader\Xlsx;
require_once ('../vendor/autoload.php');
$error  = array();
if (isset($_POST["import"])) {

    $allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];

    if (in_array($_FILES["file"]["type"], $allowedFileType)) {

        $targetPath = '../uploads/' . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadSheet = $Reader->load($targetPath);
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        $sheetCount = count($spreadSheetAry);
        
        $row=1;
   
        for ($i = 0; $i <= $sheetCount; $i++) {

            if (isset($spreadSheetAry[$i][0])) {
                $code = mysqli_real_escape_string($db, $spreadSheetAry[$i][0]);
            }
            if (isset($spreadSheetAry[$i][1])) {
                $name = mysqli_real_escape_string($db, $spreadSheetAry[$i][1]);
            }
            if (isset($spreadSheetAry[$i][2])) {
                $surname = mysqli_real_escape_string($db, $spreadSheetAry[$i][2]);
            }
            if (isset($spreadSheetAry[$i][3])) {
                $cin = mysqli_real_escape_string($db, $spreadSheetAry[$i][3]);
            }
            if (isset($spreadSheetAry[$i][4])) {
                $etab = mysqli_real_escape_string($db, $spreadSheetAry[$i][4]);
            }
            if (isset($spreadSheetAry[$i][5])) {
                $date_exam = mysqli_real_escape_string($db, $spreadSheetAry[$i][5]);
            }
            if (isset($spreadSheetAry[$i][6])) {
                $hrs_exam = mysqli_real_escape_string($db, $spreadSheetAry[$i][6]);
            }
            if (isset($spreadSheetAry[$i][7])) {
                $uni = mysqli_real_escape_string($db, $spreadSheetAry[$i][7]);
            }
            if (isset($spreadSheetAry[$i][8])) {
                $exam_type = mysqli_real_escape_string($db, $spreadSheetAry[$i][8]);
            }
            if (isset($spreadSheetAry[$i][9])) {
                $semester = mysqli_real_escape_string($db, $spreadSheetAry[$i][9]);
            }
            if (isset($spreadSheetAry[$i][10])) {
                $session = mysqli_real_escape_string($db, $spreadSheetAry[$i][10]);
            }
            if (isset($spreadSheetAry[$i][11])) {
                $module = mysqli_real_escape_string($db, $spreadSheetAry[$i][11]);
            }
            if (isset($spreadSheetAry[$i][12])) {
                $forma = mysqli_real_escape_string($db, $spreadSheetAry[$i][12]);
            }
            if (isset($spreadSheetAry[$i][13])) {
                $promo = mysqli_real_escape_string($db, $spreadSheetAry[$i][13]);
            }
            if (isset($spreadSheetAry[$i][14])) {
                $niveau = mysqli_real_escape_string($db, $spreadSheetAry[$i][14]);
            }
            if (isset($spreadSheetAry[$i][15])) {
                $year = mysqli_real_escape_string($db, $spreadSheetAry[$i][15]);
            }
            if (isset($spreadSheetAry[$i][16])) {
                $salle = mysqli_real_escape_string($db, $spreadSheetAry[$i][16]);
            }
            if (isset($spreadSheetAry[$i][17])) {
                $emplace = mysqli_real_escape_string($db, $spreadSheetAry[$i][17]);
            }

            if($row==1){
            	$row++;
            	continue;
            }else{


	            if(!empty($name) || !empty($code) || !empty($surname) || !empty($cin) || !empty($etab) || !empty($date_exam) || !empty($hrs_exam) || !empty($uni) || !empty($exam_type) || !empty($semester) || !empty($session) || !empty($module) || !empty($forma) || !empty($promo) || !empty($niveau) || !empty($year) || !empty($salle) || !empty($emplace)) {

	                $sql  = "INSERT INTO `student` (code_inscription, name, surname, cin, etablissement, date_exam, heure_examen, university, exam_type, semester,`session`, module, formation, promotion, niveau, year, salle, emplacement) VALUES ('".$code."','".$name."','".$surname."','".$cin."','".$etab."','".$date_exam."','".$hrs_exam."','".$uni."','".$exam_type."','".$semester."','".$session."','".$module."','".$forma."','".$promo."',".$niveau.",'".$year."',".$salle.",".$emplace.")";

	                $result = mysqli_query($db, $sql);
	            }
        	}
        }
        header("location: ../dashboard.php?success");
    }
}
?>