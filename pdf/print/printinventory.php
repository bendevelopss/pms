<?php
require('../fpdf.php');
session_start();
require_once("dbcontroller.php");


$_SESSION["date"] = date("Y-m-d");



class PDF extends FPDF
{
// Load data
function LoadData($file)
{
	// Read file lines
	$lines = file($file);
	$data = array();
	foreach($lines as $line)
		$data[] = explode(';',trim($line));
	return $data;
}



function Header()
{
$this->Image('../../assets/img/logo.png' , 25 ,6, 30 , 28,'png');


$this->SetFont('Arial', 'B', 20);
$this->Cell(60, 8, '', 0);
$this->Cell(100, 8, 'PERSAN CONSTRUCTION, INC.', 0,0);
$this->Ln(5);
$this->SetFont('Arial', 'B', 10);
$this->Cell(79, 8, '', 0);
$this->Cell(100, 8, '249 Quirino Highway, Baesa, Quezon City', 0,'C');
$this->Ln(4);
$this->SetFont('Arial', 'B', 10);
$this->Cell(75, 8, '', 0);
$this->Cell(100, 8, 'Telephone No. 456-0883 / 453-7109 / 361-1448', 0,'C');
$this->Ln(4);
$this->SetFont('Arial', 'B', 10);
$this->Cell(97, 8, '', 0);
$this->Cell(100, 8, 'Fax No. :362-4025', 0,'C');
$this->Ln(4);
$this->SetFont('Arial', 'B', 10);
$this->Cell(80, 8, '', 0);

$this->Cell(100, 8, 'E-mail Address: persan_inc@yahoo.com', 0,'C');
$this->Ln(13);

	$this->SetFont('Arial','B',11);
	$this->Text(15,45,'___________________________________________________________________________________',0,0,'C');
	 $this->Ln(10); 
    $this->SetFont('Arial','B',20);
    $this->Text(80,54,'Inventory Report',0,0,'C');
	  $this->Ln(10); 
	  $this->SetFont('Arial','B',11);
	$this->Text(15,57,'___________________________________________________________________________________',0,0,'C');
  $this->SetFont('Arial','',11);
  $this->Text(15,65,'Date :',0,0,'C');
  $this->SetFont('Arial','u',11);
  $this->Text(32,65,''.$_SESSION['date'].'',0,0,'C');

}


// Simple table
function BasicTable($header, $itemArray)
{


    $this->Ln(15);
  // Column widths
  $w = array(20,30,23,25,20,20,33,25);
  // Header
  for($i=0;$i<count($header);$i++)
    $this->Cell($w[$i],8,$header[$i],1,0,'C');
  $this->Ln();
  // Data


$db_handle = new DBController();

$productByCode = $db_handle->runQuery("SELECT * FROM materials ");
/*$itemArray = array($productByCode[1]["code"]=>array('category'=>$productByCode[1]["category"], 'scategory_name'=>$productByCode[1]["scategory_name"], 'brand_name'=>$productByCode[1]["brand_name"], 'description'=>$productByCode[1]["description"], 'color'=>$productByCode[1]["color"], 'package'=>$productByCode[1]["package"], 'unit_measurement'=>$productByCode[1]["unit_measurement"], 'abbre'=>$productByCode[1]["abbre"], 'price'=>$productByCode[1]["price"], 'quantity'=>$productByCode[1]["quantity"]));*/


  foreach($productByCode as $item)
  {

    $this->Cell($w[0],6,''.$item['brand_name'].'',1,0,'C');
    $this->Cell($w[1],6,''.$item['category'].'',1,0,'C');
    $this->Cell($w[2],6,''.$item['scategory_name'].'',1,0,'C');
    $this->Cell($w[3],6,''.$item['description'].'',1,0,'C');
    $this->Cell($w[4],6,''.$item['color'].'',1,0,'C');
    $this->Cell($w[5],6,''.$item['package'].'',1,0,'C');
    $this->Cell($w[6],6,''.$item['unit_measurement'].''.$item['abbre'].'',1,0,'C');
    $this->Cell($w[7],6,''.$item['quantity'].'',1,0,'C');
    $this->Ln();
  }
  $this->Cell(array_sum($w),0,'','T');
}



function Footer()
{  $item_total = 0;
	
    $this->SetY(-15);

	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Page number
	$this->Cell(0,10,'Page '.$this->PageNo().' of {nb} ',0,0,'C');
}
}

$pdf = new PDF();
// Column headings
$header = array('Brand','Category', 'Sub-category','Description','Color' ,'Package', 'Unit Measurement','Quantity');
// Datloading
$data = $pdf->LoadData('countries.txt');
$pdf->SetFont('Arial','',10);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->BasicTable($header,$data);
$pdf->Output();
?>
 