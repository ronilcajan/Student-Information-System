<?php
    include('../server/server.php');
    require('../fpdf/mysql_table.php');
    
    class PDF extends FPDF
    {
        function Header(){
            global $title;
            global $module;
            global $salle;
            global $hrs_exam;
            global $new_date;
            global $header;
            // Arial bold 40
            $this->SetFont('Arial','B',16);
            // Calculate width of title and position

            $w = $this->GetStringWidth($title)+95;
            $this->SetX((-355-$w)/2);

            // Colors of frame, background and text
            $this->SetFillColor(34,43,53);
            $this->SetTextColor(236, 239, 244);
            // Title
            $this->Cell($w,30,$title,0,1,'C',true);
            $this->Subtitle($w);
            // $this->Ln(1);
            // $this->Cell($w,10,"-Liste de presence et de remise des copies-",1,1,'C',true);
            $this->Ln(5);
            $this->Salle($salle,$new_date,$hrs_exam);
            $this->Module($module);
            $this->TableHeader($header);
            parent::Header();
        }
         
        function Subtitle($w){
            $this->SetFont('Arial','B',12);
            $this->setY(28);
            $this->setX(15);
            $this->SetTextColor(236, 239, 244);
            $this->Cell($w,10,"-Liste de presence et de remise des copies-",0,1,'C',false);
            $this->Ln(1);
        }

        function Module($label){
            // Arial 12
            $this->SetFont('Arial','BU',10);
            // text color
            $this->SetTextColor(34,43,53);
            $this->SetFillColor(255, 255, 255);
            // Title
            $this->Cell(0,6,"Module : $label",0,1,'L',true);
            // Line break
            $this->Ln(4);
        }
        function Salle($label, $new_date,$hrs_exam ){
            $this->SetLeftMargin(15);
            // Arial 12
            $this->SetFont('Arial','BU',10);
            // text color
            $this->SetTextColor(34,43,53);
            $this->SetFillColor(255, 255, 255);
            // Title
            $this->Cell(0,6,"Salle 0$label: Samedi $new_date ( debut $hrs_exam)",0,1,'L',true);
            // Line break
            $this->Ln(1);
        }
           // Page footer
        function Footer(){

            // Position at 1.5 cm from bottom
            $this->SetY(-30);
            $this->SetX(-117);
            $this->Cell(102.5,23,"",1,1,'L',false);
            $this->SetY(-30);
            $this->SetX(-175.5);
            $this->Cell(57,23,"Emargement Responsable de salle",1,'L',false);
        }


        function TableHeader($header){
            // Colors, line width and bold font
            $this->SetFillColor(34,43,53);
            $this->SetTextColor(236, 239, 244);

            // $this->SetDrawColor(128,0,0);
            $this->SetLineWidth(.3);
            $this->SetFont('','B','10');
            // Header
            $w = array(10, 50,30,30,20,25,50,21,21,69);
            for($i=0;$i<count($header);$i++)
                $this->Cell($w[$i],10,$header[$i],0,0,'C',true);
            $this->Ln();

        }

        function FirstTable($data){
            
            
            $w = array(10, 50,30,30,20,25,50,21,21,69);
            // Color and font restoration
            $this->SetFillColor(224,235,255);
            $this->SetTextColor(0);
            $this->SetFont('');
            // Data
            $fill = false;
            $i=1;

            foreach($data as $row)
            {
                $this->Cell($w[0],6,$i,'B',0,'C',$fill);
                $this->Cell($w[1],6,$row['code_inscription'],'B',0,'L',$fill);
                $this->Cell($w[2],6,$row['name'],'B',0,'L',$fill);
                $this->Cell($w[3],6,$row['surname'],'B',0,'L',$fill);
                $this->Cell($w[4],6,$row['cin'],'B',0,'L',$fill);
                $this->Cell($w[5],6,$row['emplacement'],'B',0,'C',$fill);
                $this->Cell($w[6],6,'','LB',0,'C',$fill);
                $this->Cell($w[7],6,'','LB',0,'C',$fill);
                $this->Cell($w[8],6,'','LB',0,'C',$fill);
                $this->Cell($w[9],6,'','LRB', 0,'C',$fill);
                $this->Ln();
                $i++;
            }
            // Closing line
            $this->Cell(array_sum($w),0,'','T');
            $this->Ln();
        }
    }       
        if(isset($_POST['print_sig'])){

            $salle      = mysqli_real_escape_string($db, $_POST['salle']);
            $module     = mysqli_real_escape_string($db, $_POST['module']);
            $etab       = mysqli_real_escape_string($db, $_POST['etab']);
            $date_exam  = mysqli_real_escape_string($db, $_POST['date_exam']);
            $hrs_exam   = mysqli_real_escape_string($db, $_POST['hrs_exam']);
            $module     = mysqli_real_escape_string($db, $_POST['module']);
            $exam_type  = mysqli_real_escape_string($db, $_POST['exam_type']);
            $semestre   = mysqli_real_escape_string($db, $_POST['semester']);
            $session    = mysqli_real_escape_string($db, $_POST['session']);
            $year       = mysqli_real_escape_string($db, $_POST['year']);
            $uni        = mysqli_real_escape_string($db, $_POST['uni']);

            $date = strtotime($date_exam);

            $new_date = date('n/j/Y', $date);

            $header = array('NO', 'ID_Inscription', 'Nom', 'Prenom','NoCIN', 'Emplacement', "Emergement de presence", "Etudiants","Resp. Salle", "Emargement de remise des copies" );
            
            $title  = strtoupper($uni)."/".strtoupper($etab).": ".ucwords($exam_type)." ".ucfirst($semestre)." ".ucfirst($session).": Annee universitaire ".$year;
            $sql    = "SELECT code_inscription,name,surname,cin,emplacement FROM student WHERE etablissement='$etab' AND salle=$salle AND module='$module' AND date_exam='$new_date' AND heure_examen='$hrs_exam' AND exam_type='$exam_type' AND semester='$semestre' AND session='$session' AND year='$year' AND university='$uni'";

            $res    = mysqli_query($db,$sql);
            $datas = array();
            if(mysqli_num_rows($res)>0){

                while ($row = mysqli_fetch_array($res)) {
                    $datas[] = $row;
                }
                $pdf    = new PDF('L','mm','Legal');
                $pdf->AliasNbPages();
                $pdf->AddPage();
                $pdf->SetAutoPageBreak(true, 30);
                $pdf->FirstTable($datas);
                $pdf->AcceptPAgeBreak(true);
                $pdf->Output();


            }else{
                header('location: ../dashboard.php?not_found=1');
            }

        }else{
        
        header('location: ../dashboard.php');
    }

    // if(isset($_POST['print_aff'])){

    //     $salle = mysqli_real_escape_string($db, $_POST['salle']);
    //     $promotion = mysqli_real_escape_string($db, $_POST['promo']);
    //     $eta = mysqli_real_escape_string($db, $_POST['etab']);
    //     $formation = mysqli_real_escape_string($db, $_POST['form']);

    //     $sql="SELECT code_inscription,name,surname,emplacement FROM student WHERE etablissement='$eta' AND salle=$salle AND promotion='$promotion' AND formation='$formation'";
    //     $res = mysqli_query($db, $sql);

    //     if(mysqli_num_rows($res)>0){

    //         if($salle < 10){
    //             $title = 'Salle 0'.$salle;
    //         }else{
    //             $title = 'Salle '.$salle;
    //         }

    //         $pdf = new PDF();
    //         $pdf->AliasNbPages();
    //         $pdf->AddPage();

    //         $pdf->AddCol('NO',15,'NO','C');
    //         $pdf->AddCol('code_inscription',50,'ID_Inscription','L');
    //         $pdf->AddCol('name',40,'Nom','L');
    //         $pdf->AddCol('surname',40,'Prenom','L');
    //         $pdf->AddCol('emplacement',30,'Emplacement','C');
    //         $prop = array('HeaderColor'=>array(34,43,53));
    //         $pdf->Table($db,"SELECT code_inscription,name,surname,emplacement FROM student WHERE etablissement='$eta' AND salle=$salle AND promotion='$promotion' AND formation='$formation'",$prop);
    //         $pdf->Output();
        
    //     }else{
        
    //     header('location: ../dashboard.php?not_found=1');
    // }
    // }else{
        
    //     header('location: ../dashboard.php');
    // }

