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
$position=$row1['position'];

$a= date("Y-m-d");

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Supplier</title>
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
  <?php include("../../maintenance/side.php"); ?>


  <!-- Right side column. Contains the navbar and content of the page -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Supplier
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
                      <h3 class="box-title">Browse Supplier</h3>
                      <div class="myData"></div>

                    </div><!-- /.box-header -->
                    <div class="box-body">
                      <table id="jsontable" class="table table-condensed table-striped table-hover">
                        <thead>
                          <tr>
                            <th style="width:13px">ID</th>  
                            <th>Company</th>
                            <th>Phone No.</th>
                            <th>Fax No.</th>
                            <th>Email</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Contact No.</th>
                            <th>Address</th>
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
                         $sql = "SELECT * FROM supplier where status='Active'";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_assoc())
                        {  
                         $supp_no=$row['supplier_no'];
                         $supp_name=$row['supp_name'];
                         $phone_num=$row['phone'];
                         $fax=$row['fax'];
                         $email=$row['email'];
                         $firstname=$row['firstname'];
                         $middlename=$row['middlename'];
                         $lastname=$row['lastname'];
                         $contact=$row['contact']; 
                         $street=$row['street'];
                         $city=$row['city'];

                         echo '<tr>'; 
                          echo'<td>' .str_pad($row['supplier_no'], 4, '0', STR_PAD_LEFT).'</td>';
        echo'<td>'.$row['supp_name'].'</td>';
        echo'<td>'.$row['phone'].'</td>';
        echo'<td>'.$row['fax'].'</td>';
        echo'<td>'.$row['email'].'</td>';
        echo'<td>'.$row['firstname'].'</td>';
        echo'<td>'.$row['middlename'].'</td>';
        echo'<td>'.$row['lastname'].'</td>';
        echo'<td>'.$row['contact'].'</td>';    
        echo'<td>'.$row['street'].'</td>';
        echo'<td>'.$row['city'].'</td>';

                         ?>



                         <form method="post">
                          <td style="text-align:center">

                            <button type="button" name="btnEdit" id="bntEdit" value="<?php echo'.$supp_no';?>" data-toggle="modal" data-target="#editModal" class="btn btn-primary glyphicon glyphicon-pencil btn-xs center" onclick="get_id(this)" ></button><?php echo'</button> <button type="submit" name="btnRemove" value="'.$supp_no.'" class="btn btn-primary btn btn-danger glyphicon glyphicon-remove btn-xs"';?>  onclick="return confirm('Delete this supplier?')"><?php echo '</form>
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
                  <h4 class="modal-title"> <i class="ion-android-person"></i> Supplier Form </h4>
                </div>          
                <div class="modal-body" >
    <!-- ------------------------------------------------------------------------------------------- -->



                   <div class="row""><!-- ROW 1 -->
                    <h4 style="margin-top: -18px;">&nbsp;&nbsp;&nbsp;Company Information</h4>
                    <input type="hidden" class="form-control" name="txtfirstname" id="" required>
                  </div>

                  <div class="row" style="margin-bottom: 5px">
                    <div class="col-xs-4" id="empnameErDv"> 
                      <label><font color="darkred">*</font>Company Name</label> <!-- Prod_Name -->
                      <input type="text" class="form-control" name="txtname" id="textbox_A" required>
                    </div>  

                    <div class="col-xs-4" id="empnameErDv"> 
                      <label><font color="darkred">*</font>Phone Number</label> <!-- Prod_Name -->
                      <input type="number" class="form-control" name="txtphone" id="textbox_B" required>
                    </div>     

                    <div class="col-xs-4" id="empnameErDv"> 
                      <label><font color="darkred">*</font>Fax Number</label> <!-- Prod_Name -->
                      <input type="number" class="form-control" name="txtfax" id="textbox_C" required>
                    </div>  

                  </div>

                  <div class="row" style="margin-bottom:5px"> <!-- ROW 1 -->

                  
                    <div class="col-xs-4" id="phoneErDv"> 
                      <label><font color="darkred">*</font>Email Address</label> <!-- Prod_Name -->
                      <input type="text" class="form-control" id="email" name="txtemail"  required>
                    </div>    

                   


                  </div> <!-- /.row -->   

                  <div class="row" style="margin-bottom:5px"> <!-- ROW 1 -->

                  
                    

                    <div class="col-xs-4"> 
                      <h4>Contact Person</h4> <!-- Prod_Name -->
                     
                    </div>   


                  </div> <!-- /.row -->   


        <!-- ------------------------------------------------------------------------------------------- -->
                     

                  <div class="row" style="margin-bottom:5px"> <!-- ROW 2-->

                    <div class="col-xs-4" id="addErDv"> 
                      <label><font color="darkred">*</font>First Name</label> <!-- Prod_Name -->
                      <input type="text" class="form-control" id="firstname" name="txtfirstname" required>
                    </div>           

                    <div class="col-xs-4" id="emailErDv"> 
                      <label>Middle Name</label> <!-- Prod_Name -->
                      <input type="text" class="form-control" id="middlename" name="txtmiddlename">
                    </div>   

                     <div class="col-xs-4" id="addErDv"> 
                      <label><font color="darkred">*</font>Last Name </label> <!-- Prod_Name -->
                      <input type="text" class="form-control" id="lastname" name="txtlastname" required>
                    </div> 

                    </div>

                    <div class="row" style="margin-bottom:5px"> <!-- ROW 1 -->      

                     <div class="col-xs-4" id="addErDv"> 
                      <label><font color="darkred">*</font>Contact Number</label> <!-- Prod_Name -->
                      <input type="number" class="form-control" id="contact" name="txtcontact" required>
                    </div>          

                  </div> <!-- /.row -->   
                  <!-- ------------------------------------------------------------------------------------------- <-->
                   <div class="row" style="margin-bottom:5px"> <!-- ROW 1 -->

                  
                    

                    <div class="col-xs-6"> 
                      <h4>Company Address</h4> <!-- Prod_Name -->
                     
                    </div>   


                  </div> <!-- /.row -->   

                  <div class="row" style="margin-bottom:5px"> <!-- ROW 2-->

                    <div class="col-xs-6" id="addErDv"> 
                      <label><font color="darkred">*</font>Street</label> <!-- Prod_Name -->
                      <input type="text" class="form-control" id="street" name="txtstreet" required>
                    </div>           

                    <div class="col-xs-6" id="emailErDv"> 
                      <label>City</label> <!-- Prod_Name -->
                      <input type="text" class="form-control" id="city" name="txtcity" required>
                    </div>                

                  </div> <!-- /.row -->   
                  <!-- ------------------------------------------------------------------------------------------- -->


                  <!-- ------------------------------------------------------------------------------------------- -->


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
                $supp_no1 = $modal.find('#supp_no1');
            $supp_no1.val(getid);
            $type = $modal.find('#type');


             $supp_no1 = $modal.find('#supp_no1');
            $supp_no1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[0].innerHTML);

            $supp_name1 = $modal.find('#supp_name1');
            $supp_name1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[1].innerHTML);
            $phone_num1 = $modal.find('#phone_num1');
            $phone_num1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[2].innerHTML);
            $fax1= $modal.find('#fax1');
            $fax1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[3].innerHTML);            
            $firstname1 = $modal.find('#firstname1');
            $firstname1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[5].innerHTML);
            $middlename1 = $modal.find('#middlename1');
            $middlename1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[6].innerHTML);
            $lastname1 = $modal.find('#lastname1');
            $lastname1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[7].innerHTML);
            $contact1 = $modal.find('#contact1');
            $contact1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[8].innerHTML);
            $email1 = $modal.find('#email1');
            $email1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[4].innerHTML);
            $address1 = $modal.find('#address1');
            $address1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[9].innerHTML);
            $city1 = $modal.find('#city1');
            $city1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[10].innerHTML);
          
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
function myFunction() {
    var txtname,txtphone,txtemail,txtfirstname, txtmiddlename ,txtlastname, txtcontact, txtstreet, txtcity, textcontact1, txtfax;


    txtname = document.getElementById("textbox_A").value;
    txtphone = document.getElementById("textbox_B").value;
    txtemail = document.getElementById("email").value;
    txtfax = document.getElementById("textbox_C").value;
    txtfirstname = document.getElementById("firstname").value;
txtmiddlename = document.getElementById("middlename").value;
    txtlastname = document.getElementById("lastname").value;
    txtcontact = document.getElementById("contact").value;
    txtcontact1 = document.getElementById("contact").value.length;
    txtstreet = document.getElementById("street").value;
    txtcity = document.getElementById("city").value;

    if (txtname=='') 
    {
        alert("Company Name is a required field");
        return false;
    } 

 else if (txtstreet=='') 
    {
        alert("Street is a required field");
        return false;
    } 
    else if (txtcity=='') 
    {
        alert("City Address is a required field");
        return false;
    } 



    else if (txtphone=='') 
    {
        alert("Phone is a required field");
        return false;
    } 
    else if (txtemail=='') 
    {
        alert("Email Address is a required field");
        return false;
    } 
     else if (txtfirstname=='') 
    {
        alert("First Name is a required field");
        return false;
    } 
    
     else if (txtlastname=='') 
    {
        alert("Last Name is a required field");
        return false;
    } 
      else if (txtphone.match(/[a-zA-Z]/g)) 
    {
        alert("phone must not contain alphabet");
        return false;
    } 

      else if (txtcontact.match(/[a-zA-Z]/g)) 
    {
        alert("contact number must not contain letters");
        return false;
    } 

     else if (txtfax.match(/[a-zA-Z]/g)) 
    {
        alert("fax must not contain letters");
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