<?php include("logQuery.php");?>
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


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->
    </head>
    <body class="login-page" style="background: #333333 url(img/bg.jpg) no-repeat center bottom fixed;"">
   <form action="" method="post" name="frm" id="frm">
      <div style=" text-align: center; font-size:60pt; color:#FFFFFF; margin-top:50px;">
        <span><img style="HEIGHT:125px;" src="assets/img/logo.png" alt="Logo"></span>
      </div>
      <div class="login-logo">
        <i class="ion-ios-pricetags-outline"></i> <small>Project Monitoring System</small>
      </div><!-- /.login-logo -->

      <div id="loginBox" class="login-box" style="box-shadow: 0px 2px 7px #888888; margin-top:0px;" >
        <div class="login-box-body" style="height:270px;">
          <p class="login-box-msg">Sign in to Start your Session </p>



          <div id="unameDiv" class="form-group has-feedback"> <!-- USER NAME -->
            <input name="user" id="user" type="text" class="form-control input-lg" autofocus placeholder="User Name"  />
            <span class="fa fa-user form-control-feedback"></span>  
          </div>

          <div id="upassDiv" class="form-group has-feedback"> <!-- PASSWORD -->
            <input type="password" name="pass"  id="pass" class="form-control input-lg" placeholder="Password" />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>    
            <input class="w3-input w3-light-grey w3-border w3-hover-white" type="text" name="pos" id="pos" style="display: none">    
          </div>
          




          <div class="col-xs-12" style="text-align:center;">
            <button name="login" id="login" onclick="return myFunction();" class="btn bg-red" data-toggle='tooltip' title="Start Session" data-placement='top'
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
              <button type="submit" id="btnSave" name="btnSave" class="btn bg-blue btn-lg btn-block" data-dismiss" onClick="return myFunctions();"><i class="fa fa-send"></i> REGISTER</button>  
        
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
<script src="plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>   



  </html>
