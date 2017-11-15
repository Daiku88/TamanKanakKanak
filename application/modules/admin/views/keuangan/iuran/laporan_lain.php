<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?= site_url('admin')?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="<?= site_url('admin/iuran_jenis')?>" title="Go to User" class="tip-bottom"><i class="icon-user"></i>Daftar Laporan</a>
    </div>


  <?= get_message(); ?>
  
      <div class="container-fluid">
        <div class="row-fluid">
          <div class="span12">
            <div class="widget-box widget-box-header">
              
              <div class="widget-title">
                <ul class="nav nav-tabs">
                   <li><a data-toggle="tab3" href="<?= site_url('login/iuran/index')?>" title="Lokasi iuran" class="tip-bottom">iuran</a></li>
                  <li><a data-toggle="tab3" href="<?= site_url('login/iuran/lapan')?>" title="Lokasi iuran" class="tip-bottom">Iuran 2018</a></li>
                  <li><a data-toggle="tab3" href="<?= site_url('login/iuran/tujuh')?>" title="Lokasi iuran" class="tip-bottom">Iuran 2017</a></li>
                  <li><a data-toggle="tab3" href="<?= site_url('login/iuran/enam')?>" title="Lokasi iuran" class="tip-bottom">Iuran 2016</a></li>
                  <li class="active"><a data-toggle="tab3" href="<?= site_url('login/iuran/laporan_lain')?>" title="Lokasi iuran" class="tip-bottom">Laporan</a></li>
                </ul> 

              </div>
              <div id="tab1" class="tab-pane active">
                <div class="widget-title widget-title-active">
                 <span class="icon"><i class="icon-th"></i></span>
                <h5><a class="btn btn-mini btn-danger btn-tambah" href="<?= site_url('login/iuran_jenis/index');?>">Cetak PDF</a></h5>
                <h5><a class="btn btn-mini btn-danger btn-tambah" href="<?= site_url('login/iuran/index');?>">Export Excel</a></h5>
              </div>
              	<div class="widget-content nopadding">
						<h3><center>DAFTAR LAPORAN TAHUN 2018</center></h3>
                    <table class="table table-bordered data-table" id="example">
                      <thead>
                        <tr>
                          <th style="width:10px">No.</th>
                          <th><center>Jenis</center></th>

                        </tr>
                      </thead>
              			<?php $no=1;$total_masuk=0;$total_keluar=0;foreach($laporan->result_array() as $lapan) { ?>
                      	<tr>
	                      	<td> <?php echo $no; ?> </td>
	                      	<td> <a href="<?= site_url('login/laporan_lain_detail/'.$lapan['id']);?>"><?php echo $lapan['jns'];?></a> </td>
                      	</tr>
                      	<?php $no++;} ?>
                    </table>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>

