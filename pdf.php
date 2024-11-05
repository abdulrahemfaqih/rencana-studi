<?php
include_once 'database.php';
require_once 'libs/fpdf/fpdf.php';

$matakuliah = getAllDetailRencanaStudi();
$totalSks = array_sum(array_column($matakuliah, 'sks'));
$IPK = array_sum(array_column($matakuliah, 'bobot')) / count($matakuliah);

class PDF extends FPDF
{
  // Header function
  function Header()
  {
    // Select Arial bold 15
    $this->SetFont('Arial', 'B', 15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30, 10, 'Transkrip Nilai', 0, 0, 'C');
    // Line break
    $this->Ln(20);
  }

  // Footer function
  function Footer()
  {
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Select Arial italic 8
    $this->SetFont('Arial', 'I', 8);
    // Page number
    $this->Cell(0, 10, 'Page ' . $this->PageNo() . ' / {nb}', 0, 0, 'C');
  }
}

// Create new PDF instance
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// Set font
$pdf->SetFont('Arial', '', 12);

// Add table headers
$pdf->Cell(30, 10, 'Semester', 1, 0, 'C');
$pdf->Cell(60, 10, 'Matakuliah', 1, 0, 'C');
$pdf->Cell(20, 10, 'SKS', 1, 0, 'C');
$pdf->Cell(30, 10, 'Predikat', 1, 0, 'C');
$pdf->Cell(30, 10, 'Bobot', 1, 1, 'C');

// Add table rows
foreach ($matakuliah as $mk) {
  $pdf->Cell(30, 10, $mk['semester'], 1, 0, 'C');
  $pdf->Cell(60, 10, $mk['matakuliah'], 1, 0, 'C');
  $pdf->Cell(20, 10, $mk['sks'], 1, 0, 'C');
  $pdf->Cell(30, 10, $mk['predikat'], 1, 0, 'C');
  $pdf->Cell(30, 10, $mk['bobot'], 1, 1, 'C');
}

// Add total SKS row
$pdf->Cell(90, 10, 'Total SKS', 1, 0, 'R');
$pdf->Cell(80, 10, $totalSks, 1, 1, 'C');

// Add IPK row
$pdf->Cell(90, 10, 'IPK', 1, 0, 'R');
$pdf->Cell(80, 10, number_format($IPK, 2), 1, 1, 'C');

// Output the PDF
$pdf->Output();
