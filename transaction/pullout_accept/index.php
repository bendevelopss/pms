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
  echo '<script type="text/javascript">window.location.href="../../.php";</script>'; 
}

if($_GET['id']=='' && $_GET['scname']=='' && $_GET['prepared']=='')
{
  echo'<script type="text/javascript">
  alert("Authentication Error");
  window.location.href="../../pullout/index.php";

  </script>';
     //   return;
  //header('Location: quot1.php');
}

$content2=mysql_query("select * from employee where username='".$_SESSION['user']."' and password='".$_SESSION['pass']."' ");
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
$image=$row['image'];

require_once("dbcontroller.php");
$db_handle = new DBController();

$a= date("Y-m-d");

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Pullout</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Bootstrap 3.3.2 -->
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
    <link href="../../plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <script src="../../plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="../../plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

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
                        
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a data-toggle="dropdown">
             
              
              <span id="time" style="font-weight: bold; color: "></span>
            </a>
            
          </li> 
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
                      <?php
if(isset($_GET['logout']))
{
 mysql_query("update sample set status='inactive' where user='".$_SESSION['user']."' and pass='".$_SESSION['pass']."' ");
 session_destroy();
 echo "<meta http-equiv='refresh' content='0'>";
}
?>
    <!-- Left side column. contains the logo and sidebar -->
    <?php include("../../maintenance/side_account.php") ?>


    <!-- Right side column. Contains the navbar and content of the page -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Pullout
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

$content2=mysql_query("select req_no,customer, project from materialreq where req_no='".$_GET['scname']."'");
$total2=@mysql_affected_rows();
 
$row=mysql_fetch_array($content2);

$req_no=$row['req_no'];
$customer=$row['customer'];
$project=$row['project'];
?>
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
                      <label>Pullout ID</label> <!-- Prod_Name -->
                      <input class="form-control" type="text" name="quote" id="quote" value="<?php echo 'PULL-000'.$_GET['id'].''; ?>" style="text-align: center;" readonly>
                      
                    </div>  

                     <div class="col-xs-4" style="text-align: center;"> 
                      <label>Customer Name</label> <!-- Prod_Name -->
                      <input class="form-control" type="text" name="comp" id="comp" value="<?php echo ''.$customer.''; ?>" style="text-align: center;" readonly>
                      <input class="form-control" type="hidden"name="samp" id="samp" value="<?php echo ''.$_GET['scname'].''; ?>">
                      
                    </div>   

                    <div class="col-xs-3" style="text-align: center;"> 
                      <label>Project Name</label> <!-- Prod_Name -->
                      <input class="form-control" type="text" name="comp" id="comp" value="<?php echo ''.$project.''; ?>" style="text-align: center;" readonly>
                      
                      
                    </div>   

                                          
                    </div>   


                </div>          
        
            </div>

            <div class="row">                     <!-- TABLES -->
              <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="box box-solid">
                  <div class="box-header">
                    <center><h1 class="box-title">Available Items</h1></center>
                    <div class="myData"></div>

                  </div><!-- /.box-header -->
                  <div class="box-body">


                  <table id="jsontable" name="jsontable" class="table table-condensed table-striped table-hover" style="font-size: 1em;">
    
    <thead>
<tr>
<th style="text-align: center">Brand</th>
<th style="text-align: center">Category</th>
<th style="text-align: center">Subcategory</th>
<th style="text-align: center">Description</th>
<th>Color</th>
<th style="text-align: center">Package</th>
<th style="text-align: center">Measurement</th>
<th style="text-align: center">Abbreviation</th>
<th style="text-align: center">Quantity Available
(Material Req.)
</th>
<th style="text-align: center">Quantity</th>
<th style="text-align: center">Action</th>
</tr> 
</thead>
<tbody>

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

$product_array = $db_handle->runQuery("SELECT * FROM materialreq_cart where req_no = '".$_GET['scname']."' and quantity >'0' ORDER BY req_no ASC");
if (!empty($product_array))
 { 
    foreach($product_array as $key=>$value)
    {
  ?>    <tr>
      <form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>&employee=<?php echo $scname?>&materialreq=<?php echo $quote_no?>">
      <td style="text-align: center"><?php echo $product_array[$key]["brand_name"]; ?></td>
      <td style="text-align: center"><?php echo $product_array[$key]["category"]; ?></td>
      <td style="text-align: center"><?php echo $product_array[$key]["scategory_name"]; ?></td>
      <td style="text-align: center"><?php echo $product_array[$key]["description"]; ?></td>
      <td><?php echo $product_array[$key]["color"]; ?></td>
      <td style="text-align: center"><?php echo $product_array[$key]["package"]; ?></td>
      <td style="text-align: center"><?php echo $product_array[$key]["unit_measurement"];?></td>
      <td style="text-align: center"><?php echo $product_array[$key]["abbre"];?></td>
      <td style="text-align: center"><?php echo $product_array[$key]["quantity"];?>
         <input type="hidden" id="qty2_<?php echo $product_array[$key]["code"]; ?>"  name="quantity2" value="<?php echo $product_array[$key]["quantity"]; ?>"/>

      </td>
      <td ><input type="text" id="qty_<?php echo $product_array[$key]["code"]; ?>" class="form-control" name="quantity3" size="1" style="text-align: center" required/></td>
      <td style="text-align: center"><input type="button" id="add_<?php echo $product_array[$key]["code"]; ?>" name ="adds" value="Add Item" class="btn btn-primary btnAddAction cart-action" onClick = "cartAction('add','<?php echo $product_array[$key]["code"]; ?>')" /></td>
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
  <br>
      <script type="text/javascript">
        $(document).ready(function(){
    $('#tableko').DataTable({
      "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
    
    });
});


    </script>

    </div>
    </div>

</div>

</div>

<div >

<div>

<br></br>

<br></br>
<section class="content">


<div class="row">
<div class="col-md-12 col-sm-8 col-sm-8">     
<div class="box box-solid">
<div class="box-body">
<div id="cart-item"></div>
<form method="post" action="index.php?id=<?php echo ''.$_GET['id'].''?>&scname=<?php echo ''.$_GET['scname'].''?>&prepared=<?php echo ''.$_GET['prepared'].''?>">
<?php
$content3=mysql_query("select * from materialreq where req_no='".$_GET['scname']."'");
$total3=@mysql_affected_rows();

    
$row3=mysql_fetch_array($content3);

$date3=$row3['date'];
$add3=$row3['address'];
$proj3=$row3['project'];
$cust3=$row3['customer'];



if(isset($_POST['btnAdd']))
{

if(empty($_SESSION["cart_itemp"]))
{
 echo '<script type="text/javascript">alert("Cart empty")</script>'; 
}

else
{ 

  ?>

<br>

<?php
 $prep=mysql_real_escape_string($_GET['prepared']);
    $accepted='active';
    foreach($_SESSION["cart_itemp"] as $item)
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

$content5=mysql_query("select *, max(material_no) as max from pullout_cart where pullout_no='".$_GET['id']."' and material_no='".$material_no."'");
    $total5=@mysql_affected_rows();
    $row5=mysql_fetch_array($content5);

    $quantity_totals=$quantity+$row5['quantity'];

    if($row5['max']>=1)
{
     mysql_query("UPDATE pullout_cart SET quantity='".$quantity_totals."' where pullout_no='".$_GET['id']."' and material_no='".$material_no."' ");
    echo '<script type="text/javascript">alert("Materials '.$_GET['po_no'].' has been sssadded")</script>'; 
}
else  
{
   mysql_query("insert into pullout_cart (pullout_no,req_no, code,customer,project,material_no,brand_name,category,scategory_name,description,color,package,unit_measurement,quantity,abbre,status) values('".$_GET['id']."','".$_GET['scname']."','".$hash2."','".$cust3."','".$proj3."','".$material_no."','".$brand_name."','".$category."','".$scategory_name."','".$description."','".$color."','".$packages."','".$unit_measurement."','".$quantity."','".$abbre."','".$accepted."') ");

}

      mysql_query("UPDATE materialreq_cart SET quantity='".$quantity_total."' where material_no='".$material_no."' and req_no='".$_GET['scname']."' ");
   //echo '<script type="text/javascript">alert("Materials has '.$quantity_total.' been added")</script>'; 
   
    $contents=mysql_query("select * from materials where material_no='".$material_no."' ");   
    $rows=mysql_fetch_array($contents);
    $quantity_add=$rows['quantity'];
    $total=$quantity_add - $quantity;



    mysql_query("UPDATE materials SET quantity='".$total."' where material_no='".$material_no."'");

    $contents5=mysql_query("select * from quotation_cart where project='".$proj3."' and company='".$cust3."' and material_no='".$material_no."' ");   
    $rows5=mysql_fetch_array($contents5);
    $quantity_add5=$rows5['quantity_remaining'];
    $totals5=$quantity_add5 - $quantity;



    mysql_query("UPDATE quotation_cart SET quantity_remaining='".$totals5."' where project='".$proj3."' and company='".$cust3."' and material_no='".$material_no."'");
    //echo '<script type="text/javascript">alert("Materials has '.$total.' been added")</script>'; 
     
    }

      mysql_query("insert into pullout (pullout_no,customer,project,date,accepted_by,status) values ('".$_GET['id']."','".$cust3."','".$proj3."','".$a."','".$prep."','".$accepted."')");
     echo '<script type="text/javascript">alert("Materials has been added")</script>'; 
        
     ?>


   <?php
   unset($_SESSION["cart_itemp"]);
    echo "<meta http-equiv='refresh' content='0'>";
  }
}
    
?>
<div style="text-align: center; float: center;">
<button type="button"  onclick="done()" class="btn btn-default">Go Back</button>
<button type="button"  class="btn btn-danger"> <a id="btnEmpty" class="cart-action" onClick="cartAction('empty','');" style="color: white;">Remove All</a></button>
<button type="submit" name="btnAdd" id="btnAdd" class="btn btn-primary">Process Order</button>

     <?php
    $contents6=mysql_query("select max(pullout_no) as max from pullout_cart where pullout_no='".$_GET['id']."'");   
    $rows6=mysql_fetch_array($contents6);

 if($rows6['max']>=1)
{
  echo'<button type="button"  onclick="print()" class="btn btn-success">Print</button>';
}
else{
   echo'<button type="button"  onclick="print()" class="btn btn-success" disabled>Print</button>';
}
?>

    <script>
    function print() {
    window.open("pdf/tutorial/tuto12.php?pullout_no=<?php echo $_GET['id']?>&id=<?php echo $_GET['scname']?>&prepared=<?php echo $_GET['prepared']?>");
    }
    </script>
</form>

<script>
$(document).ready(function () {
  cartAction('','');
})
</script>
<br>

    <script>
    function done() {
    window.location.href="../pullout/index.php";
    }
    </script>
    
</div>
</div>
<!--Input-->

<!--Card end div-->
</div>
<!--Card end div-->

<!--card to right end-->
</div>
<!--card to right end-->

<!--row class end-->
</div>
<!--row class-->

<!--Time-->
<script type="text/javascript">
    $(document).ready(function(){
      $('#tableko').DataTable({
        "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]

      });
    });
    </script>

  <?php include("../../maintenance/plugins.php"); ?>
  <div class="se-pre-con"></div>
  <script src="func.js" type="text/javascript"></script>

</BODY>
</HTML>