<?php
require('fpdf/fpdf.php');
include("db.php");
$about = $con->query('SELECT * FROM about WHERE id = 1')->fetch_assoc();

$pdf = new FPDF('p', 'mm', 'A4');
$pdf->AddPage();
// $pdf->Image('Images/logo.jpeg', 10, 35, 60, 60);
$pdf->SetFont('Times', 'B', 28);
$pdf->SetTextColor(0, 100, 200);
$pdf->SetX(10);
$pdf->MultiCell(60, 10, "Sulabh Nepal", 'B', 'L');
$pdf->SetFont('Times', 'B', 18);
$pdf->SetTextColor(255, 135, 00);
// $pdf->SetX(10);
$pdf->MultiCell(60, 10, $about['title'], 0, 'C');
$pdf->ln(10);
$pdf->SetFont('Times', 'B', 20);
$pdf->SetTextColor(0, 135, 255);
$pdf->MultiCell(60, 10, "Personal Info", 'B', 'L');
$pdf->SetFont('Times', '', 12);
$pdf->SetTextColor(0, 0, 0);
// " Facebook: " . $about['fb'] . " Twitter: " . $about['tw'] . " Github: " . $about['git']
$msg = "Email: " . $about['email'] . "  Phone: " . $about['phone'];
$pdf->MultiCell(60, 5, "Email: " . $about['email'], 0, 'L');
$pdf->Ln();
$pdf->MultiCell(60, 5, "Phone: " . $about['phone'], 0, 'L');
// $pdf->Ln();
// $pdf->MultiCell(60, 5, "Twitter: " . $about['tw'], 0, 'L');
// $pdf->Ln();
// $pdf->MultiCell(60, 5, "Instagram: " . $about['ig'], 0, 'L');
$pdf->Ln();
$pdf->MultiCell(60, 5, "GitHub: " . $about['git'], 0, 'L');
$pdf->ln(10);
$pdf->SetFont('Times', 'B', 20);
$pdf->SetTextColor(0, 135, 255);
$pdf->MultiCell(60, 10, "Skills", 'B', 'L');

$pdf->SetFont('Times', 'B', 12);
$pdf->SetTextColor(0, 0, 0);

$sql = "SELECT * FROM skills WHERE value >= 70 ORDER BY value DESC";
$result = $con->query($sql);
$i = 110;
$pdf->SetLineWidth(5);
while ($row = $result->fetch_assoc()) {
    $pdf->MultiCell(60, 5, $row['name'], 0, 'L');
    $pdf->ln();
    $pdf->SetDrawColor(150, 150, 150);
    $pdf->Line(15, $i, 65, $i);
    $pdf->SetDrawColor(255, 158, 0);
    $pdf->Line(15, $i, 0.65 * $row['value'], $i);
    $pdf->ln();
    $i += 15;
}
// $pdf->ln(10);
$pdf->SetDrawColor(0, 0, 0);
$pdf->SetLineWidth(0);
$pdf->SetFont('Times', 'B', 20);
$pdf->SetTextColor(0, 135, 255);
$pdf->MultiCell(60, 10, "Expirences", 'B', 'L');
$sql = "SELECT * FROM expirences";
$result = $con->query($sql);
$pdf->SetTextColor(0, 0, 0);
while ($row = $result->fetch_assoc()) {
    $pdf->SetFont('Times', 'B', 12);
    $pdf->MultiCell(60, 5, $row['position'], 0, 'L');
    $pdf->SetFont('Times', 'I', 10);
    $pdf->MultiCell(60, 5, $row['name'], 0, 'C');
    $pdf->Ln();
}

$pdf->SetXY(120, 0);
$pdf->MultiCell(80, 5, "This CV is Dynamically made via Website's data", 'B', 'R');
$pdf->SetXY(80, 14);
$pdf->SetFont('Times', 'B', 20);
$pdf->SetTextColor(0, 135, 255);
$pdf->MultiCell(60, 10, "About Me", 'B', 'L');
$pdf->SetFont('Times', '', 12);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetX(80);
$pdf->MultiCell(120, 5, $about['second_message'], 0, 'J');
$pdf->SetX(80);

$pdf->SetFont('Times', 'B', 20);
$pdf->SetTextColor(0, 135, 255);
$pdf->MultiCell(80, 10, "Projects I Worked on", 'B', 'L');

$sql = "SELECT * FROM projects";
$result = $con->query($sql);
$pdf->SetTextColor(0, 0, 0);
$i = 0;
$j = 0;
$y[0] = $pdf->GetY();
$y[65] = $pdf->GetY();
while ($row = $result->fetch_assoc()) {
    $pdf->SetXY(80 + $j, $y[$j]);
    $pdf->SetFont('Times', 'B', 12);
    $pdf->MultiCell(55, 5, $row['name'], 0, 'L');
    $pdf->SetX(85 + $i);
    $pdf->SetFont('Times', 'I', 10);
    $pdf->MultiCell(50, 5, $row['link'], 0, 'L');
    $pdf->SetX(85 + $i);
    $pdf->SetFont('Times', '', 10);
    $pdf->MultiCell(50, 5, $row['details'], 0, 'J');
    $pdf->Ln();
    if ($i == 0) {
        $y[0] = $pdf->GetY();
        $i = 60;
        $j = 65;
    } else {
        $i = 0;
        $j = 0;
        $y[65] = $pdf->GetY();
    }
    if ($y[0] <= $y[65]) {
        $i = 0;
        $j = 0;
    } else {
        $i = 60;
        $j = 65;
    }
}

// $y = $pdf->GetY();
if ($y[0] < $y[65]) {
    $y = $y[65];
} else {
    $y = $y[0];
}
$pdf->SetXY(80, $y);

$pdf->SetFont('Times', 'B', 20);
$pdf->SetTextColor(0, 135, 255);
$pdf->MultiCell(100, 10, "Some Words of Appericiation", 'B', 'L');
$sql = "SELECT * FROM testimonials";
$result = $con->query($sql);
$pdf->SetTextColor(0, 0, 0);
while ($row = $result->fetch_assoc()) {
    $pdf->SetX(80);
    $pdf->SetFont('Times', 'B', 12);
    $pdf->MultiCell(55, 5, $row['name'], 0, 'L');
    $pdf->SetX(85);
    $pdf->SetFont('Times', 'I', 10);
    $pdf->MultiCell(110, 5, $row['position'], 0, 'L');
    $pdf->SetX(85);
    $pdf->SetFont('Times', '', 10);
    $pdf->MultiCell(110, 5, $row['message'], 0, 'J');
    $pdf->Ln();
}

$pdf->Output();
