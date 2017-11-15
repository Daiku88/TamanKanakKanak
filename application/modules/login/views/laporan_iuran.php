<!DOCTYPE html>
<html lang="en">
<head>
  <title>GRAND MINIMALIS</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/bootstrap-responsive.min.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/fullcalendar.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/maruti-style.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/sweet/sweetalert2.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/maruti-media.css" class="skin-color" />
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
</head>
<body>

<!--Header-part-->
<div id="header" style="background-color: #3907ff">
  <h1><a href="<?= site_url('admin'); ?>">
    <img class="logo" src="<?= base_url('assets/admin/images/logo.png'); ?>"> GRAND MINIMALIS
  </a></h1>
</div>
<!--close-Header-part--> 


  <?= get_message(); ?>
  
      <div class="container-fluid">
        <div class="row-fluid">
          <div class="span12">
            <div class="widget-box widget-box-header">
              
              <div class="widget-title">
                <ul class="nav nav-tabs">
                   <li class="active"><a data-toggle="tab3" href="<?= site_url('login/iuran/index')?>" title="Lokasi iuran" class="tip-bottom">iuran</a></li>
                  <li><a data-toggle="tab3" href="<?= site_url('login/iuran/lapan')?>" title="Lokasi iuran" class="tip-bottom">iuran 2018</a></li>
                  <li><a data-toggle="tab3" href="<?= site_url('login/iuran/tujuh')?>" title="Lokasi iuran" class="tip-bottom">iuran 2017</a></li>
                  <li><a data-toggle="tab3" href="<?= site_url('login/iuran/enam')?>" title="Lokasi iuran" class="tip-bottom">iuran 2016</a></li>
                  <li><a data-toggle="tab3" href="<?= site_url('login/iuran/laporan_lain')?>" title="Lokasi iuran" class="tip-bottom">Laporan Lain nya</a></li>
                </ul> 

              </div>
              <div id="tab1" class="tab-pane active">
                <div class="widget-title widget-title-active">
                 <span class="icon"><i class="icon-th"></i></span>
                <h5><a class="btn btn-mini btn-danger btn-tambah" href="<?= site_url('admin/iuran_jenis/index');?>">Cetak PDF</a></h5>
                <h5><a class="btn btn-mini btn-danger btn-tambah" href="<?= site_url('admin/iuran/index');?>">Export Excel</a></h5>
              </div>
              	<div class="widget-content nopadding">
						<h3><center>DAFTAR IURAN TAHUN 2018</center></h3>
                    <table class="table table-bordered data-table" id="example">
                      <thead>
                        <tr>
                          <th rowspan="2" style="width:10px">No.</th>
                          <th rowspan="2"><center>Kepala KK</center></th>
                          <th colspan="12"><center>Bulan</center></th>
                        </tr>
                        <tr>
                          <th>1</th>
                          <th>2</th>
                          <th>3</th>
                          <th>4</th>
                          <th>5</th>
                          <th>6</th>
                          <th>7</th>
                          <th>8</th>
                          <th>9</th>
                          <th>10</th>
                          <th>11</th>
                          <th>12</th>
                        </tr>
                      </thead>
              			<?php $no=1;foreach($lapan->result_array() as $lapan) { ?>
                      	<tr>
	                      	<td> <?php echo $no ?> </td>
	                      	<td> <?php echo $lapan['kepala'];?></td>
	                      	<td> <?php echo number_format($lapan['1']);?> </td>
	                      	<td> <?php echo number_format($lapan['2']);?> </td>
	                      	<td> <?php echo number_format($lapan['3']);?> </td>
	                      	<td> <?php echo number_format($lapan['4']);?> </td>
	                      	<td> <?php echo number_format($lapan['5']);?> </td>
	                      	<td> <?php echo number_format($lapan['6']);?> </td>
	                      	<td> <?php echo number_format($lapan['7']);?> </td>
	                      	<td> <?php echo number_format($lapan['8']);?> </td>
	                      	<td> <?php echo number_format($lapan['9']);?> </td>
	                      	<td> <?php echo number_format($lapan['10']);?> </td>
	                      	<td> <?php echo number_format($lapan['11']);?> </td>
	                      	<td> <?php echo number_format($lapan['12']);?> </td>
                      	</tr>
                     <?php $no++; } ?>
                    </table>
                  </div>
                  <div class="span12">
                  	<a href="<?= site_url('');?>" type="button" class="btn btn-danger">Kembali Ke Login</a> 
                  </div>	

                  <div class="widget-content nopadding">
						<h3><center>DAFTAR IURAN TAHUN 2017</center></h3>
                    <table class="table table-bordered data-table" id="example">
                      <thead>
                        <tr>
                          <th rowspan="2" style="width:10px">No.</th>
                          <th rowspan="2"><center>Kepala KK</center></th>
                          <th colspan="12"><center>Bulan</center></th>
                        </tr>
                        <tr>
                          <th>1</th>
                          <th>2</th>
                          <th>3</th>
                          <th>4</th>
                          <th>5</th>
                          <th>6</th>
                          <th>7</th>
                          <th>8</th>
                          <th>9</th>
                          <th>10</th>
                          <th>11</th>
                          <th>12</th>
                        </tr>
                      </thead>
              			<?php $no=1;foreach($tujuh->result_array() as $datas) { ?>
                      	<tr>
	                      	<td> <?php echo $no ?> </td>
	                      	<td> <?php echo $datas['kepala'];?></td>
	                      	<td> <?php echo number_format($datas['1']);?> </td>
	                      	<td> <?php echo number_format($datas['2']);?> </td>
	                      	<td> <?php echo number_format($datas['3']);?> </td>
	                      	<td> <?php echo number_format($datas['4']);?> </td>
	                      	<td> <?php echo number_format($datas['5']);?> </td>
	                      	<td> <?php echo number_format($datas['6']);?> </td>
	                      	<td> <?php echo number_format($datas['7']);?> </td>
	                      	<td> <?php echo number_format($datas['8']);?> </td>
	                      	<td> <?php echo number_format($datas['9']);?> </td>
	                      	<td> <?php echo number_format($datas['10']);?> </td>
	                      	<td> <?php echo number_format($datas['11']);?> </td>
	                      	<td> <?php echo number_format($datas['12']);?> </td>
                      	</tr>
                     <?php $no++; } ?>
                    </table>
                  </div>
                  <div class="span12">
                  	<a href="<?= site_url('');?>" type="button" class="btn btn-danger">Kembali Ke Login</a> 
                  </div>

                  <div class="widget-content nopadding">
						<h3><center>DAFTAR IURAN TAHUN 2016</center></h3>
                    <table class="table table-bordered data-table" id="example">
                      <thead>
                        <tr>
                          <th rowspan="2" style="width:10px">No.</th>
                          <th rowspan="2"><center>Kepala KK</center></th>
                          <th colspan="12"><center>Bulan</center></th>
                        </tr>
                        <tr>
                          <th>1</th>
                          <th>2</th>
                          <th>3</th>
                          <th>4</th>
                          <th>5</th>
                          <th>6</th>
                          <th>7</th>
                          <th>8</th>
                          <th>9</th>
                          <th>10</th>
                          <th>11</th>
                          <th>12</th>
                        </tr>
                      </thead>
              			<?php $no=1;foreach($enam->result_array() as $enam) { ?>
                      	<tr>
	                      	<td> <?php echo $no ?> </td>
	                      	<td> <?php echo $enam['kepala'];?> </td>
	                      	<td> <?php echo number_format($enam['1']);?> </td>
	                      	<td> <?php echo number_format($enam['2']);?> </td>
	                      	<td> <?php echo number_format($enam['3']);?> </td>
	                      	<td> <?php echo number_format($enam['4']);?> </td>
	                      	<td> <?php echo number_format($enam['5']);?> </td>
	                      	<td> <?php echo number_format($enam['6']);?> </td>
	                      	<td> <?php echo number_format($enam['7']);?> </td>
	                      	<td> <?php echo number_format($enam['8']);?> </td>
	                      	<td> <?php echo number_format($enam['9']);?> </td>
	                      	<td> <?php echo number_format($enam['10']);?> </td>
	                      	<td> <?php echo number_format($enam['11']);?> </td>
	                      	<td> <?php echo number_format($enam['12']);?> </td>
                      	</tr>
                     <?php $no++; } ?>
                    </table>
                  </div> 
                  <div class="span12">
                  	<a href="<?= site_url('');?>" type="button" class="btn btn-danger">Kembali Ke Login</a> 
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>

