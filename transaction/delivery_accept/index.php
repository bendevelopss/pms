<?php
ini_set('display-error',1);
error_reporting(E_ALL&~E_NOTICE);

if($connect=@mysql_connect("localhost","root"))
  echo"";
  else
die(@mysql_error());
$connect=@mysql_select_db("pms");
session_start();

if($_SESSION['user']=='' && $_SESSION['pass']=='')
{
  echo '<script type="text/javascript">window.location.href="../../index.php";</script>'; 
}

if($_GET['id']=='' && $_GET['customer']=='' && $_GET['scname']=='' && $_GET['prepared']=='')
{
   echo'<script type="text/javascript">
  alert("Authentication Error");
  window.location.href="../delivery/index.php";

  </script>';
     //   return;
  //header('Location: quot1.php');
}

$content2=mysql_query("SELECT * from employee where username='".$_SESSION['user']."' and password='".$_SESSION['pass']."' ");
$total2=@mysql_affected_rows();

    
$row=mysql_fetch_array($content2);

$user2=$row['username'];
$pass2=$row['password'];
$cust_type2=$row['cust_type'];
$comp_name2=$row['comp_name'];
$phone_num2=$row['phone_num'];
$fax2=$row['fax'];
$email2=$row['email'];
$firstname2=$row['firstname'];
$middlename2=$row['middlename'];
$lastname2=$row['lastname'];
$contact2=$row['contact'];
$city2=$row['city'];
$street2=$row['street'];
$position=$row['position'];

require_once("dbcontroller.php");
$db_handle = new DBController();


if(!empty($_GET["action"])) {
switch($_GET["action"]) {
  case "add":
    if(!empty($_POST["quantity"])) {
      $productByCodeq = $db_handle->runQuery("SELECT * FROM materials WHERE code='".$_GET["code"]."'");
      $itemArray = array($productByCodeq[0]["code"]=>array('material_no'=>$productByCodeq[0]["material_no"], 'code'=>$productByCodeq[0]["code"], 'category'=>$productByCodeq[0]["category"], 'scategory_name'=>$productByCodeq[0]["scategory_name"], 'brand_name'=>$productByCodeq[0]["brand_name"], 'description'=>$productByCodeq[0]["description"], 'color'=>$productByCodeq[0]["color"], 'package'=>$productByCodeq[0]["package"], 'unit_measurement'=>$productByCodeq[0]["unit_measurement"], 'abbre'=>$productByCodeq[0]["abbre"],'quantity'=>$_POST["quantity"], 'price'=>$productByCodeq[0]["price"]));

 if($_POST["quantity"]==0)
      {
         echo'<script type="text/javascript">alert("quantity cannot be zero")</script>';
        break;
      }
      if($_POST["quantity"]<0)
      {
        echo'<script type="text/javascript">alert("quantity cannot be less than one")</script>';
        break;
      }




      
      if(!empty($_SESSION["cart_itemd"])) {
        if(in_array($productByCodeq[0]["code"],$_SESSION["cart_itemd"])) {
          foreach($_SESSION["cart_itemd"] as $k => $v) {
              if($productByCodeq[0]["code"] == $k)
                $_SESSION["cart_itemd"][$k]["quantity"] = $_POST["quantity"];
          }
        } else {
          $_SESSION["cart_itemd"] = array_merge($_SESSION["cart_itemd"],$itemArray);
        }
      } else {
        $_SESSION["cart_itemd"] = $itemArray;
      }
    }
  break;
  case "remove":
  if(!empty($_SESSION["cart_itemd"])) {
    foreach($_SESSION["cart_itemd"] as $k => $v) {
      if($_GET["code"] == $k) unset($_SESSION["cart_itemd"][$k]);        
      if(empty($_SESSION["cart_itemd"])) unset($_SESSION["cart_itemd"]);
    }
  }
break;
case "empty":
  unset($_SESSION["cart_itemd"]);
break;
}
}


$a= date("Y-m-d");

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Delivery</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
 
  <?php include("../../maintenance/plugins.php"); ?>
  <div class="se-pre-con"></div>

 <script>
function showEditBox(editobj,id) {
  $('#frmAdd').hide();
  var currentMessage = $("#message_" + id + " .message-content").html();
  var editMarkUp = '<textarea rows="5" cols="80" id="txtmessage_'+id+'">'+currentMessage+'</textarea><button name="ok" onClick="callCrudAction(\'edit\','+id+')">Save</button><button name="cancel" onClick="cancelEdit(\''+currentMessage+'\','+id+')">Cancel</button>';
  $("#message_" + id + " .message-content").html(editMarkUp);
}
function cancelEdit(message,id) {
  $("#message_" + id + " .message-content").html(message);
  $('#frmAdd').show();
}
function cartAction(action,product_code) {
  var qty, qty2, qty1, qty3;
  qty = $("#qty_"+product_code).val();
  qty2= $("#qty2_"+product_code).val();
  qty1= parseInt(qty);
  qty3= parseInt(qty2);
  var queryString = "";
  if(action != "") {
    switch(action) {
      case "add":
      if(qty1>qty3)
      {
       alert("The quantity should not be  higher than the quantity needed");
      break;
      }  
       if(qty1<=0)
      {
        alert("Quantity cannot be zero or negative values");
      break;
      }
      else
      {
        queryString = 'action='+action+'&code='+ product_code+'&quantity='+$("#qty_"+product_code).val()+'&po_no='+$("#samp").val(); 
      break;
      }
      case "remove":
        queryString = 'action='+action+'&code='+ product_code;
      break;
      case "empty":
        queryString = 'action='+action;
      break;
    }  
  }
  jQuery.ajax({
  url: "delivery2_action.php",
  data:queryString,
  type: "POST",
  success:function(data){
    $("#cart-item").html(data);
    if(action != "") {
      switch(action) {
        /*case "add":
          $("#add_"+product_code).hide();
          "#added_"+product_code).show();
        break;*/
        case "remove":
          $("#add_"+product_code).show();
          $("#added_"+product_code).hide();
        break;
        case "empty":
          $(".btnAddAction").show();
          $(".btnAdded").hide();
        break;
      }  
    }
  },
  error:function (){}
  });
}
</script>

   </head>

   <body class="skin-red fixed">


    <form action="" method="post" name="frm" id="frm">
      <header class="main-header">
        <!-- Logo --> 
        <a href="index.php" class="logo">

         <span class="logo-lg"><img style="HEIGHT:45px;" src="../../assets/img/logo.png" alt="Logo" style="float: left;"><label style="font-family: 'Cinzel'; font-size: 110%">PERSAN INC.</label></span>

         <!-- logo for regular state and mobile devices -->
         <span class="logo-lg"><img style="HEIGHT:45px;" src="../../assets/img/logo.png" alt="Logo" style="float: left;"><label style="font-family: 'Cinzel'; font-size: 110%">PERSAN INC.</label></span>
       </a>
       <!-- Logo -->
       <!-- Header Navbar: style can be found in header.less -->
       <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
             <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>      
          </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            
                 <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle " data-toggle="dropdown" >
             
             
               <?php include("../../maintenance/nav.php"); ?>  
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
               

              <?php include("../../maintenance/user_type.php"); ?>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="pull-center">
                  <a href="?logout=true" class="btn btn-primary btn-flat btn-center"><i class="fa fa-sign-in"></i> Sign out</a>
                </div>
              </li>
            </ul>
          </li> 
         
            <!-- User Account: style can be found in dropdown.less -->
          </ul>
        </div>
      </nav>
              <?php
if(isset($_GET['logout']))
{
  mysql_query("update sample set status='inactive' where user='".$_SESSION['user']."' and pass='".$_SESSION['pass']."' ");
  session_destroy();
  echo "<meta http-equiv='refresh' content='0'>";
}
?>
           
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <?php include("../../maintenance/side_account.php") ?>


    <!-- Right side column. Contains the navbar and content of the page -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Delivery
          <small>Transaction</small>
        </h1>                              
      </section>
<?php
if(isset($_POST['scname']) && isset($_POST['quote_no'])  && isset($_POST['prepared']) )
{
$prepared=$_POST['prepared'];
$scname = $_POST['scname'];
$quote_no = $_POST['quote_no'];
}

$content2=mysql_query("select supplier from purchase_order where po_no='".$_GET['scname']."'");
$total2=@mysql_affected_rows();

    
$row=mysql_fetch_array($content2);

$supplier=$row['supplier'];
?>
      <!-- Main content -->
      <section class="content">
        <!--Table function-->


        <!-- Small boxes (Stat box) -->
        <div class="row" >                                 
          <div class="col-md-12 col-sm-8 col-xs-8">             <!-- NEW RECORD -->
                <!-- <a href="addTax.php"><button class="btn btn-success btn-lg" style="margin-bottom:5px;
                  box-shadow: 0px 4px 8px #888888"> 
                + ADD NEW RECORD</button> </a> -->
                <div class="box-header with-border">
                
                  <div class="col-sm-6" style="margin-bottom: 10px;">                        
                   <div class="row" style="margin-bottom:5px;"> <!-- ROW 2-->

                    <div class="col-xs-3" style="text-align: center;"> 
                      <label>Delivery ID:</label> <!-- Prod_Name -->
                      <input class="form-control" type="text" name="quote" id="quote" value="<?php echo 'DEL-000'.$_GET['id'].''; ?>" style="text-align: center;" readonly>
                      
                    </div>  

                     <div class="col-xs-3" style="text-align: center;"> 
                      <label>Supplier:</label> <!-- Prod_Name -->
                      <input class="form-control" type="text" name="comp" id="comp" value="<?php echo ''.$supplier.''; ?>" style="text-align: center;" readonly>
                      <input class="form-control" type="hidden" name="samp" id="samp" value="<?php echo ''.$_GET['scname'].''; ?>">
                      
                    </div>   

                                          
                    </div>   


                </div>          

                <div class="col-md-9 col-xs-12"> <!-- MESSAGE -->

                  <div class="alert alert-xs  bg-teal alert-dismissable" style="width:85%; display:none" id="msg">
                    <i class="icon fa fa-check"></i>
                    <label id="msgContent"></label>
                  </div>  

                </div>    
                                                
            </div>








            <div id="loading" class="modal fade">
              <div class="modal-dialog">
                <div class="overlay">
                  <div class="modal-body" style="text-align:center">
                    <div class="overlay">
                      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                      <i class="fa fa-spinner fa-pulse fa-spin"  
                      style="font-size:60px;"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php include("crud.php") ?>



            <div class="row">                     <!-- TABLES -->
              <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="box box-solid">
                  <div class="box-header">
                    <h3 class="box-title">Available Items</h3>
                    <div class="myData"></div>

                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <table id="jsontable" class="table table-condensed table-striped table-hover" style="font-size: 0.9em;">
                      <thead>

                        <tr>
                         

                        <th style="text-align: center;"><strong>Brand</strong></th>
                        <th style="text-align: center;"><strong>Category</strong></th>
                        <th style="text-align: center;"><strong>Subcategory</strong></th>
                        <th style="text-align: center;"><strong>Description</strong></th>
                        <th style="text-align: center;"><strong>Color</strong></th>
                        <th style="text-align: center;"><strong>Package</strong></th>
                        <th style="text-align: center;"><strong>Measurement</strong></th>
                        <th style="text-align: center;"><strong>Abbreviation</strong></th>
                        <th style="text-align: center;"><strong>Qty left</strong></th>
                        <th style="text-align: center;"><strong>Quantity</strong></th>
                        <th><strong>Action</strong></th>
                        </tr>

                      </thead>

                      <?php  


                      $servername = "localhost";
                      $username = "root";
                      $password = "";
                      $dbname = "pms";

// Create connection
                      $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
                      if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                      } ?>
                  
 <?php

  $product_array = $db_handle->runQuery("SELECT *  FROM purchase_cart where po_no= ".$_GET['scname']." and quantity > 0 group by material_no");
  if (!empty($product_array))
   {  
    echo'<tbody>';
  foreach($product_array as $key=>$value)
    {
  ?>     <tr>
        <form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>&employee=<?php echo $scname?>&materialreq=<?php echo $quote_no?>">
      <td><?php echo $product_array[$key]["brand_name"]; ?></td>
      <td><?php echo $product_array[$key]["category"]; ?></td>
      <td><?php echo $product_array[$key]["scategory_name"]; ?></td>
      <td><?php echo $product_array[$key]["description"]; ?></td>
      <td><?php echo $product_array[$key]["color"]; ?></td>
      <td><?php echo $product_array[$key]["package"]; ?></td>
      <td style="text-align: center;"><?php echo $product_array[$key]["unit_measurement"];?></strong></td>
      <td style="text-align: center;"><?php echo $product_array[$key]["abbre"];?></td>
      <td style="text-align: center;"><?php  echo $product_array[$key]["quantity"];?>
         <input type="number" hidden id="qty2_<?php echo $product_array[$key]["code"]; ?>" class="qty2" name="quantity2" value="<?php echo $product_array[$key]["quantity"]; ?>" size="1" style="width: 70%;"/></td>
      <td style="text-align: center;"><input type="number" id="qty_<?php echo $product_array[$key]["code"]; ?>" class="form-control qty" name="quantity" value="" size="1" style="text-align: center; width: 40%;"/></td>
      <td><input type="button" id="add_<?php echo $product_array[$key]["code"]; ?>" name ="adds" value="Add Item" class="btn btn-primary btnAddAction cart-action" onClick = "cartAction('add','<?php echo $product_array[$key]["code"]; ?>')" /></td>
      </form>
      </tr>
    </div>
    </tr>
  <?php
      }
  }
  ?> 
     </tbody>
  </table>



                      </div><!-- /.box-body -->
                    </div><!-- /.box -->
                  </div><!-- /.col -->
                </div>  <!-- /.row -->         
                

  
                  </div> <!-- /.row --> 
                </section><!-- right col -->
                 
                  <section class="content-header">
                             

                  </section>
                          <section class="content">


    <div class="row">
    <div class="col-md-12 col-sm-8 col-sm-8">     
<div class="box box-solid">
  <div class="box-body">
    <div id="cart-item"></div>
    <form method="post" action="index.php?id=<?php echo ''.$_GET['id'].''?>&scname=<?php echo ''.$_GET['scname'].''?>&prepared=<?php echo ''.$_GET['prepared'].''?>">
<?php
$content3=mysql_query("select * from purchase_order where po_no='".$_GET['scname']."'");
$total3=@mysql_affected_rows();

    
$row3=mysql_fetch_array($content3);

$date3=$row3['date'];
$add3=$row3['address'];
$proj3=$row3['project'];



if(isset($_POST['btnAdd']))
{

if(empty($_SESSION["cart_itemd"]))
{
 echo '<script type="text/javascript">alert("Cart empty")</script>'; 
}

else
{ 

  ?>

<br>
<script type="text/javascript">
        $(document).ready(function(){
    $('#tableko').DataTable({
         "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
    });
});
    </script>

<?php
 $prep=mysql_real_escape_string($_GET['prepared']);
    $accepted='active';
    foreach($_SESSION["cart_itemd"] as $item)
    {
     

    $material_no = $item['material_no'];
    $brand_name = $item['brand_name'];
    $category = $item['category'];
    $scategory_name = $item['scategory_name'];
    $description = $item['description'];
    $color = $item['color'];
    $packages = $item['package'];
    $unit_measurement = $item['unit_measurement'];
    $abbre = $item['abbre'];
    $quantity = $item['quantity'];
    $quantitys = $item['quantitys'];
    $quantity_total = $quantitys - $quantity;
    $price = $item['price'];
    $hash3= mt_rand(1,9999999);
    $hash2= md5($material_no+$hash3);

     mysql_query("INSERT into delivery_cart (delivery_no,po_no, code,supplier,material_no,brand_name,category,scategory_name,description,color,package,unit_measurement,quantity,abbre,status) values('".$_GET['id']."','".$_GET['scname']."','".$hash2."','".$supplier."','".$material_no."','".$brand_name."','".$category."','".$scategory_name."','".$description."','".$color."','".$packages."','".$unit_measurement."','".$quantity."','".$abbre."','".$accepted."') ");

    mysql_query("UPDATE purchase_cart SET quantity='".$quantity_total."' where material_no='".$material_no."' and po_no='".$_GET['scname']."' ");
   
    $contents=mysql_query("select * from materials where material_no='".$material_no."' ");   
    $rows=mysql_fetch_array($contents);
    $quantity_add=$rows['quantity'];
    $total=$quantity_add + $quantity;



    mysql_query("UPDATE materials SET quantity='".$total."' where material_no='".$material_no."'");

   
     
    }

     mysql_query("insert into delivery (delivery_no,supplier,date,verified_by,status) values ('".$deliv_no."','".$supplier."','".$a."','".$prep."','".$accepted."')");
     echo '<script type="text/javascript">alert("Order has been Added")</script>'; 
        
     ?>


   <?php
   unset($_SESSION["cart_itemd"]);
    echo "<meta http-equiv='refresh' content='0'>";
  }
}
    
?>
 <div style="text-align: center; float: center">
<button type="button"  onclick="done()" class="btn btn-default">Go Back</button>
<button type="button"  class="btn btn-danger"> <a id="btnEmpty" class="cart-action" onClick="cartAction('empty','');" style="color: white;">Remove All</a></button>
<button type="submit" name="btnAdd" id="btnAdd" class="btn btn-primary">Process</button>
</div>



<?php
    $contents6=mysql_query("SELECT max(delivery_no) as max from delivery_cart where delivery_no='".$_GET['id']."'");   
    $rows6=mysql_fetch_array($contents6);

 if($rows6['max']>=1)
{

  echo'';
   
}
else{

   echo'
   
   ';
}
?>
    <script>
    function print() {
    window.open("pdf/tutorial/tuto5.php?delivery_no=<?php echo $_GET['id']?>&id=<?php echo $_GET['scname']?>&prepared=<?php echo $_GET['prepared']?>");
    }
    </script>
</form>


 <br>
<script>
$(document).ready(function () {
  cartAction('','');
})
</script>


    <script>
    function done() {
    window.location.href="../delivery/index.php";
    }
    </script>
    </div> <!-- /. col -->
  </div> <!--/.box-body-->
</div> <!-- /.box -->
        
    </div> <!-- /. row -->

            </section><!-- right col -->


            </div><!-- /.row (main row) -->
          </section><!-- /.content -->
          <footer class="main-footer">
            <div class="pull-right hidden-xs">
              <b>Version</b> 3.0
            </div>
            <strong>Copyright &copy; 2016<?php if(date("Y")!=2015)echo" - ".date("Y")."";?></strong> All rights reserved.
          </footer>        
        </div><!-- /.content-wrapper -->

      </div><!-- ./wrapper -->


     
  <script type="text/javascript">
    function get_id(o) {
      myRowIndex = $(o).parent().parent().index();
      var getid=  (document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[0].innerHTML);    
      var $modal = $('#editModal'),
      $category_no1 = $modal.find('#category_no1');
      $category_no1.val(getid);
      $category_no1 = $modal.find('#category_no1');
      $category_no1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[0].innerHTML);


      $c_name1 = $modal.find('#c_name1');
      $c_name1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[1].innerHTML);

    }
  </script>


  </html>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#jsontable').DataTable({
        "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]

      });
    });

      $(document).ready(function(){
      $('#jsontable1').DataTable({
        "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]

      });
    });
  </script>
<script>
$(document).ready(function () {
  cartAction('','');
})
</script>
<script>
function pass() {
var oTable = $('#filtertable_data').dataTable( );
// to reload
oTable.api().ajax.reload();
}
</script>
<script>
$(document).ready(function () {
  cartAction('','');
})
</script>