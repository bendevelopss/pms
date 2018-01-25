<?php 
$projno = mysql_query("SELECT project FROM  quotation where status='active' ");
$projno = mysql_num_rows($projno);
?>
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">

      <li class="header">MAIN NAVIGATION</li>
      <li class="treeview"><a href="../../home/ongoing/dashboard.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span>           
      <span class="pull-right-container">
              <small class="label pull-right bg-green"><?php echo ''.($projno).''; ?></small>
                </span>
                </a></li>  
      <li class="treeview">
        <a href="#"><i class="fa fa-wrench"></i> <span>Maintenance</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">

          <li class="treeview">
            <a href="#"><i class="fa fa-circle-o"></i>Materials
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="../../maintenance/materials/index.php"><i class="fa fa-circle-o"></i>Add Materials</a></li>
              <li><a href="../../maintenance/category/index.php"><i class="fa fa-circle-o"></i>Add Category</a></li>
              <li><a href="../../maintenance/subcategory/index.php"><i class="fa fa-circle-o"></i>Add Subcategory</a></li>
              <li><a href="../../maintenance/unit/index.php"><i class="fa fa-circle-o"></i>Add Unit of Measurement</a></li>

            </ul>
          </li>

          <li><a href="../../maintenance/employee/index.php"><i class="fa fa-circle-o"></i>Employee</a></li>        

          <li><a href="../../maintenance/supplier/index.php"><i class="fa fa-circle-o"></i>Supplier</a></li>
          <li><a href="../../maintenance/position/index.php"><i class="fa fa-circle-o"></i>Position</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#"><i class="fa fa-truck"></i> <span>Transaction</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li class="active"><a href="../../transaction/quotation/index.php"><i class="fa fa-circle-o"></i>Quotation Form</a></li>
          <li><a href="../../transaction/purchase/index.php"><i class="fa fa-circle-o"></i>Purchase Order</a></li>
          <li><a href="../../transaction/delivery/index.php"><i class="fa fa-circle-o"></i>Delivery</a></li>
          <li><a href="../../transaction/requisition/index.php"><i class="fa fa-circle-o"></i>Material Requisition</a></li>
          <li><a href="../../transaction/pullout/index.php"><i class="fa fa-circle-o"></i>Pullout</a></li>
          <li><a href="../../transaction/billing/index.php"><i class="fa fa-circle-o"></i>Billing</a></li> 
          <li><a href="../../transaction/payment/index.php"><i class="fa fa-circle-o"></i>Payment</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#"><i class="fa fa-pencil-square-o"></i> <span>Utilities</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li class="active"><a href="../../utilities/trails/index.php"><i class="fa fa-circle-o"></i>Audit Trail</a></li>
         
          <li class="active"><a href="../../utilities/restoresupplier/index.php"><i class="fa fa-circle-o"></i>Restore Supplier</a></li>
          <li class="active"><a href="../../utilities/restoreposition/index.php"><i class="fa fa-circle-o"></i>Restore Position</a></li>


          <li class="active"><a href="../../utilities/restoreemployee/index.php"><i class="fa fa-circle-o"></i>Restore Employee</a></li>



          <li class="active"><a href="../../utilities/restorecategory/index.php"><i class="fa fa-circle-o"></i>Restore Category</a></li>


          <li class="active"><a href="../../utilities/restoresubcategory/index.php"><i class="fa fa-circle-o"></i>Restore Sub Category</a></li>



          <li class="active"><a href="../../utilities/restoreunitmsr/index.php"><i class="fa fa-circle-o"></i>Restore Unit of Measurement</a></li>

          <li class="active"><a href="../../utilities/restorematerial/index.php"><i class="fa fa-circle-o"></i>Restore Materials</a></li>

          <li class="active"><a> <i class="fa fa-circle-o"></i><button class="btn btn-danger" type="button" name="backup" id="backup" onclick="backs()" style="text-align: center;">Backup Database</button></a></li>
        </ul>
      </li>
      <li class="treeview"><a href="#"><i class="fa fa-book"></i> <span>Reports</span><i class="fa fa-angle-left pull-right"></i></a>
      <ul class="treeview-menu">
      <li class="treeview"><a href="../../utilities/inventory/index.php"><i class="fa fa-circle-o"></i> <span>Inventory Report</span></a></li>
          <li class="active"><a href="../../home/ongoing/index.php"><i class="fa fa-circle-o"></i>Project Report</a></li>          
      </ul>
      </li>
      
      <li class="treeview"><a href="../../utilities/accountsettings/index.php"><i class="fa fa-cog"></i> <span>Account Settings</span></a></li>
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
 <script>
    function backs() {
    window.open("../../dbrestore.php");
    }
    </script>