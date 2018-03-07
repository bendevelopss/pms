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


$a= date("Y-m-d");

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Payment</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <?php include("../../maintenance/plugins.php"); ?>
  <div class="se-pre-con"></div>


  </head>

  <body class='skin-red fixed'>
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
          Payment
          <small>Transaction</small>
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
                                $sql = "SELECT * FROM payment where status='Active'" or die (mysql_error());
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
                                  <td style="text-align:center"><button type="submit" name="btnRemove" value="<?php echo''.$payment_no.''; ?>" class="btn btn-primary btn btn-danger fa fa-close btn-xs"  onclick="return confirm('Delete?');"></button>
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

                        <div class="box-body">

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
$sub= $bal - $amount;


$result = mysql_query("INSERT into payment (customer, topay, amount, bankname, chequeno, chequedate, type, status )
values('".$cust."','".$topay."', '".$amount."','".$bankname."'  ,'".$chequeno."', '".$chequedate."','".$radio."','".$status."')") or die(mysql_error());

mysql_query("UPDATE billing SET balance='".$sub."', topay='".$tops."' WHERE billing_no='".$_POST['cname']."'") or die(mysql_error());

mysql_query("UPDATE quotation SET balance='".$sub."' WHERE customer='".$cust."' and project='".$proj."'") or die(mysql_error());



        // Check if it was successfull
        if($result == TRUE)
         {

        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Success!","Payment Added!","success");';
        echo '},);</script>';

        }
        else
          {
              echo '<script type="text/javascript">';
              echo 'setTimeout(function () { swal("Error!","There Was an error","error");';
              echo '},);</script>';
         }

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



                          <?php
                          $a= date("d/m/Y");
                          ?>
                          <?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$query ="SELECT * FROM billing where topay >0";
$results = $db_handle->runQuery($query);
?>
                          <h3>BILLING INFORMATION</h3>
                          <br>
                          <div class="row" style="margin-bottom:5px;"> <!-- ROW 2-->
                            <div class="col-xs-3" id="addErDv">
                             <label >Customer:</label>
                             <select name="cname" id="cname" class="form-control" onChange="getState(this.value);" style="width:100%;"></p>
                              <option value="">-------------SELECT CUSTOMER & PROJECT-------------------</option>
                              <?php
                              foreach($results as $country) {
                                ?>
<option value="<?php echo $country["billing_no"]; ?>"> <?php echo $country["customer"]; ?> || "<?php echo $country["project"]; ?>"</option>


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


                        <h3>PAYMENT</h3>

                        <div class="row">
                          <div class="col-xs-2" id="addErDv">
                            <label > Amount</label>
                            <strong><span id='messageuser' ></span></strong>
                            <input class="form-control" type="text" placeholder="Total Amount to Pay" style="height:33px;" id="amount" name="amount" value="">
                          </div>

                          <div class="col-xs-2" id="addErDv">
                            <strong><span id='messages' ></span></strong>
                            <label >Remaining Balance</label>
                            <strong><span id='messageuser' ></span></strong>
                            <input class="form-control" type="text" placeholder="Remaining Balance" style="height:33px;" id="total" name="total" value="" readonly>
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


                        <p style="">
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

                    </div>
                  </div>


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
             <input class="form-control" type="text" placeholder="Bank Name"  id="payment_no1" name="payment_no1" readonly>
            </div>
     </div>

             <label>Customer:</label>
             <select name="cname1" id="cname1" class="form-control"  onChange="getState1(this.value);" required></p>
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

            <h1>PAYMENT</h1>


            <label> Amount</label>

            <input class="form-control" type="text" placeholder="Total Amount to Pay" id="amount1" name="amount1" required>

            <p style="">
              <?php if($cust_type2=="Cash")
              {
                echo'<input class="w3-radio" type="radio" name="radiobutton1" id="no_radio1" onChange="disablefield1();" value="Cash" checked>
                <label class="w3-validate"  style="font-size: 1.1em;" >Cash</label>
                <input class="w3-radio" type="radio" id="yes_radio1" name="radiobutton1" onChange="disablefield1();" value="Cheque">
                <label class="w3-validate"  style="font-size: 1.1em;" >Cheque</label>';
              }
              else
              {
                echo'<input class="w3-radio" type="radio" name="radiobutton1" id="no_radio1" onChange="disablefield1();" value="Cash">
                <label class="w3-validate"  style="font-size: 1.1em;">Cash</label>
                <input class="w3-radio" type="radio" id="yes_radio1" name="radiobutton1" onChange="disablefield1();" value="Cheque" checked>
                <label class="w3-validate"  style="font-size: 1.1em;" >Cheque</label>';
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
            <input class="form-control" type="text" placeholder="Bank Name"  id="bankname1" name="bankname1" required>

            <label>Cheque No:</label>
            <strong><span id='messagecity'></span></strong>
            <input class="form-control" type="number" placeholder="Cheque No"  id="chequeno1" name="chequeno1" required>



            <label>Cheque Date:</label>
            <strong><span id='messagestreet'"></span></strong>
            <input class="form-control" type="date" placeholder="Cheque Date" id="chequedate1" name="chequedate1" required>


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="btnSave">Save changes</button>
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


</body>
  </html>
