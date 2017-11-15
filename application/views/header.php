<!DOCTYPE html>
<html lang="en">
<head>
  <title>GRAND MINIMALIS</title>
  <meta charset="UTF-8" />
<meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/bootstrap-responsive.min.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/fullcalendar.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/maruti-style.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/sweet/sweetalert2.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/maruti-media.css" class="skin-color" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/datepicker.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/uniform.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/select2.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/kodeaceh.css" class="skin-color" />

  <script src="<?= base_url() ?>assets/admin/sweet/sweetalert2.min.js"></script> 
  <!-- <script src="<?= base_url() ?>assets/admin/js/excanvas.min.js"></script>  -->
  <script src="<?= base_url() ?>assets/admin/js/jquery.min.js"></script> 
  <!-- <script src="<?= base_url() ?>assets/admin/js/jquery.ui.custom.js"></script>  -->
  <script src="<?= base_url() ?>assets/admin/js/bootstrap.min.js"></script> 
  <!-- <script src="<?= base_url() ?>assets/admin/js/jquery.flot.min.js"></script>  -->
  <!-- <script src="<?= base_url() ?>assets/admin/js/jquery.flot.resize.min.js"></script>  -->
  <!-- <script src="<?= base_url() ?>assets/admin/js/jquery.peity.min.js"></script>  -->
  <!-- <script src="<?= base_url() ?>assets/admin/js/fullcalendar.min.js"></script>  -->
  <!-- <script src="<?= base_url() ?>assets/admin/js/maruti.dashboard.js"></script>  -->
  <!-- <script src="<?= base_url() ?>assets/admin/js/maruti.chat.js"></script>  -->

  <!-- <script src="<?= base_url() ?>assets/admin/js/select2.min.js"></script>  -->
  <script src="<?= base_url() ?>assets/admin/js/jquery.dataTables.min.js"></script> 
  <script src="<?= base_url() ?>assets/admin/js/maruti.js"></script> 
  <script src="<?= base_url() ?>assets/admin/js/maruti.tables.js"></script>
  <script src="<?= base_url() ?>assets/admin/js/bootstrap-datepicker.js"></script> 
  <script src="<?= base_url() ?>assets/admin/js/jquery.uniform.js"></script> 
  <script src="<?= base_url() ?>assets/admin/js/select2.min.js"></script> 
  <script src="<?= base_url() ?>assets/admin/js/maruti.js"></script> 
  <script src="<?= base_url() ?>assets/admin/js/maruti.form_common.js"></script>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="<?= site_url('admin'); ?>">
    <img class="logo" src="<?= base_url('assets/admin/images/logo.png'); ?>"> GRAND MINIMALIS
  </a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-messaages-->
<div class="btn-group rightzero"> <a class="top_message tip-left" title="Manage Files"><i class="icon-file"></i></a> <a class="top_message tip-bottom" title="Manage Users"><i class="icon-user"></i></a> <a class="top_message tip-bottom" title="Manage Comments"><i class="icon-comment"></i><span class="label label-important">5</span></a> <a class="top_message tip-bottom" title="Manage Orders"><i class="icon-shopping-cart"></i></a> </div>
<!--close-top-Header-messaages--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li class="" ><a title="" href="<?= base_url('admin/profil') ?>"><i class="icon icon-user"></i> <span class="text">Profile</span></a></li>
    <li class=""><a title="" href="<?= base_url('admin/setting') ?>"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
    <li class=""><a title="" href="<?=  base_url('admin/logout')?>"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
  </ul>
</div>
<div id="search">
  <input type="text" placeholder="Pencarian..."/>
  <button type="submit" class="tip-left" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-Header-menu-->

<div id="sidebar"><a href="<?= base_url('admin/dashboard') ?>" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="active"><a href="<?= base_url('admin/dashboard') ?>"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
     <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Master Data</span></a>
      <ul>
        <li><a href="<?= base_url('admin/pengurus') ?>">PENGURUS KOMP</a></li>
        <li><a href="<?= base_url('admin/aset') ?>">ASSET</a></li>
        <li><a href="<?= base_url('admin/status') ?>">STATUS PENDUDUK</a></li>
        <li><a href="<?= base_url('admin/hubungan') ?>">HUBUNGAN PENDUDUK</a></li>
        <li><a href="<?= base_url('admin/blok') ?>">BLOK</a></li>
      </ul>
    </li>
    <li> <a href="<?=base_url('admin/penduduk')?>"><i class="icon icon-user"></i> <span>Penduduk</span></a></li>
    <li class="submenu"> <a href="#"><i class="icon icon-tasks"></i> <span>Uang Kas</span></a>
      <ul>
        <li><a href="<?= base_url('admin/pemasukan_jenis') ?>">PEMASUKAN</a></li>
        <li><a href="<?= base_url('admin/pengeluaran_jenis') ?>">PENGELUARAN</a></li>
        <li><a href="<?= base_url('admin/rekap') ?>">REKAP DANA</a></li>
        <li><a href="<?= base_url('admin/iuran') ?>">IURAN WARGA</a></li>
      </ul>
    </li>
    <li> <a href="<?=base_url('admin/iuran')?>"><i class="icon icon-lock"></i> <span>PENGUMUMAN</span></a></li>
    <li> <a href="<?=base_url('admin/cctv')?>"><i class="icon icon-camera"></i> <span>CCTV AKSES</span></a></li>
    <li class="submenu"> <a href="#"><i class="icon icon-book"></i> <span>Laporan</span></a>
      <ul>
        <li><a href="<?= site_url('admin/laporan/pemasukkan'); ?>">Laporan Pemasukkan</a></li>
        <li><a href="form-common.html">Laporan Pengeluaran</a></li>
        <li><a href="form-validation.html">Laporan Iuran Warga</a></li>
      </ul>
    </li>
    <li> <a href="<?= base_url('admin/pengguna') ?>"><i class="icon icon-info-sign"></i> <span>Managemen Pengguna</span></a></li> 
</div>
