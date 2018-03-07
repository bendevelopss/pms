  <?php



                $content2=mysql_query("SELECT * from customer where username='".$_SESSION['user2']."' and password='".$_SESSION['pass2']."' ");


                if(isset($_SESSION['pos']) && ($_SESSION['pos']=='admin' && 'Admin'))
                 {
                   $content3=mysql_query("select * from employee where position='".$_SESSION['pos']."' ");
                   $row3=mysql_fetch_array($content3);
                   $firstname3=$row3['firstname'];
                   $middlename3=$row3['middlename'];
                   $lastname3=$row3['lastname'];
                ?>
                <p>
                  <?php echo ''.ucfirst($firstname3).' '.strtoupper($middlename3[0]).'. '.ucfirst($lastname3).''; ?>
                  <br>
                  <label style="text-decoration: underline;">ADMINISTRATOR</label>
                  <small style="margin-top: -5px;">POSITION</small>
                </p>
              <?php
              }
              if(isset($_SESSION['pos']) && $_SESSION['pos']=='Quantity Surveyor' || $_SESSION['pos']=='QUANTITY SURVEYOR' )
              {
                 $content3=mysql_query("select * from employee where position='".$_SESSION['pos']."' ");
                 $row3=mysql_fetch_array($content3);
                 $firstname3=$row3['firstname'];
                 $middlename3=$row3['middlename'];
                 $lastname3=$row3['lastname'];
                ?>
                  <p>
                  <?php echo ''.ucfirst($firstname3).' '.strtoupper($middlename3[0]).'. '.ucfirst($lastname3).''; ?>
                  <br>
                  <label style="text-decoration: underline;">QUANTITY SURVEYOR</label><BR>
                  <small style="margin-top: -5px;">POSITION</small>
                </p>
              <?php
              }

              if(isset($_SESSION['pos']) && $_SESSION['pos']=='Secretary' || $_SESSION['pos']=='SECRETARY')
              {
                 $content3=mysql_query("select * from employee where position='".$_SESSION['pos']."' ");
                 $row3=mysql_fetch_array($content3);
                 $firstname3=$row3['firstname'];
                 $middlename3=$row3['middlename'];
                 $lastname3=$row3['lastname'];
                ?>
                 <p>
                  <?php echo ''.ucfirst($firstname3).' '.strtoupper($middlename3[0]).'. '.ucfirst($lastname3).''; ?>
                  <br>
                  <label style="text-decoration: underline;">SECRETARY</label><BR>
                  <small style="margin-top: -5px;">POSITION</small>
                </p>
              <?php
              }
              if(isset($_SESSION['pos']) && $_SESSION['pos']=='Foreman' || $_SESSION['pos']=='FOREMAN')
              {
                 $content3=mysql_query("select * from employee where position='".$_SESSION['pos']."' ");
                 $row3=mysql_fetch_array($content3);
                 $firstname3=$row3['firstname'];
                 $middlename3=$row3['middlename'];
                 $lastname3=$row3['lastname'];
                ?>
                 <p>
                  <?php echo ''.ucfirst($firstname3).' '.strtoupper($middlename3[0]).'. '.ucfirst($lastname3).''; ?>
                  <br>
                  <label style="text-decoration: underline;">FOREMAN</label><BR>
                  <small style="margin-top: -5px;">POSITION</small>
                </p>
              <?php
              }
              if(isset($_SESSION['pos']) && $_SESSION['pos']=='Stockman' || $_SESSION['pos']=='STOCKMAN')
              {
                 $content3=mysql_query("select * from employee where position='".$_SESSION['pos']."' ");
                 $row3=mysql_fetch_array($content3);
                 $firstname3=$row3['firstname'];
                 $middlename3=$row3['middlename'];
                 $lastname3=$row3['lastname'];
                ?>
                 <p>
                  <?php echo ''.ucfirst($firstname3).' '.strtoupper($middlename3[0]).'. '.ucfirst($lastname3).''; ?>
                  <br>
                  <label style="text-decoration: underline;">STOCKMAN</label><BR>
                 <small style="margin-top: -5px;">POSITION</small>
                </p>
              <?php
              }
              if(isset($_SESSION['pos']) && $_SESSION['pos']=='Accountant' || $_SESSION['pos']=='ACCOUNTANT')
             {
               $content3=mysql_query("select * from employee where position='".$_SESSION['pos']."' ");
               $row3=mysql_fetch_array($content3);
               $firstname3=$row3['firstname'];
               $middlename3=$row3['middlename'];
               $lastname3=$row3['lastname'];
                ?>
                 <p>
                  <?php echo ''.ucfirst($firstname3).' '.strtoupper($middlename3[0]).'. '.ucfirst($lastname3).''; ?>
                  <br>
                  <label style="text-decoration: underline;">ACCOUNTANT</label><BR>
                  <small style="margin-top: -5px;">POSITION</small>
                </p>
              <?php
              }
              if(isset($_SESSION['pos']) && $_SESSION['pos']=='customer' || $_SESSION['pos']=='CUSTOMER')
             {
                 $content3=mysql_query("select * from customer ");
                 $row3=mysql_fetch_array($content3);
                 $firstname3=$row3['firstname'];
                 $middlename3=$row3['middlename'];
                 $lastname3=$row3['lastname'];
                ?>
                 <p>
                  <?php echo ''.ucfirst($firstname3).' '.strtoupper($middlename3[0]).'. '.ucfirst($lastname3).''; ?>
                  <br>
                  <label style="text-decoration: underline;">CUSTOMER</label><BR>
                  <small style="margin-top: -5px;">POSITION</small>
                </p>
              <?php
              }
              if(isset($_SESSION['pos']) && $_SESSION['pos']=='Project Manager' || $_SESSION['pos']=='PROJECT MANAGER')
             {
                $content3=mysql_query("select * from employee where position='".$_SESSION['pos']."' ");
                $row3=mysql_fetch_array($content3);
                $firstname3=$row3['firstname'];
                $middlename3=$row3['middlename'];
                $lastname3=$row3['lastname'];
                ?>
                 <p>
                  <?php echo ''.ucfirst($firstname3).' '.strtoupper($middlename3[0]).'. '.ucfirst($lastname3).''; ?>
                  <br>
                  <label style="text-decoration: underline;">PROJECT MANAGER</label><BR>
                  <small style="margin-top: -5px;">POSITION</small>
                </p>
              <?php
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