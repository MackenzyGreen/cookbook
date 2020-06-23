<?php 

    require("./fpdf/fpdf.php");


    class PDF extends FPDF
    {
    
    function Header()
    {

        $server='localhost';
        $user='sammy';
        $pwd='Bismarck0024!';
        $dbase = "cookbook";

        $conn = mysqli_connect($server, $user, $pwd, $dbase);

        $query = "SELECT title, recipes.desc FROM recipes WHERE share_code = '{$_GET['id']}'";
        $results = mysqli_query($conn, $query);
        $row=mysqli_fetch_array($results);

        
        $this->SetFont('Arial','BU',28);
        $this->SetXY(10,5);
        
        $this->Cell(190,15,$row['title'],0,1,'C');
        $this->setX(10);
        $this->SetFont('Arial','I',14);
        $this->MultiCell(190, 8, $row['desc'], 0, 'C');
    }
    
    
    function Footer()
    {
        
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    }
    
    $server='localhost';
    $user='sammy';
    $pwd='Bismarck0024!';
    $dbase = "cookbook";

    $conn = mysqli_connect($server, $user, $pwd, $dbase);

    $query = "SELECT dish_type, prep_time, cook_time, ingredients, directions FROM recipes WHERE share_code = '{$_GET['id']}'";
    $results = mysqli_query($conn, $query);
    $row=mysqli_fetch_array($results);

    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Times','',12);
    
    $pdf->Cell(63, 5, "{$row['dish_type']}", 1, 0, 'C');
    $pdf->Cell(63, 5, "Prep: {$row['prep_time']}", 1, 0, 'C');
    $pdf->Cell(63, 5, "Cook: {$row['cook_time']}", 1, 1, 'C');

    $completeList = explode("+$+", $row['ingredients']);
    $even = count($completeList)%2;

    if(count($completeList)==1){
        $firstHalf = $completeList[0];
        $secondHalf = " \n";
    }else if($even==0){
        $half = count($completeList)/2;
        $firstHalf= "";
        $secondHalf="";
        for($i=0; $i<$half; $i++){
            if($i!=$half-1)
                $firstHalf.=$completeList[$i]."\n";
            else
                $firstHalf.=$completeList[$i];
        }

        for($i=$half; $i<count($completeList); $i++){
            if($i!=count($completeList)-1)
                $secondHalf.=$completeList[$i]."\n";
            else
                $secondHalf.=$completeList[$i];
        }
    }else{
        $half = (intdiv(count($completeList), 2))+1;
        $firstHalf= "";
        $secondHalf="";
        for($i=0; $i<$half; $i++){
            if($i!=$half-1)
                $firstHalf.=$completeList[$i]."\n";
            else
                $firstHalf.=$completeList[$i];
        }

        for($i=$half; $i<count($completeList); $i++){
            if($i!=count($completeList)-1)
                $secondHalf.=$completeList[$i]."\n";
            else
                $secondHalf.=$completeList[$i];
        }
    }

    $pdf->setX(10);
    $pdf->SetFont('Times','B',14);
    $pdf->Cell(190,15,'Ingredients',0,1,'C');
    $pdf->SetFont('Times','',12);
    $pdf->setX(20);
    $x=$pdf->GetX();
    $y=$pdf->getY();
    $pdf->MultiCell(85, 7, $firstHalf, 'R', 'C');
    $pdf->SetXY(($x+85), $y);
    $pdf->MultiCell(85, 7, $secondHalf, 0, 'C');
    $pdf->Ln(20);

    $directions = str_replace("+$+", ". ", $row['directions']);
    $directions = str_replace("..", ".", $directions);

    $pdf->setX(10);
    $pdf->SetFont('Times','B',14);
    $pdf->Cell(190,15,'Directions',0,1,'C');
    $pdf->SetFont('Times','',12);
    $pdf->MultiCell(190, 6, $directions, 0, 'C');
    

    $pdf->Output();

?>