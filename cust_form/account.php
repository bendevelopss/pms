<link href="../plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />    
<?php
ini_set('display-error',1);
error_reporting(E_ALL&~E_NOTICE);

if($connect=@mysql_connect("localhost","root"))
  echo"";
  else
die(@mysql_error());
$connect=@mysql_select_db("projectmonitoring");
session_start();

if($_SESSION['user']=='' && $_SESSION['pass']=='')
{
  echo '<script type="text/javascript">window.location.href="../index.php";</script>'; 
}

$content2=mysql_query("select * from customer where username='".$_SESSION['user']."' and password='".$_SESSION['pass']."' ");
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


$a= date("Y-m-d");

?>


<!DOCTYPE html>

<html>

<head>
  <meta charset="UTF-8">
  <title>Account Setting</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
  <!-- ionics -->   
  <link href="../plugins/ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css" />  
  <!-- FontAwesome 4.3.0 -->
  <link href="../bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />  
  <!-- Theme style -->
  <link href="../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
     folder instead of downloading all of them to reduce the load. -->
     <link href="../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
     <!-- SweetAlert -->    
     <link href="../plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />       
     <!-- Date Picker -->
     <link href="../plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
     <!-- Daterange picker -->
     <link href="../plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />


         <script src="../plugins/jQuery/jQuery-2.1.3.min.js" type="text/javascript"></script>
    <!-- <script src="jquery.js" ype="text/javascript"></script> -->

    <!-- jQuery UI 1.11.2 -->
    <script src="../plugins/jQueryUI/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

    <!-- Bootstrap 3.3.2 JS -->
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    

    <script src="../plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->

    <!-- mask -->
    <script src="../plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
    <script src="../plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
    
    <!-- FastClick -->

    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js" type="text/javascript"></script>
    <!-- DataTables -->
    <link href="../plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <script src="../plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>


       <style type="text/css">
    no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url(../assets/img/Preloader_3.gif) center no-repeat #fff;
}
</style>
 <?php
$content1=mysql_query("select max(customer_no) as max from customer");
$total1=@mysql_affected_rows();

    
$row=mysql_fetch_array($content1);
$noo=$row['max'];

$hell=$noo+1;
$type=$_POST['radiobutton'];
$sname1=$_POST['txtname'];
$phone=$_POST['txtphone'];
$fax=$_POST['txtfax'];
$email=$_POST['txtemail'];
$fname=$_POST['txtfirstname'];
$mname=$_POST['txtmiddlename'];
$lname=$_POST['txtlastname'];
$contact=$_POST['txtcontact'];
$street=$_POST['txtstreet'];
$city=$_POST['txtcity'];

$status="Active";
$cont= strlen($contact);

$sname= mysql_real_escape_string($sname1);


if(empty($mname))
{

$mname=" ";

}


if(isset($_POST['btnAdd']) && $type=="Company" &&  !empty($sname1))

{



if( !empty($sname1) && !empty($fname) && !empty($lname) && !empty($contact) && !empty($street) && !empty($city))


{

if(preg_match("/^[a-zA-Z,-,', .,-]*$/",$fname) && preg_match("/^[a-zA-Z,-,', .,-]*$/",$mname) && preg_match("/^[a-zA-Z,-,', .,-]*$/",$lname) && preg_match("/^[0-9]*$/",$contact) && preg_match("/^[0-9,-]*$/",$phone) && preg_match("/^[0-9,-]*$/",$fax) ) 
    {

$fname1= mysql_real_escape_string($fname);
$mname1= mysql_real_escape_string($mname);
$lname1= mysql_real_escape_string($lname);


$status="Active";


mysql_query("insert into customer (cust_type, comp_name, phone_num, fax, email, firstname, middlename, lastname, contact, street , city, status) values('".$type."', '".$sname."', '".$phone."', '".$fax."', '".$email."', '".$fname1."', '".$mname1."', '".$lname1."', '".$contact."', '".$street."', '".$city."', '".$status."')");
  
 echo '<script type="text/javascript">alert("Customer has been added")</script>'; 



}


}



}



else if(isset($_POST['btnAdd']) && $type=="Company" && empty($sname)  && empty($fname) && empty($lname) && empty($contact) && empty($street) && empty($city))


{

echo '<script type="text/javascript">alert("Pleae input Data")</script>'; 




}

//individual

if(isset($_POST['btnAdd']) && $type=="Individual")

{



if( !empty($fname) && !empty($lname) && !empty($contact) && !empty($street) && !empty($city))


{

if(preg_match("/^[a-zA-Z,-,', .,-]*$/",$fname) && preg_match("/^[a-zA-Z,-,', .,-]*$/",$mname) && preg_match("/^[a-zA-Z,-,', .,-]*$/",$lname) && preg_match("/^[0-9]*$/",$contact) && preg_match("/^[0-9,-]*$/",$phone) && preg_match("/^[0-9,-]*$/",$fax) ) 
    {

$fname1= mysql_real_escape_string($fname);
$mname1= mysql_real_escape_string($mname);
$lname1= mysql_real_escape_string($lname);


$status="Active";


mysql_query("insert into customer (cust_type, comp_name, phone_num, fax, email, firstname, middlename, lastname, contact, street , city, status) values('".$type."', '".$sname."', '".$phone."', '".$fax."', '".$email."', '".$fname1."', '".$mname1."', '".$lname1."', '".$contact."', '".$street."', '".$city."', '".$status."')") or die (mysql_error());
  
 echo '<script type="text/javascript">alert("Customer has been added")</script>'; 

}








}



}



else if(isset($_POST['btnAdd']) && $type=="Individual" && empty($fname) && empty($lname) && empty($contact) && empty($street) && empty($city))


{

echo '<script type="text/javascript">alert("Pleae input Data")</script>'; 




}


//Update query
  if(isset($_POST['btnSave']))
                {
                    $type=$_POST['radiobutton'];
                    $sname1=$_POST['txtname'];
                    $phone=$_POST['txtphone'];
                    $fax=$_POST['txtfax'];
                    $email=$_POST['txtemail'];
                    $fname=$_POST['txtfirstname'];
                    $mname=$_POST['txtmiddlename'];
                    $lname=$_POST['txtlastname'];
                    $contact=$_POST['txtcontact'];
                    $address=$_POST['txtstreet'];
                    $city=$_POST['txtcity'];
                  
                    mysql_query("UPDATE customer SET cust_type='".$type."',comp_name='".$sname1."',phone_num='".$phone."',fax='".$fax."',email='".$email."',firstname='".$fname."',middlename='".$mname."',lastname='".$lname."',contact='".$contact."',street='".$address."', city='".$city."' WHERE username='".$_SESSION['user']."' and password='".$_SESSION['pass']."' ") or die (mysql_error());
                    echo "<script type='text/javascript'>alert('UPDATE SUCCESSFUL!')</script>";
                      echo "<meta http-equiv='refresh' content='0'>";
                                       
                }


?>

  <div class="se-pre-con"></div>
   </head>

   <body class='skin-red fixed sidebar-collapse'>

    <?php



    $prepare= $_POST['prepared'];
    ?>

    <form action="" method="post" name="frm" id="frm">
      <header class="main-header">
        <!-- Logo --> 
        <a href="index.php" class="logo">

         <span class="logo-lg"><img style="HEIGHT:45px;" src="../assets/img/logo.png" alt="Logo" style="float: left;"><label style="font-family: 'Cinzel'; font-size: 110%">PERSAN INC.</label></span>

         <!-- logo for regular state and mobile devices -->
         <span class="logo-lg"><img style="HEIGHT:45px;" src="../assets/img/logo.png" alt="Logo" style="float: left;"><label style="font-family: 'Cinzel'; font-size: 110%">PERSAN INC.</label></span>
       </a>
       <!-- Logo -->
       <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->

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
             
             
               <?php include("../maintenance/nav.php"); ?>  
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
               

                 <?php include("../maintenance/user_type.php"); ?>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="pull-left">
                  <a href="?logout=true" class="btn btn-primary btn-flat btn-center"><i class="fa fa-sign-in"></i> Sign out</a>
                </div>
                 <div class="pull-right">
                  <a href="index.php" class="btn btn-primary btn-flat btn-center"><i class="fa fa-open"></i> Request Quotation</a>
                </div>
              </li>
            </ul>
          </li> 
         
            <!-- User Account: style can be found in dropdown.less -->
          </ul>
        </div>
      </nav>

              <?php
              if(isset($_GET['logout']))
              {
                mysql_query("update sample set status='inactive' where user='".$_SESSION['user']."' and pass='".$_SESSION['pass']."' ");
                session_destroy();
                echo "<meta http-equiv='refresh' content='0'>";
              }
              ?>  
           
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <?php include("aside.php") ?>


    <!-- Right side column. Contains the navbar and content of the page -->
    <div class="content-wrapper">

      <section class="content-header">
        <h1>
          Customer Account
          <small>Settings</small>
        </h1>                              
      </section>

      <!-- Main content -->
      <section class="content">
        <!--Table function-->


        <!-- Small boxes (Stat box) -->
        <div class="row" >
        <center>                                 
          <div class="col-lg-7">
                <div class="box-header with-border">
          
                  <div class="row">                     <!-- TABLES -->
                    <div class="col-lg-12 center">
                      <div class="box box-solid">
                        <div class="box-header">
                          <h3 class="box-title"></h3>
                          <div class="myData"></div>

                        </div><!-- /.box-header -->
                        <div class="box-body" >

                             <form class="card">
<label style="font-size: 1.3em;">Customer Type:</label>

<p>
<?php if($cust_type2=="Company")
{
echo'<input class="w3-radio" type="radio" name="radiobutton" id="no_radio" onChange="disablefield();" value="Company" checked>
<label class="w3-validate"  style="font-size: 1em;" >Company</label>
<input class="w3-radio" type="radio" id="yes_radio" name="radiobutton" onChange="disablefield();" value="Individual">
<label class="w3-validate"  style="font-size: 1em;" >Individual</label>';
}
 else
{
echo'<input class="w3-radio" type="radio" name="radiobutton" id="no_radio" onChange="disablefield();" value="Company">
<label class="w3-validate"  style="font-size: 1em;">Company</label>
<input class="w3-radio" type="radio" id="yes_radio" name="radiobutton" onChange="disablefield();" value="Individual" checked>
<label class="w3-validate"  style="font-size: 1em;" >Individual</label>';
}?>
</p>

</form>

<h1 style="font-size: 1.3em;">ACCOUNT INFORMATION</h1><hr>

                               <center><div class="row" style="margin-left: 250px;">
                             <div class="col-sm-3 col-xs-12" id="f_desc_div" class='form-group'>
    <label><font color="darkred">*</font>Username:</label>
    <input class="form-control" type="text" placeholder="Username" name="user" id="user" value="<?php echo $user2; ?>" style="text-align: center;" required>
  </div>

                           <div class="col-sm-3 col-xs-12" id="f_desc_div" class='form-group'>
    <label><font color="darkred">*</font>Password:</label>
    <input class="form-control" type="password" placeholder="Password" name="pass" id="pass" value="<?php echo $pass2; ?>" style="text-align: center;" required>
  </div>
                           <div class="col-sm-3 col-xs-12" id="f_desc_div" class='form-group'>
    <label><font color="darkred">*</font>Confirm Password:</label>
    <input class="form-control" type="password" placeholder="Confirm Password" name="cpass" id="cpass" value="<?php echo $pass2; ?>" style="text-align: center;" required>
  </div>
</div>
 
<h1 style="font-size: 1.3em;">COMPANY INFORMATION</h1><hr>
<br>
                               <div class="row" style="margin-left: 250px;">
                             <div class="col-sm-3 col-xs-12" id="f_desc_div" class='form-group'>
    <label>Company Name:</label>
    <input class="form-control" type="text" placeholder="Company Name" name="txtname" id="textbox_A" value="<?php echo $comp_name2; ?>" style="text-align: center;" >
  </div>
                             <div class="col-sm-3 col-xs-12" id="f_desc_div" class='form-group'>
    <label>Phone Number:</label>
      <strong><span id='messages'></span></strong>
    <input class="form-control" type="number" placeholder="Phone Number" name="txtphone" id="textbox_B" value="<?php echo $phone_num2; ?>" style="text-align: center;" >
  </div>
                             <div class="col-sm-3 col-xs-12" id="f_desc_div" class='form-group'>
    <label>Fax Number:</label>
    <input class="form-control" type="number" placeholder="Fax Number" name="txtfax" id="textbox_C" value="<?php echo $fax2; ?>" style="text-align: center;" >
  </div>

</div>
<br>


<!--3 box--> 
<h1 style="font-size: 1.3em;">PERSONAL INFORMATION</h1><hr>
<br>
                               <div class="row" style="margin-left: 250px;">
                             <div class="col-sm-3 col-xs-12" id="f_desc_div" class='form-group'>
    <label><font color="darkred">*</font>First Name:</label>
     
    <input class="form-control" type="text" placeholder="First Name" style="height:33px; text-align: center;" id="firstname" name="txtfirstname" value="<?php echo $firstname2; ?>" required>
  </div>
                             <div class="col-sm-3 col-xs-12" id="f_desc_div" class='form-group'>
    <label>Middle Name:</label>
    <input class="form-control" type="text" placeholder="Middle Name" style="height:33px; text-align: center;" id="middlename" name="txtmiddlename" value="<?php echo $middlename2; ?>" >
  </div>
                             <div class="col-sm-3 col-xs-12" id="f_desc_div" class='form-group'>
    <label><font color="darkred">*</font>Last Name:</label>
     <strong></span></strong>
    <input class="form-control" type="text" placeholder="Last Name" style="height:33px; text-align: center;"  name="txtlastname" id="lastname" value="<?php echo $lastname2; ?>" required>
  </div>
  </div><br>
                             <div class='row' style="margin-left: 250px;">
                             <div class="col-sm-3 col-xs-12" id="f_desc_div" class='form-group'>
    <label><font color="darkred">*</font>Contact Number:</label>
    <input class="form-control" type="text" placeholder="Contact Number" id="contact" name="txtcontact" value="<?php echo $contact2; ?>" style="text-align: center;" required>
  </div>
                             <div class="col-sm-4 col-sm-12" id="f_desc_div" class='form-group'>
    <label><font color="darkred">*</font>Email Address:</label>
    <input class="form-control" type="email" placeholder="Email Address" id="email" name="txtemail" value="<?php echo $email2; ?>" style="text-align: center;" required>
  </div> 
</div>
<br>

<!--4 box--> 
<h1 style="font-size: 1.3em;">ADDRESS</h1><hr>
<br>
                             <div class='row' style="margin-left: 250px;">
                             <div class="col-sm-4 col-xs-12" id="f_desc_div" class='form-group'>
    <label><font color="darkred">*</font>Street:</label>
    <input class="form-control" type="text" placeholder="Street" style="height:33px; text-align: center;" id="street" name="txtstreet" value="<?php echo $street2; ?>"  required>
  </div>
                             <div class="col-sm-4 col-xs-12" id="f_desc_div" class='form-group'>
    <label><font color="darkred">*</font>City:</label>
    <input class="form-control" type="text" placeholder="City" style="height:33px; text-align: center;" id="city" name="txtcity" value="<?php echo $city2; ?>" required>
  </div><br>

</div>
<br>

<!--Butons-->
<br>
<center>
<input type="submit" name="btnSave" value="SUBMIT" class="btn btn-block bg-blue" style="width: 15%; "/>

<button type="button" name="btnReset" class="btn btn-block bg-red" style="width: 15%; " onclick="ClearFields();">RESET</button>
    </center>                      



                  </div>  <!-- /.row -->         



                </div> <!-- /.row --> 
              </section><!-- right col -->
            </div><!-- /.row (main row) -->
          </section><!-- /.content -->
          <footer class="main-footer">
            <div class="pull-right hidden-xs">
              <b>Version</b> 3.0
            </div>
            <strong>Copyright &copy; 2016<?php if(date("Y")!=2015)echo" - ".date("Y")."";?></strong> All rights reserved.
          </footer>        
        </div><!-- /.content-wrapper -->

      </div><!-- ./wrapper -->






  <!--Clear Fields-->
  <script type="text/javascript"> 
    function ClearFields() {
      document.getElementById("firstname").value = "";
      document.getElementById("middlename").value = "";
      document.getElementById("lastname").value = "";
      document.getElementById("contact").value = "";
      document.getElementById("email").value = "";
      document.getElementById("city").value = "";
      document.getElementById("user").value = "";
      document.getElementById("pass").value = "";
      document.getElementById("cpass").value = "";
      document.getElementById("street").value = "";



    }
  </script>

<!--Validations-->
<script>
  function myFunction() {
    var txtemail,txtfirstname, txtmiddlename ,txtlastname, txtcontact, txtstreet, txtcity, textcontact1;
    var user = document.getElementById("user").value;
    var a= document.getElementById("pass").value;
    var b= document.getElementById("cpass").value;


    if(a!=b)
    {
      alert("Your Password doesn't match!");
      return false;
    }
   
    else 
    {
      text = "Input OK";
    }
    
  }
</script>




</html>
<script type="text/javascript">
    $(window).load(function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");;

    });
</script> 
    <script type="text/javascript">
      $('#textbox_A,#firstname,#middlename,#lastname,#city,#street').keyup(function() {
  this.value = this.value.toUpperCase();
});
    </script>