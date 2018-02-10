<?php
require('../fpdf.php');
session_start();
require_once("dbcontroller.php");

if(isset($_GET['billing_no'])   && isset($_GET['customer'])  && isset($_GET['totalcost'])  && isset($_GET['topay'])  && isset($_GET['datee']) && isset($_GET['enddate']) && isset($_GET['prepare'])  )
{
$billing_no=$_GET['billing_no'];
$customer = $_GET['customer'];
$totalcost= $_GET['totalcost'];
$topay=$_GET['topay'];
$datee=$_GET['datee'];
$enddate= $_GET['enddate'];
$prepare=$_GET['prepare'];

}

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
$this->Ln(4);
	// Line break

	$this->SetFont('Arial','',10);
	$this->SetX($this->lMargin);
	$this->Text(148,37,'Billing No.',0,0,'l');
	$this->SetFont('Arial','u',11);
	$this->Text(170,37,'BILL-'.$_GET['billing_no'].'',0,0,'l');

	$this->Ln(30);
	$this->SetFont('Arial','B',11);
	$this->Text(15,45,'___________________________________________________________________________________',0,0,'C');
	 $this->Ln(10);
    $this->SetFont('Arial','B',20);
    $this->Text(90,54,'Billing',0,0,'C');
	  $this->Ln(10);
	  $this->SetFont('Arial','B',11);
	$this->Text(15,57,'___________________________________________________________________________________',0,0,'C');
	$this->SetFont('Arial','',11);
	$this->Text(15,68,'Customer :',0,0,'C');
	$this->SetFont('Arial','u',11);
$this->Text(35,68,''.$_GET['customer'].'',0,0,'C');
	$this->SetFont('Arial','',11);
		$this->Text(150,68,'Date :',0,0,'C');
		$this->SetFont('Arial','u',11);
$this->Text(160,68,''.$_GET['datee'].'',0,0,'C');
	$this->SetFont('Arial','',11);

		$this->SetFont('Arial','u',11);

	$this->SetFont('Arial','u',11);
	$this->Ln(2);


}


// Simple table
function BasicTable($header, $data)
{


	// Column widths
	$w = array(20,90,80);
	// Header
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],8,$header[$i],1,0,'C');
	$this->Ln();
	// Data

	$this->Cell($w[0],6,''.$_GET['billing_no'].'',1,0,'C');
	$this->Cell($w[1],6,''.$_GET['totalcost'].'',1,0,'C');
	$this->Cell($w[2],6,''.$_GET['topay'].'',1,0,'C');




}


function Footer()
{  $item_total = 0;

	$a= $_GET['totalcost'];
	$b= $_GET['topay'];
	$item_total= $a - $b;
    $c = '&#8369;';
    $d = iconv('UTF-8', 'ISO-8859-1', $c);
	// Position at 1.5 cm from bottom
	$this->SetY(-15);


	$this->SetFont('Arial','',11);
	$this->Text(110,130,'Remaining Balance :',0,0,'C');
	$this->SetFont('Arial','u',11);
	$this->Text(165,130,'Php'.number_format((float)$item_total, 2, '.', '').'',0,0,'l');


	 $this->SetFont('Arial','',11);
	$this->Text(15,250,'Prepared by :',0,0,'C');
	$this->SetFont('Arial','u',11);
	$this->Text(15,260,''.$_GET['prepare'].'',0,0,'l');

	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// Page number
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new PDF();
// Column headings
$header = array('Billing No.', 'Total Cost', 'Amount to Pay');
// Data loading
$data = $pdf->LoadData('countries.txt');
$pdf->SetFont('Arial','',10);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->BasicTable($header,$data);
$pdf->Output();

?>
