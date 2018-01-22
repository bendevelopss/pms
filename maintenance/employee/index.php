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
    <title>Employee</title>
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
            Employee
            <small>Maintenance</small>
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
                             <a href="#myModal" role="button" title="Add New Customer" class="btn btn-lg " data-toggle="modal"
                             style="box-shadow: 0px 3px 7px #888888; border-radius:100px; width:58px; height:57px; margin-bottom:5px; outline:none;
                             text-align: center; font-size:28px; background-color:#3C8DBC; color:white; "
                            > <i class="ion-android-add"></i> </a>                        </h4>     
                        </div>          

                        <div class="col-md-9 col-xs-12"> <!-- MESSAGE -->
                        <div class="alert alert-xs  bg-teal alert-dismissable" style="width:85%; display:none" id="msg">
                          <i class="icon fa fa-check"></i>
                         <label id="msgContent"></label>
                        </div>                          
                        </div>    
                       </div>                                        
                      </div>



                  


                      

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
                  <h3 class="box-title">Browse Employees</h3>
                  <div class="myData"></div>

                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="jsontable" class="table table-condensed table-striped table-hover">
                    <thead>
                      <tr>
                        <th style="width:13px">ID</th>  
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Last Name</th>
                        <th>Position</th>
                        <th>Contact No.</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Street</th>
                        <th>City</th>
                        <th>Actions</th>
                        
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
                          $sql = "SELECT * from employee where status='active'";
                          $result = $conn->query($sql);
                          while($row = $result->fetch_assoc())
                          {  
                             $emp_no=$row['emp_no'];
                             $firstname=$row['firstname'];
                             $middlename=$row['middlename'];
                             $lastname=$row['lastname'];
                             $pname=$row['position'];
                             $contact=$row['contact']; 
                             $email=$row['email'];
                             $street=$row['street'];
                             $city=$row['city'];
                             $username=$row['username'];
                            
                            echo '<tr>'; 
                                    echo'<td>' .str_pad($row['emp_no'], 4, '0', STR_PAD_LEFT).'</td>';
                                    echo'<td>'.ucfirst($row['firstname']).'</td>';
                                    echo'<td>'.ucfirst($row['middlename']).'</td>';
                                    echo'<td>'.ucfirst($row['lastname']).'</td>';

                                   
                                    echo'<td>'.$row['position'].'</td>';
                                    echo'<td>'.$row['contact'].'</td>'; 
                                    echo'<td>'.$row['email'].'</td>';   
                                    echo'<td>'.$row['username'].'</td>';   
                                    echo'<td>'.$row['street'].'</td>';
                                    echo'<td>'.$row['city'].'</td>';



                                    ?>
                                   


                                    <form method="post">
                                    <td style="text-align:center">
                                      
<button type="button" name="btnEdit" id="bntEdit" value="<?php echo'.$emp_no';?>" data-toggle="modal" data-target="#editModal" class="btn btn-primary glyphicon glyphicon-pencil btn-xs center" onclick="get_id(this)" ></button><?php echo'</button> <button type="submit" name="btnRemove" value="'.$emp_no.'" class="btn btn-primary btn btn-danger glyphicon glyphicon-remove btn-xs"';?>  onclick="return confirm('Delete this employee?')"><?php echo '</form>
';


echo'

</td>';





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
                                    <h4 class="modal-title"> <i class="ion-android-person"></i> Employee Form </h4>
                                </div>          
                                <div class="modal-body" >
<!-- ------------------------------------------------------------------------------------------- -->

 

                                  <div class="row" style="margin-bottom:5px"> <!-- ROW 1 -->
                                    
                                    <div class="col-xs-4" id="empnameErDv"> 
                                      <label><font color="darkred">*</font>First Name</label> <!-- Prod_Name -->
                                      <input type="text" class="form-control" name="txtfirstname" id="firstname">
                                    </div>  

                                     <div class="col-xs-4" id="empnameErDv"> 
                                      <label><font color="darkred">*</font>Middle Name</label> <!-- Prod_Name -->
                                      <input type="text" class="form-control" name="txtmiddlename" id="middlename">
                                    </div>     

                                     <div class="col-xs-4" id="empnameErDv"> 
                                      <label><font color="darkred">*</font>Last Name</label> <!-- Prod_Name -->
                                      <input type="text" class="form-control" name="txtlastname" id="lastname">
                                    </div>  

                                     <div class="col-xs-4" id="empnameErDv"> 
                                      <label><font color="darkred">*</font>Position</label> 
                                      <select name="pname" id="pname" class="form-control"></p>
                                      <?php
                      $content1=mysql_query("select * from position where status='Active'");
                      $total1=@mysql_affected_rows();
                      for($x=1;$x<=$total1;$x++)
                      {
    
                      $row=mysql_fetch_array($content1);

                      $position_name=$row['position_name'];

                      echo'<option value="'.$position_name.'">'.$position_name.'</option>';
                      }
                            echo'</select>';?>
                                    </div>      
                                      
                                    <div class="col-xs-4" id="phoneErDv"> 
                                      <label><font color="darkred">*</font>Contact Number</label> <!-- Prod_Name -->
                                      <input type="number" class="form-control" name="txtcontact" id="contact" data-inputmask='"mask": "9999-999-9999"' data-mask >
                                    </div>    

                                   <div class="col-xs-4" id="emailErDv"> 
                                      <label>Email</label> <!-- Prod_Name -->
                                      <input type="text" class="form-control" name="txtemail" id="email">
                                    </div>   

                                      
                                  </div> <!-- /.row -->   
<!-- ------------------------------------------------------------------------------------------- -->
                     
                                  <div class="row" style="margin-bottom:5px"> <!-- ROW 2-->
                                    
                                    <div class="col-xs-6" id="addErDv"> 
                                      <label><font color="darkred">*</font>Street</label> <!-- Prod_Name -->
                                     <input type="text" class="form-control" name="txtstreet" id="street">
                                    </div>           

                                    <div class="col-xs-4" id="emailErDv"> 
                                      <label>City</label> <!-- Prod_Name -->
                                      <input type="text" class="form-control" name="txtcity" id="city">
                                    </div>                
  
                                  </div> <!-- /.row -->   
<!-- ------------------------------------------------------------------------------------------- <-->                                <div class="row" style="margin-bottom:5px"> <!-- ROW 2-->
                                    
                                    <div class="col-xs-4" id="addErDv"> 
                                      <label><font color="darkred">*</font>Username</label> <!-- Prod_Name -->
                                     <input type="text" class="form-control" name="txtusername" id="username">
                                    </div>           

                                    <div class="col-xs-4" id="emailErDv"> 
                                      <label>Password</label> <!-- Prod_Name -->
                                      <input type="password" class="form-control" name="txtpassword" id="password">
                                    </div>                
  
                                  </div> <!-- /.row -->   
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
                                    <h4 class="modal-title"> <i class="ion-android-person"></i> Edit Employee Form </h4>
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
                $emp_no1 = $modal.find('#emp_no1');
            $emp_no1.val(getid);  
            $emp_no1 = $modal.find('#emp_no1');
            $emp_no1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[0].innerHTML);        
            $firstname1 = $modal.find('#firstname1');
            $firstname1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[1].innerHTML);
            $middlename1 = $modal.find('#middlename1');
            $middlename1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[2].innerHTML);
            $lastname1 = $modal.find('#lastname1');
            $lastname1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[3].innerHTML);
            $pname1 = $modal.find('#pname1');
            $pname1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[4].innerHTML); 
            $contact1 = $modal.find('#contact1');
            $contact1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[5].innerHTML);
            $email1 = $modal.find('#email1');
            $email1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[6].innerHTML);
            $username1 = $modal.find('#username1');
            $username1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[7].innerHTML);
            $street1 = $modal.find('#street1');
            $street1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[8].innerHTML);
            $city1 = $modal.find('#city1');
            $city1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[9].innerHTML);

          
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
   
</html>
  <script type="text/javascript">
        $(document).ready(function(){
    $('#jsontable').DataTable({
      "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
    
    });
});
    </script>
<script type="text/javascript">

    $('.remove').click(function(){
      swal({
          title: "Are you sure want to remove this item?",
          text: "You will not be able to recover this item",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: "btn-danger",
          confirmButtonText: "Confirm",
          cancelButtonText: "Cancel",
          closeOnConfirm: false,
          closeOnCancel: false
        },
        function(isConfirm) {
          if (isConfirm) {
            swal("Deleted!", "Your item deleted.", "success");
          } else {
            swal("Cancelled", "You Cancelled", "error");
          }
      });
    });

</script>