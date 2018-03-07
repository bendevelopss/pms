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

$content2=mysql_query("SELECT * from employee where username='".$_SESSION['user']."' and password='".$_SESSION['pass']."' and position='".$_SESSION['pos']."' ");
$total2=@mysql_affected_rows();


$row=mysql_fetch_array($content2);

$user2=$row['username'];
$pass2=$row['password'];
$cust_type2=$row['cust_type'];
$comp_name2=$row['comp_name'];
$phone_num2=$row['phone_num'];
$fax2=$row['fax'];
$email2=$row['email'];
$firstname2=$row['firstname'];
$middlename2=$row['middlename'];
$lastname2=$row['lastname'];
$contact2=$row['contact'];
$city2=$row['city'];
$street2=$row['street'];
$position=$row['position'];
$image=$row['image'];


$a= date("Y-m-d");


//Update query
  if(isset($_POST['btnSave']))
                {
                    $user=$_POST['user'];
                    $pass=$_POST['pass'];
                    $email=$_POST['txtemail'];
                    $fname=$_POST['txtfirstname'];
                    $mname=$_POST['txtmiddlename'];
                    $lname=$_POST['txtlastname'];
                    $contact=$_POST['txtcontact'];
                    $street=$_POST['txtstreet'];
                    $city=$_POST['txtcity'];
                    $image=$_POST['txtimage'];

                    mysql_query("UPDATE employee SET image='".$image."', username='".$user."', password='".$pass."' ,firstname='".$fname."', middlename='".$mname."' ,lastname='".$lname."' ,contact='".$contact."' ,email='".$email."' ,street='".$street."',city='".$city."' where username='".$user2."' and password='".$pass2."' ");
                    mysql_query("UPDATE sample SET username='".$user."', password='".$pass."' where username='".$user2."' and password='".$pass2."' ");
                    echo "<script type='text/javascript'>alert('ACCOUNT UPDATE SUCCESSFUL!')</script>";
                    echo "<meta http-equiv='refresh' content='0'>";


                }



?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Account Setting</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <?php include("../../maintenance/plugins.php"); ?>
  <div class="se-pre-con"></div>


   </head>

   <body class='skin-red fixed'>
    <?php



    $prepare= $_POST['prepared'];
    ?>

    <form action="" method="post" name="frm" id="frm">
      <header class="main-header">
        <!-- Logo -->
        <a href="index.php" class="logo">

         <span class="logo-lg"><img style="HEIGHT:45px;" src="../../assets/img/logo.png" alt="Logo" style="float: left;"><label style="font-family: 'Cinzel'; font-size: 110%">PERSAN INC.</label></span>

         <!-- logo for regular state and mobile devices -->
         <span class="logo-lg"><img style="HEIGHT:45px;" src="../../assets/img/logo.png" alt="Logo" style="float: left;"><label style="font-family: 'Cinzel'; font-size: 110%">PERSAN INC.</label></span>
       </a>
       <!-- Logo -->
       <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
             <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
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


               <?php include("../../maintenance/nav.php"); ?>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?php echo '../../maintenance/employee/image/'.($image).''; ?>" class="img-circle">

                 <?php include("../../maintenance/user_type.php"); ?>
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">

                <div class="pull-center">
                  <a href="?logout=true" class="btn btn-primary btn-flat btn-center"><i class="fa fa-sign-in"></i> Sign out</a>
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
    <?php include("../../maintenance/side_account.php") ?>


    <!-- Right side column. Contains the navbar and content of the page -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          User Account
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

                            <div class="col-sm-2 col-xs-12" id="f_desc_div" class='form-group'>
                            <label for="email"><font color="darkred">*</font>Choose Image:</label>
                            <input type="file" name="txtimage" id="txtimage" style="height:33px;" required>

                          </div>

                          <div class="col-sm-2 col-xs-12" id="f_desc_div" class='form-group' style="float: right">
                            <label for="email" style="color: maroon">&nbsp;&nbsp;&nbsp;&nbsp;PROFILE PICTURE</label><br>
                            <img src="../../maintenance/employee/image/<?php echo $image; ?>" style="width: 70%;">

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
                            <input class="form-control" type="number" placeholder="Contact Number" style="height:33px; " id="contact" name="txtcontact" value="<?php echo $contact2; ?>" required>

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
    <script type="text/javascript">
      $('#lastname,#firstname,#middlename,#street,#city,#firstname1,#middlename1,#lastname1,#street1,#city1').keyup(function() {
  this.value = this.value.toUpperCase();
});
    </script>



</html>
