<?php
$content1=mysql_query("select max(scategory_no) as max from subcategory");
$total1=@mysql_affected_rows();


$row=mysql_fetch_array($content1);
$noo=$row['max'];

$hell=$noo+1;

$cname=$_POST['cname'];
$scname=$_POST['txtname'];






$status="Active";


if(isset($_POST['btnAdd']) && !empty($scname) && $category_name1==$cname && $scategory_name2==$scname)

{

  echo '<script type="text/javascript">alert("Duplicate data is not allowed")</script>'; 

}


else if(isset($_POST['btnAdd']) && !empty($scname) && $categoey_name1!=$cname && $scategory_name!=$scname)

{

  if(preg_match("/^[a-zA-Z,-,', ,.]*$/",$scname)) 
  {

    $scname1= mysql_real_escape_string($scname);


    $status="Active";


    mysql_query("insert into subcategory (category_name, scategory_name,  status) values('".$cname."','".$scname1."','".$status."')");

    echo '<script type="text/javascript">alert("Subcategory has been added")</script>'; 
    echo "<meta http-equiv='refresh' content='0'>";
  }

}




if(isset($_POST['btnAdd']))

{





}






//Update query
if(isset($_POST['btnSave']))
{
  $sc_no = $_POST['sc_no1'];
  $c_name = $_POST['c_name1'];
  $sc_name = $_POST['sc_name1'];

  mysql_query("UPDATE subcategory SET category_name='".$c_name."' ,scategory_name='".$sc_name."' WHERE scategory_no='".$sc_no."'");
  echo '<script type="text/javascript">';
  echo 'setTimeout(function () { swal("Success!","SubCategory Updated!","success");';
  echo '},);</script>';


}


if(isset($_POST['btnRemove'])) {
  include("../include/connect.php");
  $nos=$_POST['btnRemove'];

  $status="inactive";


  $sql="UPDATE subcategory set status='".$status."' 
  where scategory_no='{$nos}'";
  if ($dbLink->query($sql) === TRUE) 
  {

    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal("Success!","Subcategory Deleted!","success");';
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