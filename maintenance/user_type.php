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
                  <label>Admin</label>
                </p>
              <?php
              }
              if(isset($_SESSION['pos']) && $_SESSION['pos']=='Quantity Surveyor')
              {
 $content3=mysql_query("select * from employee where position='".$_SESSION['pos']."' ");
 //$content3=mysql_query("select * from employee where username='".$_SESSION['user']."' and password='".$_SESSION['pass']."' ");
 $row3=mysql_fetch_array($content3);
 $firstname3=$row3['firstname'];
 $middlename3=$row3['middlename'];
 $lastname3=$row3['lastname'];
                ?>
                 <p>
                  <?php echo ''.ucfirst($firstname3).' '.strtoupper($middlename3[0]).'. '.ucfirst($lastname3).''; ?>
                  <br>
                  <label>Quantity Surveyor</label>
                </p>
              <?php
              }

              if(isset($_SESSION['pos']) && $_SESSION['pos']=='Secretary')
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
                  <label>Secretary</label>
                </p>
              <?php
              }
              if(isset($_SESSION['pos']) && $_SESSION['pos']=='Foreman')
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
                  <label>Foreman</label>
                </p>
              <?php
              }
              if(isset($_SESSION['pos']) && $_SESSION['pos']=='Stockman')
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
                  <label>Stockman</label>
                </p>
              <?php
              }
              if(isset($_SESSION['pos']) && $_SESSION['pos']=='Accountant')
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
                  <label>Accountant</label>
                </p>
              <?php
              }
              if(isset($_SESSION['pos']) && $_SESSION['pos']=='customer')
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
                  <label>Customer</label>
                </p>
              <?php
              }
              if(isset($_SESSION['pos']) && $_SESSION['pos']=='Project Manager')
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
                  <label>Project Manager</label>
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