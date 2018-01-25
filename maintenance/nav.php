  <?php
                $content2=mysql_query("SELECT * from customer where username='".$_SESSION['user2']."' and password='".$_SESSION['pass2']."' ");
                if(isset($_SESSION['pos']) && ($_SESSION['pos']=='admin' && 'Admin'))
                {
                  ?>
     <span class="hidden-sm" style="font-size: 11.5pt;">Welcome, <font style="font-weight: bolder;"><?php echo ''.ucfirst($position).''; ?></font> <i class="fa fa-user fa-lg"></i></span>

                
                <?php
              } 
              if(isset($_SESSION['pos']) && $_SESSION['pos']=='Quantity Surveyor')
              {

              echo '<span class="hidden-sm" style="font-size: 11.5pt;">Welcome, <font style="font-weight: bolder;">Quantity Surveyor</font> <i class="fa fa-user fa-lg"></i></span>';
              }

              if(isset($_SESSION['pos']) && $_SESSION['pos']=='Secretary')
              {

              echo '<span class="hidden-sm" style="font-size: 11.5pt;">Welcome, <font style="font-weight: bolder;">Secretary</font> <i class="fa fa-user fa-lg"></i></span>';
                
              }
              if(isset($_SESSION['pos']) && $_SESSION['pos']=='Foreman')
              {

              echo '<span class="hidden-sm" style="font-size: 11.5pt;">Welcome, <font style="font-weight: bolder;">Foreman</font> <i class="fa fa-user fa-lg"></i></span>';
               
              }
              if(isset($_SESSION['pos']) && $_SESSION['pos']=='Stockman')
              {

               echo '<span class="hidden-sm" style="font-size: 11.5pt;">Welcome, <font style="font-weight: bolder;">Stockman</font> <i class="fa fa-user fa-lg"></i></span>';
               
              }
              if(isset($_SESSION['pos']) && $_SESSION['pos']=='Accountant')
              {
              
               echo '<span class="hidden-sm" style="font-size: 11.5pt;">Welcome, <font style="font-weight: bolder;">Accountant</font> <i class="fa fa-user fa-lg"></i></span>';
              }
              if(isset($_SESSION['pos']) && $_SESSION['pos']=='customer')
              {
              
               
              }
              if(isset($_SESSION['pos']) && ($_SESSION['pos']!='Accountant') && ($_SESSION['pos']!='admin') && ($_SESSION['pos']!='Admin') && ($_SESSION['pos']!='Quantity Surveyor') && ($_SESSION['pos']!='Secretary') && ($_SESSION['pos']!='Foreman') && ($_SESSION['pos']!='Stockman') && ($_SESSION['pos']!='Accountant') && ($_SESSION['pos']!='customer'))
              {
              
               echo '<script type="text/javascript">window.location.href="../../index.php";
               alert("Invalid User!");
               </script>'; 
                
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