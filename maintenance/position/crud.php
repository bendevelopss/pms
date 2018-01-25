 <link href="../../plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />    
<?php
$content1=mysql_query("select max(position_no) as max from position");
$total1=@mysql_affected_rows();


$row=mysql_fetch_array($content1);
$noo=$row['max'];

$hell=$noo+1;

$pname=$_POST['txtname'];


$find=mysql_query("select * from position where position_name='".$pname."' and status='active'");
$total11=@mysql_affected_rows();
$row=mysql_fetch_array($find);
$name=$row['position_name'];


if(isset($_POST['btnAdd']) && !empty($pname) && $pname == $name)

{

        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Error!","Duplicate position not allowed","error");';
        echo '},);</script>';

}


else if(isset($_POST['btnAdd']) && !empty($pname) && $pname != $name)

{

  if(preg_match("/^[a-zA-Z,-,', .,-]*$/",$pname)) 
  {

    $pname1= mysql_real_escape_string($pname);


    $status="Active";


    mysql_query("insert into position (position_name,  status) values('".ucfirst($pname1)."','".$status."')");
    
    echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Success!","New Position Added!","success");';
        echo '},);</script>';
  }





}


//Update query
if(isset($_POST['btnSave']))
{
  $pos_no = $_POST['pos_no1'];
  $pos_name = $_POST['pos_name1'];
  
  mysql_query("UPDATE position SET position_name='".ucfirst($pos_name)."' WHERE position_no='".$pos_no."'");
  echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Success!","Position Updated","success");';
        echo '},);</script>';
  
  
}


?>

<?php
if(isset($_POST['btnRemove'])) {

 $nos=$_POST['btnRemove'];

 $status="inactive";


mysql_query("update position set status='".$status."' 
  where position_no=".$nos);
  echo'<div class="bottom">';
echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Success!","Position Deleted","success");';
        echo '},);</script>';


}


?>






