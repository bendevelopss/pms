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

$content2=mysql_query("SELECT * from employee where username='".$_SESSION['user']."' and password='".$_SESSION['pass']."' ");
$total2=@mysql_affected_rows();


$row1=mysql_fetch_array($content2);

$user2=$row1['username'];
$pass2=$row1['password'];
$cust_type2=$row1['cust_type'];
$comp_name2=$row1['comp_name'];
$phone_num2=$row1['phone_num'];
$fax2=$row1['fax'];
$email2=$row1['email'];
$firstname2=$row1['firstname'];
$middlename2=$row1['middlename'];
$lastname2=$row1['lastname'];
$contact2=$row1['contact'];
$city2=$row1['city'];
$street2=$row1['street'];
$position=$row1['position'];
$image=$row1['image'];

$a= date("Y-m-d");

?>


<?php
$content1=mysql_query("select max(material_no) as max from materials");
$total1=@mysql_affected_rows();


$row=mysql_fetch_array($content1);
$noo=$row['max'];



$hell=$noo+1;


$hell2 ="mtrl". $hell;


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






if(isset($_POST['btnAdd']) && !empty($cname)  && !empty($scname))

{

  if(preg_match("/^[a-zA-Z,-,', .,-]*$/",$brand) && preg_match("/^[a-zA-Z,-,', .,-]*$/",$desc) && preg_match("/^[a-zA-Z,-,', .,-]*$/",$pack))
  {

    $brands= mysql_real_escape_string($brand);
    $descs= mysql_real_escape_string($desc);
    $packs= mysql_real_escape_string($pack);





    mysql_query("insert into materials (code,category, scategory_name,description, brand_name, color, package, unit_measurement, abbre, price, status ) 
      values('". $hell2."','". $cname."','".$scname."', '".$descs."','".$brands."'  ,'".$color."', '".$packs."','".$unitname."', '".$abbrev."', '".$pricing."', '".$status."')");
    
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Success!","New Material Added!","success");';
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

<?php
if(isset($_POST['btnRemove'])) {

 $nos=$_POST['btnRemove'];

 $status="inactive";


 mysql_query("update materials set status='".$status."' 
  where material_no=".$nos);
  echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Success!","Material Deleted!","success");';
        echo '},);</script>';


}

?>