<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title> Find </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue">

    <?php           // ESTABLISH CONNECTION TO MYSQL
    try{
      $conn = new PDO("mysql:host=localhost;dbname=ocsc","root");
    }
    catch(PDOException $x)
    {
      echo "Cannot Establish Connection to database".$x->getMessage();
    }
    ?>          

    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="index.html" class="logo"><b>Shipping </b>System</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
   
              <!-- User Account: style can be found in dropdown.less -->
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/Admin.png" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>Lucas, Moses</p>
              <small style="font-size:0.8em"> Operation Manager </small>
            </div>
          </div>
  
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MENU</li>
            <li class="treeview">
              <a href="index.html">
                <i class="fa fa-dashboard"></i> <span>Home</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Transaction</span>    
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Delivery Order Form</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i>Delivery Leg Form </a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Reports</span>    
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Delivery Schedule</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Delivery Receipt </a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Delivery Details </a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Sales Invoice </a></li> 
                <li><a href="#"><i class="fa fa-circle-o"></i> Official Receipt </a></li>  
                <li><a href="#"><i class="fa fa-circle-o"></i> Statement of Account </a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Daily Remmitance Report </a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Accounts Receivable </a></li>                                                                 
              </ul>
            </li>

            <li class="active treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Maintenance</span>            <!--  MAINTENANCE  -->
              </a>
              <ul class="treeview-menu">
                <li> <!-- CUSTOMER TREE -->
                  <a href="#"><i class="fa fa-circle-o"></i> Customer <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                    <li><a href="customer.php"><i class="fa fa-circle-o"></i> Individual</a></li>
                    <li>
                      <a href="#"><i class="fa fa-circle-o"></i> Company <i class="fa fa-angle-left pull-right"></i></a>
                    </li>
                  </ul>
                </li>   <!-- ./CUSTOMER TREE ENDS HERE -->                  <li><a href="#"><i class="fa fa-circle-o"></i> Customer Address </a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Address </a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Accounts </a></li> 
                <li><a href="#"><i class="fa fa-circle-o"></i> Employee </a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Trucks </a></li>  
                <li><a href="#"><i class="fa fa-circle-o"></i> Containers </a></li>                                                                 
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Utilities</span>    
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Wala pa</a></li>                                                               
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-files-o"></i>
                <span>Queries</span>    
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Wala din pa</a></li>
                                                                 
              </ul>
            </li>
          </ul>         <!-- MAIN SIDE BAR -->
        </section>
        <!-- /.sidebar -->      
      </aside>

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Deletion
            <small>Control panel</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">    
            <div class="col-lg-12 col-xs-12">             <!-- FIND RECORD -->
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <a href="#"><h3 style="color:white; text-align: center">Search</h3></a>
                  <input type="text" id="txtFind" name="txtFind" class="form-control" placeholder="Input ID / No." required />
                </div>
                <a href="#" class="small-box-footer">Search ID / No. <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-2 col-xs-0"></div>       <!-- RIGHT MARGIN -->                                                              
          </div>  <!-- /.row -->

          <div class="row">
            <div class="col-lg-2 col-sm-2 col-xs-0"></div>     <!-- LEFT MARGIN -->
            <div class="col-lg-8 col-md-8 col-xs-12">  
              <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title">Customer Form</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" action="process_addCustomer.php" onsubmit="return validate(gBack)"> <!-- FORM element -->
                  <div class="box-body">

                    <div class="form-group">
                      <label><font color="darkred">*</font>First Name</label>
                      <input type="text" class="form-control input-sm" id="txtFName" name="txtFName"placeholder="First Name">
                    </div>                        
                    <div class="form-group">
                      <label><font color="darkred">*</font>Last Name</label>
                      <input type="text" class="form-control input-sm" id="txtLName" name="txtLName"placeholder="Last Name">
                    </div>   
                    <div class="form-group">
                      <label><font color="darkred">*</font>Cellphone No.</label>
                      <input type="text" class="form-control input-sm" id="txtPhone" name="txtPhone" data-inputmask='"mask": "9999-999-9999"' data-mask>                                                        
                    </div>        
                    <div class="form-group">
                      <label>Telephone No.</label>
                      <input type="text" class="form-control input-sm" id="txtTel" name="txtTel" data-inputmask='"mask": "999-999"' data-mask>
                    </div>                           
                    <div class="form-group">
                      <label><font color="darkred">*</font>Email Address</label>
                      <input type="text" class="form-control input-sm" id="txtEmail" name="txtEmail"placeholder="Email Address">
                    </div>                         
                    <div class="form-group">
                      <label><font color="darkred">*</font>Address</label>
                      <input type="text" class="form-control input-sm" id="txtAddress" name="txtAddress"placeholder="Address">
                    </div>                        
                    <div class="form-group">
                      <label>Origin</label>
                      <input type="text" class="form-control input-sm" id="txtOrigin" name="txtOrigin"placeholder="Origin">
                    </div>                                                
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button class="btn btn-primary btn-block btn-lg"  name="wer">Delete</button>
                    <button  class="btn btn-danger btn-block btn-lg" onclick="gBack=true">Cancel</button>   
            

                  </div>
              </div><!-- /.box -->
            </div> <!-- ./ col -->
            <div class="col-lg-2 col-sm-2 col-xs-0"></div>     <!-- RIGHT MARGIN -->
          </div>   <!-- ./row -->

            </section><!-- right col -->
          </div><!-- /.row (main row) -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2014-2015 PUP San Juan BSIT 3-2.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- jQuery UI 1.11.2 -->
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>    
    <!-- Morris.js charts -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <!-- DATA TABLE SCRIPT--> 
    <script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(function () {
        $("#wer").dataTable();
      });
    </script>
  </body>
</html>