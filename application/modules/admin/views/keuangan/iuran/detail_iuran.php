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
                          <th>No KK</th>
                          <th>Kepala KK</th>
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
                          <th>Jumlah</th>
                        </tr>
                      </thead>
              			<?php $no=1;foreach($bulan->result_array() as $datas) { ?>
                      	<tr>
	                      	<td> <?php echo $no ?> </td>
	                      	<td> <?php echo $datas['no_kk'];?> </td>
	                      	<td> <?php echo $datas['kepala'];?> </td>
	                      	<td> <?php echo $datas['1'];?> </td>
	                      	<td> <?php echo $datas['2'];?> </td>
	                      	<td> <?php echo $datas['3'];?> </td>
	                      	<td> <?php echo $datas['4'];?> </td>
	                      	<td> <?php echo $datas['5'];?> </td>
	                      	<td> <?php echo $datas['6'];?> </td>
	                      	<td> <?php echo $datas['7'];?> </td>
	                      	<td> <?php echo $datas['8'];?> </td>
	                      	<td> <?php echo $datas['9'];?> </td>
	                      	<td> <?php echo $datas['10'];?> </td>
	                      	<td> <?php echo $datas['11'];?> </td>
	                      	<td> <?php echo $datas['12'];?> </td>
	                      	<td> Rp. <?php echo number_format($datas['jmlh']);?> </td>
                      	</tr>
                     <?php $no++; }  ?>
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

