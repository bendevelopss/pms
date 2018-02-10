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
  
$db_handle = new DBController();

//$productByCode = $db_handle->runQuery("SELECT * FROM quotation_cart where quote_no= ".$_GET['id']." ");

 $content2=mysql_query("SELECT * FROM supplier where supplier_no= ".$_GET['id']." ");
 $row=mysql_fetch_array($content2);

  // Logo
  //$this->Image('logo.png',10,6,30);
  // Arial bold 15
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
  $this->Text(130,37,'Purchase Order No. :',0,0,'l');
  $this->SetFont('Arial','u',11);
  $this->Text(170,37,'PO-000'.$_GET['po_no'].'',0,0,'l');

  $this->Ln(30); 
  $this->SetFont('Arial','B',11);
  $this->Text(15,45,'___________________________________________________________________________________',0,0,'C');
   $this->Ln(10); 
    $this->SetFont('Arial','B',20);
    $this->Text(90,54,'Purchase Order',0,0,'C');
    $this->Ln(10); 
    $this->SetFont('Arial','B',11);
  $this->Text(15,57,'___________________________________________________________________________________',0,0,'C');
  $this->SetFont('Arial','',11);
  $this->Text(15,68,'Supplier :',0,0,'C');
  $this->SetFont('Arial','u',11);
$this->Text(35,68,''.$row['supp_name'].'',0,0,'C');
  $this->SetFont('Arial','',11);
    $this->Text(15,74,'Date :',0,0,'C');
    $this->SetFont('Arial','u',11);
$this->Text(30,74,''.$_SESSION['date'].'',0,0,'C');

  $this->Ln(10); 
}


// Simple table
function BasicTable($header, $itemArray)
{

  // Column widths
  $w = array(12,30,30,23,77,20);
  // Header
  for($i=0;$i<count($header);$i++)
    $this->Cell($w[$i],7,$header[$i],1,0,'C');
  $this->Ln();
  // Data


$db_handle = new DBController();

$productByCode = $db_handle->runQuery("SELECT * , SUM(quantity) as total FROM purchase_cart where po_no= ".$_GET['po_no']." and quantity > 0 group by material_no");
/*$itemArray = array($productByCode[1]["code"]=>array('category'=>$productByCode[1]["category"], 'scategory_name'=>$productByCode[1]["scategory_name"], 'brand_name'=>$productByCode[1]["brand_name"], 'description'=>$productByCode[1]["description"], 'color'=>$productByCode[1]["color"], 'package'=>$productByCode[1]["package"], 'unit_measurement'=>$productByCode[1]["unit_measurement"], 'abbre'=>$productByCode[1]["abbre"], 'price'=>$productByCode[1]["price"], 'quantity'=>$productByCode[1]["quantity"]));*/
$no=0;

  foreach($productByCode as $item)
  { 
    
    $no++;
    $this->Cell($w[0],6,''.$no.'',1);
    $this->Cell($w[1],6,''.$item['brand_name'].'',1);
    $this->Cell($w[2],6,''.$item['category'].'',1);
    $this->Cell($w[3],6,''.$item['scategory_name'].'',1);
    $this->Cell($w[4],6,''.$item['description'].' / '.$item['color'].' / '.$item['package'].' / '.$item['unit_measurement'].''.$item['abbre'].'',1);
    $this->Cell($w[5],6,''.$item['total'].'',1);

    $this->Ln();
  }
  $this->Cell(array_sum($w),0,'','T');
}



function Footer()
{  $item_total = 0;
  
    $this->SetY(-15);
    $this->SetFont('Arial','',11);
  $this->Text(15,250,'Prepared by :',0,0,'C');
  $this->SetFont('Arial','u',11);
  $this->Text(15,260,''.$_GET['ordered'].'',0,0,'l');
  // Arial italic 8
  $this->SetFont('Arial','I',8);
  // Page number
  $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new PDF();
// Column headings
$header = array('No.','Brand','Category', 'Sub-category','Description(Color, Package, Unit Measurement)','Quantity');
// Data loading
$data = $pdf->LoadData('countries.txt');
$pdf->SetFont('Arial','',10);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->BasicTable($header,$data);
$pdf->Output();

?>
 