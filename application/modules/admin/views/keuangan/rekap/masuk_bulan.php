<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?= site_url('admin')?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="<?= site_url('admin/pengeluaran_jenis')?>" title="Go to User" class="tip-bottom"><i class="icon-user"></i>Daftar pengeluaran</a>
    </div>


  <?= get_message(); ?>
  
      <div class="container-fluid">
        <div class="row-fluid">
          <div class="span12">
            <div class="widget-box widget-box-header">
              
              <div class="widget-title">
                <ul class="nav nav-tabs">
                   <li class="active"><a data-toggle="tab2" href="<?= site_url('admin/pengeluaran_jenis/index')?>" title="Jenis Pengeluaran" class="tip-bottom">Jenis Pengeluaran</a></li>
                  <li><a data-toggle="tab3" href="<?= site_url('admin/pengeluaran/index')?>" title="Lokasi Pengeluaran" class="tip-bottom">Pengeluaran</a></li>
                </ul> 
              </div>
              <div id="tab1" class="tab-pane active">
                <div class="widget-title widget-title-active">
                 <span class="icon"><i class="icon-th"></i></span>

                <h5><a class="btn btn-mini btn-success btn-tambah" href="<?= site_url('admin/jenis_pengeluaran/add');?>">Tambah Jenis Pengeluaran</a></h5>
              </div>
                  <div class="widget-content nopadding">
                    <table class="table table-bordered data-table" id="example">
                      <thead>
                        <tr>
                          <th style="width:10px">No.</th>
                          <th>Bulan</th>
                          <th>Jenis</th>
                          <th>Jenis Rekap</th>
                          <th>Jumlah Transaksi</th>
                          <th>Jumlah Uang</th>
                        </tr>
                      </thead>
                      <tbody>
                      	<?php $no=1;foreach ($masuk->result_array() as $a): ?>
                      	<tr>
                      		<td><?php echo $no; ?></td>
                      		<td><?php echo $a['bulan'] ?></td>
                      		<td><a href="<?= site_url('admin/rekap/pemasukan_bulan/');?>"><?php echo $a['jenis'] ?></a></td>
                      		<td>Pemasukan</td>
                      		<td><?php echo $a['pemasukan'] ?></td>
                      		<td>Rp. <?php echo number_format($a['jumlah']) ?></td>
                      	</tr>
                      	<?php $no++; endforeach ?>
                      	 <?php $no2=1;foreach ($keluar->result_array() as $b): ?>
                      	<tr>
                      		<td><?php echo $no2; ?></td>
                      		<td><?php echo $b['bulan'] ?></td>
                      		<td><a href="<?= site_url('admin/rekap/pemasukan_bulan/');?>"><?php echo $b['jenis'] ?></a></td>
                      		<td>Pengeluaran</td>
                      		<td><?php echo $b['pengeluaran'] ?></td>
                      		<td>Rp. <?php echo number_format($b['jumlah']) ?></td>
                      	</tr>
                      	<?php $no2++; endforeach ?>
                      </tbody>
                      <tfoot>
                      	<tr>
                      		<td style="background-color: black"></td>
                      		<td style="background-color: black"></td>
                      		<td style="background-color: black"></td>
                      		<td style="background-color: black"></td>
                      		<td style="background-color: black"></td>
                      		<td style="background-color: black"></td>
                      	</tr>
                      	<tr>
                      		<td></td>
                      		<td><b>Pemasukan Total</b></td>
                      		<td>Rp. <!-- <?php echo number_format($a['jumlah']) ?> --></td>
                      		<td><b>Pengeluaran Total</b></td>
                      		<td>Rp. <!-- <?php echo number_format($b['jumlah']) ?> --></td>
                      		<td>Rp. <!-- <?php echo number_format($a['jumlah']-$b['jumlah']) ?> --></td>
                      	</tr>
                      	
                      </tfoot>
                    </table>
                  </div> 
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>