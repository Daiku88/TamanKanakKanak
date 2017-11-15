<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="index.html" title="Go to User" class="tip-bottom"><i class="icon-user"></i>Daftar Penduduk</a></div>
  </div>

  <?= get_message(); ?>
  
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box widget-box-header">
          <div class="widget-title">
             <span class="icon"><i class="icon-th"></i></span> 
            <h5><a class="btn btn-mini btn-success btn-tambah" href="<?= site_url('admin/penduduk/add_kk');?>">Tambah Data KK</a></h5>
            <h5><a class="btn btn-mini btn-success btn-tambah" href="<?= site_url('admin/penduduk/add');?>">Tambah Data Penduduk</a></h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table" id="example">
                <tr>
                <thead>
                  <th style="width:10px">No.</th>
                  <th>No.KK</th>
                  <th>Kepala KK</th>
                  <th>Alamat</th>
                  <th>Jenis Tinggal</th>
                  <th>Anggota KK</th>
<!--                   <th style="width:80px"></th>
 -->                </thead>
                </tr>
              		<tr>
              <?php $no=1;foreach($kartu->result_array() as $datas) { ?>
	              	<td rowspan="<?php echo $datas['pend'];?>" align="top center"><?php echo $no ?></td>
	              	<td rowspan="<?php echo $datas['pend'];?>" align="top center">
	              		<a href="<?=site_url('admin/penduduk/detail_kk/'.$datas['id'])?>"><?php echo $datas['no_kk'];?></a>
                      	<a href="<?=site_url('admin/penduduk/add_kk/'.$datas['id'])?>"><i class="fa fa-edit"></i></a>    
                      	<a href="<?=site_url('admin/penduduk/delete_kk/'.$datas['id'])?>"><i class="fa fa-trash"></i>
                    </td>
	              	<td rowspan="<?php echo $datas['pend'];?>" align="top center"><?php echo $datas['k_kk'];?></td>
	              	<td rowspan="<?php echo $datas['pend'];?>" align="top center"><?php echo $datas['alamat'];?></td>
	              	<td rowspan="<?php echo $datas['pend'];?>" align="top center"><?php echo $datas['tinggal'];?></td>
 					<?php foreach($penduduk->result_array() as $data) { 
                      if($data['idkk']==$datas['id']){ ?>              	
                      <td>
                      	<a href="<?=site_url('admin/penduduk/detail_penduduk/'.$data['id'])?>"><?php echo $data['nama'];?></a> 
                      	<a href="<?=site_url('admin/penduduk/add/'.$data['id'])?>"><i class="fa fa-edit"></i></a>    
                      	<a href="<?=site_url('admin/penduduk/delete_penduduk/'.$data['id'])?>"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    <tr>
                  <?php } elseif ($data['idkk']==''){ ?>
                  	 <td></td>
                    </tr>
                    <tr>
                  <?php } } $no++; ?>
                <!-- <td rowspan="<?php echo $datas['pend'];?>">
                   <a class="btn btn-mini" href="<?=site_url('admin/pengurus/detail')?>"><i class="fa fa-info"></i></a>
		           <a class="btn btn-mini btn-primary" href="'.site_url('admin/pengurus/add').'/$1"><i class="fa fa-edit"></i></a>
		           <a class="btn btn-mini btn-danger btn-hapus" href="'.site_url('admin/pengurus/delete').'/$1"><i class="fa fa-trash"></i></a>
		         </td> -->
                </tr>
                 <tr>
                <td style="padding-bottom: 20px; background-color: gray"></td>
                <td style="padding-bottom: 20px; background-color: gray"></td>
                <td style="padding-bottom: 20px; background-color: gray"></td>
                <td style="padding-bottom: 20px; background-color: gray"></td>
                <td style="padding-bottom: 20px; background-color: gray"></td>
                <td style="padding-bottom: 20px; background-color: gray"></td>
              </tr>
                <?php } ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>