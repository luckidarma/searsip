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
          <a href="c_seadashboard">
            <i class="fa fa-home"></i> <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

        <li>
          <a href="c_seadispos">
            <i class="fa fa-users"></i> <span>Staf Pelaksana</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

        <li class="active">
          <a href="c_seamasuk">
            <i class="fa fa-arrow-circle-right"></i> <span>Surat Masuk</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>

        <li>
          <a href="c_seakeluar">
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
        <small>Surat Masuk</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-database"></i> Data Master</a></li>
        <li class="active">Surat Masuk</li>
      </ol>
      <div>
        <br />
      </div>
      <div class="row">
          <div class="col-xs-12">
            <div class="box box-default">
              <div class="box-body">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalDefault">
                  Tambah Surat Masuk
                </button>
              </div>
            </div>
          </div>
      </div>

      <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example" class="table table-bordered table-striped" width="100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>No Arsip</th>
                    <th>No Agenda</th>
                    <th>Tanggal Diterima</th>
                    <th>Asal Surat</th>
                    <th>No Surat</th>
                    <th>Status</th>
                    <th><center>Action</center></th>
                  </tr>
                </thead>
              </table>
            </div>
            <!-- /.box-body -->
      </div>
    </section>

    <?php 
      $random = rand(1000, 10000);
     ?>

    <div class="modal fade" id="modalDefault">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Surat Masuk</h4>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" id="formDefault">
              <div class="box-body">
                
                

                <div class="form-group">
                  <label for="noArsip" class="col-sm-3 control-label">No Arsip</label>
                  <div class="col-sm-8">
                    <input type="text" name="id_suratmasuk" class="form-control" id="noArsip">
                  </div>
                </div>

                <div class="form-group">
                  <label for="noArsip" class="col-sm-3 control-label">No Agenda</label>
                  <div class="col-sm-8">
                    <input type="text" name="nomor_agenda" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="noArsip" class="col-sm-3 control-label">Asal Surat</label>
                  <div class="col-sm-8">
                    <input type="text" name="asal_suratmasuk" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="noArsip" class="col-sm-3 control-label">No Surat</label>
                  <div class="col-sm-8">
                    <input type="text" name="nomor_suratmasuk" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="noArsip" class="col-sm-3 control-label">Tanggal Surat</label>
                  <div class="col-sm-8">
                    <input type="date" name="tgl_suratmasuk" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="noArsip" class="col-sm-3 control-label">Tanggal Diterima</label>
                  <div class="col-sm-8">
                    <input type="date" name="tgl_surat_diterima" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="noArsip" class="col-sm-3 control-label">Perihal</label>
                  <div class="col-sm-8">
                    <input type="text" name="perihal_suratmasuk" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="noArsip" class="col-sm-3 control-label">Disposisi Kaban</label>
                  <div class="col-sm-8">
                    <input type="text" name="disposkaban" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="noArsip" class="col-sm-3 control-label">Tanggal disposisi</label>
                  <div class="col-sm-8">
                    <input type="date" name="tgl_disposkaban" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="noArsip" class="col-sm-3 control-label">Disposisi Kabid</label>
                  <div class="col-sm-8">
                    <input type="text" name="disposkabid" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="noArsip" class="col-sm-3 control-label">Tanggal disposisi</label>
                  <div class="col-sm-8">
                    <input type="date" name="tgl_disposkabid" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="noArsip" class="col-sm-3 control-label">Disposisi Kasubid</label>
                  <div class="col-sm-8">
                    <select class="form-control" name="id_disposisi" id="disposisi">
                      <option>==== Pilih Disposisi Kasubid ====</option>
                      <?php foreach ($dispos as $d) { ?>
                      <option value="<?php echo $d->id_disposisi ?>"><?php echo $d->nama_disposisi ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="noArsip" class="col-sm-3 control-label">Isi Disposisi</label>
                  <div class="col-sm-8">
                    <input type="text" name="disposkasubid" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="noArsip" class="col-sm-3 control-label">Tanggal disposisi</label>
                  <div class="col-sm-8">
                    <input type="date" name="tgl_disposkasubid" class="form-control">
                  </div>
                </div>


                <div class="form-group">
                  <label for="noArsip" class="col-sm-3 control-label">Pelaksana</label>
                  <div class="col-sm-8">
                    <select class="form-control" name="id_pelaksana" id="disposisi">
                      <option>==== Pilih Staf Pelaksana ====</option>
                      <?php foreach ($pelaksana as $p) { ?>
                      <option value="<?php echo $p->id_pelaksana ?>"><?php echo $p->nama_staff ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="noArsip" class="col-sm-3 control-label">Status</label>
                  <div class="col-sm-8">
                    <select class="form-control" name="status" id="disposisi">
                      <option value="Proses">Proses</option>
                      <option value="Selesai">Selesai</option>
                    </select>
                  </div>
                </div>

                <input type="hidden" name="createdby" class="form-control" value="<?php echo $nama_admin; ?>">

                <div class="form-group">
                  <label class="col-sm-3 control-label" id="label-photo">Upload File </label>
                  <div class="col-sm-8">
                      <input name="masuk_file" type="file" class="form-control">
                      <span class="help-block"></span>
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <!-- <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Sign in</button>
              </div> -->
              <!-- /.box-footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal" onclick="clear()">Close</button>
                <button type="button" class="btn btn-primary" id="btnSave" onclick="tambah()">Save changes</button>
              </div>
            </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
    </div>
        <!-- /.modal -->

    <div class="modal fade" id="modalForm">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Update Surat Masuk</h4>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" id="formUbah">
              <div class="box-body">
                <div class="form-group">
                  <label for="noArsip" class="col-sm-3 control-label">No Arsip</label>
                  <div class="col-sm-8">
                    <input type="text" name="id_suratmasuk" class="form-control" id="noArsip">
                  </div>
                </div>

                <div class="form-group">
                  <label for="noArsip" class="col-sm-3 control-label">No Agenda</label>
                  <div class="col-sm-8">
                    <input type="text" name="nomor_agenda" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="noArsip" class="col-sm-3 control-label">Asal Surat</label>
                  <div class="col-sm-8">
                    <input type="text" name="asal_suratmasuk" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="noArsip" class="col-sm-3 control-label">No Surat</label>
                  <div class="col-sm-8">
                    <input type="text" name="nomor_suratmasuk" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="noArsip" class="col-sm-3 control-label">Tanggal Surat</label>
                  <div class="col-sm-8">
                    <input type="date" name="tgl_suratmasuk" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="noArsip" class="col-sm-3 control-label">Tanggal Diterima</label>
                  <div class="col-sm-8">
                    <input type="date" name="tgl_surat_diterima" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="noArsip" class="col-sm-3 control-label">Perihal</label>
                  <div class="col-sm-8">
                    <input type="text" name="perihal_suratmasuk" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="noArsip" class="col-sm-3 control-label">Disposisi Kaban</label>
                  <div class="col-sm-8">
                    <input type="text" name="disposkaban" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="noArsip" class="col-sm-3 control-label">Tanggal disposisi</label>
                  <div class="col-sm-8">
                    <input type="date" name="tgl_disposkaban" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="noArsip" class="col-sm-3 control-label">Disposisi Kabid</label>
                  <div class="col-sm-8">
                    <input type="text" name="disposkabid" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="noArsip" class="col-sm-3 control-label">Tanggal disposisi</label>
                  <div class="col-sm-8">
                    <input type="date" name="tgl_disposkabid" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="noArsip" class="col-sm-3 control-label">Disposisi Kasubid</label>
                  <div class="col-sm-8">
                    <select class="form-control" name="id_disposisi" id="disposisi">
                      <option>==== Pilih Disposisi Kasubid ====</option>
                      <?php foreach ($dispos as $d) { ?>
                      <option value="<?php echo $d->id_disposisi ?>"><?php echo $d->nama_disposisi ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="noArsip" class="col-sm-3 control-label">Isi Disposisi</label>
                  <div class="col-sm-8">
                    <input type="text" name="disposkasubid" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label for="noArsip" class="col-sm-3 control-label">Tanggal disposisi</label>
                  <div class="col-sm-8">
                    <input type="date" name="tgl_disposkasubid" class="form-control">
                  </div>
                </div>


                <div class="form-group">
                  <label for="noArsip" class="col-sm-3 control-label">Pelaksana</label>
                  <div class="col-sm-8">
                    <select class="form-control" name="id_pelaksana" id="disposisi">
                      <option>===== Pilih Staf Pelaksana ====</option>
                      <?php foreach ($pelaksana as $p) { ?>
                      <option value="<?php echo $p->id_pelaksana ?>"><?php echo $p->nama_staff ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="noArsip" class="col-sm-3 control-label">Status</label>
                  <div class="col-sm-8">
                    <select class="form-control" name="status" id="disposisi">
                      <option value="Proses">Proses</option>
                      <option value="Selesai">Selesai</option>
                    </select>
                  </div>
                </div>

                <input type="hidden" name="updateby" class="form-control" value="<?php echo $nama_admin; ?>">

                <!-- <div class="form-group">
                  <label for="noArsip" class="col-sm-3 control-label">File Surat</label>
                  <div class="col-sm-8">
                    <input type="file" name="file" class="form-control">
                  </div>
                </div> -->

                <div class="form-group" id="photo-preview">
                  <label class="col-sm-3 control-label">File Surat</label>
                  <div class="col-sm-8">
                      (No Files Uploaded)
                      <span class="help-block"></span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label" id="label-photo">Upload File </label>
                  <div class="col-sm-8">
                      <input name="masuk_file" type="file" class="form-control">
                      <span class="help-block"></span>
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <!-- <div class="box-footer">
                <button type="submit" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Sign in</button>
              </div> -->
              <!-- /.box-footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn_upload" onclick="updateMasuk()">Save changes</button>
              </div>
            </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
    </div>
        <!-- /.modal -->

  </div>

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.13
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

<script>

  $(function () {
    $('#example').DataTable({
      "scrollX": true,
      "ajax": {
        "url": "<?php echo site_url('C_seamasuk/listSrtMasuk')?>",
            "type": "POST",
            "data": function ( data ) {
                console.log(data);
        }
      }
    })
  })

  function tambah() 
  {
    var formData = new FormData($('#formDefault')[0]);

    $.ajax({
        url : "<?php echo site_url('C_seamasuk/addSuratMasuk') ?>",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {
           //if success close modal and reload ajax table
           $('#modalDefault').modal('hide');
           window.location.reload()
           // window.location.href = "C_mutasimasuk";
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            // console.log(errorThrown);
        }
    });
  }  

  function reload_table()
  {
      $('#example').DataTable().ajax.reload(null,false);
  }

  function updateSurat(id)
  {
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    $.ajax({
      url : "<?php echo site_url('C_seamasuk/getMasuk')?>/" +id,
      type : "GET",
      dataType : "JSON",
      success : function(data)
      {
        $('#modalForm').modal('show');
        $('[name="id_suratmasuk"]').val(data.id_suratmasuk);
        $('[name="id_disposisi"]').val(data.id_disposisi);
        $('[name="id_pelaksana"]').val(data.id_pelaksana);
        $('[name="tgl_surat_diterima"]').val(data.tgl_surat_diterima);
        $('[name="asal_suratmasuk"]').val(data.asal_suratmasuk);
        $('[name="nomor_suratmasuk"]').val(data.nomor_suratmasuk);
        $('[name="nomor_agenda"]').val(data.nomor_agenda);
        $('[name="tgl_suratmasuk"]').val(data.tgl_suratmasuk);
        $('[name="perihal_suratmasuk"]').val(data.perihal_suratmasuk);
        $('[name="disposkaban"]').val(data.disposkaban);
        $('[name="tgl_disposkaban"]').val(data.tgl_disposkaban);
        $('[name="disposkabid"]').val(data.disposkabid);
        $('[name="tgl_disposkabid"]').val(data.tgl_disposkabid);
        $('[name="disposkasubid"]').val(data.disposkasubid);
        $('[name="tgl_disposkasubid"]').val(data.tgl_disposkasubid);
        $('[name="status"]').val(data.status);

        if(data.masuk_file)
        {
            $('#label-photo').text('Change File'); // label photo upload
            $('#photo-preview div').html('<embed src="<?php echo base_url() ?>'+'uploads/surat_masuk/'+data.masuk_file+'" class="img-responsive">'); // show photo
            $('#photo-preview div').append('<input type="checkbox" name="remove_photo" value="'+data.masuk_file+'"/> Remove file when saving'); // remove photo
        }
        else
        {
            $('#label-photo').text('Upload Files'); // label photo upload
            $('#photo-preview div').text('(No Files Uploaded)');
        }

      },

      error: function (jqXHR, textStatus, errorThrown)
      {
          alert('Data Not Found');
      }

    });
  }

  function updateMasuk()
  {
    var formData = new FormData($('#formUbah')[0]);

    $.ajax({
        url : "<?php echo site_url('C_seamasuk/upSuratMasuk') ?>",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {
           //if success close modal and reload ajax table
           $('#modalForm').modal('hide');
           window.location.reload()
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            // console.log(errorThrown);
        }
    });
  }

  $('#modalDefault').on('hidden.bs.modal', function (e) {
  $(this)
    .find("input,textarea,select")
    .val('')
    .end()
    .find("input[type=checkbox], input[type=radio]")
    .prop("checked", "")
    .end();
  })

</script>
</body>
</html>
