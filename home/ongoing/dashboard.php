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
$projno = mysql_query("SELECT * FROM  quotation WHERE balance != 0 ");
$projno = mysql_num_rows($projno);
$userno = mysql_query("SELECT * FROM  sample"); //all accounts
$userno = mysql_num_rows($userno);
$inveno = mysql_query("SELECT * FROM  materials "); //all materials
$inveno = mysql_num_rows($inveno);
$custno = mysql_query("SELECT * FROM  sample where position='customer' ");//customers
$custno = mysql_num_rows($custno);
$mat = mysql_query("SELECT * FROM  materials where status='active' ");//active materials
$mat = mysql_num_rows($mat);
$emp = mysql_query("SELECT * FROM  employee where status='active' ");//active employees
$emp = mysql_num_rows($emp);
$supp = mysql_query("SELECT * FROM  supplier where status='active' ");//customers
$supp = mysql_num_rows($supp);
$inactive_acco = mysql_query("SELECT * FROM  employee where status='inactive' ");//inactive accounts
$inactive_acco = mysql_num_rows($inactive_acco);

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
$position=$row['position'];
$contact2=$row['contact'];
$city2=$row['city'];
$street2=$row['street'];
$lastname2=$row['lastname'];
$position=$row['position'];


$a= date("Y-m-d");

?>



<!DOCTYPE html>
  <?php include("../../maintenance/plugins.php"); ?>
  <div class="se-pre-con"></div>
<html>

<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Bootstrap 3.3.2 -->

     <link href="../../assets/css/loading.css" rel="stylesheet" type="text/css" />
     <link href="bar.css" rel="stylesheet" type="text/css" />

   </head>

   <body class='skin-red fixed'>

    <?php



    $prepare= $_POST['prepared_by'];
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
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <?php include("../../maintenance/side_account.php"); ?>


    <!-- Right side column. Contains the navbar and content of the page -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
     <section class="content-header">
    <h1>
   Dashboard
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
      
      <?php
      $content1=mysql_query("SELECT max(quote_no) as max from quotation");
      $total1=@mysql_affected_rows();


      $row=mysql_fetch_array($content1);
      $noo=$row['max'];

      $hell=$noo+1;



      $a= date("d/m/Y");


      ?>
      <!-- Main content -->
      <section class="content">
        <!--Table function-->
        <div class="row">
         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo ''.($projno).''; ?></h3>

              <p>Overall Projects</p>
            </div>
            <div class="icon">
              <i class="ion-ios-folder"></i>
            </div>
            <a href="../../home/ongoing/index.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo ''.($inveno).''; ?></h3>

              <p>Total Inventory</p>
            </div>
            <div class="icon">
              <i class="ion-ios-cart"></i>
            </div>
            <a href="../../utilities/inventory/index.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo ''.($userno).''; ?></h3>

              <p>Total Users</p>
            </div>
            <div class="icon">
              <i class="ion-android-people"></i>
            </div>
            <a href="../../maintenance/employee/index.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box" style="background: #216778">
            <div class="inner">
              <h3 style="color: white"><?php echo ''.($custno).''; ?></h3>

              <p style="color: white">Total Customers</p>
            </div>
            <div class="icon">
              <i class="ion-man"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>



       <div class="row">
         <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3><?php echo ''.($mat).''; ?></h3>

              <p>Active Materials</p>
            </div>
            <div class="icon">
              <i class="ion-briefcase"></i>
            </div>
            <a href="../../maintenance/materials/index.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-maroon">
            <div class="inner">
              <h3><?php echo ''.($emp).''; ?></h3>

              <p>Active Employees</p>
            </div>
            <div class="icon">
              <i class="ion-ios-people"></i>
            </div>
            <a href="../../maintenance/employee/index.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-blue">
            <div class="inner">
              <h3><?php echo ''.($supp).''; ?></h3>

              <p>Active Suppliers</p>
            </div>
            <div class="icon">
              <i class="fa fa-truck"></i>
            </div>
            <a href="../../maintenance/supplier/index.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo ''.($inactive_acco).''; ?></h3>

              <p>Deactivated Accounts</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="../../utilities/restoreemployee/index.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>


      <!-- Second Widget -->



        
        <!-- Small boxes (Stat box) -->
        <div class="row" >                                 
          <div class="col-lg-12 col-lg-12 col-lg-12">             <!-- NEW RECORD -->
                <!-- <a href="addTax.php"><button class="btn btn-success btn-lg" style="margin-bottom:5px;
                  box-shadow: 0px 4px 8px #888888"> 
                + ADD NEW RECORD</button> </a> -->
                <div class="box-header with-border">


                

                





                

                


                  </div> <!-- /.row --> 
                </section><!-- right col -->
                </div>
                
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


    </html>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#jsontable').DataTable({
          "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]

        });
      });
    </script>
    <script>
      function myFunctions() {

        if (confirm("Are you sure?") == true) {

        } 
        else {
          return false;
        //window.location.href="purchaseorder1.php";
      }
    }


  </script>
   <script>
    function print() {
    window.open("../../pdf/print/printproject.php");
    }
    </script>
