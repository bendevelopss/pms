<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();

if(!empty($_POST["action"])) {
switch($_POST["action"]) {
	case "add":
		if(!empty($_POST["quantity"]) && !empty($_POST["po_no"])) {
      echo'
      <center><h3 style="">List of Order</h3></center>
      ';
			     $productByCode = $db_handle->runQuery("SELECT * FROM materialreq_cart WHERE code='" . $_POST["code"] . "' and req_no='" . $_POST["po_no"] . "' ORDER BY material_no ASC ");
      $itemArray = array($productByCode[0]["code"]=>array('material_no'=>$productByCode[0]["material_no"], 'code'=>$productByCode[0]["code"],  'category'=>$productByCode[0]["category"], 'scategory_name'=>$productByCode[0]["scategory_name"], 'brand_name'=>$productByCode[0]["brand_name"], 'description'=>$productByCode[0]["description"], 'color'=>$productByCode[0]["color"], 'package'=>$productByCode[0]["package"], 'unit_measurement'=>$productByCode[0]["unit_measurement"], 'abbre'=>$productByCode[0]["abbre"], 'quantitys'=>$productByCode[0]["quantity"], 'quantity'=>$_POST["quantity"]));

			if(!empty($_SESSION["cart_itemp"])) {
				if(in_array($productByCode[0]["code"],$_SESSION["cart_itemp"])) {
					foreach($_SESSION["cart_itemp"] as $k => $v) {
							if($productByCode[0]["code"] == $k)
								$_SESSION["cart_itemp"][$k]["quantity"] = $_POST["quantity"];
					}
				} else {
					$_SESSION["cart_itemp"] = array_merge($_SESSION["cart_itemp"],$itemArray);
				}
			} else {
				$_SESSION["cart_itemp"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_itemp"])) {
			foreach($_SESSION["cart_itemp"] as $k => $v) {
					if($_POST["code"] == $k)
						unset($_SESSION["cart_itemp"][$k]);
					if(empty($_SESSION["cart_itemp"]))
						unset($_SESSION["cart_itemp"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_itemp"]);
	break;		
}
}
?>
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
<!-- ionics -->   
<link href="../../plugins/ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css" />  
<!-- FontAwesome 4.3.0 -->
<link href="../../bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />  
<!-- Theme style -->
<link href="../../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
  <!-- AdminLTE Skins. Choose a skin from the css/skins 
   folder instead of downloading all of them to reduce the load. -->
   <link href="../../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
   <!-- SweetAlert -->    
   <link href="../../plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />       
   <!-- Date Picker -->
   <link href="../../plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
   <!-- Daterange picker -->
   <link href="../../plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
  <!--- datatables -->
  <style type="text/css">
body
{
  background-color:#bcab90;
  margin: 0px;
}
h6
{
  border-bottom: 2px solid black;
 
}
.w3-camo-dark-green
{
  color:#fff;background-color:#535640
}
.w3-camo-earth
{
  color:#fff;background-color:#ac7e54
}
.w3-navbar
{
  width: 103%;
  margin-left: -17px;
}
</style>
  </head>
<BODY>
<?php
if(isset($_SESSION["cart_itemp"])){
    $item_total = 0;
?>  
<div class="container" style="width:100%; margin-left: 0px; margin-top:0px;">
<table id="tableko1" name="tableko1" class="table table-condensed table-striped table-hover" style="font-size: 1em;">
<thead>
<tr>
<th>Brand</th>
<th>Category</th>
<th>Sub-Category</th>
<th>Description</th>
<th>Color</th>
<th>Package</th>
<th>Measurement</th>
<th>Abbreviation</th>
<th>Quantity</th>

<th>Action</th>
</tr> 
</thead>
<tbody>

<?php   
    foreach ($_SESSION["cart_itemp"] as $item){
    ?>
       <?php
       $code=$item["code"];
       $brand_name = $item["brand_name"];
       $category = $item["category"];
       $scategory_name = $item["scategory_name"];
       $description = $item["description"];
       $color = $item["color"];
       $package = $item["package"];
       $unit_measurement = $item["unit_measurement"];
       $abbre = $item["abbre"];
       $quantity = $item["quantity"];
       ?>
        <tr>
        <td><?php echo $brand_name; ?></td>
        <td><?php echo $category; ?></td>
        <td><?php echo $scategory_name; ?></td>
        <td><?php echo $description; ?></td>
        <td><?php echo $color; ?></td>
        <td><?php echo $package; ?></td>
        <td><?php echo $unit_measurement; ?></td>
        <td><?php echo $abbre; ?></td>
        <td><?php echo $quantity; ?></td>
        <td><button type="button" onClick="cartAction('remove','<?php echo $item["code"]; ?>')" class="btn btn-danger btnRemoveAction cart-action"><span class="fa fa-trash"></span></button></td>
        </tr>
        <?php


    }

    ?>

</tbody>
</table>  
<br>
</div> 

  <?php
}
?>

<script src="../../plugins/jQuery/jQuery-2.1.3.min.js" type="text/javascript"></script>
  <!-- <script src="jquery.js" ype="text/javascript"></script> -->

  <!-- jQuery UI 1.11.2 -->
  <script src="../../plugins/jQueryUI/jquery-ui.min.js" type="text/javascript"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

  <!-- Bootstrap 3.3.2 JS -->
  <script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    

  <script src="../../plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
  <!-- Bootstrap WYSIHTML5 -->

  <!-- mask -->
  <script src="../../plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
  <script src="../../plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>

  <!-- FastClick -->

  <!-- AdminLTE App -->
  <script src="../../dist/js/app.min.js" type="text/javascript"></script>
  <!-- DataTables -->

  <script src="../../plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>





