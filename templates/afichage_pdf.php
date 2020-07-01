<?php
    include('../server/server.php');
    require('../fpdf/mysql_table.php');

    class PDF extends PDF_MySQL_Table
    {
        function Header(){
            global $title;
            global $promotion;
            global $eta;
            // Arial bold 40
            $this->SetFont('Helvetica','B',40);
            // Calculate width of title and position
            $w = $this->GetStringWidth($title)+124;
            $this->SetX((210-$w)/2);
            // Colors of frame, background and text
            $this->SetFillColor(34,43,53);
            $this->SetTextColor(236, 239, 244);
            // Thickness of frame (1 mm)
            // Title
            $this->Cell($w,14,$title,1,1,'C',true);
            // Line break
            $this->Ln(5);
            $this->Etablissement($eta);
            $this->Promotion($promotion);
            parent::Header();
        }
            // Page footer
        function Footer(){
            // Position at 1.5 cm from bottom
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Page number
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }

        function Promotion($label){
            $this->SetLeftMargin(20);
            // Arial 12
            $this->SetFont('Helvetica','BU',11);
            // text color
            $this->SetTextColor(34,43,53);
            $this->SetFillColor(255, 255, 255);
            // Title
            $this->Cell(0,6,"Promotion : $label",0,1,'L',true);
            // Line break
            $this->Ln(4);
        }
        function Etablissement($label){
            $this->SetLeftMargin(20);
            // Arial 12
            $this->SetFont('Helvetica','BU',11);
            // text color
            $this->SetTextColor(34,43,53);
            $this->SetFillColor(255, 255, 255);
            // Title
            $this->Cell(0,6,"Etablissement : $label",0,1,'L',true);
            // Line break
            $this->Ln(1);
        }
    }

    if(isset($_POST['print_aff'])){

        $salle = mysqli_real_escape_string($db, $_POST['salle']);
        $promotion = mysqli_real_escape_string($db, $_POST['promo']);
        $eta = mysqli_real_escape_string($db, $_POST['etab']);
        $formation = mysqli_real_escape_string($db, $_POST['form']);

        if($salle < 10){
            $title = 'Salle 0'.$salle;
        }else{
            $title = 'Salle '.$salle;
        }

        $pdf = new PDF();
        $pdf->AliasNbPages();
        $title = 'Salle 05';
        $pdf->AddPage();
        // Second table: specify 5 columns
        // $pdf->AddCol('NO',15,'NO','C');
        $pdf->AddCol('NO',15,'NO','C');
        $pdf->AddCol('code_inscription',50,'ID_Inscription','L');
        $pdf->AddCol('name',40,'Name','L');
        $pdf->AddCol('surname',40,'Prename','L');
        $pdf->AddCol('emplacement',30,'Emplacement','C');
        $prop = array('HeaderColor'=>array(34,43,53));
        $pdf->Table($db,"SELECT code_inscription,name,surname,emplacement FROM student WHERE etablissement='$eta' AND salle=$salle AND promotion='$promotion' AND formation='$formation'",$prop);
        $pdf->Output();

    }else{
        
        header('location: ../dashboard.php');
    }

