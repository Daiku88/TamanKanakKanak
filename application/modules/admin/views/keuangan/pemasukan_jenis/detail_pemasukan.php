<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?= site_url('admin')?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="<?= site_url('admin/pemasukan_jenis')?>" title="Go to User" class="tip-bottom"><i class="icon-user"></i>Daftar Pemasukan</a>
    </div>


  <?= get_message(); ?>
  
      <div class="container-fluid">
        <div class="row-fluid">
          <div class="span12">
            <div class="widget-box widget-box-header">
              
              <div class="widget-title">
                <ul class="nav nav-tabs">
                   <li class="active"><a data-toggle="tab2" href="<?= site_url('admin/pemasukan_jenis/index')?>" title="Jenis pemasukan" class="tip-bottom">Jenis Pemasukan</a></li>
                  <li><a data-toggle="tab3" href="<?= site_url('admin/pemasukan/index')?>" title="Lokasi pemasukan" class="tip-bottom">Pemasukan</a></li>
                </ul> 
              </div>
              <div id="tab1" class="tab-pane active">
                <div class="widget-title widget-title-active">
                 <span class="icon"><i class="icon-th"></i></span>
                <h5><a class="btn btn-mini btn-danger btn-tambah" href="<?= site_url('admin/pemasukan_jenis/index');?>">Kembali Ke Jenis Pemasukan</a></h5>
                <h5><a class="btn btn-mini btn-danger btn-tambah" href="<?= site_url('admin/pemasukan/index');?>">Kembali Ke Pemasukan</a></h5>
              </div>
                  <div class="widget-content nopadding">
                    <table class="table table-bordered data-table" id="example">
                      <thead>
                        <tr>
                          <th style="width:10px">No.</th>
                          <th>Jenis Pemasukan</th>
                          <th>Tahun</th>
                          <th>Nama</th>
                          <th>Asal Dana</th>
                          <th>Keterangan</th>
                          <th>Tgl</th>
                          <th>Jumlah</th>
                        </tr>
                      </thead>
              			<?php $no=1;foreach($masuk->result_array() as $datas) { ?>
                      	<tr>
	                      	<td> <?php echo $no ?> </td>
	                      	<td> <?php echo $datas['jenis'];?> </td>
	                      	<td> <?php echo $datas['tahun'];?> </td>
	                      	<td> <?php echo $datas['nama'];?> </td>
	                      	<td> <?php echo $datas['asal'];?> </td>
	                      	<td> <?php echo $datas['ket'];?> </td>
	                      	<td> <?php echo $datas['tgl'];?> </td>
	                      	<td> Rp. <?php echo number_format($datas['jmlh']);?> </td>
                      	</tr>
                     <?php } $no++; ?>
                     	<tr>
	                      	<td colspan="7"> <b><center> TOTAL </center><b></td>
	                      	<td> <b> Rp. <?php echo number_format($total['tots']);?> </b></td>
                      	</tr>
                    </table>
                  </div> 
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>

