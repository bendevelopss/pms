<?php 

include('../include/connect.php');  
include('../include/log.php');
$year = date('Y');
$year = substr($year,2,3);
$trail_id =uniqid('at'.$year);  

$sql = "INSERT INTO trails VALUES(?,?,?,?,?,?,?)";
$q = $conn -> prepare($sql);    
$q -> execute(array($trail_id,'Session','Log', 'Signed-OUT', '', date('Y/m/d H:i:s'),  $_SESSION["ocsc_uname"]  ));
$conn = null; // CLOSE DATABASE CONNECTION



    if(!isset($_SESSION)) 
    { session_start(); } 



// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 
?>


<script type="text/javascript">   
function Redirect() 
{  
window.location="login.php"; 
} 
setTimeout('Redirect()', 0);   
</script>
    
