<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();

if(!empty($_POST["action"])) {
switch($_POST["action"]) {
  case "add":
    if(!empty($_POST["quantity"]) && !empty($_POST["po_no"])) {
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
<link rel="stylesheet" href="http://localhost/xampp/capstone/font-awesome-4.6.3/css/font-awesome.min.css">
  <script src="jQuery/jQuery-2.1.3.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
      <!--- datatables -->
  <link rel="stylesheet" href="http://localhost/xampp/capstone/DataTables/responsive/css/responsive.dataTables.min.css">
  <link rel="stylesheet" href="http://localhost/xampp/capstone/DataTables/css/jquery.dataTables.min.css">
  <script src="http://localhost/xampp/capstone/DataTables/js/jquery.dataTables.min.js"></script>
  <script src="http://localhost/xampp/capstone/DataTables/responsive/js/dataTables.responsive.min.js"></script>
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
<table class="table table-condensed table-striped table-hover" id="jsontable1" name="jsontable1" style="font-size: 1em;">
<thead>
<tr>
<th><strong>Brand</strong></th>
<th><strong>Category</strong></th>
<th><strong>Sub-Category</strong></th>
<th><strong>Description</strong></th>
<th><strong>Color</strong></th>
<th><strong>Package</strong></th>
<th><strong>Measurement</strong></th>
<th><strong>Abbreviation</strong></th>
<th><strong>Quantity</strong></th>

<th><strong>Action</strong></th>
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
        <td><strong><?php echo $brand_name; ?></strong></td>
        <td><strong><?php echo $category; ?></strong></td>
        <td><strong><?php echo $scategory_name; ?></strong></td>
        <td><strong><?php echo $description; ?></strong></td>
        <td><strong><?php echo $color; ?></strong></td>
        <td><strong><?php echo $package; ?></strong></td>
        <td><strong><?php echo $unit_measurement; ?></strong></td>
        <td><strong><?php echo $abbre; ?></strong></td>
        <td><strong><?php echo $quantity; ?></strong></td>
        <td><button type="button" onClick="cartAction('remove','<?php echo $item["code"]; ?>')" class="btn btn-danger btn-sm btnRemoveAction cart-action"><span class="glyphicon glyphicon-trash"></span></button></td>
        </tr>
        <?php


    }

}
    ?>

</tbody>
</table>  
<br></br>
<br></br>
</div> 
<script type="text/javascript">
        $(document).ready(function(){
    $('#jsontable1').DataTable({
         "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
    });
});
    </script>
 













