<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();

if(!empty($_POST["action"])) {
switch($_POST["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
      echo '<h2 style="text-align: center; font-weight: bolder;">List of Order</h2>';
			     $productByCodeq = $db_handle->runQuery("SELECT * FROM materials WHERE code='" . $_POST["code"] . "' ORDER BY material_no ASC ");
      $itemArrayq = array($productByCodeq[0]["code"]=>array('material_no'=>$productByCodeq[0]["material_no"], 'code'=>$productByCodeq[0]["code"],  'category'=>$productByCodeq[0]["category"], 'scategory_name'=>$productByCodeq[0]["scategory_name"], 'brand_name'=>$productByCodeq[0]["brand_name"], 'description'=>$productByCodeq[0]["description"], 'color'=>$productByCodeq[0]["color"], 'package'=>$productByCodeq[0]["package"], 'unit_measurement'=>$productByCodeq[0]["unit_measurement"], 'abbre'=>$productByCodeq[0]["abbre"],'quantity'=>$_POST["quantity"], 'price'=>$productByCodeq[0]["price"]));

			if(!empty($_SESSION["cart_itempoq"])) {
				if(in_array($productByCodeq[0]["code"],$_SESSION["cart_itempoq"])) {
					foreach($_SESSION["cart_itempoq"] as $k => $v) {
							if($productByCodeq[0]["code"] == $k)
								$_SESSION["cart_itempoq"][$k]["quantity"] = $_POST["quantity"];
					}
				} else {
					$_SESSION["cart_itempoq"] = array_merge($_SESSION["cart_itempoq"],$itemArrayq);
				}
			} else {
				$_SESSION["cart_itempoq"] = $itemArrayq;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_itempoq"])) {
			foreach($_SESSION["cart_itempoq"] as $k => $v) {
					if($_POST["code"] == $k)
						unset($_SESSION["cart_itempoq"][$k]);
					if(empty($_SESSION["cart_itempoq"]))
						unset($_SESSION["cart_itempoq"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_itempoq"]);
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
if(isset($_SESSION["cart_itempoq"])){
    $item_total = 0;
?>  
<div class="container" style="width:100%; margin-left: 0px; margin-top:0px;">
<table class="table table-condensed table-striped table-hover" id="jsontable2" name="jsontable2" style="font-size: 1em;">
<thead>
<tr class="w3-green">
<th>Brand</th>
<th>Category</th>
<th>Sub-Category</th>
<th>Description</th>
<th>Color</th>
<th>Package</th>
<th>Measurement</th>
<th>Abbreviation</th>
<th>Quantity</th>
<th>Price</th>

<th>Action</th>
</tr> 
</thead>
<tbody>

<?php   
    foreach ($_SESSION["cart_itempoq"] as $item){
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
       $price = $item["price"];
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
        <td style="width:7%;"><?php echo $quantity; ?></td>
        <td><?php echo'&#8369;'.$price.''; ?></td>
        <td><button type="button" onClick="cartAction('remove','<?php echo $item["code"]; ?>')" class="btn btn-danger btnRemoveAction cart-action"><span class="fa fa-trash"></span></button></td>
        </tr>
        <?php


        $item_total += ($price*$quantity);
    }
      
$im= implode(", ",$item);
    ?>

</tbody>
</table>  
<br>
<div id="total"><?php echo'Total: &#8369;'.number_format((double)$item_total,2,'.','').''; ?> </div>
</div> 
<script type="text/javascript">
        $(document).ready(function(){
    $('#jsontable2').DataTable({
         "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
    });
});
    </script>
  <?php
}
?>






