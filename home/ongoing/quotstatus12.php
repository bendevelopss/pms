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
  <title>Home</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
 
   <?php include("../../maintenance/plugins.php"); ?>
  <div class="se-pre-con"></div>
    <link href="bar.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="w3.css">
    

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
                <?php include("../../maintenance/side.php") ?>


                    <!-- Right side column. Contains the navbar and content of the page -->
                    <div class="content-wrapper">
                      <!-- Content Header (Page header) -->
                      <section class="content-header">
                        <h1>
                          Ongoing
                          <small>Project</small>
                        </h1>                              
                      </section>

                      
                      <!-- Main content -->
                      <section class="content">
                        <!--Table function-->


                        <!-- Small boxes (Stat box) -->
                        <div class="row" >                                 
                          <div class="col-lg-12 col-lg-12">             <!-- NEW RECORD -->
                                <!-- <a href="addTax.php"><button class="btn btn-success btn-lg" style="margin-bottom:5px;
                                  box-shadow: 0px 4px 8px #888888"> 
                                  + ADD NEW RECORD</button> </a> -->
                            
                                  
                                    <div class="row">                     <!-- TABLES -->
                                      <div class="col-lg-12 col-sm-12 col-xs-12">
                                        <div class="box box-solid">
                                          <div class="box-header">
                                            <h3 class="box-title">Browse Project Progress</h3>
                                            <div class="myData"></div>

                                          </div><!-- /.box-header -->
                                          <div class="box-body">

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

                $contents=mysql_query("select * from quotation where quote_no='".$_GET['id']."'");
                    $totals=@mysql_affected_rows();
                    $rows=mysql_fetch_array($contents);

                echo'
                <div class="container" style="width:100%; margin-left: 10px;">
                  
                    <label style="margin-left:">Project: '.$_GET['project'].'</label>
                    <br>
                    <label>Start Date: '.$rows['date'].'</label>
                    <br> 
                    <label>Due Date: '.$rows['due_date'].'</label>
                    ';


                function getNumberOFDays($from,$to){
                    $from_date = new DateTime($from);
                    $to_date = new DateTime($to);
                    return $from_date->diff($to_date)->days;
                  
                }
                function getNumberOFDays1($from,$to){
                    $from_date = new DateTime($from);
                    $to_date = new DateTime($to);
                    return $from_date->diff($to_date)->days;
                  
                }

                $ngayon1 = getNumberOFDays($a,$rows['date']);

                $totaldate=getNumberOFDays1($rows['date'], $rows['due_date']);

                $d1 = strtotime($rows['date']);
                $d2 = strtotime($rows['due_date']);

                if(isset($_POST['re_date']))
                {
                  $due_dates = $_POST['dates'];
                                  $dd=date_create($due_dates);
                                $datepic=date_format($dd,"Y-m-d");
                                    mysql_query("UPDATE quotation SET due_date='".$datepic."' WHERE quote_no='".$_GET['id']."'");
                                    echo "<script type='text/javascript'>alert('Update Successful!')</script>";
                                    echo "<meta http-equiv='refresh' content='0'>";
                
                }


                ?>
<input type="hidden" value="<?= $ngayon1 ?>" id="ngayon" name="ngayon"/>
<input type="hidden" value="<?= $totaldate ?>" id="totaldate" name="totaldate"/>
<input type="hidden" value="<?php echo $d1 ?>" id="d1" name="d1"/>
<input type="hidden" value="<?php echo $d2 ?>" id="d2" name="d2"/>
                              
                              
                             <div class="w3-container">
  <div class="progress green">
  <h3 class="progress-title">Project (based on date)</h3>
  <div class="progress-bar">
      <div id="myBar1" class="progress-value" style="width:0%">
      <div id="demo1" class="w3-center w3-text-black">0%</div>
      </div>
  </div>
</div>



                             

 <div style="text-align: center; float: center">
  <input type="date" name="dates" id="dates" style="text-align: center" value="<?php echo $a?>">
  <button class="btn btn-default" type="submit" name="re_date" id="re_date">Extend Date
  </div>

</div>



<div class="w3-container">

    <div class="progress blue">
                <h3 class="progress-title">Project's Progress</h3>
                <div class="progress-bar">
                    <div id="myBar" class="progress-value" style="width: 0%;"><div id="demo" class="w3-center w3-text-black">0%</div></div>
                </div>
            </div>
  <br>
  <br>
</div>


<?php

echo '<table class="table table-condensed table-striped table-hover" id="tableko" name="tableko" style="font-size: 10pt;" >
<thead>
  <tr class="">
    <th>No.</th>
    <th>Brand</th>
    <th>Category</th>
    <th>Sub-category</th>
    <th>Description</th>
    <th>Color</th>
    <th>Package</th>
    <th>Measurement</th>
    <th style="text-align:center">Qty
      (Ordered)</th>
      <th style="text-align:center">Qty remaining</th>
      <th>Price</th>
    </tr>
  </thead>
  <tbody>
    ';
    $a=0;
    $sql = "SELECT *  FROM quotation_cart where quote_no='".$_GET['id']."' and status='active' group by material_no";
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
      echo'<td>'.ucfirst($row['quantity']).'</td>';
      echo'<td>'.ucfirst($row['quantity_remaining']).'</td>';
      echo'<td>&#8369;'.ucfirst($row['price']).'</td>';

    }
    echo'</tr>';
    echo' 
  </tbody>
</table>
<br></br>';
$conn->close();
?> 

<script type="text/javascript">
  $(document).ready(function(){
    $('#tableko').DataTable({
      "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]

    });
  });
</script>
</div>
<!--DataTable-->
<?php

$content5=mysql_query("select *, sum(quantity) as max, sum(quantity_remaining) as total from quotation_cart where quote_no='".$_GET['id']."'");
$total5=@mysql_affected_rows();
$row5=mysql_fetch_array($content5);
echo'<input type="hidden" value="'.$row5['max'].'" id="qua" name="qua"/>';
echo'<input type="hidden" value="'.$row5['total'].'" id="qua1" name="qua1"/>';
?>

Total Amount: <?php echo'&#8369;'.number_format((double)$rows['total_amount'],2,'.','').''; ?>
<br>
Balance: <?php echo'&#8369;'.number_format((double)$rows['balance'],2,'.','').''; ?>
<br></br>



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
      <div class="modal-content">
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



  <script type="text/javascript" src="func.js"></script>
  <script src="func2.js"></script>
  
</body>
  </html>
