                                    <div class="row" style="margin-bottom:5px"> <!-- ROW 2-->
                                    
                                    <div class="col-xs-4" id="addErDv"> 
                                      <label>Employee ID</label> <!-- Prod_Name -->
                                     <input type="text" class="form-control" name="emp_no1" id="emp_no1" readonly>
                                    </div>           

                                                
  
                                  </div> <!-- /.row -->   

                                  <div class="row" style="margin-bottom:5px"> <!-- ROW 1 -->
                                    
                                    <div class="col-xs-4" id="empnameErDv"> 
                                      <label><font color="darkred">*</font>First Name</label> <!-- Prod_Name -->
                                      <input type="text" class="form-control" name="firstname1" id="firstname1" required>
                                    </div>  

                                     <div class="col-xs-4" id="empnameErDv"> 
                                      <label>Middle Name</label> <!-- Prod_Name -->
                                      <input type="text" class="form-control" name="middlename1" id="middlename1">
                                    </div>     

                                     <div class="col-xs-4" id="empnameErDv"> 
                                      <label><font color="darkred">*</font>Last Name</label> <!-- Prod_Name -->
                                      <input type="text" class="form-control" name="lastname1" id="lastname1" required>
                                    </div>  

                                     <div class="col-xs-4" id="empnameErDv"> 
                                      <label><font color="darkred">*</font>Position</label> 
                                      <select name="pname1" id="pname1" class="form-control" required></p>
                                     
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
                                      <label><font color="darkred">*</font>Contact Number</label>
                                      <input type="number" class="form-control" name="contact1" id="contact1">
                                    </div>    

                                   <div class="col-xs-4" id="emailErDv"> 
                                      <label>Email</label> <!-- Prod_Name -->
                                      <input type="email" class="form-control" name="email1" id="email1" required>
                                    </div>   

                                      
                                  </div> <!-- /.row -->   

                                  <div class="row" style="margin-bottom:5px"> <!-- ROW 2-->
                                    
                                    <div class="col-xs-6" id="addErDv"> 
                                      <label><font color="darkred">*</font>Street</label> <!-- Prod_Name -->
                                     <input type="text" class="form-control" name="street1" id="street1" required>
                                    </div>           

                                    <div class="col-xs-4" id="emailErDv"> 
                                      <label>City</label> <!-- Prod_Name -->
                                      <input type="text" class="form-control" name="city1" id="city1" required>
                                    </div>                
  
                                  </div> <!-- /.row -->   

                                   <div class="row" style="margin-bottom:5px"> <!-- ROW 2-->
                                    
                                    <div class="col-xs-4" id="addErDv"> 
                                      <label><font color="darkred">*</font>Username</label> <!-- Prod_Name -->
                                     <input type="text" class="form-control" name="username1" id="username1" required>
                                    </div>           

                                    <div class="col-xs-4" id="emailErDv"> 
                                      <label><font color="darkred">*</font>Password</label> <!-- Prod_Name -->
                                      <input type="password" class="form-control" name="password1" id="password1" required> 
                                    </div>                
  
                                  </div> <!-- /.row -->   
