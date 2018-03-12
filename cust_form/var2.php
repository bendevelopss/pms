<link href="../plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />
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
  header('Location: ../index.php');
}

$content2=mysql_query("SELECT * from customer where username='".$_SESSION['user']."' and password='".$_SESSION['pass']."' ");
$cont2=mysql_query("SELECT * from employee where username='".$_SESSION['user']."' and password='".$_SESSION['pass']."' ");
$total2=@mysql_affected_rows();


$row1=mysql_fetch_array($content2);
$row=mysql_fetch_array($cont2);

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
$position=$row['position'];

$a= date("Y-m-d");

?>

<?php
if(isset($_GET['logout']))
{
  mysql_query("update sample set status='inactive' where user='".$_SESSION['user']."' and pass='".$_SESSION['pass']."' ");
  session_destroy();
  echo '<script type="text/javascript">window.location.href="../index.php";</script>';
}






$proj=$_POST['c_name1'];

if($cust_type2=="Company")
{
  $name=''.$comp_name2.'';
}
else if($cust_type2=="Individual")
{
  $name=''.ucfirst($lastname2).', '.ucfirst($firstname2).' '.ucfirst($middlename2[0]).'.';
}


if(isset($_POST['req']))

{
  include("../maintenance/include/connect.php");
  $lid='';

  $status="requested";

  $sql="INSERT into quotation (username, password, customer, project, date, address, phone, email, status) values('".$_SESSION['user']."','".$_SESSION['pass']."','".$name."', '".$proj."', '".$a."', '".$street2."', '".$phone_num2."', '".$email2."','".$status."')";

  $result = $dbLink->query($sql);

  // Check if it was successfull
  if($result)
  {

    echo '<script type="text/javascript">';
    echo 'setTimeout(function () { swal("Success!","Request has Added!","success");';
      echo '},);</script>';

    }
    else
    {
      echo("Error description: " . mysqli_error($dbLink));
      echo '<script type="text/javascript">';
      echo 'setTimeout(function () { swal("Error!","There Was an error","error");';
        echo '},);</script>';
      }
    }
    ?>