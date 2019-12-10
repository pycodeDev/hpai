<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= SITE_NAME .": ". ucfirst($title) ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url();?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?=base_url();?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url();?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?=base_url();?>assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url();?>assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?=base_url();?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?=base_url();?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?=base_url();?>assets/plugins/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="<?=base_url();?>assets/plugins/datatables/dataTables.bootstrap4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="<?=base_url();?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-success">

    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link"><?=$title_kc?></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link"></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <?= $this->session->userdata('nama') ?>
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Menu User</span>
          <div class="dropdown-divider"></div>
          <a href="<?=base_url()?>admin/dashboard/config" class="dropdown-item">
            <i class="fas fa-key mr-1"></i> Change Password
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?=base_url()?>login/logout" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-1"></i> Logout
          </a>
          <div class="dropdown-divider"></div>
          <!-- <a href="#" class="dropdown-item dropdown-footer">See All Notifications</!--> 
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" style="display:none;" data-slide="true" href="#">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-success elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?=base_url()?>assets/img/logo.png" alt="AdminLTE Logo" class="brand-image img-rounded elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Sistem Prediksi HPAI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

			<li class="nav-item">
				<a href="<?= base_url() ?>admin/dashboard/index" class="nav-link <?= $this->uri->segments[3] == 'index' ? 'active' : '' ?>">
					<i class="nav-icon fas fa-tachometer-alt"></i>
					<p>Beranda</p> 
				</a>
      </li>
      <li class="nav-item">
				<a href="<?= base_url() ?>admin/dashboard/profil" class="nav-link <?= $this->uri->segments[3] == 'profil' ? 'active' : '' ?>">
					<i class="nav-icon fas fa-user"></i>
					<p>Profil</p>
				</a>
			</li>
      <li class="nav-item">
				<a href="<?= base_url() ?>admin/dashboard/kelola_produk" class="nav-link <?= $this->uri->segments[3] == 'kelola_produk' || $this->uri->segments[2] == 'kelola_produk' ? 'active' : '' ?>">
					<i class="nav-icon fab fa-product-hunt"></i>
					<p>Kelola Produk</p>
				</a>
			</li>
			<li class="nav-item">
    			<a href="<?= base_url() ?>admin/dashboard/stok_produk" class="nav-link <?= $this->uri->segments[3] == 'stok_produk' ? 'active' : '' ?>">
        			<i class="nav-icon fas fa-store-alt"></i>
        			<p>Stok Produk</p>
    			</a>
			</li>
			<li class="nav-item">
				<a href="<?= base_url() ?>admin/dashboard/kelola_produk_masuk" class="nav-link <?= $this->uri->segments[3] == 'kelola_produk_masuk' || $this->uri->segments[2] == 'kelola_produk_masuk' ? 'active' : '' ?>">
					<i class="nav-icon fas fa-arrow-alt-circle-right"></i>
					<p>Kelola Produk Masuk</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="<?= base_url() ?>admin/dashboard/kelola_transaksi_penjualan" class="nav-link <?= $this->uri->segments[3] == 'kelola_transaksi_penjualan' || $this->uri->segments[2] == 'kelola_transaksi_penjualan' ? 'active' : '' ?>">
					<i class="nav-icon fas fa-dollar-sign "></i>
					<p>Kelola Transaksi Penjualan</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="<?= base_url() ?>admin/dashboard/prediksi_penjualan" class="nav-link <?= $this->uri->segments[3] == 'prediksi_penjualan' ? 'active' : '' ?>">
					<i class="nav-icon fas fa-fw fa-chart-area"></i>
					<p>Prediksi Penjualan</p>
				</a>
			</li>
			<li class="nav-item has-treeview <?= $this->uri->segments[3] == 'laporan_produk' || $this->uri->segments[3] == 'laporan_stok_produk' || $this->uri->segments[3] == 'laporan_transaksi_penjualan' ? 'menu-open' : '' ?>">
			<a href="#" class="nav-link <?= $this->uri->segments[3] == 'laporan_produk' || $this->uri->segments[3] == 'laporan_stok_produk' || $this->uri->segments[3] == 'laporan_transaksi_penjualan' ? 'active' : '' ?>">
				<i class="nav-icon fas fa-circle"></i>
				<p>
				Laporan
				<i class="right fas fa-angle-left"></i>
				</p>
			</a>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="<?= base_url() ?>admin/dashboard/laporan_produk" class="nav-link <?= $this->uri->segments[3] == 'laporan_produk' ? 'active' : '' ?>" >
							<i class="far fa-circle nav-icon ml-2"></i>
							<p>Produk</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url() ?>admin/dashboard/laporan_stok_produk" class="nav-link <?= $this->uri->segments[3] == 'laporan_stok_produk' ? 'active' : '' ?>">
							<i class="far fa-circle nav-icon ml-2"></i>
							<p>Stok Produk</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?= base_url() ?>admin/dashboard/laporan_transaksi_penjualan" class="nav-link <?= $this->uri->segments[3] == 'laporan_transaksi_penjualan' ? 'active' : '' ?>">
							<i class="far fa-circle nav-icon ml-2"></i>
							<p>Transaksi Penjualan</p>
						</a>
					</li>
				</ul>
			</li>

        </ul>
      </nav>
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 card">   
                    <div class="card-body">
                      <ol class="breadcrumb float-sm-right">
                        <?php
                          foreach ($this->uri->segments as $val):
                            if ($val != "admin") {
                              $segments = str_replace("_"," ",$val);
                              $is_active = $segments == $kc;
                              ?>
                              <li class="breadcrumb-item <?php echo $is_active ? 'active': '' ?>">
                              <?php if($is_active): ?>
                                <?php echo ucfirst($segments) ?>
                                  <?php else: ?>
                                <a href="<?php echo base_url() ?><?=$val == "dashboard" ?"admin/$val/index":"admin/dashboard/$val"?>"><?php echo ucfirst($segments) ?></a>
                              <?php endif; ?>
                          <?php    
                            }
                          endforeach;
                        ?>
                      </ol>
                    </div>       
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <?php
                if (isset($content)) {
                    echo $content;
                }
            ?>
        </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright 2019 <a href="<?=base_url()?>admin/dashboard/index"></a>PycodeDev</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <!-- <b>Version</b> 3.0.0-rc.3 -->
    </div>
  </footer>
  
  <!-- Logout Delete Confirmation-->
  <div class="modal fade" id="deleteProdukModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah Kamu Yakin?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Data Produk yang dihapus tidak dapat dikembalikan.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
          <a id="btn-delete-produk" class="btn btn-danger" href="#">Hapus</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?=base_url();?>assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?=base_url();?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?=base_url();?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?=base_url();?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?=base_url();?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?=base_url();?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?=base_url();?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?=base_url();?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?=base_url();?>assets/plugins/moment/moment.min.js"></script>
<script src="<?=base_url();?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?=base_url();?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?=base_url();?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=base_url();?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url();?>assets/dist/js/adminlte.js"></script>
<!-- Toastr -->
<script src="<?=base_url();?>assets/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=base_url();?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url();?>assets/dist/js/demo.js"></script>
<script src="<?=base_url();?>assets/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?=base_url();?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
</body>
</html>
