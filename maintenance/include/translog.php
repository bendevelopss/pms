<?php 

  if(!isset($_SESSION)) 
  { session_start(); } 

  if( isset($_SESSION["ocsc_uname"]) || isset($_SESSION["ocsc_utype"]) )
  {
    $username = $_SESSION["ocsc_uname"];
    $usertype = $_SESSION["ocsc_utype"];
  }
  else { 

  if(isset($_SESSION)) 
  {
    // remove all session variables
    session_unset(); 

    // destroy the session 
    session_destroy(); 
  }
      ?>

    <script type="text/javascript">   
      window.location="../../maintenance/user/login.php";
    </script>
 <?php } ?>