<?php
require('../1.libraries/fpdf184/fpdf.php');
 
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hola gente soy Jason!');
$pdf->Output();
?>