
<?php include("logQuery.php");?>
<?php
 ini_set('display_errors',1);
 error_reporting(E_ALL &~ E_NOTICE);

 if(!isset($_SESSION))
 { session_start(); }
 
if($_SESSION["user"]=="banned")
{?><script type="text/javascript">
window.location="fail.html";
</script>
<?php
}
//else
//{
  $count=$_SESSION["counting"];
//}
?>
 <style type="text/css">
    no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url(assets/img/Preloader_3.gif) center no-repeat #fff;
}
</style>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title> PERSAN | Log in</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Bootstrap 3.3.2 -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
  <!-- ion -->
  <link href="plugins/ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css" />      
  <!-- font-awesone-->
  <link href="bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />  
  <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />  
  <link href="assets/css/style.css" rel="stylesheet" type="text/css" /> 

    </head>

    <body class="login-page" style="background: #333333 url(assets/img2/3.jpg) no-repeat center bottom fixed;">
      
   <form action="" method="post" name="frm" id="frm" novalidate>
      <div style=" text-align: center; font-size:60pt; color:#FFFFFF; margin-top:3px;">
        <span><img style="HEIGHT:100px;" src="assets/img/logo.png" alt="Logo"></span>
      </div>
      <div class="login-logo" style="margin-top:80pt;" >
        <i class="ion-ios-pricetags-outline" style="color: #bac5a4;"></i> <small style="color: #bac5a4;">Project Monitoring System</small>
      </div><!-- /.login-logo -->

      <div id="loginBox" class="login-box" style="box-shadow: 0px 10px 30px #888888; " >
        <div class="login-box-body" style="height:270px; margin-top: -75pt; background: #252720">
          <p class="login-box-msg" style="color: white; font-size: 13pt">Sign in to Start your Session</p>



          <div id="unameDiv" class="form-group has-feedback"> <!-- USER NAME -->
            <input name="user" id="user" type="text" class="form-control input-lg" autofocus placeholder="User ID" />
            <span class="fa fa-user form-control-feedback"></span>  
          </div>
            
          <div id="upassDiv" class="form-group has-feedback"> <!-- PASSWORD -->
            <input type="password" name="pass"  id="pass" class="form-control input-lg" placeholder="Authentication Key" />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>    
            <input class="w3-input w3-light-grey w3-border w3-hover-white" type="text" name="pos" id="pos" style="display: none">    
          </div>

           <?php if($count>0)
          {
            echo '<center><div style="margin-top: -18px;"><font style="color: white;"> Number of Error: '.$count.'</font><br><font style="margin-top: -50pt; color: red;">WARNING! You wil be banned if you reach 3 consecutive errors</font></div></center>';
          }

          if($count>=3)
            
          {//startbanning ang try count
          $_SESSION["user"]="banned";
          ?><script type="text/javascript">
          window.location="fail.html";
          </script>
          <?php
          }//end banning and try count
          ?>
         <input type="hidden" style="margin-top: -10pt;" name='count' value="<?=$count?>">
             

          <div class="col-xs-12" style="text-align:center;">
            <button name="login" id="login" class="btn bg-red" data-toggle='tooltip' title="Start Session" onclick="return myFunction();" data-placement='top'
            style="box-shadow: 0px 3px 10px #888888; border-radius:100px; width:80px; height:80px; outline:none;
            text-align: center; font-size:38px; "><i class="ion-ios-arrow-forward"></i> </button>

            <button type="button" name="btnEdit" id="bntEdit" onclick="get_id(this)" class="btn bg-blue" title="Register Customer" data-placement='top' data-toggle="modal" data-target="#myModal"
            style="box-shadow: 0px 3px 10px #888888; border-radius:100px; width:80px; height:80px; outline:none;
            text-align: center; font-size:38px; "><i class="ion-android-person-add"></i> </button>

           
          </div><!-- /.col -->
          
      


        </div><!-- /.login-box-body -->
      </div><!-- /.login-box -->

      <div id="myModal" class="fade modal" >
         <!-- FORM element -->
          <div class="modal-dialog">
            <div class="modal-content" >
              
              <div class="modal-header">
                <button type="butt on" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"> <i class="ion-android-person"></i> Customer Form </h4>
              </div>          
              <div class="modal-body" >

               <?php include("custAdd.php"); ?>



             </div>
             <div class="modal-footer">
              <button type="submit" id="btnSave" name="btnSave" class="btn bg-blue btn-lg btn-block" onclick="return myFunctions();" data-dismiss"><i class="fa fa-send"></i> REGISTER</button>  
        
            </div>

          </div>
        </div>
      
    </div>
   
  </form>
</body>
<script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
<!-- jQuery UI 1.11.2 -->
<script src="plugins/jQueryUI/jquery-ui.min.js" type="text/javascript"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>   




  </html>
<script type="text/javascript">
    $(window).load(function() {
        // Animate loader off screen
        $(".se-pre-con").fadeOut(1200);;

    });
</script>