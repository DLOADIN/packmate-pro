<?php
  require('../fpdf/fpdf.php');

  $pageWidth = 330; // Example: A4 width is 210mm
  $pdf = new FPDF('L', 'mm', array($pageWidth, 407)); // 'L' for landscape orientation
  // Custom page width (adjust as needed)
  $number=0;
 
  $pdf->AddPage();
  $customHeaderNames = array(
    $number++ => 'ID',
    'u_equipment' => 'EQUIPMENT NAME',
    'u_type' => 'TASK TYPE',
    's_date' => 'SCHEDULED DATE',
    'e_date' => 'END DATE',
    'status' => 'STATUS',
    'u_technician' => 'TECHNICIAN',
);

require '../connection.php';
$sql=mysqli_query($con," SELECT u_equipment, u_type, s_date, e_date, status, u_technician FROM `supply` ");
$tableName = "THE SUPPLY CHAIN REPORT";

// Set font
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(40, 10, '' . $tableName);

if ($sql->num_rows > 0) {
  // Display table headers
  $pdf->Ln(10); // Add a new line with spacing
  $pdf->SetFont('Arial', 'B', 12);
while ($fieldInfo = $sql->fetch_field()) {
  $header[] = $fieldInfo->name;
  // Adjust the width of the cell based on the column name
  $customName = isset($customHeaderNames[$fieldInfo->name]) ? $customHeaderNames[$fieldInfo->name] : $fieldInfo->name;
  $cellWidth = ($fieldInfo->name == 'u_name') ? 60 : 60;
  $pdf->Cell($cellWidth, 10, $customName, 1);
}
$pdf->Ln(); // Add extra spacing between headers and data

while ($row = $sql->fetch_assoc()) {
  foreach ($header as $col) {
      // Adjust the width of the cell based on the column name
      $cellWidth = ($col == 'u_name') ? 60 : 60;
      $pdf->Cell($cellWidth, 10, $row[$col], 1);
  }
  $pdf->Ln(); // Move to the next line for the next row
}
  $pdf->Output();
}
?>