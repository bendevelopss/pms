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
            
                 <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle " data-toggle="dropdown" >
             
             
              <span class="hidden-sm" style="font-size: 11.5pt;">Welcome, <font style="font-weight: bolder;">Customer</font> <i class="fa fa-user fa-lg"></i></span>
               <?php include("../maintenance/nav.php"); ?>  
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
               

                <p>
                  <?php echo ''.ucfirst($firstname2).' '.strtoupper($middlename2[0]).'. '.ucfirst($lastname2).''; ?>
                  <br>
                  <label><?php echo ''.ucfirst($position).''; ?></label>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div>
                  <a href="?logout=true" class="pull-left btn btn-primary btn-flat btn-center"><i class="fa fa-sign-in"></i> Sign out</a>
                  <a href="index.php" class="pull-right btn btn-primary btn-flat btn-center">Request Quotation</a>
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
      <!-- Content Header (Page header) -->
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
          <div class="col-lg-12 col-lg-12 col-lg-12">             <!-- NEW RECORD -->
                <!-- <a href="addTax.php"><button class="btn btn-success btn-lg" style="margin-bottom:5px;
                  box-shadow: 0px 4px 8px #888888"> 
                + ADD NEW RECORD</button> </a> -->
                <div class="box-header with-border">










                  <div id="loading" class="modal fade">
                    <div class="modal-dialog">
                      <div class="overlay">
                        <div class="modal-body" style="text-align:center">
                          <div class="overlay">
                            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                            <i class="fa fa-spinner fa-pulse fa-spin"  
                            style="font-size:60px;"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <?php include("crud.php") ?>


          
                  <div class="row">                     <!-- TABLES -->
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                      <div class="box box-solid">
                        <div class="box-header">
                          <h3 class="box-title">Edit Account</h3>
                          <div class="myData"></div>

                        </div><!-- /.box-header -->
                        <div class="box-body">

                               <div class="row">
                             <div class="col-sm-2 col-xs-12" id="f_desc_div" class='form-group'>
                      <label><font color="darkred">*</font>User Name:</label> <!-- DESCRIPTION -->
                      <input class="form-control" type="text" placeholder="Username" name="user" id="user" value="<?php echo $user2; ?>" style="height:33px;" required>
                              </div>
                      

                           <div class="col-sm-2 col-xs-12" id="f_desc_div" class='form-group'>
                            <label for="email"><font color="darkred">*</font>Password:</label>
                            <input class="form-control" type="password" placeholder="Password" name="pass" id="pass" value="<?php echo $pass2; ?>" style="height:33px;" required>

                          </div>

                           <div class="col-sm-2 col-xs-12" id="f_desc_div" class='form-group'>
                            <label for="email"><font color="darkred">*</font>Confirm Password:</label>
                            <input class="form-control" type="password" placeholder="Confirm Password" name="cpass" id="cpass" value="<?php echo $pass2; ?>" style="height:33px;" required>

                          </div>
                        </div>


                            <div class="row">
                           <div class="col-sm-2 col-xs-12" id="f_desc_div" class='form-group'>
                            <label for="email"><font color="darkred">*</font>First Name:</label>

                            <input class="form-control" type="text" placeholder="First Name" style="height:33px;" id="firstname" name="txtfirstname" value="<?php echo $firstname2; ?>" required>

                          </div>




                           <div class="col-sm-2 col-xs-12" id="f_desc_div" class='form-group'>
                            <label for="email">Middle Name:</label>

                            <input class="form-control" type="text" placeholder="Middle Name" style="height:33px;" id="middlename" name="txtmiddlename" value="<?php echo $middlename2; ?>">

                          </div>


                           <div class="col-sm-2 col-xs-12" id="f_desc_div" class='form-group'>
                            <label for="email"><font color="darkred">*</font>Last Name:</label>
                            <input class="form-control" type="text" placeholder="Last Name" style="height:33px;"  name="txtlastname" id="lastname" value="<?php echo $lastname2; ?>" required>
                          </div>
                          </div>


                           <div class="row">
                         <div class="col-sm-2 col-xs-12" id="f_desc_div" class='form-group'>
                            <label for="email"><font color="darkred">*</font>Contact Number:</label>
                            <input class="form-control" type="text" placeholder="Contact Number" style="height:33px; " id="contact" name="txtcontact" value="<?php echo $contact2; ?>" required>

                          </div>



                          <div class="col-sm-2 col-xs-12" id="f_desc_div" class='form-group'>
                            <label for="email"><font color="darkred">*</font>Email address:</label>
                            <input class="form-control" type="email" placeholder="Email Address" style="height:33px; " id="email" name="txtemail" value="<?php echo $email2; ?>" required>
                          </div>

                          

                          <div class="col-sm-2 col-xs-12" id="f_desc_div" class='form-group'>
                            <label for="email"><font color="darkred">*</font>Street:</label>
                            <input class="form-control" type="text" placeholder="Street" style="height:33px;" id="street" name="txtstreet" value="<?php echo $street2; ?>" required>
                          </div>



                          <div class="col-sm-2 col-xs-12" id="f_desc_div" class='form-group'>
                            <label for="email"><font color="darkred">*</font>City:</label> 
                        <input class="form-control" type="text" placeholder="City" style="height:33px;" id="city" name="txtcity" value="<?php echo $city2; ?>" required>
                          </div>
                        </div>
                          

                          <center style="margin-top: 20px;">
                          <div class="row" id="f_desc_div" class='form-group' >
                          <input type="submit" name="btnSave" onclick="return myFunction();" value="Update" class="btn btn-primary"/ required>


                          <button type="button" name="btnReset" class="btn btn-danger" onclick="ClearFields();">Reset</button>
                          </div>
                          </center>




                        </div><!-- /.box-body -->
                      </div><!-- /.box -->
                    </div><!-- /.col -->
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

    
          
          </div>
        </div>
      </form>
    </div> 

         

        </div>
      </div>
    </form>
  </div> 




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