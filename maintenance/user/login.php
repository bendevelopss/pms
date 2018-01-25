
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title> Shipping | Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../../dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- ion -->
    <link href="../../plugins/ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css" />      
    <!-- font-awesone-->
    <link href="../../bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />  

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">

      <div class="login-logo" style="margin-top:90px;">
        <small><i class="fa fa-truck"></i></small> <small>Shipping System</small>
     </div><!-- /.login-logo -->

    <div id="loginBox" class="login-box" style="box-shadow: 0px 2px 7px #888888; margin-top:0px;" >
      <div class="login-box-body" style="height:230px;">
        <p class="login-box-msg">Log in your User Account </p>

          <div id="unameDiv" class="form-group has-feedback"> <!-- USER NAME -->
            <input id="uname" type="text" class="form-control input-lg" placeholder="User Name" required />
          </div>

          <div id="upassDiv" class="form-group has-feedback"> <!-- PASSWORD -->
            <input id="upass" type="password" class="form-control input-lg" placeholder="Password" required/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>        
          </div>




            <div class="col-xs-12" style="text-align:center;">
              <button  id="loginBtn" class="btn" data-toggle='tooltip' title="Log-In" data-placement='top'
              style="box-shadow: 0px 3px 10px #888888; background-color:#3C8DBC;margin-top: 5px; border-radius:100px; width:80px; height:80px; outline:none;
              text-align: center; font-size:38px; color:white "> <i class="ion-ios-arrow-forward"></i> </button>
            </div><!-- /.col -->

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

  </body>
    <script src="../../plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="../../plugins/jQueryUI/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    

  <script type="text/javascript">
    $(document).ready(function () {
      $('[data-toggle="tooltip"]').tooltip();
    }); 


//****************** FUNCTION of update FETCHING **************//
function loginprocess()
{
  var uname = $('#uname').val();
  var upass = $('#upass').val();

   $.ajax({
    type: 'POST',
    url: 'loginprocess.php',
    data: 'uname='+uname+ '&upass='+upass,
    dataType: 'json',
    success: function(s) {
      if(s == 'false'){
        clear();
        $("#loginBox").effect( "shake", {times:3}, 300 );        
      }
      else if(s == 'true'){
        setTimeout(' window.location="../../index.php"', 300);                
      }
    }
  });
}
//****************** end of FUNCTION of updateFetching **************//
    $('#loginBtn').click(function(){
        if(formValidation()=='false')
          loginprocess();
    })

    function formValidation() 
    {
    
      var err='false';

      if($('#uname').val()=='')
      {
        $('#unameDiv').addClass('has-error');
        err = 'true';
      }
      else
        $('#unameDiv').removeClass('has-error');

      if($('#upass').val()=='')
      {
        $('#upassDiv').addClass('has-error');
        err = 'true';
      }
      else
        $('#upassDiv').removeClass('has-error');


      if(err == 'true')
        return 'true';
      else if(err=='false')
        return 'false';
    }

    function clear()
    {
      //$('#uname').val('');
      $('#upass').val('');
      //$('#branch').val('- Select Branch -');
      $('#unameDiv').removeClass('has-error');
      $('#upassDiv').removeClass('has-error');
    }

  </script>
</html>
