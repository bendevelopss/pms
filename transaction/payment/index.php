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
$b=''.ucfirst($lastname2).', '.ucfirst($firstname2).' '.strtoupper($middlename2[0]).'.';

$a= date("Y-m-d");



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);



?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Billing</title>
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

  <body class='skin-red fixed'>
    <?php
    $content1=mysql_query("select * from billing where billing_no='".$_POST['cname']."'");
    $total1=@mysql_affected_rows();

    
    $row=mysql_fetch_array($content1);
    $noo=$row['max'];

    $hell=$noo+1;

    $customer=$_POST['cname'];
    $topay=$_POST['scname'];
    $amount=$_POST['amount'];
    $bankname=$_POST['bankname'];
    $chequeno=$_POST['chequeno'];
    $chequeamount=$_POST['chequeamount'];
    $chequedate=$_POST['chequedate'];
    $radio=$_POST['radiobutton'];
    $status="Active";
    $cust=$row['customer'];
    $proj=$row['project'];
    $tot=$row['totalcost'];
    $bal=$row['balance'];
    $top=$row['topay'];
    $tops=$_POST['total'];

    if(isset($_POST['btnAdd']))

    {

      $status="Active";

      $sub=$bal-$amount;

      mysql_query("insert into payment (customer,project,topay, amount, bankname, chequeno, chequedate, type, status ) 
        values('". $cust."','".$project."','".$topay."', '".$amount."','".$bankname."'  ,'".$chequeno."', '".$chequedate."','".$radio."','".$status."')");

      mysql_query("UPDATE billing SET balance='".$sub."', topay='".$tops."' WHERE billing_no='".$_POST['cname']."'");

      mysql_query("UPDATE quotation SET balance='".$sub."' WHERE customer='".$cust."' and project='".$proj."'");

      echo '<script type="text/javascript">alert("Payment has been added")</script>'; 
      echo "<meta http-equiv='refresh' content='0'>";

    }




//Update query
    if(isset($_POST['btnSave']))
    {
      $payment_no11 = $_POST['payment_no1'];           
      $cname11=$_POST['cname1'];
      $scname11=$_POST['scname1'];
      $amount11=$_POST['amount1'];
      $bankname11=$_POST['bankname1'];
      $chequeno11=$_POST['chequeno1'];
      $chequedate11=$_POST['chequedate1'];
      $type11=$_POST['radiobutton1'];

      mysql_query("UPDATE payment SET customer='".$cname11."',topay='".$scname11."',amount='".$amount11."',bankname='".$bankname11."', chequeno='".$chequeno11."', chequedate='".$chequedate11."', type='".$type11."' WHERE payment_no='".$payment_no11."'");
      echo "<script type='text/javascript'>alert('Update Successful!')</script>";
      echo "<meta http-equiv='refresh' content='0'>";


    }


    ?>
    <?php
    require_once("dbcontroller.php");
    $db_handle = new DBController();
    $query ="SELECT * FROM billing where topay >0";
    $results = $db_handle->runQuery($query);
    ?>

    <script>
      function getState(val) {
        $.ajax({
          type: "POST",
          url: "get_state4.php",
          data:'country_id='+val,
          success: function(data){
            $("#scname").html(data);
          }
        });
      }

    </script>


    <script>
      function getState1(val) {
        $.ajax({
          type: "POST",
          url: "get_state5.php",
          data:'country_id='+val,
          success: function(data){
            $("#scname1").html(data);
          }
        });
      }

    </script>

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
          Billing
          <small>Transaction</small>
        </h1>                              
      </section>


      <?php


      $content1=mysql_query("select * from quotation where quote_no='".$_POST['cname']."' and balance >0");
      $total1=@mysql_affected_rows();


      $row=mysql_fetch_array($content1);
      $noo=$row['max'];



      $hell=$noo+1;


      $cust=$row['customer'];
      $proj=$row['project'];
      $total=$_POST['scname'];
      $balance=$_POST['balance'];
      $topay=$_POST['totalamount'];
      $start=$_POST['startdate'];
      $end=$_POST['enddate'];


      $status="Active";


      $prep= mysql_real_escape_string($_GET['prepared']);




      if(isset($_POST['btnAdd']))

      {




        mysql_query("insert into billing (customer, project,totalcost, balance, topay, datee, enddate, prepared, status ) 
          values('".$cust."','". $proj."','". $total."','".$total."', '".$topay."','".$a."' ,'".$end."', '".$prep."', '".$status."')");

        echo '<script type="text/javascript">alert("It has been added")</script>'; 
        echo "<meta http-equiv='refresh' content='0'>";

      }


      if(isset($_POST['btnRemove'])) {

        $nos = $_POST['btnRemove'];

        $status="hidden";

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        } 

        $sql = "update payment set status='".$status."' 
        where payment_no=".$nos;

        if ($conn->query($sql) === TRUE) {
        } else {
          echo "Error updating record: " . $conn->error;
        }

        echo'<div class="bottom">';
        echo'<div class="alert alert-success">
        <strong>Success!</strong> Billing has been deleted 
      </div></div>
      ';
      echo "<meta http-equiv='refresh' content='0'>";


    }

    ?>


    <?php
    $content1=mysql_query("SELECT max(delivery_no) as max from delivery");
    $total1=@mysql_affected_rows();


    $row=mysql_fetch_array($content1);
    $noo=$row['max'];

    $hell=$noo+1;



    $a= date("d/m/Y");



    if(isset($_POST['btnSave']))
    {
      $billing_no11= $_POST['billing_no1'];
      $cust11=$_POST['cust1'];  
      $topay11=$_POST['topay1'];
      $end11=$_POST['end1'];

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

      $sql = "UPDATE billing SET topay='".$topay11."', enddate='".$end11."' WHERE billing_no=".$billing_no11."";

      if ($conn->query($sql) === TRUE) {

        echo "<script type='text/javascript'>alert('Update Successful!')</script>";
        echo "Record updated successfully";
      } else {
        echo "Error updating record: " . $conn->error;
      }



      echo "<meta http-equiv='refresh' content='0'>";


    }



    ?>
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
                            <h3 class="box-title">Browse Payment Record</h3>
                            <div class="myData"></div>

                          </div><!-- /.box-header -->
                          <div class="box-body">
                            <table id="jsontable" class="table table-condensed table-striped table-hover">
                              <thead>
                                <tr>

                                 <th>Payment No</th>
                                 <th>Customer</th>
                                 <th>Amount to Pay</th>
                                 <th>Amount</th>
                                 <th>Bank Name</th>
                                 <th>Cheque No</th>
                                 <th>Cheque Date</th>
                                 <th>Type of Payment</th>
                                 <th>Action</th>

                               </tr>

                             </thead>
                             <form action="" method="post">
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
                              } ?>
                              <script type="text/javascript">


                              </script>
                              <form action="" method="post">
                                <?php
                                $sql = "SELECT * FROM payment where status='Active'";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc())
                                { 
                                  $payment_no=$row['payment_no'];
                                  $customer=$row['customer'];
                                  $topay=$row['topay'];
                                  $amount=$row['amount'];
                                  $bankname=$row['bankname'];
                                  $chequeno=$row['chequeno']; 
                                  $chequedate=$row['chequedate'];
                                  $type=$row['type'];


                                  echo'<tr>';
                                  echo'<td>' .str_pad($row['payment_no'], 4, '0', STR_PAD_LEFT).'</td>';
                                  echo'<td>'.$customer.'</td>';
                                  echo'<td>'.$topay.'</td>';
                                  echo'<td>'.$amount.'</td>';
                                  echo'<td>'.$bankname.'</td>';   
                                  echo'<td>'.$chequeno.'</td>'; 
                                  echo'<td>'.$chequedate.'</td>';
                                  echo'<td>'.$type.'</td>';
                                  ?>
                                  <td style="text-align:center"><button type="submit" name="btnRemove" value="<?php echo''.$payment_no.''; ?>" class="btn btn-primary btn btn-danger fa fa-close btn-xs"  onclick="return confirm('Are you sure?');"></button>
                                    <?php
                                    echo'<button type="button" name="btnEdit" id="bntEdit" value="'.$payment_no.'" data-toggle="modal" data-target="#myModal" class="btn btn-primary glyphicon glyphicon-pencil btn-xs center" onclick="get_id(this)" ></button>
                                  </td>';
                                }


                                echo'</tr>';
                                echo' 

                              </tbody>

                            </table>
                            <br></br>';
                            $conn->close();
                            ?> 
                          </form>
                        </div><!-- /.box-body -->
                      </div><!-- /.box -->

                      <div class="box box-solid">
                        <div class="box-header">
                          <h3 class="box-title">Transactions: Billing</h3>
                          <div class="myData"></div>

                        </div><!-- /.box-header -->
                        <div class="box-body">


                          <?php
                          require_once("dbcontroller.php");
                          $db_handle = new DBController();
                          $query ="SELECT * FROM quotation where status='active' and balance >0";
                          $results = $db_handle->runQuery($query);
                          ?>

                          <?php
                          $a= date("d/m/Y");
                          ?>
                          <h3>BILLING INFORMATION</h3>
                          <br>
                          <div class="row" style="margin-bottom:5px;"> <!-- ROW 2-->
                            <div class="col-xs-2" id="addErDv"> 
                             <label >Customer:</label>
                             <select name="cname" id="cname" class="form-control" onChange="getState(this.value);" style="width:100%;"></p>
                              <option value="">--Select Customer--</option>
                              <?php
                              foreach($results as $country) {
                                ?>
                                <option value="<?php echo $country["quote_no"]; ?>"><?php echo $country["customer"]; ?>|<?php echo $country["project"]; ?>"</option>

                                <?php
                              }
                              echo'</select>';?>
                            </div>

                            <div class="col-xs-3"> 
                              <label>Total Amount to pay:</label>
                              <select name="scname" id="scname" class="form-control"  style="width:50%;" ></p>

                              </select>
                            </div> 
                          </div>
                          <br>

                        </br>

                        <h3>PAYMENT</h3>

                        <br></br>
                        <div class="row" style="margin-bottom:5px;">
                          <div class="col-xs-2" id="addErDv"> 
                            <label > Amount</label>
                            <strong><span id='messageuser' ></span></strong>
                            <input class="form-control" type="text" placeholder="Total Amount to Pay" style="height:33px;" id="amount" name="amount" value="0.00">
                          </div>

                          <div class="col-xs-2" id="addErDv">
                            <strong><span id='messages' ></span></strong>
                            <label >Remaining Balance</label>
                            <strong><span id='messageuser' ></span></strong>
                            <input class="form-control" type="text" placeholder="Total" style="height:33px;" id="total" name="total" value="0.00" readonly>
                            <input class="form-control" type="hidden" placeholder="test" style="height:33px;" id="test" name="test" value="<?php echo''.$tot.'' ?> " readonly>
                          </div>
                        </div>


                        <script type="text/javascript">
function checkPasswordMatch() {
    var cost=0.00;
    cost = ($("#scname").val() - $("#amount").val());

       $("#total").val(cost);

}


$(document).ready(function () {
   $("#scname, #amount").keyup(checkPasswordMatch);
});

</script>

                       <form class="w3-container w3-card-4">
                        <p >
                          <?php if($cust_type2=="Cash")
                          {
                            echo'<input class="w3-radio" type="radio" name="radiobutton" id="no_radio" onChange="disablefield();" value="Cash" checked>
                            <label class="w3-validate"  style="font-size: 1em;" >Cash</label>
                            <input class="w3-radio" type="radio" id="yes_radio" name="radiobutton" onChange="disablefield();" value="Cheque">
                            <label class="w3-validate"  style="font-size: 0.8em;" >Cheque</label>';
                          }
                          else
                          {
                            echo'<input class="w3-radio" type="radio" name="radiobutton" id="no_radio" onChange="disablefield();" value="Cash">
                            <label class="w3-validate"  style="font-size: 1em;">Cash</label><br>
                            <input class="w3-radio" type="radio" id="yes_radio" name="radiobutton" onChange="disablefield();" value="Cheque" checked>
                            <label class="w3-validate"  style="font-size: 1em;" >Cheque</label>';
                          }?>

                          <script type="text/javascript"> 
                            function disablefield(){ 
                              if (document.getElementById('no_radio').checked == 1){ 
                                document.getElementById('bankname').disabled='disabled'; 
                                document.getElementById('chequeno').disabled='disabled';  
                                document.getElementById('chequedate').disabled='disabled'; 
                                document.getElementById('bankname').value=''; 
                                document.getElementById('chequedate').value=''; 
                                document.getElementById('chequeno').value='';
                                document.getElementById('chequeamount').value=''; 
                              }else{ 
                                document.getElementById('bankname').disabled='';

                                document.getElementById('chequeno').disabled='';
                                document.getElementById('chequedate').disabled='';  
                              } 
                            } 


                          </script> 


                        </p>

                      </form>

                      <br>

                      <div class="row" style="margin-bottom:5px;">
                        <div class="col-xs-2" "> 
                          <label>Bank Name:</label>
                          <strong><span id='messagestreet' ></span></strong>
                          <input class="form-control" type="text" placeholder="Bank Name" id="bankname" name="bankname">
                        </div>
                        <div class="col-xs-2""> 
                          <label>Cheque No:</label>
                          <strong><span id='messagecity' ></span></strong>
                          <input class="form-control" type="text" placeholder="Cheque No" style="height:33px;" id="chequeno" name="chequeno">
                        </div><br>

                      </div>
                      <br></br>

                       <div class="row" style="margin-bottom:5px;">
                         <div class="col-xs-2""> 
                          <label >Cheque Date:</label>
                          <strong><span id='messagestreet' ></span></strong>
                          <input class="form-control" type="date" placeholder="Cheque Date" style="height:33px;" id="chequedate" name="chequedate">
                        </div>


                      </div>


                      <br>

                      <!--Buttons-->
                      <br>
                      <button type="submit" name="btnAdd" onclick="return myFunction();" class="btn btn-primary">Add</button>

                      <button type="button" class="btn btn-success" onclick="ClearFields();">Reset</button>


                    </div>
                  </div>


                </div><!-- /.col -->
              </div>  <!-- /.row -->         



            </div> <!-- /.row --> 



            <!--Clear Fields-->
            <script type="text/javascript"> 
              function ClearFields() {
                document.getElementById("textbox_A").value = "";
                document.getElementById("textbox_B").value = "";
                document.getElementById("textbox_C").value = "";
                document.getElementById("firstname").value = "";
                document.getElementById("middlename").value = "";
                document.getElementById("lastname").value = "";
                document.getElementById("contact").value = "";
                document.getElementById("email").value = "";
                document.getElementById("city").value = "";
                document.getElementById("street").value = "";

              }
            </script>










            <script>
              function getState(val) {
                $.ajax({
                  type: "POST",
                  url: "get_state3.php",
                  data:'country_id='+val,
                  success: function(data){
                    $("#scname").html(data);
                  }
                });
              }

            </script>




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
        <div class="modal-content">
          <form method ="post" role="form" id="editForm">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"> <span aria-hidden="true" class="">X  </span><span class="sr-only">Close</span>

              </button>
              <h4 class="modal-title" id="myModalLabel">Payment</h4>

            </div>



            <div class="modal-body">


            <div class="row" style="margin-bottom:5px;">
            <div class="col-xs-6" style="text-align: center;">
             <label>Payment No</label>
             <strong><span id='messagestreet'></span></strong>
             <input class="w3-input w3-border" type="text" placeholder="Bank Name"  id="payment_no1" name="payment_no1">
              </div>
              
             <label>Customer:</label>
             <select name="cname1" id="cname1" class="form-control"  onChange="getState1(this.value);" style="width: 130%;"></p>
              <option value="">--Select Customer--</option>
              <?php
              foreach($results as $country) {
                ?>
                <option value="<?php echo $country["customer"]; ?>"> <?php echo $country["customer"]; ?></option>

                <?php
              }
              echo'</select>';?>


              <label>Total Amount to pay:</label>
              <select name="scname1" id="scname1" class="form-control" ></p>

              </select>

              <br>
            </br>

            <h1>PAYMENT</h1>

            <br></br>

            <label> Amount</label>
            <strong><span id='messageuser'></span></strong>
            <input class="w3-input w3-border" type="text" placeholder="Total Amount to Pay" id="amount" name="amount">

            <p style="">
              <?php if($cust_type2=="Cash")
              {
                echo'<input class="w3-radio" type="radio" name="radiobutton1" id="no_radio1" onChange="disablefield1();" value="Cash" checked>
                <label class="w3-validate"  style="font-size: 0.8em;" >Cash</label>
                <input class="w3-radio" type="radio" id="yes_radio1" name="radiobutton1" onChange="disablefield1();" value="Cheque">
                <label class="w3-validate"  style="font-size: 0.8em;" >Cheque</label>';
              }
              else
              {
                echo'<input class="w3-radio" type="radio" name="radiobutton1" id="no_radio1" onChange="disablefield1();" value="Cash">
                <label class="w3-validate"  style="font-size: 0.8em;">Cash</label>
                <input class="w3-radio" type="radio" id="yes_radio1" name="radiobutton1" onChange="disablefield1();" value="Cheque" checked>
                <label class="w3-validate"  style="font-size: 0.8em;" >Cheque</label>';
              }?>

              <script type="text/javascript"> 
                function disablefield1(){ 
                  if (document.getElementById('no_radio1').checked == 1){ 
                    document.getElementById('bankname1').disabled='disabled'; 
                    document.getElementById('chequeno1').disabled='disabled';  
                    document.getElementById('chequedate1').disabled='disabled'; 
                    document.getElementById('bankname1').value=''; 
                    document.getElementById('chequedate1').value=''; 
                    document.getElementById('chequeno1').value='';
                    document.getElementById('chequeamount1').value=''; 
                  }else{ 
                    document.getElementById('bankname1').disabled='';

                    document.getElementById('chequeno1').disabled='';
                    document.getElementById('chequedate1').disabled='';  
                  } 
                } 


              </script> 


            </p>


            <br>


            <label>Bank Name:</label>
            <strong><span id='messagestreet'></span></strong>
            <input class="w3-input w3-border" type="text" placeholder="Bank Name"  id="bankname1" name="bankname1">

            <label>Cheque No:</label>
            <strong><span id='messagecity'></span></strong>
            <input class="w3-input w3-border" type="text" placeholder="Cheque No"  id="chequeno1" name="chequeno1">



            <label>Cheque Date:</label>
            <strong><span id='messagestreet'"></span></strong>
            <input class="w3-input w3-border" type="date" placeholder="Cheque Date" id="chequedate1" name="chequedate1">


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="btnSave" onclick="return confirm('Are you sure?');" >Save changes</button>
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


<script>
  function print(a) {
   myRowIndex = $(a).parent().parent().index();
   var getid=  (document.getElementById("jsontable").rows[($(a).parent().parent().index())+1].cells[0].innerHTML);
   window.open("../../pdf/tutorial/tutobill.php?billing_no="+getid+"& customer=<?php echo ''.$customer.'';?>&totalcost=<?php echo ''.$totalcost.'';?>&topay=<?php echo ''.$topay.'';?>&datee=<?php echo ''.$datee.'';?>&enddate=<?php echo ''.$enddate.'';?>&prepare=<?php echo ''.$prepare.'';?>");
 }
</script>





<script type="text/javascript">
  function get_id(o) {
    myRowIndex = $(o).parent().parent().index();
    var getid=  (document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[0].innerHTML);    
    var $modal = $('#myModal'),
    $payment_no1 = $modal.find('#payment_no1');
    $payment_no1.val(getid);          

    $payment_no1 = $modal.find('#payment_no1');
    $payment_no1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[0].innerHTML);



    $cname1 = $modal.find('#cname1');
    $cname1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[1].innerHTML);

    $scname1 = $modal.find('#scname1');
    $scname1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[2].innerHTML);
    $amount1 = $modal.find('#amount1');
    $amount1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[3].innerHTML);

    $bankname1 = $modal.find('#bankname1');
    $bankname1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[4].innerHTML);

    $chequeno1 = $modal.find('#chequeno1');
    $chequeno1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[5].innerHTML);
    $chequedate1 = $modal.find('#chequedate1');
    $chequedate1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[6].innerHTML);

    $radiobutton1 = $modal.find('#radiobutton1');
    $radiobutton11.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[7].innerHTML);

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




<script>
  function myFunction() {

    var  amount, total;

    amount = document.getElementById("amount").value;
    total= document.getElementById("scname").value;

    if(total < amount)

    {

      alert("Amount to pay must not be higher than the balance");
      return false;

    }


    if (amount<= -1) 
    {
      alert("Negative amount is not allowed");
      return false;
    } 


    if (amount== 0) 
    {
      alert("Zero amount is not allowed");
      return false;
    } 

    else

    {
      text = "Input OK";

    }
    document.getElementById("demo").innerHTML = text;



  }
</script>



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



  </html>
