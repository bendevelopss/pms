
<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$query ="SELECT * FROM category";
$results = $db_handle->runQuery($query);
?>

<script>
  function getState1(val) {
    $.ajax({
      type: "POST",
      url: "get_State2.php",
      data:'country_id2='+val,
      success: function(data){
        $("#scname1").html(data);
      }
    });
  }
</script> 


<div class="row" style="margin-bottom:5px"> <!-- ROW 1 -->

 <div class="col-xs-3" id="empnameErDv"> 
  <label><font color="darkred">*</font>ID</label> 
  <input type="text" class="form-control" id="material_no1" name="material_no1" readonly>

</div>  

<div class="col-xs-4" id="empnameErDv"> 
  <label><font color="darkred">*</font>Category</label> 
  <select name="cname1" id="cname1" class="form-control" onChange="getState1(this.value);" class="form-control">
    <option value="">--Select Category--</option>
    <?php
    foreach($results as $country1) {
      ?>
      <option value="<?php echo $country1["category_name"]; ?>"><?php echo $country1["category_name"]; ?></option>
      <?php
    }
  echo'</select>';?>
</div>     

<div class="col-xs-3" id="empnameErDv"> 
  <label><font color="darkred">*</font>Measurement</label> <!-- Prod_Name -->
  <input type="text" class="form-control" id="unitname1" name="unitname1">
</div>     

<div class="col-xs-2" id="empnameErDv"> 
  <label><font color="darkred">*</font>Unit</label> 
  <select name="abbrev1" id="abbrev1" class="form-control" style="margin-left: -20px">
   <?php
   $content1=mysql_query("SELECT * from unitmeasurement where status='Active'");
   $total1=@mysql_affected_rows();
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


  <div class="col-sm-5" id="empnameErDv"> 
    <label><font color="darkred">*</font>Subcategory</label> 
    <select name="scname1" id="scname1" class="form-control" ></p>
      <option value="">Select Subcategory</option>
    </select>
  </div>      

  <div class="col-xs-6" id="phoneErDv"> 
    <label><font color="darkred">*</font>Description</label> <!-- Prod_Name -->
    <input type="text" class="form-control" id="desc1" name="desc1">
  </div>    




</div> <!-- /.row -->   
<!-- ------------------------------------------------------------------------------------------- -->

<div class="row" style="margin-bottom:5px"> <!-- ROW 2-->

  <div class="col-xs-4" id="emailErDv"> 
    <label><font color="darkred">*</font>Brand</label> <!-- Prod_Name -->
    <input type="text" class="form-control" id="brand1" name="brand1" >
  </div>   

  <div class="col-xs-4" id="addErDv"> 
    <label><font color="darkred">*</font>Color</label> <!-- Prod_Name -->
    <input type="text" class="form-control" id="color1" name="color1">
  </div> 

  <div class="col-xs-4" id="addErDv"> 
    <label><font color="darkred">*</font>Package</label> <!-- Prod_Name -->
    <input type="text" class="form-control" id="pack1" name="pack1">
  </div>           

  <div class="col-xs-4" id="emailErDv"> 
    <label><font color="darkred">*</font>Price</label> <!-- Prod_Name -->
    <div class="input-group" >
    <span class="input-group-addon">₱</span>
    <input type="text" class="form-control"  name="price1" id="price1">
  </div>  
  </div>              

</div> <!-- /.row -->   
    <!-- ------------------------------------------------------------------------------------------- <-->