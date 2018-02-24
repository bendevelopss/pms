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

$content2=mysql_query("SELECT * from employee where username='".$_SESSION['user']."' and password='".$_SESSION['pass']."' ");
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
$image=$row1['image'];

$a= date("Y-m-d");

?>


<?php
$content1=mysql_query("select max(material_no) as max from materials");
$total1=@mysql_affected_rows();


$row=mysql_fetch_array($content1);
$noo=$row['max'];



$hell=$noo+1;


$hell2 ="mtrl". $hell;


$cname=$_POST['cname'];
$scname=$_POST['scname'];
$desc=$_POST['desc'];
$brand=$_POST['brand'];
$color=$_POST['color'];
$pack=$_POST['pack'];
$unitname=$_POST['unitname'];
$abbrev=$_POST['abbrev'];
$pricing=$_POST['txtprice'];
$status="Active";



$find1111=mysql_query("select * from materials where category='".$cname."'");
$total11=@mysql_affected_rows();
$row1111=mysql_fetch_array($find1111);
$cname2=$row1111['category'];


$find11111=mysql_query("select * from materials where scategory_name='".$scname."'");
$total11111=@mysql_affected_rows();
$row11111=mysql_fetch_array($find11111);
$scname2=$row11111['scategory_name'];


$find11=mysql_query("select * from materials where description='".$desc."'");
$total11=@mysql_affected_rows();
$row11=mysql_fetch_array($find11);
$desc2=$row11['description'];






if(isset($_POST['btnAdd']) && !empty($cname)  && !empty($scname))

{

  if(preg_match("/^[a-zA-Z,-,', .,-]*$/",$brand) && preg_match("/^[a-zA-Z,-,', .,-]*$/",$desc) && preg_match("/^[a-zA-Z,-,', .,-]*$/",$pack))
  {

    $brands= mysql_real_escape_string($brand);
    $descs= mysql_real_escape_string($desc);
    $packs= mysql_real_escape_string($pack);





    mysql_query("insert into materials (code,category, scategory_name,description, brand_name, color, package, unit_measurement, abbre, price, status ) 
      values('". $hell2."','". $cname."','".$scname."', '".$descs."','".$brands."'  ,'".$color."', '".$packs."','".$unitname."', '".$abbrev."', '".$pricing."', '".$status."')");
    
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Success!","New Material Added!","success");';
        echo '},);</script>';

  }
}





//Update query1
if(isset($_POST['btnSave']))
{
  $material_no11 = $_POST['material_no1'];           
  $cname11=$_POST['cname1'];
  $scname11=$_POST['scname1'];
  $desc11=$_POST['desc1'];
  $brand11=$_POST['brand1'];
  $color11=$_POST['color1'];
  $pack11=$_POST['pack1'];
  $unitname11=$_POST['unitname1'];
  $abbrev11=$_POST['abbrev1'];
  $price11=$_POST['price1'];


  
  mysql_query("UPDATE materials SET category='".$cname11."',scategory_name='".$scname11."',description='".$desc11."',brand_name='".$brand11."', color='".$color11."', package='".$pack11."', unit_measurement='".$unitname11."', abbre='".$abbrev11."' , price='".$price11."'  WHERE material_no='".$material_no11."'");
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Success!","Update Successful!","success");';
        echo '},);</script>';
  
  
}


?>

<?php
if(isset($_POST['btnRemove'])) {

 $nos=$_POST['btnRemove'];

 $status="inactive";


 mysql_query("update materials set status='".$status."' 
  where material_no=".$nos);
  echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Success!","Material Deleted!","success");';
        echo '},);</script>';


}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Materials</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
   <?php include("../../maintenance/plugins.php"); ?>
  <div class="se-pre-con"></div>
   </head>

   <body class='skin-red fixed'>

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
               
               <img src="<?php echo '../employee/image/'.($image).''; ?>" class="img-circle">

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
  <?php include("../../maintenance/side_account.php") ?>


  <!-- Right side column. Contains the navbar and content of the page -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Materials
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


              <div class="row">                     <!-- TABLES -->
                <div class="col-lg-12 col-sm-12 col-xs-12">
                  <div class="box box-solid">
                    <div class="box-header">
                      <h3 class="box-title">Browse Materials</h3>
                      <div class="myData"></div>

                    </div><!-- /.box-header -->
                    <div class="box-body">
                      <table id="jsontable" class="table table-condensed table-striped table-hover">
                        <thead>
                          <tr>
                            <th style="width:13px">ID</th>  
                            <th>Category</th>
                            <th>Subcategory</th>
                            <th>Description</th>
                            <th>Brand</th>
                            <th>Color</th>
                            <th>Package</th>
                            <th>Measurement (Qty)</th>
                            <th>Unit</th>
                            <th>Price</th>
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
                        $sql = "SELECT * FROM materials where status='Active'";
                        $result = $conn->query($sql);
                        while($row = $result->fetch_assoc())
                        {  
                          $material_no=$row['material_no'];
                          $category=$row['category'];
                          $scategory_name=$row['scategory_name'];
                          $description=$row['description'];
                          $brand_name=$row['brand_name'];
                          $color=$row['color']; 
                          $package=$row['package']; 
                          $unit_measurement=$row['unit_measurement'];
                          $abbre=$row['abbre'];
                          $price=$row['price'];

                          echo '<tr>'; 
                           echo'<td>' .str_pad($row['material_no'], 4, '0', STR_PAD_LEFT).'</td>';
                          echo'<td>'.$row['category'].'</td>';
                          echo'<td>'.$row['scategory_name'].'</td>';
                          echo'<td>'.$row['description'].'</td>';
                          echo'<td>'.$row['brand_name'].'</td>';
                          echo'<td>'.$row['color'].'</td>'; 
                          echo'<td>'.$row['package'].'</td>'; 
                          echo'<td>'.$row['unit_measurement'].'</td>'; 
                          echo'<td>'.$row['abbre'].'</td>';   
                          echo'<td>'.$row['price'].'</td>';   
                          ?>



                          <form method="post">
                            <td style="text-align:center">

                              <button type="button" name="btnEdit" id="bntEdit" value="<?php echo'.$material_no';?>" data-toggle="modal" data-target="#editModal" class="btn btn-primary glyphicon glyphicon-pencil btn-xs center" onclick="get_id(this)" ></button><?php echo'</button> <button type="submit" name="btnRemove" value="'.$material_no.'" class="btn btn-primary btn btn-danger glyphicon glyphicon-remove btn-xs"';?>  onclick="return confirm('Delete this Material?')"><?php echo '</form>
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

          <?php
          require_once("dbcontroller.php");
          $db_handle = new DBController();

          $status="Active";

          $query ="SELECT * FROM category where status = '".$status."'  ";
          $results = $db_handle->runQuery($query);
          ?>

          <script>
            function getState(val) {
              $.ajax({
                type: "POST",
                url: "get_state.php",
                data:'country_id='+val,
                success: function(data){
                  $("#scname").html(data);
                }
              });
            }

          </script>


          <?php
          $content1=mysql_query("select max(material_no) as max from materials");
          $total1=@mysql_affected_rows();

          
          $row=mysql_fetch_array($content1);
          $noo=$row['max'];



          $hell=$noo+1;


          $hell2 ="mtrl". $hell;


          $cname=$_POST['cname'];
          $scname=$_POST['scname'];
          $desc=$_POST['desc'];
          $brand=$_POST['brand'];
          $color=$_POST['color'];
          $pack=$_POST['pack'];
          $unitname=$_POST['unitname'];
          $abbrev=$_POST['abbrev'];
          $pricing=$_POST['txtprice'];
          $status="Active";



          $find1111=mysql_query("select * from materials where category='".$cname."'");
          $total11=@mysql_affected_rows();
          $row1111=mysql_fetch_array($find1111);
          $cname2=$row1111['category'];


          $find11111=mysql_query("select * from materials where scategory_name='".$scname."'");
          $total11111=@mysql_affected_rows();
          $row11111=mysql_fetch_array($find11111);
          $scname2=$row11111['scategory_name'];


          $find11=mysql_query("select * from materials where description='".$desc."'");
          $total11=@mysql_affected_rows();
          $row11=mysql_fetch_array($find11);
          $desc2=$row11['description'];



//Update query1
          if(isset($_POST['btnSave']))
          {
            $material_no11 = $_POST['material_no1'];           
            $cname11=$_POST['cname1'];
            $scname11=$_POST['scname1'];
            $desc11=$_POST['desc1'];
            $brand11=$_POST['brand1'];
            $color11=$_POST['color1'];
            $pack11=$_POST['pack1'];
            $unitname11=$_POST['unitname1'];
            $abbrev11=$_POST['abbrev1'];
            $price11=$_POST['price1'];


            
            mysql_query("UPDATE materials SET category='".$cname11."',scategory_name='".$scname11."',description='".$desc11."',brand_name='".$brand11."', color='".$color11."', package='".$pack11."', unit_measurement='".$unitname11."', abbre='".$abbrev11."' , price='".$price11."'  WHERE material_no='".$material_no11."'");
        echo '<script type="text/javascript">';
        echo 'setTimeout(function () { swal("Success!","Update Successful!","success");';
        echo '},);</script>';
            
            
          }


          ?>
          <div id="myModal" class="fade modal" >
            <form name="formCust" method="post" action=""> <!-- FORM element -->
              <div class="modal-dialog">
                <div class="modal-content" >
                  <div class="modal-header">
                    <button type="butt on" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"> <i class="ion-android-person"></i> Materials Form </h4>
                  </div>          
                  <div class="modal-body" >
                    <!-- ------------------------------------------------------------------------------------------- -->



                    <div class="row" style="margin-bottom:5px"> <!-- ROW 1 -->

                      <div class="col-xs-4" id="empnameErDv"> 
                        <label><font color="darkred">*</font>Category</label> 
                        <select name="cname" id="cname" class="form-control" onChange="getState(this.value);" class="form-control" required></p>
                          <option value="">---Select Category---</option>
                          <?php
                          foreach($results as $country) {
                            ?>
                            <option value="<?php echo $country["category_name"]; ?>"><?php echo $country["category_name"]; ?></option>
                            <?php
                          }
                        echo'</select>';?>
                      </div>     

                      <div class="col-xs-4" id="empnameErDv"> 
                        <label><font color="darkred">*</font>Measurement</label> <!-- Prod_Name -->
                        <input type="number" class="form-control" name="unitname" id="unitname" required>
                      </div>     

                      <div class="col-xs-4" id="empnameErDv"> 
                        <label><font color="darkred">*</font>Unit</label> 
                        <select id="abbrev" name="abbrev" class="form-control" style="" required></p>
                          <?php
                          $content1=mysql_query("SELECT * from unitmeasurement where status='Active'");
                          $total1=@mysql_affected_rows();
                          echo'<option value="" style="text-align: center;">------Select Unit-------</option>';
                          for($x=1;$x<=$total1;$x++)
                          {

                            $row=mysql_fetch_array($content1);

                            $unit_name=$row['unit_measurment'];
                            $abbre=$row['Abbreviation'];



                            echo'<option value="'.$abbre.'">'.$abbre.'</option>';

                          }
                        echo'</select>';?>
                      </div>  
                    </div>
                    <div class="row" style="margin-bottom:5px"> <!-- ROW 2-->


                      <div class="col-sm-5" id="empnameErDv" > 
                        <label><font color="darkred">*</font>Subcategory</label> 
                        <select name="scname" id="scname" class="form-control" style="text-align: center;" required></p>
                          <option value="" >-----Select Subcategory------</option>
                        </select>
                      </div>      

                      <div class="col-xs-6" id="phoneErDv"> 
                        <label><font color="darkred">*</font>Description</label> <!-- Prod_Name -->
                        <input type="text" class="form-control" id="desc" name="desc" required>
                      </div>    




                    </div> <!-- /.row -->   
                    <!-- ------------------------------------------------------------------------------------------- -->

                    <div class="row" style="margin-bottom:5px"> <!-- ROW 2-->

                      <div class="col-xs-4" id="emailErDv"> 
                        <label>Brand</label> <!-- Prod_Name -->
                        <input type="text" class="form-control" id=brand name="brand" required>
                      </div>   

                      <div class="col-xs-4" id="addErDv"> 
                        <label>Color</label> <!-- Prod_Name -->
                        <input type="text" class="form-control" id="color" name="color">
                      </div>    

                      <div class="col-xs-4" id="addErDv"> 
                        <label>Package</label> <!-- Prod_Name -->
                        <input type="text" class="form-control" id="pack" name="pack">
                      </div> 

                    </div>

                    <div class="row" style="margin-bottom:5px"> <!-- ROW 2-->        

                      <div class="col-xs-4" id="emailErDv"> 
                        <label><font color="darkred">*</font>Price</label> <!-- Prod_Name -->
                        <div class="input-group" >
                         <span class="input-group-addon">₱</span>
                         <input type="number" class="form-control"  id="idprice" name="txtprice">
                       </div>  
                     </div>              

                   </div> <!-- /.row -->   
                   <!-- ------------------------------------------------------------------------------------------- <-->
                 </form>

               </div>
               <div class="modal-footer">
                <button type="submit" id="btnAdd" name="btnAdd" class="btn bg-blue btn-lg btn-block" data-dismiss="modal fade" onclick="return myFunction();"><i class="fa fa-send"></i> SAVE</button>  

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
                <h4 class="modal-title"> <i class="ion-android-person"></i> Edit Materials Form </h4>
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
        $material_no1 = $modal.find('#material_no1');
        $material_no1.val(getid);     
        $material_no1 = $modal.find('#material_no1');
        $material_no1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[0].innerHTML);

        $desc1 = $modal.find('#desc1');
        $desc1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[3].innerHTML);
        $brand1 = $modal.find('#brand1');
        $brand1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[4].innerHTML); 
        $color1 = $modal.find('#color1');
        $color1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[5].innerHTML);
        $pack1 = $modal.find('#pack1');
        $pack1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[6].innerHTML);
        $unitname1 = $modal.find('#unitname1');
        $unitname1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[7].innerHTML);
        $abbrev1 = $modal.find('#abbrev1');
        $abbrev1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[8].innerHTML);
        $price1 = $modal.find('#price1');
        $price1.val(document.getElementById("jsontable").rows[($(o).parent().parent().index())+1].cells[9].innerHTML);

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
        <script type="text/javascript">
      $('#desc,#brand,#color,#pack,#desc1,#brand1,#color1,#pack1').keyup(function() {
  this.value = this.value.toUpperCase();
});
    </script>