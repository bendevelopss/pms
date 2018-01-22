<?php session_start();
  
    include('../include/connect.php'); // CONNECTION PDO MYSQL

      //FETCH VARIABLES
    $UserName =$_POST['txtUserName'];
    $Pass = $_POST['txtPass'];  
    $Pass = md5($Pass);
    $UserType;
    $match="false";
      // CHECK IF MATCH ACCOUNT
    $sql = "SELECT * FROM user_account WHERE user_status = 'active'";
    $q = $conn->prepare($sql);
    $q -> execute();
    $browse = $q -> fetchAll();
    foreach($browse as $row)
    {
      if(($UserName == $row['username']) && ($Pass== $row['password']))
      {
        $match="true";
        $UserType = $row['usertype'];
        break;
      }
    }
    if($match == "true")
    {
      $_SESSION["username"] = $UserName;
      $_SESSION["password"] = $Pass;
      $_SESSION["usertype"] = $UserType;
      ?>
<script type="text/javascript">   
function Redirect() 
{  
window.location="../../index.php"; 
} 
setTimeout('Redirect()', 0);   
</script>
    <?php      
    }
    else
    { ?>
<script type="text/javascript">   
function Redirect() 
{  
window.location="login.php"; 
} 
setTimeout('Redirect()', 0);   
alert("Invalid Username or Password");
</script>
    <?php } $conn = null; ?>
