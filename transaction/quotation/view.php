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

$pos=$row['position'];
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

$a= date("Y-m-d");

$content3=mysql_query("select * from quotation where quote_no='".$_GET['id']."' ");
$total3=@mysql_affected_rows();
$row3=mysql_fetch_array($content3);

$date=$row3['date'];

?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Quotation</title>
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
            
                 <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle " data-toggle="dropdown" >
             
             
               <?php include("../../maintenance/nav.php"); ?>  
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
    <?php include("../../maintenance/side.php") ?>


    <!-- Right side column. Contains the navbar and content of the page -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Ongoing Quotation
          <small>Record</small>
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

                  <div class="col-sm-4 ">                        
                   <div class="row" style="margin-bottom:5px;"> <!-- ROW 2-->

                    

                    <div class="col-xs-6" style="text-align: center;"> 
                      <label>Person-In-Charge</label> <!-- Prod_Name -->
                      <input class="form-control" type="text" id="prepared" name="prepared" value="<?php echo ''.ucfirst($lastname2).', '.ucfirst($firstname2).' '.ucfirst($middlename2[0]).'.'; ?>" readonly style="text-align: center;">
                    </div>           

                    <div class="col-xs-6" style="text-align: center;"> 
                      <label>Date Requested</label> <!-- Prod_Name -->
                      <input class="form-control" type="text" name="date" value="<?php echo $a; ?>" readonly style="text-align: center;">
                      
                    </div>   


                  </div>          

                  <div class="col-md-9 col-xs-12"> <!-- MESSAGE -->

                    <div class="alert alert-xs  bg-teal alert-dismissable" style="width:85%; display:none" id="msg">
                      <i class="icon fa fa-check"></i>
                      <label id="msgContent"></label>
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
                        <h3 class="box-title">Browse Quotation</h3>
                        <div class="myData"></div>

                      </div><!-- /.box-header -->
                      <div class="box-body">
                        <table id="jsontable" class="table table-condensed table-striped table-hover">
                          <thead>
                            <tr>
                              <th>No.</th>
                              <th>Brand</th>
                              <th>Category</th>
                              <th>Sub-category</th>
                              <th>Description</th>
                              <th>Color</th>
                              <th>Package</th>
                              <th>Measurement</th>
                              <th>Qty</th>
                              <th>Price</th>

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
                              $a=0;
                              $sql = "SELECT * , SUM(quantity) as total FROM quotation_cart where project='".$_GET['project']."' and status='active' group by material_no";
      //$sql = "SELECT * FROM quotation_cart where project='".$_GET['project']."' and status='active'";
                              $result = $conn->query($sql);
                              while($row = $result->fetch_assoc())
                              { 
                                echo'<tr>';

                                $a++;
                                echo'<td>' .str_pad($a, 4, '0', STR_PAD_LEFT).'</td>';
                                echo'<td>'.ucfirst($row['brand_name']).'</td>';
                                echo'<td>'.ucfirst($row['category']).'</td>';
                                echo'<td>'.ucfirst($row['scategory_name']).'</td>';
                                echo'<td>'.ucfirst($row['description']).'</td>';
                                echo'<td>'.ucfirst($row['color']).'</td>';
                                echo'<td>'.ucfirst($row['package']).'</td>';
                                echo'<td>'.ucfirst($row['unit_measurement']).''.$row['abbre'].'</td>';
                                echo'<td>'.ucfirst($row['total']).'</td>';
                                echo'<td>&#8369;'.ucfirst($row['price']).'</td>';

                                $totals+=($row['price']*$row['total']);

                              }
                              echo'</tr>';
                              echo' 

                              </tbody>

                              </table>
                              <br></br>';
                              $conn->close();
                              ?> 
                            </form>





                            <center>Total: <?php echo'&#8369;'.number_format((double)$totals,2,'.','').''; ?></center>




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
    <script>
      function myFunctions() {

       id = document.getElementById("quote_no").value;
       if (confirm("Are you sure?") == true) {

       } 
       else {
        return false;
        //window.location.href="purchaseorder1.php";
      }
    }


  </script>


  <script>
    function done() {


     id = document.getElementById("quote_no").value;
     if (confirm("Are you sure?") == true) {

     } 
     else {
      return false;
        //window.location.href="purchaseorder1.php";
      }


    }
  </script>