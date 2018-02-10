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
$position=$row1['position'];

$a= date("Y-m-d");

?> 

<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8">
    <title>Position</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <?php include("../../maintenance/plugins.php"); ?>
  <div class="se-pre-con"></div>
   
    
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
               

                <p>
               <?php include("../../maintenance/user_type.php"); ?>
                </p>
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
<?php include("../../maintenance/side_account.php") ?>


      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Position
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
                             <a href="#myModal" role="button" title="Add New Position" class="btn btn-lg " data-toggle="modal"
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
                  <h3 class="box-title">Browse Position</h3>
                  <div class="myData"></div>

                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="jsontable" class="table table-condensed table-striped table-hover">
                    <thead>
                      <tr>
                        <th>ID</th>  
                        
                        <th style="width: 50%">Position Name</th>
                        <th style="text-align:center">Action</th>
                        
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
                          $sql = "SELECT * FROM position where status='Active'";
      $result = $conn->query($sql);
      while($row = $result->fetch_assoc())
      { 
         $position_no=$row['position_no'];
        $position_name=$row['position_name'];
                            
                            echo '<tr>'; 
                                     echo'<td>' .str_pad($row['position_no'], 4, '0', STR_PAD_LEFT).'</td>';
                                    echo'<td>'.$row['position_name'].'</td>';
                                   


                                    ?>
                                   


                                    <form method="post">
                                    <td style="text-align:center">
                                      
<button type="button" name="btnEdit" id="bntEdit" value="<?php echo'.$position_no';?>" data-toggle="modal" data-target="#editModal" class="btn btn-primary glyphicon glyphicon-pencil btn-xs center" onclick="get_id(this)" ></button><?php echo'</button> <button type="submit" name="btnRemove" value="'.$position_no.'" class="btn btn-primary btn btn-danger glyphicon glyphicon-remove btn-xs"';?>  onclick="return confirm('Delete this employee?')"><?php echo '</form>
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
                                    <h4 class="modal-title"> <i class="ion-android-person"></i> Position Form </h4>
                                </div>          
                                <div class="modal-body" >

                     
                                  <div class="row" style="margin-bottom:5px"> <!-- ROW 2-->
                                    
                                    <div class="col-xs-6" id="position_div"> 
                                      <label><font color="darkred">*</font>Position</label> <!-- Prod_Name -->
                                     <input type="text" class="form-control" name="txtname" id="textbox_A" required>
                                    </div>           

                                                 
  
                                  </div> <!-- /.row -->   



                                  </form>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" id="btnAdd" name="btnAdd" class="btn bg-blue btn-lg btn-block" data-dismiss="modal fade"><i class="fa fa-send"></i> SAVE</button>  
                                    
                                                                  
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
                                    <h4 class="modal-title"> <i class="ion-android-person"></i> Edit Position Form </h4>
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
                $pos_no1 = $modal.find('#pos_no1');
            $pos_no1.val(getid);
              $pos_no1 = $modal.find('#pos_no1');
            $pos_no1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[0].innerHTML);

            $pos_name1 = $modal.find('#pos_name1');
            $pos_name1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[1].innerHTML);
          
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
