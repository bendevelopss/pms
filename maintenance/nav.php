  <?php
                $content2=mysql_query("SELECT * from customer where username='".$_SESSION['user2']."' and password='".$_SESSION['pass2']."' ");
                if(isset($_SESSION['pos']) && ($_SESSION['pos']=='admin' && 'Admin'))
                {
                  ?>
     <span class="hidden-sm" style="font-size: 11.5pt;">Welcome, <font style="font-weight: bolder;">Admin</font> <i class="fa fa-user fa-lg"></i></span>

                
                <?php
              } 
              if(isset($_SESSION['pos']) && $_SESSION['pos']=='Quantity Surveyor')
              {

              echo '<span class="hidden-sm" style="font-size: 11.5pt;">Welcome, <font style="font-weight: bolder; color: white;">Quantity Surveyor</font> <i class="fa fa-user fa-lg"></i></span>';
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
              echo '<span class="hidden-sm" style="font-size: 11.5pt;">Welcome, <font style="font-weight: bolder;">Customer</font> <i class="fa fa-user fa-lg"></i></span>';
               
              }
              if(isset($_SESSION['pos']) && $_SESSION['pos']=='Project Manager')
              {
              echo '<span class="hidden-sm" style="font-size: 11.5pt;">Welcome, <font style="font-weight: bolder;">Project Manager</font> <i class="fa fa-user fa-lg"></i></span>';
               
              }
              if(isset($_SESSION['pos']) && ($_SESSION['pos']!='Accountant') && ($_SESSION['pos']!='admin') && ($_SESSION['pos']!='Admin') && ($_SESSION['pos']!='Quantity Surveyor') && ($_SESSION['pos']!='Secretary') && ($_SESSION['pos']!='Foreman') && ($_SESSION['pos']!='Stockman') && ($_SESSION['pos']!='Accountant') && ($_SESSION['pos']!='customer') && ($_SESSION['pos']!='Project Manager'))
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
              <script>
 function setTime() {
    var d = new Date(),
      el = document.getElementById("time");

      el.innerHTML = formatAMPM(d);

    setTimeout(setTime, 1000);
    }

    function formatAMPM(date) {
        var weekday = new Array(7);
        weekday[0]=  "Sunday";
        weekday[1] = "Monday";
        weekday[2] = "Tuesday";
        weekday[3] = "Wednesday";
        weekday[4] = "Thursday";
        weekday[5] = "Friday";
        weekday[6] = "Saturday";
      var hours = date.getHours(),
        minutes = date.getMinutes(),
        seconds = date.getSeconds(),
        months = date.getMonth(),
        days = date.getDate(),
        year = date.getFullYear(),
        n = weekday[date.getDay()];
        ampm = hours >= 12 ? 'pm' : 'am';
      hours = hours % 12;
      hours = hours ? hours : 12; // the hour '0' should be '12'
      minutes = minutes < 10 ? '0'+minutes : minutes;
      months=months+1;
    
      var strTime = n + '  ' + months + '/' + days + '/' + year + '\n  ' + hours + ':' + minutes + ':' + seconds + ' ' + ampm;
      return strTime;
    }

    setTime();
</script>