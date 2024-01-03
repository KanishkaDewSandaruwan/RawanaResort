<?php
require('plugin/pdf/fpdf.php');
include('../server/api.php');

class PDF extends FPDF
{
    // Load data
    function BasicTable()
    {
        $data = getBille($_REQUEST['booking_id']);

        $sum = 0;
        if ($row = mysqli_fetch_assoc($data)) {
            $sum++;
            $this->Ln();
            $this->Cell(70, 6, 'Booking Reference : #' . $row['booking_id']);
            $this->Ln();
            $this->Cell(70, 6, 'Customer Name : ' . $row['name']);
            $this->Ln();
            $this->Cell(70, 6, 'Customer Email : ' . $row['email']);
            $this->Ln();
            $this->Cell(70, 6, 'Customer Phone Number : ' . $row['phone']);
            $this->Ln();
            $this->Cell(70, 6, 'Booked Date : ' . $row['date_updated']);
            $this->Ln();
            $this->Ln();
            $this->Cell(70, 6, 'Arrival Date : ' . $row['arrival_date']);
            $this->Ln();
            $this->Cell(70, 6, 'Depature Date : ' . $row['departure_date']);
            $this->Ln();
            $this->Cell(70, 6, 'Occupancy: ' . $row['booking_occupancy']);
            $this->Ln();
            $this->Ln();
            $this->Cell(60, 10, 'Total Amount : Rs.' . $row['total'] . '.00');
        }

    }

}

$pdf = new PDF();
// Column headings
// Data loading
$pdf->SetFont('Arial', '', 14);
$pdf->AddPage();
$pdf->Cell(80);
$pdf->Cell(30,10,'Rawana Hotel - Bill',2,0,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(15);
$pdf->Cell(4,10, date("Y/m/d"),2,0,'C');
$pdf->Ln();
$pdf->BasicTable();
$pdf->Output();
?>