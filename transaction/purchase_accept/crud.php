<?php
$content1=mysql_query("SELECT max(category_no) as max from category");
$total1=@mysql_affected_rows();

    
$row=mysql_fetch_array($content1);
$noo=$row['max'];

$hell=$noo+1;


$cname=$_POST['txtname'];


$desc1= mysql_real_escape_string($cname);

$find=mysql_query("SELECT * from category where category_name='".$desc1."' and status='active'");
$total1=@mysql_affected_rows();
$row=mysql_fetch_array($find);
$category_name=$row['category_name'];


echo'<input type="hidden" id="dup" value="'.$category_name.'"/>';


if(isset($_POST['btnAdd']) && !empty($cname) && $category_name==$desc1)

{
 echo '<script type="text/javascript">alert("Duplicate category is not allowed")</script>'; 

}


else if(isset($_POST['btnAdd']))

{    
    if(!empty($_POST["quantity"])) {
           $productByCode = $db_handle->runQuery("SELECT * FROM materials WHERE code='" . $_POST["code"] . "' ORDER BY material_no ASC");
      $itemArray = array($productByCode[0]["code"]=>array('material_no'=>$productByCode[0]["material_no"], 'code'=>$productByCode[0]["code"],  'category'=>$productByCode[0]["category"], 'scategory_name'=>$productByCode[0]["scategory_name"], 'brand_name'=>$productByCode[0]["brand_name"], 'description'=>$productByCode[0]["description"], 'color'=>$productByCode[0]["color"], 'package'=>$productByCode[0]["package"], 'unit_measurement'=>$productByCode[0]["unit_measurement"], 'abbre'=>$productByCode[0]["abbre"],'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));

      if(!empty($_SESSION["cart_itempo"])) {
        if(in_array($productByCode[0]["code"],$_SESSION["cart_itempo"])) {
          foreach($_SESSION["cart_itempo"] as $k => $v) {
              if($productByCode[0]["code"] == $k)
                $_SESSION["cart_itempo"][$k]["quantity"] = $_POST["quantity"];
          }
        } else {
          $_SESSION["cart_itempo"] = array_merge($_SESSION["cart_itempo"],$itemArray);
        }
      } else {
        $_SESSION["cart_itempo"] = $itemArray;
      }
    }
             
              
    }


//Update query
  if(isset($_POST['btnSave']))
                {
                    $category_no11 = $_POST['category_no1'];
                    $c_name = $_POST['c_name1'];
                  
                    mysql_query("UPDATE category SET category_name='".$c_name."' WHERE category_no='".$category_no11."'");
                     echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Success!","Update Successful!","success");';
        echo '},);</script>';
                                       
                }

                if(isset($_POST['btnRemove']))
                 {
include("../include/connect.php");
 $nos=$_POST['btnRemove'];

 $status="inactive";


$sql="UPDATE category set status='".$status."' 
  where category_no='{$nos}'";
 
          if ($dbLink->query($sql) === TRUE) 
         {
          
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Success!","Category Deleted!","success");';
        echo '},);</script>';
       
        } 

else 
        {
              echo '<script type="text/javascript">';
              echo 'setTimeout(function () { swal("Error!","There Was an error","error");';
              echo '},);</script>'; 
        }

}


?>