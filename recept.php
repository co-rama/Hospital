<?php require("fpdf181/fpdf.php"); ?>
<?php
$pdf = new FPDF('P', 'mm', 'A4');

$pdf->AddPage();
$pdf->SetFont("Arial", 'B', 14);

//cell width, height, text, border, endline, align

$pdf->Cell(80, 5, 'ST BERNADS HOSPITAL', 1, 0);
$pdf->Cell(40,  5, 'RECEIPT: NO', 1, 0); //end of the line

$pdf->SetFont("Arial", '', 12);
echo "<br>";
$pdf->Cell(130, 5, '[Street Address]', 1, 0);
$pdf->Cell(59,  5, '', 1, 0); //end of the line

$pdf->Cell(80, 5, 'City, Country,', 1, 0);
$pdf->Cell(20,  5, 'Date', 1, 0);
$pdf->Cell(20, 5, '[mm/dd/yyyy', 1, 0); // End of the line 


//$pdf->Cell(40,  5, 'Phone No:', 1, 0);
//$pdf->Cell(80, 5, 'ST BERNADS HOSPITAL', 1, 0);
//$pdf->Cell(40,  5, 'RECEIPT: NO', 1, 0);



$pdf->Output();
?>