<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem E-Arsip Bidang Mutasi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/images/favicon.png') ?>">

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css') ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/bower_components/Ionicons/css/ionicons.min.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/dist/css/AdminLTE.min.css') ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/dist/css/skins/_all-skins.min.css') ?>">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/bower_components/morris.js/morris.css') ?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/bower_components/jvectormap/jquery-jvectormap.css') ?>">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css') ?>">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url() ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>EA</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Sistem</b> E-Arsip Surat</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- Notifications: style can be found in dropdown.less -->
          <!-- Tasks: style can be found in dropdown.less -->
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-user"></i>
              <span class="hidden-xs"><?php echo $nama_admin; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <span class="hidden-xs"><?php echo $nama_admin; ?> &nbsp;</span> <br />
                  <i class="fa fa-circle text-success"></i> Online</a>
                </div>
                <div class="pull-right">
                  <a href="c_sealogin/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li>
          <a href="<?php echo base_url('c_seadashboard'); ?>">
            <i class="fa fa-home"></i> <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

        <li>
          <a href="<?php base_url('c_seadispos') ?>">
            <i class="fa fa-users"></i> <span>Staf Pelaksana</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

        <li class="active">
          <a href="<?php echo base_url('c_seamasuk'); ?>">
            <i class="fa fa-arrow-circle-right"></i> <span>Surat Masuk</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url('c_seakeluar'); ?>">
            <i class="fa fa-arrow-circle-left"></i> <span>Surat Keluar</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

        <li>
          <a href="c_seascanned">
            <i class="fa fa-envelope"></i> <span>Scanned Document</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Master
        <small>Detail Surat Masuk</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-database"></i> Data Master</a></li>
        <li><a href="<?php echo base_url('c_seamasuk') ?>"> Surat Masuk</a></li>
        <li class="active"> Detail Surat Masuk</li>
      </ol>
      <div>
        <br />
      </div>
      <?php foreach ($tb_suratmasuk as $data) {
      ?>

      <!-- RIGHT -->
      <div class="row">
        <div class="col-xs-12">
        <div class="box box-default">
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <!-- /.form-group -->
              <div class="form-group">
                <label class="col-md-4">Nomor Arsip Bidang</label>
                <label class="col-md-1">:</label>
                <?php echo $data->id_suratmasuk; ?>
              </div>

              <div class="form-group">
                <label class="col-md-4">Status Surat</label>
                <label class="col-md-1">:</label>
                <?php if ($data->status == 'Proses') {
                ?>
                <button type="button" class="btn btn-xs btn-warning disabled">
                <?php echo $data->status; ?>
                </button>
                <?php
              } elseif ($data->status == 'Selesai') {
              ?>
              <button type="button" class="btn btn-xs btn-success disabled">
                <?php echo $data->status; ?>
                </button>
              <?php } 

              ?>
              </div>

              <!-- /.form-group -->
            </div>

            <div class="col-md-6">

              <div class="form-group">
                <label>Tanggal Surat Diterima</label>
                <label>:</label>
                <i class="fa fa-calendar">
                <?php echo date('d-m-Y', strtotime($data->tgl_surat_diterima));  ?>
                </i>
              </div>

              <!-- /.form-group -->
            </div>

          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
      </div>
      </div>


      <!-- LEFT -->
      <div class="row">
        <div class="col-xs-12">
        <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title"> <b>Detail Surat Masuk</b></h3>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <!-- /.form-group -->

              <div class="form-group">
                <label class="col-md-4">Nomor Agenda</label>
                <label class="col-md-1">:</label>
                <?php echo $data->nomor_agenda; ?>
              </div>

              <div class="form-group">
                <label class="col-md-4">Asal Surat</label>
                <label class="col-md-1">:</label>
                <?php echo $data->asal_suratmasuk; ?>
              </div>

              <div class="form-group">
                <label class="col-md-4">Nomor Surat</label>
                <label class="col-md-1">:</label>
                <?php echo $data->nomor_suratmasuk;  ?>
              </div>
              
              <div class="form-group">
                <label class="col-md-4">Tanggal Surat</label>
                <label class="col-md-1">:</label>
                <i class="fa fa-calendar">
                <?php echo date('d-m-Y', strtotime($data->tgl_suratmasuk));  ?>
                </i>
              </div>

              <div class="form-group">
                <label class="col-md-4">Perihal</label>
                <label class="col-md-1">:</label>
                <?php echo $data->perihal_suratmasuk;  ?>
              </div>

              <div class="form-group">
                <label class="col-md-4">Disposisi Kepala Badan</label>
                <label class="col-md-1">:</label>
                <?php echo $data->disposkaban;  ?>
                <b>| <?php echo date('d-m-Y', strtotime($data->tgl_disposkaban)); ?></b>
              </div>

              <div class="form-group">
                <label class="col-md-4">Disposisi Kabid</label>
                <label class="col-md-1">:</label>
                <?php echo $data->disposkabid;  ?>
                <b>| <?php echo date('d-m-Y', strtotime($data->tgl_disposkabid)); ?></b>
              </div>

              <div class="form-group">
                <label class="col-md-4"><?php echo $data->nama_disposisi; ?></label>
                <label class="col-md-1">:</label>
                <?php echo $data->disposkasubid;  ?>
                <b>| <?php echo date('d-m-Y', strtotime($data->tgl_disposkasubid)); ?></b>
              </div>

              <br />
              
              <div class="form-group">
                <label class="col-md-4">Pelaksana</label>
                <label class="col-md-1">:</label>
                <?php echo $data->nama_staff;  ?>
              </div>

              <!-- <div class="form-group">
                <label class="col-md-4">Isi Pelaksana</label>
                <label class="col-md-1">:</label>
                <?php echo $data->dispospelaksana;  ?>
              </div> -->

              <!-- /.form-group -->
            </div>

            <div class="col-md-6">
              


              <div class="form-group">
                <label class="col-md-4">File Download</label>
                <label class="col-md-1">:</label>
                <a href="<?php echo base_url('uploads/surat_masuk/'.$data->masuk_file.'') ?>" target="_blank">Nomor Surat <?php echo $data->nomor_suratmasuk; ?></a>
              </div>

              <div class="form-group">
                <label class="col-md-4">Created by</label>
                <label class="col-md-1">:</label>
                <?php if ($data->createdby == null) {
                  echo '--';
                } else {
                  echo $data->createdby;
                }  ?>
              </div>

              <div class="form-group">
                <label class="col-md-4">Updated by</label>
                <label class="col-md-1">:</label>
                <?php if ($data->updateby == null) {
                  echo '--';
                } else {
                  echo $data->updateby;
                }  ?>
              </div>

              <!-- /.form-group -->
            </div>

          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
      </div>
      </div>
      </div>

    </section>
  </div>
        <?php } ?>

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Lucki Darmawan</b> @BKPSDM
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
  </footer>


</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/adminlte/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/adminlte/bower_components/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>

<!-- Morris.js charts -->
<script src="<?php echo base_url('assets/adminlte/bower_components/raphael/raphael.min.js') ?>"></script>
<script src="<?php echo base_url('assets/adminlte/bower_components/morris.js/morris.min.js') ?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') ?>"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('assets/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js') ?>"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/adminlte/bower_components/moment/min/moment.min.js') ?>"></script>
<script src="<?php echo base_url('assets/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
<!-- datepicker -->
<script src="<?php echo base_url('assets/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url('assets/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/adminlte/bower_components/fastclick/lib/fastclick.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/adminlte/dist/js/adminlte.min.js') ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/adminlte/dist/js/pages/dashboard.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/adminlte/dist/js/demo.js') ?>"></script>

</body>
</html>
