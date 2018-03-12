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
$image=$row['image'];

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


$a= date("m-d-Y");

?>