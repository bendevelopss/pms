  <?php
                if(isset($_SESSION['pos']) && ($_SESSION['pos']=='admin' && 'Admin') )
                {
                  
                  include("side.php"); 
                ?>
                <?php
              } 
              else if(isset($_SESSION['pos']) && ($_SESSION['pos']=='Quantity Surveyor'))
              {

               
               include("account/account_surveyor.php");

              }

              else if(isset($_SESSION['pos']) && ($_SESSION['pos']=='Secretary'))
              {

                 include("account/account_secretary.php");
              }
              else if(isset($_SESSION['pos']) && ($_SESSION['pos']=='Foreman'))
              {

                include("account/account_foreman.php");

              }
              else if(isset($_SESSION['pos']) && ($_SESSION['pos']=='Stockman'))
              {

               include("account/account_stockman.php");
              }
              else if(isset($_SESSION['pos']) && ($_SESSION['pos']=='Accountant'))
              {
                include("account/account_accountant.php");
              }
              else if(isset($_SESSION['pos']) && ($_SESSION['pos']=='customer' || 'Customer'))
              {
                include("../../cust_form/aside.php");
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