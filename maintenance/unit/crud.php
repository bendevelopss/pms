<?php
$content1=mysql_query("select max(unit_no) as max from unitmeasurement");
$total1=@mysql_affected_rows();

    
$row=mysql_fetch_array($content1);
$noo=$row['max'];

$hell=$noo+1;

$uname=$_POST['txtname'];
$abbre=$_POST['txtabbre'];

$find=mysql_query("select * from unitmeasurement where unit_measurment='".$uname."' and Abbreviation='".$abbre."' and status='active'");
$total1=@mysql_affected_rows();
$row=mysql_fetch_array($find);
$unit_name=$row['unit_measurment'];

$find2=mysql_query("select * from unitmeasurement where Abbreviation='".$abbre."' and unit_measurment='".$uname."' and status='active'");
$total12=@mysql_affected_rows();
$row2=mysql_fetch_array($find2);
$abbre_name=$row2['Abbreviation'];

if(isset($_POST['btnAdd']) && !empty($uname)&& !empty($abbre) && $uname == $unit_name && $abbre_name == $abbre)

{

 echo '<script type="text/javascript">alert("Duplicate data is not allowed")</script>'; 
}

else if(isset($_POST['btnAdd']) && !empty($uname)&& !empty($abbre) && $uname != $unit_name && $abbre_name != $abbre)

{

if(preg_match("/^[a-zA-Z,-,', .,-]*$/",$pname) && preg_match("/^[a-zA-Z,-,', .,-]*$/",$abbre) ) 
    {

$uname1= mysql_real_escape_string($uname);
$abbre1= mysql_real_escape_string($abbre);


$status="Active";


mysql_query("insert into unitmeasurement (unit_measurment, Abbreviation, status) values('".$uname1."', '".$abbre1."', '".$status."')");
  
echo '<script type="text/javascript">alert("Measurement has been added")</script>'; 
echo "<meta http-equiv='refresh' content='0'>";
}





}

//Update query
  if(isset($_POST['btnSave']))
                {
                    $unit_no1 = $_POST['unit_no1'];
                    $unit_name = $_POST['unit_name1'];
                    $abbre_name = $_POST['abbre_name1'];
                  
                    mysql_query("UPDATE unitmeasurement SET unit_measurment='".$unit_name."', Abbreviation='".$abbre_name."' WHERE unit_no='".$unit_no1."'");
                    echo "<script type='text/javascript'>alert('Update Successfull!')</script>";
                    echo "<meta http-equiv='refresh' content='0'>";
 
                                       
                }


?>



<!--Table function-->
<?php
if(isset($_POST['btnRemove'])) {

 $nos=$_POST['btnRemove'];

 $status="inactive";


mysql_query("update unitmeasurement set status='".$status."' 
  where unit_no=".$nos);
  echo'<div class="bottom">';
echo '<script type="text/javascript">alert("Unit Measurement has been deleted")</script>'; 
echo "<meta http-equiv='refresh' content='0'>";


}


?>


