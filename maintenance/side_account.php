  <?php
                if(isset($_SESSION['pos']) && ($_SESSION['pos']=='admin' && 'Admin' && 'ADMIN') )
                {
                  
                  include("side.php"); 
                ?>
                <?php
              } 
              else if(isset($_SESSION['pos']) && ($_SESSION['pos']=='Quantity Surveyor' || 'QUANTITY SURVEYOR'))
              {

               
               include("account/account_surveyor.php");

              }

              else if(isset($_SESSION['pos']) && ($_SESSION['pos']=='Secretary' || 'SECRETARY'))
              {

                 include("account/account_secretary.php");
              }
              else if(isset($_SESSION['pos']) && ($_SESSION['pos']=='Foreman' || 'FOREMAN'))
              {

                include("account/account_foreman.php");

              }
              else if(isset($_SESSION['pos']) && ($_SESSION['pos']=='Stockman' || 'STOCKMAN'))
              {

               include("account/account_stockman.php");
              }
              else if(isset($_SESSION['pos']) && ($_SESSION['pos']=='Accountant' || 'ACCOUNTANT'))
              {
                include("account/account_accountant.php");
              }
              else if(isset($_SESSION['pos']) && ($_SESSION['pos']=='customer' || 'Customer' || 'CUSTOMER'))
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