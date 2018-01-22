<link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css" /> 
<?php
ini_set('display-error',1);
error_reporting(E_ALL&~E_NOTICE);

if($connect=@mysql_connect("localhost","root"))
  echo"";
else
  die(@mysql_error());
$connect=@mysql_select_db("pms");
session_start();

$user=$_POST['user'];
$pass=$_POST['pass'];
$pos=$_POST['pos'];



$find=mysql_query("SELECT * from sample where user='".$user."' and (account_status='active' or account_status='Active')");
$total1=@mysql_affected_rows();
$row=mysql_fetch_array($find);
$user2=$row['user'];
$pass2=$row['pass'];
$pos2=$row['position'];

$pos=$pos2;

if(isset($_POST['login']) && $user!=$user2 && $pass!=$pass2)
{

  echo '<script type="text/javascript">';
  echo 'setTimeout(function () { swal("warning!","Invalid Username or Password","warning");';
  echo '},);</script>'; 

}

if(isset($_POST['login']) && $user==$user2 && $pass==$pass2 && $pos=='customer')
{

  $_SESSION['user']=$user;
  $_SESSION['pass']=$pass;
  $_SESSION['pos']=$pos;

  mysql_query("UPDATE sample set status='active' where user='".$user."' and pass='".$pass."' ");
  header('Location: cust_form/index.php');

}
else if(isset($_POST['login']) && $user==$user2 && $pass==$pass2)
{

  $_SESSION['user']=$user;
  $_SESSION['pass']=$pass;
  $_SESSION['pos']=$pos;

  mysql_query("UPDATE sample set status='active' where user='".$user."' and pass='".$pass."' ");
  header('Location: home/ongoing/index.php');

}






if(isset($_POST['btnSave']))
{



  if(preg_match("/^[a-zA-Z,-,', .,-]*$/",$f1) && preg_match("/^[a-zA-Z,-,', .,-]*$/",$m1) && preg_match("/^[a-zA-Z,-,', .,-]*$/",$l1)) 
  {


    $user = $_POST['user1'];
    $pass = $_POST['pass1'];
    $email = $_POST['email1'];
    $f1 = $_POST['f1'];
    $m1 = $_POST['m1'];
    $l1 = $_POST['l1'];
    $c1 = $_POST['c1'];
    $a1 = $_POST['a1'];
    $city = $_POST['city1'];
    $status='inactive';
    $account_status='active';
    $pos='customer';
    $user1= mysql_real_escape_string($user);
    $pass1= mysql_real_escape_string($pass);

    $fname1= mysql_real_escape_string($f1);
    $mname1= mysql_real_escape_string($m1);
    $lname1= mysql_real_escape_string($l1);
    
    mysql_query("insert into sample (user,  pass, position ,status,account_status) values('".$user."','".$pass."','".$pos."','".$status."','".$account_status."')");
    mysql_query("insert into customer (username,  password, cust_type , email, firstname, middlename ,lastname , contact, street, city, status) values('".$user1."','".$pass1."', 'Individual','".$email."', '".$fname1."', '".$mname1."', '".$lname1."', '".$c1."', '".$a1."', '".$city."','".$status."')");
    echo "<script type='text/javascript'>alert('Your account has been created')</script>";
    



    
  }
}

?>


<script>

  function myFunction() {
    var user,pass, text;

    // Get the value of the input field with id="numb"
    user = document.getElementById("user").value;
    pass = document.getElementById("pass").value;
    pos = document.getElementById("pos").value;

    // If x is Not a Number or less than one or greater than 10
    if (pass==''&& user=='') 
    { 
      clear();
      $("#loginBox").effect( "shake", {times:5}, 300 ); 
      setTimeout(function () { swal("","Please Fill in the Fields","warning")});
      return false;
    } 
    else if (user=='') 
    {   
      clear();
      $("#loginBox").effect( "shake", {times:5}, 300 );  
      setTimeout(function () { swal("","Username cannot be blank","warning")});
      return false;
    } 
    else if (pass=='') 
    {
      clear();
      $("#loginBox").effect( "shake", {times:5}, 300 );  
      setTimeout(function () { swal("","Password cannot be blank","warning")});
      return false;
    } 
    else 
    {
      text = "Input OK";
    }
    document.getElementById("demo").innerHTML = text;
  }
  function clear()
  {
      //$('#uname').val('');
     // $('#upass').val('');
      //$('#branch').val('- Select Branch -');
      $('#pass').val('');
      $('#user').val('');
     // $('#branchDiv').removeClass('has-warning');
   }
   
   function get_id(o) {
    myRowIndex = $(o).parent().parent().index();
    var getid=  (document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[0].innerHTML);    
    var $modal = $('#myModal'),
    $material_no1 = $modal.find('#material_no1');
    $material_no1.val(getid);    
    $brand1 = $modal.find('#brand1');
    $brand1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[1].innerHTML);       
    $desc1 = $modal.find('#desc1');
    $desc1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[2].innerHTML);       
    $color1 = $modal.find('#color1');
    $color1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[3].innerHTML);
    $pack1 = $modal.find('#pack1');
    $pack1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[4].innerHTML);
    $unitname1 = $modal.find('#unitname1');
    $unitname1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[5].innerHTML);
    $abbrev1 = $modal.find('#abbrev1');
    $abbrev1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[6].innerHTML);
    $price1 = $modal.find('#price1');
    $price1.val(document.getElementById("tableko1").rows[($(o).parent().parent().index())+1].cells[7].innerHTML);

  }

  function myFunctions() {
    var pass1,pass2,user1, f1, l1, c1, email1, a1, city1;

    // Get the value of the input field with id="numb"
    pass1 = document.getElementById("pass1").value;
    pass2 = document.getElementById("pass2").value;
    user1 = document.getElementById("user1").value;
    f1 = document.getElementById("f1").value;
    l1 = document.getElementById("l1").value;
    c1 = document.getElementById("c1").value;
    email1 = document.getElementById("email1").value;
    a1 = document.getElementById("a1").value;
    city1 = document.getElementById("city1").value;



    // If x is Not a Number or less than one or greater than 10
    if (pass1==''&&pass2=='') 
    {
      setTimeout(function () { swal("","Please Fill in the Fields","warning")});
      return false;
    } 
    else if (user1=='') 
    {
     setTimeout(function () { swal("","Username Empty","warning")});
     return false;
   } 
   else if (f1=='') 
   {
    setTimeout(function () { swal("","First Name Empty","warning")});
    return false;
  } 
  else if (l1=='') 
  {
    setTimeout(function () { swal("","Last Name Empty","warning")});
    return false;
  } 
  else if (c1=='') 
  {
    setTimeout(function () { swal("","Contact Number Empty","warning")});
    return false;
  } 
  else if (email1=='') 
  {
    setTimeout(function () { swal("","Email Empty","warning")});
    return false;
  } 
  else if (a1=='') 
  {
    setTimeout(function () { swal("","Street Empty","warning")});
    return false;
  } 
  else if (city1=='') 
  {
    setTimeout(function () { swal("","City Empty","warning")});
    return false;
  } 
  else if (pas1s=='') 
  {
    setTimeout(function () { swal("","Password Empty","warning")});
    return false;
  } 
  else 
  {
    text = "Input OK";
  }
  document.getElementById("demo").innerHTML = text;
}
</script>