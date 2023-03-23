<?php
session_start();
include 'db.php';
require('./fpdf.php');

class PDF extends FPDF {
  
    // Page header
    function Header() {
         // Add logo to page
        //  $this->Image('logo.png',10,8,33);
        // Set font family to Arial bold 
        $this->SetFont('Arial','B',16);
        // Add a top margin of 10 units
        $this->SetY(10);
        // Display the text in the center of the page
        $this->Cell(0,10,'STEPSOUT',0,0,'C'); 
         // Add a line break
         $this->Ln(10);
        $this->Cell(0,10,' Users List',0,0,'C');
        $this->Ln(10);
        // Add the date and time
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 10, 'Generated on: ' . date('Y-m-d H:i:s'), 0, 0, 'R');
        // Add a line break
        $this->Ln(20);
    }

    // Page footer
    function Footer() {
          
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
          
        // Arial italic 8
        $this->SetFont('Arial','I',8);
          
        // Page number
        // $this->Cell(0,10,'Page ' . 
        //     $this->PageNo() . '/{nb}',0,0,'C');
    }
}

// Select data from MySQL database
$select = "SELECT `name`,`username`,`mobile_number`,`email`,`address` FROM auth";
$result = $connection->query($select);

// Create a new PDF object
$pdf = new PDF();

// Add a new page with the header
$pdf->AddPage('P', 'A4');
$pdf->Header();

// Define column widths
$width_cell=array(25,25,42,35,65);

// Set font family and size
$pdf->SetFont('Arial','',12);

// Background color of header
$pdf->SetFillColor(193,229,252);

// Print headers
// $pdf->Cell($width_cell[0],10,'ID',1,0,'C',true);
// $pdf->Cell($width_cell[0],10,'image',1,0,'C',true); 

$pdf->Cell($width_cell[0],10,'Name',1,0,'C',true);
$pdf->Cell($width_cell[1],10,'Username',1,0,'C',true);
$pdf->Cell($width_cell[2],10,'Address',1,0,'C',true); 
$pdf->Cell($width_cell[3],10,'Phone',1,0,'C',true); 
$pdf->Cell($width_cell[4],10,'Email id',1,1,'C',true); 
// $pdf->Cell($width_cell[5],10,'District',1,1,'C',true); 
// $pdf->Cell($width_cell[5],10,'image',1,1,'C',true); 
// Print data from MySQL
while($row = $result->fetch_object()){
    // $id = $row->id;
    $name = $row->name;
    $username = $row->username;
    $address = $row->address;
    $phone = $row->mobile_number;
    $email = $row->email;
    
    // $pdf->Cell($width_cell[0],10,$id,1);
    // $pdf->Cell($width_cell[0], 10, $pdf->Image('dealers_photo/' . $image, $pdf->GetX(), $pdf->GetY(), 10), 1, 0, 'C', false);

    $pdf->Cell($width_cell[0],10,$name,1);
    $pdf->Cell($width_cell[1],10,$username,1);
    $pdf->Cell($width_cell[2],10,$address,1);
    $pdf->Cell($width_cell[3],10,$phone,1);
    $pdf->Cell($width_cell[4],10,$email,1);
    // $pdf->Cell($width_cell[5],10,$district,1);
    // Add new cell for image
    
    $pdf->Ln();
}

  

// Output the PDF document
$pdf->Output('output.php','I');
?>
