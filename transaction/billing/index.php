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
  header('Location: ../../index.php');
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
$position=$row1['position'];

$a= date("Y-m-d");



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);



?>
<!DOCTYPE html>
  <?php include("../../maintenance/plugins.php"); ?>
  <div class="se-pre-con"></div>
<html>

<head>
  <meta charset="UTF-8">
  <title>Billing</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>



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
   <?php include("../../maintenance/side_account.php"); ?>


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


      $prep= $row['prepared_by'];




      if(isset($_POST['btnAdd']))

      {




        mysql_query("insert into billing (customer, project,totalcost, balance, topay, datee, enddate, prepared, status ) 
          values('".$cust."','". $proj."','". $total."','".$total."', '".$topay."','".$a."' ,'".$end."', '".$prep."', '".$status."')");

        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Success!","New Billing Added!","success");';
        echo '},);</script>';

      }


      if(isset($_POST['btnRemove'])) {

        $nos = $_POST['btnRemove'];

        $status="hidden";


// Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        } 

        $sql = "update billing set status='".$status."' 
        where billing_no=".$nos;

        if ($conn->query($sql) === TRUE) {


        } else {
          echo "Error updating record: " . $conn->error;
        }





        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Success!","Billing Deleted","success");';
        echo '},);</script>';


      }

      ?>


      <?php
      $content1=mysql_query("SELECT max(delivery_no) as max from delivery");
      $total1=@mysql_affected_rows();


      $row=mysql_fetch_array($content1);
      $noo=$row['max'];

      $hell=$noo+1;



      $a= date("m/d/Y");



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

          echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Success!","Billing Updated","success");';
        echo '},);</script>';
        } else {
          echo "Error updating record: " . $conn->error;
        }



      


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

   



                  <div class="row">                     <!-- TABLES -->
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                      <div class="box box-solid">
                        <div class="box-header">
                          <h3 class="box-title">Browse Biling Record</h3>
                          <div class="myData"></div>

                        </div><!-- /.box-header -->
                        <div class="box-body">
                          <table id="jsontable" class="table table-condensed table-striped table-hover">
                            <thead>
                              <tr>

                                <th> Billing No </th>
                                <th>Customer</th>
                                <th> Total Cost</th>   
                                <th>Remaining Balance</th>
                                <th>Amount to Pay</th>
                                <th>Date</th>
                                <th>Due Date</th>
                                <th>Prepared by:</th>
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
                                $sql = "SELECT * FROM billing where status='Active'";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc())
                                { 
                                  $billing_no=$row['billing_no'];
                                  $customer=$row['customer'];
                                  $totalcost=$row['totalcost'];
                                  $balance=$row['balance'];
                                  $topay=$row['topay'];
                                  $datee=$row['datee']; 
                                  $enddate=$row['enddate'];
                                  $prepare=$row['prepared'];

                                  echo'<tr>';
                                  echo'<td>' .str_pad($row['billing_no'], 4, '0', STR_PAD_LEFT).'</td>';
                                  echo'<td>'.$customer.'</td>';
                                  echo'<td>'.$totalcost.'</td>';
                                  echo'<td>'.$balance.'</td>';
                                  echo'<td>'.$topay.'</td>';
                                  echo'<td>'.$datee.'</td>'; 
                                  echo'<td>'.$enddate.'</td>'; 
                                  echo'<td>'.$prepare.'</td>'; 
                                  
                                  ?>

                                  <td style="text-align:center"><button type="submit" name="btnRemove" value="<?php echo''.$billing_no.''; ?>" class="btn btn-primary btn btn-danger glyphicon glyphicon-remove btn-xs"  onclick="return confirm('Are you sure?');"></button>
                                    <?php
                                    echo'


                                    <button class="glyphicon glyphicon-print btn btn-success btn-xs" type="button" name="btnprint" id="btnprint" onclick="print(this)" value ="'.$billing_no.'" class="w3-btn"></button>
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


                                <div class="col-sm-2">
                                  <label >Customer:</label>
                                  <select class="form-control" name="cname" id="cname" class="form-control" onChange="getState(this.value);" style="width:100%;" required></p>
                                    <option value="">--Select Customer--</option>
                                    <?php
                                    foreach($results as $country) {
                                      ?>
                                      <option value="<?php echo $country["quote_no"]; ?>"><?php echo $country["customer"]; ?>|<?php echo $country["project"]; ?>"</option>

                                      <?php
                                    }
                                  echo'</select>';?>
                                </div>




                                <?php
                                $a= date("m/d/Y");
                                ?>

                                                
                                  <div class="col-xs-2" id="addErDv">
                                    <label >Date:</label>
                                    <input class="form-control" type="text" placeholder="TAX" value="<?php echo $a; ?>" id="startdate" name="startdate" style="width: 70%"  readonly>
                                    </div>

            
                                      
                                      <div class="col-xs-2" id="addErDv"> 
                                      <label>Due Date:</label>
                                      
                                        <input class="form-control" type="date" placeholder="TAX"  id="enddate" name="enddate" required>

                                      </div>
                                      </div>
                                        

                                         <div class="row" style="margin-bottom:5px; margin-left: 10px;"> <!-- ROW 2-->
                                     <div class="col-xs-2" id="addErDv"> 
                                  <label>Total Cost:</label>
                                  <select name="scname" id="scname" class="form-control">
                                  </select>

                                </div>
                                   <div class="row" style="margin-bottom:5px; margin-left: 10px;">
                                   <div class="col-xs-2" id="addErDv"> 
                                  <label  margin-top: 10px;">Amount to Pay:</label>
                                  <input class="form-control" type="number" placeholder="Amount to Pay" id=totalamount name="totalamount" required>
                                </div>
                                 

                                </div> 
                                
                                
                                

                                <button type="submit" name="btnAdd" onclick="return myFunction();" class="btn btn-primary" style="margin-bottom: 15px; margin-top: 15px; margin-left: 15px;">Add</button>

                                <br>

                                <div class="col-xs-2" id="addErDv"> 
                                  <label  margin-top: 10px;">Prepared by:</label>
                                  <input class="form-control" type="txt" placeholder="Prepared by:" id="prepare" name="prepare"  value="<?php echo ''.ucfirst($lastname2).', '.ucfirst($firstname2).' '.strtoupper($middlename2[0]).'.'; ?>" style="margin-bottom: 20px;" disabled>
                                </div> 
        

                              </div>


                            </div>


                          </div><!-- /.col -->
                        </div>  <!-- /.row -->         



                      </div> <!-- /.row --> 









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
                        <h4 class="modal-title" id="myModalLabel">Billing</h4>

                      </div>



                      <div class="modal-body">
                        <div class="form-group">
                         <label>Billing No:</label>
                         <input class="form-control" name="billing_no1" id="billing_no1" value=""/>
                         <label>Amount to Pay:</label>
                         <input class="form-control" name="topay1" id="topay1" value=""/>
                         <label>Due Date:</label>
                         <input class="form-control" type= "date" name="end1" id="end1" value=""/>


                         <br><br></br></br>


                       </div>

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
             window.open("../../pdf/print/printbill.php?billing_no="+getid+"& customer=<?php echo ''.$customer.'';?>&totalcost=<?php echo ''.$totalcost.'';?>&topay=<?php echo ''.$topay.'';?>&datee=<?php echo ''.$datee.'';?>&enddate=<?php echo ''.$enddate.'';?>&prepare=<?php echo ''.$prepare.'';?>");
           }
         </script>





         <script type="text/javascript">
          function get_id(o) {
            myRowIndex = $(o).parent().parent().index();
            var getid=  (document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[0].innerHTML);    
            var $modal = $('#myModal'),
            $billing_no1 = $modal.find('#billing_no1');
            $billing_no1.val(getid);   

            $billing_no1 = $modal.find('#billing_no1');
            $billing_no1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[0].innerHTML);

            $topay1 = $modal.find('#topay1');
            $topay1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[3].innerHTML);
            $end1 = $modal.find('#end1');
            $end1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[5].innerHTML); 
          }
        </script>

        <script>
          function myFunction() {

            var  totalamount;
            var scname1;

            totalamount = document.getElementById("totalamount").value;
            scname1=document.getElementById("scname").value;
            scname11= parseInt(scname1);


            if(scname11 < totalamount)

            {

              alert("Amount to pay must not be higher than the balance");
              return false;

            }

            else if (totalamount<=-1) 
            {
              alert("Negative amount is not allowed");
              return false;
            } 


            else if (totalamount== 0) 
            {
              alert("Zero amount is not allowed");
              return false;
            } 

            else if (totalamount==" ") 
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

