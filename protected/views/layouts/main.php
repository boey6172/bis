<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="language" content="en" />
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-datetimepicker.min.css" />
  

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/wizard.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/vendor/datatables.net-bs/css/dataTables.bootstrap.min.css"/>
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Select2 -->
    <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="css/main/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="css/main/skins/_all-skins.min.css">

    <link rel="stylesheet" href="vendor/notify/src/css/myalert.min.css">
    <link rel="stylesheet" href="vendor/notify/src/css/myalert-theme.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  
  <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    -->

</head>

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini fixed">

  <div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">BIS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Barangay Information System</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <!-- Notifications: style can be found in dropdown.less -->

          <!-- Tasks: style can be found in dropdown.less -->

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="./images/finallogo12.png" class="user-image" alt="User Image">
              <span class="hidden-xs">
                <?php echo Yii::app()->user->getFirst_Name(); ?>  
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="./images/finallogo12.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo Yii::app()->user->getFirst_Name() ; ?>
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <?php echo CHtml::link('<i class="fa fa-gears fa-fw"></i> Profile',array('user/index',),array('class'=>'btn btn-default btn-flat')); ?>
                </div>
                <div class="pull-right">
                  <?php echo CHtml::link('<i class="fa fa-sign-out fa-fw"></i> Sign out',array('site/logout',),array('class'=>'btn btn-default btn-flat')); ?>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="./images/finallogo.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>
            <?php echo Yii::app()->user->getFirst_Name() ; ?>
           </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

            <li class=" ">
                <a href="<?php echo Yii::app()->createUrl('home/index'); ?>">
                    <i class="fa fa-dashboard fa-fw"></i> <span>Home</span>

                </a>
            </li>  
            <li class=" ">
                <a href="<?php echo Yii::app()->createUrl('resident/index'); ?>">
                    <i class="fa fa-certificate fa-fw"></i> <span>Certificates/Documents</span>

                </a>
            </li>  
            <li class=" ">
                <a href="<?php echo Yii::app()->createUrl('resident/index'); ?>">
                    <i class="fa fa-user fa-fw"></i> <span>Resident</span>

                </a>
            </li>  

            <li class=" ">
                <a href="<?php echo Yii::app()->createUrl('home/index'); ?>">
                    <i class="fa fa-home fa-fw"></i> <span>HouseHold</span>

                </a>
            </li>  
            <li class=" ">
                <a href="<?php echo Yii::app()->createUrl('home/index'); ?>">
                    <i class="fa fa-bar-chart fa-fw"></i> <span>Reports</span>

                </a>
            </li>
            <li class=" ">
                <a href="<?php echo Yii::app()->createUrl('home/index'); ?>">
                    <i class="fa fa-gear fa-fw"></i> <span>Maintenance</span>

                </a>
            </li>   

          
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
    <!-- Main content -->
    <section class="content">
       <?php echo $content; ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <div id="alert" data-myalert data-myalert-max="5">
    </div>
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <!-- <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li> -->
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->

    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
    <!-- /#wrapper -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/Moment.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-datetimepicker.min.js"></script>

<!-- <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/val/jquery.js"></script> -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/val/jquery.validate.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/val/jquery.validate.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/additional-methods.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/parsley.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/vendor/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/datatables/dataTables.buttons.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/datatables/buttons.html5.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/datatables/pdfmake.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/datatables/vfs_fonts.js"></script>

<!-- jQuery 3 -->
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="js/main/adminlte.min.js"></script>
<!-- main layout -->
<script src="js/main/demo.js"></script>
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>

<script src="vendor/notify/src/js/myalert.min.js"></script>
</body>
</html>
 

<?php
$this->widget('ext.widgets.loading.LoadingWidget');
Yii::app()->clientScript->registerScript('loading', "
        $('a, button').click(function() {
            // event.stopPropagation();
            Loading.show();
            // return true;
            Loading.hide();
        });

    ");

?>
