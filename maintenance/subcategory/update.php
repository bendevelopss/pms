                                    <div class="row" style="margin-bottom:5px"> <!-- ROW 2-->
                                    
                                    <div class="col-xs-4" id="addErDv"> 
                                      <label>Subcategory ID</label> <!-- Prod_Name -->
                                     <input type="text" class="form-control" name="sc_no1" id="sc_no1" readonly>
                                    </div>   


                                    <div class="col-xs-4" id="empnameErDv"> 
                                    	<label><font color="darkred">*</font>Category</label> 
                                    	<select name="c_name1" id="c_name1" class="form-control" required></p>
                                    		<?php
                                    		$content1=mysql_query("SELECT * from category where status='Active'");
                                    		$total1=@mysql_affected_rows();
                                    		for($x=1;$x<=$total1;$x++)
                                    		{

                                    			$row=mysql_fetch_array($content1);

                                    			$c_name1=$row['category_name'];

                                    			echo'<option value="'.$c_name1.'">'.$c_name1.'</option>';
                                    		}
                                    	echo'</select>';?>
                                    </div>              
                                    
                                     <div class="col-xs-4" id="empnameErDv"> 
                                      <label><font color="darkred">*</font>Subcategory Name</label> <!-- Prod_Name -->
                                      <input type="text" class="form-control" name="sc_name1" id="sc_name1" required>
                                                
                                                 
  
                                  </div> <!-- /.row -->   
<!-- ------------------------------------------------------------------------------------------- -->
 

                                 
                                   
<!-- ------------------------------------------------------------------------------------------- -->