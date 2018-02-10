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
      <title>Customer</title>
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
                  <!-- Menu Body -->

                  <!-- Menu Footer-->
                  <li class="user-footer">

                    <div>
                      <a href="account.php" class="pull-left btn btn-primary btn-flat btn-center"><i class="fa fa-gear"></i> Edit Account</a>
                      <a href="?logout=true" class="pull-right btn btn-primary btn-flat btn-center"><i class="fa fa-sign-in"></i> Sign out</a>

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
      <?php include("aside.php") ?>


      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Customer
            <small>Transaction</small>
          </h1>
        </section>


        <!-- Main content -->
        <section class="content">
          <!--Table function-->


          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">             <!-- NEW RECORD -->
              <!-- <a href="addTax.php"><button class="btn btn-success btn-lg" style="margin-bottom:5px;
              box-shadow: 0px 4px 8px #888888">
              + ADD NEW RECORD</button> </a> -->
              <div class="box-header with-border">
                <div class="row">
                  <div class="col-md-3 col-xs-12">

                    <h4 class="box-title">
                      <a href="#myModal" role="button" title="Request Quotation Form" class="btn btn-lg " data-toggle="modal"
                      style="box-shadow: 0px 3px 7px #888888; border-radius:100px; width:58px; height:57px; margin-bottom:5px; outline:none;
                      text-align: center; font-size:28px; background-color:#3C8DBC; color:white; "
                      > <i class="ion-android-add"></i> </a>
                    </h4>
                  </div>

                  <div class="col-md-9 col-xs-12"> <!-- MESSAGE -->
                    <div class="alert alert-xs  bg-teal alert-dismissable" style="width:85%; display:none" id="msg">
                      <i class="icon fa fa-check"></i>
                      <label id="msgContent"></label>
                    </div>
                  </div>
                </div>
              </div>

              <?php include("crud.php") ?>



              <div class="row">                     <!-- TABLES -->
                <div class="col-lg-12 col-sm-12 col-xs-12">
                  <div class="box box-solid">
                    <div class="box-header">
                      <h3 class="box-title">Browse Customer's Quotation</h3>
                      <div class="myData"></div>

                    </div><!-- /.box-header -->
                    <div class="box-body">
                      <table id="jsontable" class="table table-condensed table-striped table-hover">
                        <thead>
                          <tr>
                            <th>Project</th>

                            <th style="">Date</th>
                            <th style="">Prepared By</th>
                            <th style="text-align:">Status</th>


                          </tr>

                        </thead>

                        <?php


                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "pms";

                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        // Check connection
                        if ($conn->connect_error) {
                          die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT * FROM quotation where username='".$_SESSION['user']."' and password='".$_SESSION['pass']."'";
                        $result = $conn->query($sql);
                        $status;
                        $statcol;
                        while($row = $result->fetch_assoc())
                        {
                          $category_no=$row['category_no'];
                          $category_name=$row['category_name'];
                          if($row['status'] == 'active'){
                           $statcol = "label label-primary";
                           $labelko= "ACTIVE";
                         }

                         else if($row['status'] == 'requested'){
                           $statcol = "label label-success";
                           $labelko="REQUESTED" ;
                           }

                          echo '<tr>';
                          echo'<td>'.ucfirst($row['project']).'</td>';
                          echo'<td>'.ucfirst($row['date']).'</td>';
                          echo'<td>'.ucfirst($row['prepared_by']).'</td>';
                          echo'<td><span class="label '.$statcol.'">'.$labelko.'</span></td>';



                          ?>



                          <?php





                        }


                        echo '</tr>';




                        echo'
                        </table>';

                        ?>






                      </div><!-- /.box-body -->
                    </div><!-- /.box -->
                  </div><!-- /.col -->
                </div>  <!-- /.row -->

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
                <h4 class="modal-title"> <i class="fa fa-tasks"></i> Request Quotation </h4>
              </div>
              <div class="modal-body" >
                <!-- ------------------------------------------------------------------------------------------- -->




                <!-- ------------------------------------------------------------------------------------------- -->

                <div class="row" style="margin-bottom:5px"> <!-- ROW 2-->

                  <div class="col-xs-6" id="addErDv">
                    <label><font color="darkred">*</font>Project Name</label>
                    <input type="text" class="form-control" name="c_name1" id="c_name1" required="">
                  </div>

                  <div class="col-xs-6" id="addErDv">
                    <label><font color="darkred">*</font>Description</label>
                    <input type="text" class="form-control" name="desc" id="desc" required>
                  </div>


                  <div class="col-xs-6" id="addErDv">
                    <label><font color="darkred">*</font>Address</label>
                    <input type="text" class="form-control" name="c_name2" id="c_name2" required>
                  </div>



                </div> <!-- /.row -->
                <!-- ------------------------------------------------------------------------------------------- <-->
                <!-- ------------------------------------------------------------------------------------------- -->


                <!-- ------------------------------------------------------------------------------------------- -->


              </form>

            </div>
            <div class="modal-footer">
              <button type="submit" id="req" name="req" class="btn bg-blue btn-lg btn-block" data-dismiss="modal fade"><i class="fa fa-send"></i> REQUEST</button>

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


              <?php include('update.php');?>

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


  </html>
  <script type="text/javascript">
  $(document).ready(function(){
    $('#jsontable').DataTable({
      "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]

    });
  });

  </script>


  <script type="text/javascript">
  $(window).load(function() {
    // Animate loader off screen
    $(".se-pre-con").fadeOut("slow");;

  });
</script>
