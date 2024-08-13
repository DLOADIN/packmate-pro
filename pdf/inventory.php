<?php
  require('../fpdf/fpdf.php');

  $pageWidth = 435; // Example: A4 width is 210mm
  $pdf = new FPDF('L', 'mm', array($pageWidth, 297)); // 'L' for landscape orientation
  // Custom page width (adjust as needed)
  $number=0;
 
  $pdf->AddPage();
  $customHeaderNames = array(
    $number++ => 'ID',
    'raw_material' => 'RAW MATERIAL',
    'current_stock' => 'CURRENT STOCK ',
    'reorder_point' => 'RE-ORDER POINT ',
    'supplier' => 'SUPPLIER',
    'lead_time' => 'LEAD TIME (Days)',
    'safety_stock' => 'SAFETY STOCK',
);

$con=mysqli_connect('localhost','root','','cementcraft');
$sql=mysqli_query($con," SELECT raw_material, current_stock, 	reorder_point, supplier, lead_time, safety_stock  FROM `inventory`");
$tableName = "ALL PRODUCTION REPORT";

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
  $cellWidth = ($fieldInfo->name == 'u_toolname') ? 70 : 70;
  $pdf->Cell($cellWidth, 10, $customName, 1);
}
$pdf->Ln(); // Add extra spacing between headers and data

while ($row = $sql->fetch_assoc()) {
  foreach ($header as $col) {
      // Adjust the width of the cell based on the column name
      $cellWidth = ($col == 'u_toolname') ? 70 : 70;
      $pdf->Cell($cellWidth, 10, $row[$col], 1);
  }
  $pdf->Ln(); // Move to the next line for the next row
}
  $pdf->Output();
}
?>