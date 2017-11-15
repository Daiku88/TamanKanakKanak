<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?= site_url('admin')?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="<?= site_url('admin/iuran_jenis')?>" title="Go to User" class="tip-bottom"><i class="icon-user"></i>Daftar iuran</a>
    </div>


  <?= get_message(); ?>
  
      <div class="container-fluid">
        <div class="row-fluid">
          <div class="span12">
            <div class="widget-box widget-box-header">
              
              <div class="widget-title">
                <ul class="nav nav-tabs">
                   <li><a data-toggle="tab3" href="<?= site_url('admin/iuran/index')?>" title="Lokasi iuran" class="tip-bottom">iuran</a></li>
                  <li class="active"><a data-toggle="tab3" href="<?= site_url('admin/iuran/lapan')?>" title="Lokasi iuran" class="tip-bottom">Iuran 2018</a></li>
                  <li><a data-toggle="tab3" href="<?= site_url('admin/iuran/tujuh')?>" title="Lokasi iuran" class="tip-bottom">Iuran 2017</a></li>
                  <li><a data-toggle="tab3" href="<?= site_url('admin/iuran/enam')?>" title="Lokasi iuran" class="tip-bottom">Iuran 2016</a></li>
                  <li><a data-toggle="tab3" href="<?= site_url('admin/iuran/laporan_lain')?>" title="Lokasi iuran" class="tip-bottom">Laporan</a></li>
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
                          <th rowspan="2"><center>No KK</center></th>
                          <th rowspan="2"><center>Alamat Blok</center></th>
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
              			<?php $no=1;foreach($enam->result_array() as $lapan) { ?>
                      	<tr>
	                      	<td> <?php echo $no; ?> </td>
	                      	<td> <?php echo $lapan['no_kk'];?> </td>
	                      	<td> <?php echo $lapan['bloks'];?> </td>
	                      	<td> <?php echo $lapan['kepala'];?> </td>
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
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>

