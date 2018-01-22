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

$content2=mysql_query("select * from employee where username='".$_SESSION['user']."' and password='".$_SESSION['pass']."' ");
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
  
  mysql_query("UPDATE employee SET username='".$user."', password='".$pass."' ,firstname='".$fname."', middlename='".$mname."' ,lastname='".$lname."' ,contact='".$contact."' ,email='".$email."' ,street='".$street."',city='".$city."' where username='".$user2."' and password='".$pass2."' ");
  mysql_query("UPDATE sample SET username='".$user."', password='".$pass."' where username='".$user2."' and password='".$pass2."' ");
  echo "<script type='text/javascript'>alert('Update Successfull!')</script>";
  echo "<meta http-equiv='refresh' content='0'>";
  
  
}



?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Delivery</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Bootstrap 3.3.2 -->
  <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
  <!-- ionics -->   
  <link href="../../plugins/ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css" />  
  <!-- FontAwesome 4.3.0 -->
  <link href="../../bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />  
  <!-- Theme style -->
  <link href="../../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
     folder instead of downloading all of them to reduce the load. -->
     <link href="../../dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
     <!-- SweetAlert -->    
     <link href="../../plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />       
     <!-- Date Picker -->
     <link href="../../plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
     <!-- Daterange picker -->
     <link href="../../plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />


   </head>

   <body class='skin-red'>
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

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a class="label-primary" >
                <!-- The user image in the navbar-->

                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <?php
                if(isset($_SESSION['pos']) && ($_SESSION['pos']=='admin' || $_SESSION['pos']=='Admin') )
                {
                  ?>
                  <span class="hidden-xs" style="font-weight: bolder;"><?php echo ''.ucfirst($lastname2).', '.ucfirst($firstname2).' '.strtoupper($middlename2[0]).'.'; ?></span>
                </a>
                <?php
              } 
              if(isset($_SESSION['pos']) && $_SESSION['pos']=='Quantity Surveyor')
              {

                mysql_query("update sample set status='inactive' where user='".$_SESSION['user']."' and pass='".$_SESSION['pass']."' ");
                session_destroy();
                echo '<script type="text/javascript">window.location.href="login.php";</script>'; 

              }

              if(isset($_SESSION['pos']) && $_SESSION['pos']=='Secretary')
              {

                mysql_query("update sample set status='inactive' where user='".$_SESSION['user']."' and pass='".$_SESSION['pass']."' ");
                session_destroy();
                echo '<script type="text/javascript">window.location.href="login.php";</script>'; 
              }
              if(isset($_SESSION['pos']) && $_SESSION['pos']=='Foreman')
              {

                mysql_query("update sample set status='inactive' where user='".$_SESSION['user']."' and pass='".$_SESSION['pass']."' ");
                session_destroy();
                echo '<script type="text/javascript">window.location.href="login.php";</script>'; 

              }
              if(isset($_SESSION['pos']) && $_SESSION['pos']=='Stockman')
              {

                mysql_query("update sample set status='inactive' where user='".$_SESSION['user']."' and pass='".$_SESSION['pass']."' ");
                session_destroy();
                echo '<script type="text/javascript">window.location.href="login.php";</script>'; 
              }
              if(isset($_SESSION['pos']) && $_SESSION['pos']=='Accountant')
              {
                mysql_query("update sample set status='inactive' where user='".$_SESSION['user']."' and pass='".$_SESSION['pass']."' ");
                session_destroy();
                echo '<script type="text/javascript">window.location.href="login.php";</script>'; 
              }
              ?>
              <!--navbar-->

              <?php
              if(isset($_GET['logout']))
              {
                mysql_query("update sample set status='inactive' where user='".$_SESSION['user']."' and pass='".$_SESSION['pass']."' ");
                session_destroy();
                echo "<meta http-equiv='refresh' content='0'>";
              }
              ?>  
            </li>
            <li class="dropdown user user-menu" style="width: 80px; text-align: center;" >
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user fa-lg"></i>
              </a>

              <ul class="dropdown-menu" style="width:10%;border-radius:5px">
                <li style="text-align:center"> 
                  <small style="font-size:0.8em"><?php echo ucfirst($usertype); ?></small>
                </li>


                <li><a href="#"><i class="fa fa-gear"></i> Account Setting</a></li>

                <li><a href="?logout=true"> <i class="fa fa-sign-in"></i><span>Log-out</span></a>
                </li>
                <br>
              </ul>
            </li>     
            <!-- User Account: style can be found in dropdown.less -->
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <?php include("aside.php") ?>


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
                  <?php include("crud.php") ?>



                  <div class="row">                     <!-- TABLES -->
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                      <div class="box box-solid">
                        <div class="box-header">
                          <h3 class="box-title">Edit Account</h3>
                          <div class="myData"></div>

                        </div><!-- /.box-header -->
                        <div class="box-body">



                          <div class="form-group">
                            <label for="email">User Name:</label>


                            <input class="w3-input w3-border" type="text" placeholder="Username" name="user" id="user" value="<?php echo $user2; ?>" style="height:33px;">


                          </div>

                          <div class="form-group">
                            <label for="email">Password:</label>
                            <input class="w3-input w3-border" type="password" placeholder="Password" name="pass" id="pass" value="<?php echo $pass2; ?>" style="height:33px;">

                          </div>



                          <div class="form-group">
                            <label for="email">First Name:</label>

                            <input class="w3-input w3-border" type="text" placeholder="First Name" style="height:33px;" id="firstname" name="txtfirstname" value="<?php echo $firstname2; ?>">

                          </div>




                          <div class="form-group">
                            <label for="email">Middle Name:</label>

                            <input class="w3-input w3-border" type="text" placeholder="Middle Name" style="height:33px;" id="middlename" name="txtmiddlename" value="<?php echo $middlename2; ?>">

                          </div>


                          <div class="form-group">
                            <label for="email">Last Name:</label>
                            <input class="w3-input w3-border" type="text" placeholder="Last Name" style="height:33px;"  name="txtlastname" id="lastname" value="<?php echo $lastname2; ?>">
                          </div>




                          <div class="form-group">
                            <label for="email">Contact Number:</label>
                            <input class="w3-input w3-border" type="text" placeholder="Contact Number" style="height:33px; " id="contact" name="txtcontact" value="<?php echo $contact2; ?>">

                          </div>



                          <div class="form-group">
                            <label for="email">Email address:</label>
                            <input class="w3-input w3-border" type="text" placeholder="Email Address" style="height:33px; " id="email" name="txtemail" value="<?php echo $email2; ?>">
                          </div>

                          

                          <div class="form-group">
                            <label for="email">Street:</label>
                            <input class="w3-input w3-border" type="text" placeholder="Street" style="height:33px;" id="street" name="txtstreet" value="<?php echo $street2; ?>">
                          </div>



                          <div class="form-group">
                            <label for="email">City:</label>                          <input class="w3-input w3-border" type="text" placeholder="City" style="height:33px;" id="city" name="txtcity" value="<?php echo $city2; ?>">

                          </div>


                          <input type="submit" name="btnSave" onclick="return confirm('Are you sure?');" value="submit" class="btn btn-primary"/>


                          <button type="button" name="btnReset" class="btn btn-danger" onclick="ClearFields();">Reset</button>





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

      <div id="myModal" class="fade modal" >
        <form name="formCust" method="post" action=""> <!-- FORM element -->
          <div class="modal-dialog">
            <div class="modal-content" >
              <div class="modal-header">
                <button type="butt on" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"> <i class="ion-android-person"></i> Position Form </h4>
              </div>          
              <div class="modal-body" >
                <!-- ------------------------------------------------------------------------------------------- -->




                <!-- ------------------------------------------------------------------------------------------- -->

                <div class="row" style="margin-bottom:5px"> <!-- ROW 2-->

                  <div class="col-xs-6" id="addErDv"> 
                    <label><font color="darkred">*</font>Category</label> <!-- Prod_Name -->
                    <input type="text" class="form-control" name="txtname" id="textbox_A">
                  </div>           



                </div> <!-- /.row -->   
                <!-- ------------------------------------------------------------------------------------------- <-->                               
                <!-- ------------------------------------------------------------------------------------------- -->


                <!-- ------------------------------------------------------------------------------------------- -->


              </form>

            </div>
            <div class="modal-footer">
              <button type="submit" id="btnAdd" name="btnAdd" class="btn bg-blue btn-lg btn-block" data-dismiss="modal fade" onclick="return confirm('Are you sure?');"><i class="fa fa-send"></i> SAVE</button>  

            </div>

          </div>
        </div>
      </form>
    </div> 




    <!-- EDIT MODAL -->

    <div id="editModal" class="fade modal" >
      <form name="formCust" method="post" action=""> <!-- FORM element -->
        <div class="modal-dialog">
          <div class="modal-content" >
            <div class="modal-header">
              <button type="butt on" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title"> <i class="ion-android-person"></i> Edit Category Form </h4>
            </div>          
            <div class="modal-body" >


              <?php include('update.php');
              ?>

            </form>
          </div>
          <div class="modal-footer">
            <button type="submit" name="btnSave" class="btn bg-blue btn-lg btn-block" data-dismiss="modal fade"><i class="fa fa-send"></i> SAVE</button>                                
          </div>

        </div>
      </div>
    </form>
  </div> 


  <script type="text/javascript">
    function get_id(o) {
      myRowIndex = $(o).parent().parent().index();
      var getid=  (document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[0].innerHTML);    
      var $modal = $('#editModal'),
      $category_no1 = $modal.find('#category_no1');
      $category_no1.val(getid);
      $category_no1 = $modal.find('#category_no1');
      $category_no1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[0].innerHTML);


      $c_name1 = $modal.find('#c_name1');
      $c_name1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[1].innerHTML);

    }
  </script>
  <!-- jQuery 2.1.3 -->
  <script src="../../plugins/jQuery/jQuery-2.1.3.min.js" type="text/javascript"></script>
  <!-- <script src="jquery.js" ype="text/javascript"></script> -->

  <!-- jQuery UI 1.11.2 -->
  <script src="../../plugins/jQueryUI/jquery-ui.min.js" type="text/javascript"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

  <!-- Bootstrap 3.3.2 JS -->
  <script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    

  <script src="../../plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
  <!-- Bootstrap WYSIHTML5 -->

  <!-- mask -->
  <script src="../../plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
  <script src="../../plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>

  <!-- FastClick -->

  <!-- AdminLTE App -->
  <script src="../../dist/js/app.min.js" type="text/javascript"></script>
  <!-- DataTables -->
  <link href="../../plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
  <script src="../../plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
  <script src="../../plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>



  <!--Clear Fields-->
  <script type="text/javascript"> 
    function ClearFields() {
      document.getElementById("firstname").value = "";
      document.getElementById("middlename").value = "";
      document.getElementById("lastname").value = "";
      document.getElementById("contact").value = "";
      document.getElementById("email").value = "";
      document.getElementById("city").value = "";
      document.getElementById("street").value = "";

    }
  </script>

  <script type="text/javascript">
    function checkPasswordMatch() {
      var password = $("#pass").val();
      var confirmPassword = $("#cpass").val();
      var txtphone =  $("#textbox_B").val();
      var txtlastname= $("#lastname").val();
      var txtfirstname = $("#firstname").val();
      var txtmiddlename =$("#middlename").val();
      var emails= $("#email").val();



      if(!(emails.match(/.com/g)) || !(emails.match(/@/g)) || (emails.match(/@.com/g)))
      {

        $("#messageemail").html("   ").css('color','red');
        $("#messageemail").removeClass('fa fa-thumbs-o-up').addClass('fa fa-thumbs-o-down');
        $("#email").removeClass('w3-border-red w3-pale-green w3-leftbar w3-rightbar w3-border-green');
        $("#email").addClass('w3-border-green w3-pale-red w3-leftbar w3-rightbar w3-border-red');


      }

      else
      {
        $("#messageemail").html("   ").css('color','green');
        $("#messageemail").removeClass('fa fa-thumbs-o-down').addClass('fa fa-thumbs-o-up');
        $("#email").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red').addClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      }

      if(emails=='')
      {
        $("#messageemail").html("").css(' ');
        $("#email").removeClass('w3-border-red');
        $("#email").removeClass('w3-border-green');
        $("#email").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
        $("#email").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
        $("#messageemail").removeClass('fa fa-thumbs-o-down');
        $("#messageemail").removeClass('fa fa-thumbs-o-up');
      }

      if (password != confirmPassword)
      {
        $("#message").html("Passwords do not match!").css('color','red');
        $("#message").removeClass('fa fa-thumbs-o-up').addClass('fa fa-thumbs-o-down');
        $("#cpass").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
        $("#cpass").addClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
      }



      else
      {
        $("#message").html("Passwords match").css('color','green');
        $("#message").removeClass('fa fa-thumbs-o-down').addClass('fa fa-thumbs-o-up');
        $("#cpass").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red').addClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      }

      if(confirmPassword=='')
      {
        $("#message").html("").css('red');
        $("#cpass").removeClass('w3-border-red');
        $("#cpass").removeClass('w3-border-green');
        $("#cpass").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
        $("#cpass").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
        $("#message").removeClass('fa fa-thumbs-o-down');
      }


      if (txtlastname.match(/[0-9]/g)) 
      {

        $("#messagelast").html("Last Name must not be numerical").css('color','red');
        $("#messagelast").removeClass('fa fa-thumbs-o-up').addClass('fa fa-thumbs-o-down');
        $("#lastname").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
        $("#lastname").addClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');

      }
      else
      {
        $("#messagelast").html("   ").css('color','green');
        $("#messagelast").removeClass('fa fa-thumbs-o-down').addClass('fa fa-thumbs-o-up');
        $("#lastname").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red').addClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      }

      if(txtlastname=='')
      {
       $("#messagelast").html("This is a required field").css('color','red');
       $("#lastname").removeClass('w3-border-red');
       $("#lastname").removeClass('w3-border-green');
       $("#lastname").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
       $("#lastname").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
       $("#messagelast").removeClass('fa fa-thumbs-o-down');
       $("#messagelast").removeClass('fa fa-thumbs-o-up');

     }


     if (txtfirstname.match(/[0-9]/g)) 
     {

      $("#messagefirst").html("First Name must not be numerical").css('color','red');
      $("#messagefirst").removeClass('fa fa-thumbs-o-up').addClass('fa fa-thumbs-o-down');
      $("#firstname").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
      $("#firstname").addClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');

    }
    else
    {
      $("#messagefirst").html("   ").css('color','green');
      $("#messagefirst").removeClass('fa fa-thumbs-o-down').addClass('fa fa-thumbs-o-up');
      $("#firstname").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red').addClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
    }

    if(txtfirstname=='')
    {
     $("#messagefirst").html("This is a required field").css('color','red');
     $("#firstname").removeClass('w3-border-red');
     $("#firstname").removeClass('w3-border-green');
     $("#firstname").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');
     $("#firstname").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
     $("#messagefirst").removeClass('fa fa-thumbs-o-down');
     $("#messagefirst").removeClass('fa fa-thumbs-o-up');

   }



   if (txtmiddlename.match(/[0-9]/g)) 
   {

    $("#messagemiddle").html("First Name must not be numerical").css('color','red');
    $("#messagemiddle").removeClass('fa fa-thumbs-o-up').addClass('fa fa-thumbs-o-down');
    $("#middlename").removeClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
    $("#middlename").addClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red');

  }
  else
  {
    $("#messagemiddle").html("   ").css('color','green');
    $("#messagemiddle").removeClass('fa fa-thumbs-o-down').addClass('fa fa-thumbs-o-up');
    $("#middlename").removeClass('w3-border-red w3-pale-red w3-leftbar w3-rightbar w3-border-red').addClass('w3-border-green w3-pale-green w3-leftbar w3-rightbar w3-border-green');
  }




}

$(document).ready(function () {
 $("#pass, #cpass, #textbox_B, #lastname, #firstname, #middlename, #email").keyup(checkPasswordMatch);
});
</script>

<!--Validations-->
<script>
  function myFunction() {
    var txtemail,txtfirstname, txtmiddlename ,txtlastname, txtcontact, txtstreet, txtcity, textcontact1;
    var user = document.getElementById("user").value;
    var a= document.getElementById("pass").value;
    var b= document.getElementById("cpass").value;
    txtemail = document.getElementById("textbox_C").value;
    txtfirstname = document.getElementById("firstname").value;
    txtmiddlename = document.getElementById("middlename").value;
    txtlastname = document.getElementById("lastname").value;
    txtcontact = document.getElementById("contact").value;
    txtcontact1 = document.getElementById("contact").value.length;
    txtstreet = document.getElementById("street").value;
    txtcity = document.getElementById("city").value;


    if(a!=b)
    {
      alert("Your Password doesnt match!");
      return false;
    }
    else if (user=='') 
    {
      alert("Username is a required filled");
      return false;
    } 
    else if (txtemail=='') 
    {
      alert("Email Address is a required filled");
      return false;
    } 
    else if (txtfirstname=='') 
    {
      alert("First Name is a required filled");
      return false;
    } 
    
    else if (txtlastname=='') 
    {
      alert("Last Name is a required filled");
      return false;
    } 
    else if (txtphone.match(/[a-zA-Z]/g)) 
    {
      alert("phone must be not alphabetical");
      return false;
    } 
    else if (txtlastname.match(/[0-9]/g)) 
    {
      alert("Last name must not be numerical");
      return false;
    } 
    else if (txtfirstname.match(/[0-9]/g)) 
    {
      alert("First name must not be numerical");
      return false;
    } 

    else if (txtmiddlename.match(/[0-9]/g)) 
    {
      alert("Middle name must not be numerical");
      return false;
    } 

    
    else 
    {
      text = "Input OK";
    }
    
  }
</script>




</html>
