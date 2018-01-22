<script src="../../plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
 <?php

$content1=mysql_query("select max(material_no) as max from materials");
$total1=@mysql_affected_rows();

    
$row=mysql_fetch_array($content1);
$noo=$row['max'];


$noo++;
$hell=$noo+1;





$cname=$_POST['cname'];
$scname=$_POST['scname'];
$desc=$_POST['desc'];
$brand=$_POST['brand'];
$color=$_POST['color'];
$pack=$_POST['pack'];
$unitname=$_POST['unitname'];
$abbrev=$_POST['abbrev'];
$pricing=$_POST['txtprice'];
$status="Active";



$find1111=mysql_query("select * from materials where category='".$cname."'");
$total11=@mysql_affected_rows();
$row1111=mysql_fetch_array($find1111);
$cname2=$row1111['category'];


$find11111=mysql_query("select * from materials where scategory_name='".$scname."'");
$total11111=@mysql_affected_rows();
$row11111=mysql_fetch_array($find11111);
$scname2=$row11111['scategory_name'];


$find11=mysql_query("select * from materials where description='".$desc."'");
$total11=@mysql_affected_rows();
$row11=mysql_fetch_array($find11);
$desc2=$row11['description'];




$noo++;
$hell=$noo+1;


$hell2 ="mtrl". $hell;


if(isset($_POST['btnAdd']))

{
include("../include/connect.php");

                     
$sql="INSERT into materials (code,category, scategory_name,description, brand_name, color, package, unit_measurement, abbre, price, status ) 
  values('". $hell2."','". $cname."','".$scname."', '".$desc."','".$brand."'  ,'".$color."', '".$pack."','".$unitname."', '".$abbrev."', '".$pricing."', '".$status."')";
  
   $result = $dbLink->query($sql);
 
        // Check if it was successfull
        if($result) 
         {
         
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Success!","New Material Added!","success");';
        echo '},);</script>';
       
        }
        else 
          {
              echo("Error description: " . mysqli_error($dbLink));
              echo '<script type="text/javascript">';
              echo 'setTimeout(function () { swal("Error!","There is an Error!","error");';
              echo '},);</script>';
         }

}


//Update query1
              if(isset($_POST['btnSave']))
              {
                $material_no11 = $_POST['material_no1'];           
                $cname11=$_POST['cname1'];
                $scname11=$_POST['scname1'];
                $desc11=$_POST['desc1'];
                $brand11=$_POST['brand1'];
                $color11=$_POST['color1'];
                $pack11=$_POST['pack1'];
                $unitname11=$_POST['unitname1'];
                $abbrev11=$_POST['abbrev1'];
                $price11=$_POST['price1'];



                mysql_query("UPDATE materials SET category='".$cname11."',scategory_name='".$scname11."',description='".$desc11."',brand_name='".$brand11."', color='".$color11."', package='".$pack11."', unit_measurement='".$unitname11."', abbre='".$abbrev11."' , price='".$price11."'  WHERE material_no='".$material_no11."'");
                echo '<script type="text/javascript">';
                echo 'setTimeout(function () { swal("Success!","Update Successful!","success");';
                echo '},);</script>';


              }

   


?>