<?php include("var.php"); ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Material Cart</title>
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
  var qty;
  qty = $("#qty_"+product_code).val();
  var queryString = "";
  if(action != "") {
    switch(action) {
      case "add":
      if(qty>=1)
      {
        queryString = 'action='+action+'&code='+ product_code+'&quantity='+$("#qty_"+product_code).val();
      break;
      }
      else if(qty==0)
      {
        alert("Quantity cannot be equal to Zero!");
      break;
      }
      else
      {
        alert("Quantity cannot be less than Zero!");
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
  url: "purchaseorder2_action.php",
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
               <img src="<?php echo '../../maintenance/employee/image/'.($image).''; ?>" class="img-circle">
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
    </header>
    <!-- Left side column. contains the logo and sidebar -->
      <?php
if(isset($_GET['logout']))
{
  mysql_query("update sample set status='inactive' where user='".$_SESSION['user']."' and pass='".$_SESSION['pass']."' ");
  session_destroy();
  echo "<meta http-equiv='refresh' content='0'>";
}
?>
    <?php include("../../maintenance/side_account.php"); ?>


    <!-- Right side column. Contains the navbar and content of the page -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Purchase Order Approval
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

$content3=mysql_query("select * from supplier where supplier_no='".$_GET['scname']."'");
$total3=@mysql_affected_rows();

    
$row3=mysql_fetch_array($content3);
$supp3=$row3['supp_name'];

?>
      <!-- Main content -->
      <section class="content">
        <!--Table function-->


        <!-- Small boxes (Stat box) -->
        <div class="row" >                                 
          <div class="col-md-12 col-sm-8 col-xs-8"> 
                <div class="box-header with-border">
                
                  <div class="col-sm-6" style="margin-bottom: 10px;">                        
                   <div class="row" style="margin-bottom:5px;"> <!-- ROW 2-->

                    <div class="col-xs-4" style="text-align: center;"> 
                      <label>Purchase Order ID:</label> <!-- Prod_Name -->
                      <input class="form-control" type="text" name="quote" id="quote" value="<?php echo 'PO-000'.$_GET['po_no'].''; ?>" style="text-align: center;" readonly>
                      
                    </div>  

                     <div class="col-xs-4" style="text-align: center;"> 
                      <label>Supplier:</label> <!-- Prod_Name -->
                      <input class="form-control" type="text" name="comp" id="comp" value="<?php echo ''.$supp3.''; ?>" style="text-align: center;" readonly>
                      
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
                    <center><h3>Available Items</h3></center>
                    <div class="myData"></div>

                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <table id="jsontable" class="table table-condensed table-striped table-hover" style="font-size: 1em;">
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
 $product_array = $db_handle->runQuery("SELECT * FROM materials ORDER BY material_no ASC");
  if (!empty($product_array))
   { 
    echo'<tbody>';
foreach($product_array as $key=>$value)
    {
  ?>    <tr>
       <form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>&employee=<?php echo $scname?>&materialreq=<?php echo $quote_no?>">
      <td><?php echo $product_array[$key]["brand_name"]; ?></td>
      <td><?php echo $product_array[$key]["category"]; ?></td>
      <td><?php echo $product_array[$key]["scategory_name"]; ?></td>
      <td><?php echo $product_array[$key]["description"]; ?></td>
      <td><?php echo $product_array[$key]["color"]; ?></td>
      <td><?php echo $product_array[$key]["package"]; ?></td>
      <td><?php echo $product_array[$key]["unit_measurement"];?></strong></td>
      <td><?php echo $product_array[$key]["abbre"];?></td>
      <td><input type="text" id="qty_<?php echo $product_array[$key]["code"]; ?>" class="form-control" name="quantity" value="" style="text-align: center;" size="2" /></td>
      <td><input type="button" id="add_<?php echo $product_array[$key]["code"]; ?>" name ="adds" value="Add Item" class="btn btn-block bg-blue btnAddAction cart-action" onClick = "cartAction('add','<?php echo $product_array[$key]["code"]; ?>')" /></td>
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
           
                          <section class="content">


    <div class="row">
    <div class="col-md-12 col-sm-8 col-sm-8">     
<div class="box box-solid">
  <div class="box-body">
    <div id="cart-item"></div>
    <form method="post" action="index.php?po_no=<?php echo ''.$_GET['po_no'].''?>&scname=<?php echo ''.$_GET['scname'].''?>&ordered=<?php echo ''.$_GET['ordered'].''?>">
<?php




if(isset($_POST['btnAdd']))
{

if(empty($_SESSION["cart_itempo"]))
{
 echo '<script type="text/javascript">alert("Cart empty")</script>'; 
}

else
{
?>
<div class="container" style="width:100%; margin-left: 0px; margin-top:0px;">
<table class="table table-condensed table-striped table-hover" id="jsontable1" name="jsontable1" style="font-size: 1.1em;">
<thead>
<tr class="w3-green">
<th><strong>No.</strong></th>
<th><strong>Brand</strong></th>
<th><strong>Category</strong></th>
<th><strong>Sub-Category</strong></th>
<th><strong>Description</strong></th>
<th><strong>Color</strong></th>
<th><strong>Package</strong></th>
<th><strong>Measurement</strong></th>
<th><strong>Abbreviation</strong></th>
<th><strong>Quantity</strong></th>
</tr> 
</thead>
<tbody>
 <div class="col-lg-12 col-xs-12"> 
       <div class="alert alert-xs  bg-teal alert-dismissable" style="width:100%; float: center;" >
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
                <label><i class="icon fa fa-check"></i>ORDER HAS BEEN ADDED!</label>
               
              </div> 

<?php   
    foreach ($_SESSION["cart_itempo"] as $item){
    ?>
       <?php
       $int++;
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
        <td><strong><?php echo $int; ?></strong></td>
        <td><strong><?php echo $brand_name; ?></strong></td>
        <td><strong><?php echo $category; ?></strong></td>
        <td><strong><?php echo $scategory_name; ?></strong></td>
        <td><strong><?php echo $description; ?></strong></td>
        <td><strong><?php echo $color; ?></strong></td>
        <td><strong><?php echo $package; ?></strong></td>
        <td><strong><?php echo $unit_measurement; ?></strong></td>
        <td><strong><?php echo $abbre; ?></strong></td>
        <td style="width:7%;"><?php echo $quantity; ?></input></td>
        </tr>
        <?php

    }
    ?>

</tbody>
</table>  
<?php
     echo' <br>';
          echo' <br>';
  $order=mysql_real_escape_string($_GET['prepared']);

    $accepted='active';
    foreach($_SESSION["cart_itempo"] as $item)
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
    $hash1= $_GET['scname'];
    $hash3= mt_rand(1,9999999);
    $hash2= md5($hash1+$material_no+$hash3);

    //$content5=mysql_query("select * from purchase_cart where po_no='".$_GET['id']."' and material_no='".$material_no."'");
    $content5=mysql_query("select *, max(material_no) as max from purchase_cart where po_no='".$_GET['po_no']."' and material_no='".$material_no."'");
    $total5=@mysql_affected_rows();
    $row5=mysql_fetch_array($content5);

    $quantity_total=$quantity+$row5['quantity'];

    if($row5['max']>=1)
{
     mysql_query("UPDATE purchase_cart SET quantity='".$quantity_total."' where po_no='".$_GET['po_no']."' and material_no='".$material_no."' ");
   
}
else  
{
  mysql_query("insert into purchase_cart (po_no,code, supplier,material_no,brand_name,category,scategory_name,description,color,package,unit_measurement,abbre,quantity,status) values('".$_GET['po_no']."','".$hash2."','".$_GET['scname']."','".$material_no."','".$brand_name."','".$category."','".$scategory_name."','".$description."','".$color."','".$package."','".$unit_measurement."','".$abbre."','".$quantity."','".$accepted."') ") or die (mysql_error());
  echo '<script type="text/javascript">alert("Materials has been added")</script>'; 
}
     
    }
    mysql_query("insert into purchase_order (po_no,supplier,date,ordered_by,status) values ('".$_GET['po_no']."','".$supp3."','".$a."','".$_GET['ordered']."','".$accepted."') ") or die (mysql_error());
   

     unset($_SESSION["cart_itempo"]);
     ?>

<div style="text-align: center; float: center; margin-bottom: 5px;">
 <button type="button"  onclick="print()" class="btn btn-success">Print</button>
</div>
    <script>
    function print() {
    window.open("../../pdf/print/printpurchase.php?po_no=<?php echo $_GET['po_no']?>&id=<?php echo $_GET['scname']?>&ordered=<?php echo $_GET['ordered']?>");
    }
    </script>



   <?php
  }

    }
?>
    <script>
    function done() {
    window.location.href="../purchase/index.php";
    }
    </script>
    <div style="text-align: center; float: center">
<button type="button" class="btn btn-default" style="font-color: white;"><a href="../purchase/index.php" style="font-color: white">Go Back</a></button>
<button type="button"  class="btn btn-danger"> <a id="btnEmpty" class="cart-action" onClick="cartAction('empty','');" style="color: white;">Remove All</a></button>
<button type="submit" name="btnAdd" class="btn btn-primary">Add Items</button>
</div>
</form>
 <br>
<script>
$(document).ready(function () {
  cartAction('','');
})
</script>


    <script>
    function done() {
    window.location.href="../purchase/index.php";
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
  <script type="text/javascript">

    $('.remove').click(function(){
      swal({
        title: "Are you sure want to remove this item?",
        text: "You will not be able to recover this item",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Confirm",
        cancelButtonText: "Cancel",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          swal("Deleted!", "Your item deleted.", "success");
        } else {
          swal("Cancelled", "You Cancelled", "error");
        }
      });
    });

  </script>
  <script>
function myFunctions() {

 id = document.getElementById("quote_no").value;
    if (confirm("Are you sure?") == true) {

    } 
    else {
      return false;
        //window.location.href="purchaseorder1.php";
    }
}


</script>
<script>
$(document).ready(function () {
  cartAction('','');
})
</script>

<script>
function done() {


 id = document.getElementById("quote_no").value;
    if (confirm("Are you sure?") == true) {

    } 
    else {
      return false;
        //window.location.href="purchaseorder1.php";
    }


  }
</script>