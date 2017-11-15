<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="index.html" title="Go to User" class="tip-bottom"><i class="icon-user"></i>Daftar Penduduk</a></div>
  </div>

  <?= get_message(); ?>

  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box widget-box-header">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Data Penduduk</h5>
          </div>
          <div class="widget-content nopadding">
            <div class="row-fluid">
            <div class="span6">
              <form action="<?= site_url('admin/penduduk/save_penduduk'); ?>" method="POST" class="form-horizontal">
              	 <div class="control-group">
                  <label class="control-label">Pilih KK :</label>
                  <div class="controls">
                  	<select name="kk_id">
                      <?php 
                        foreach ($list_kk as $kk) {
                          $selected = ($kk->id == $kk_id) ? 'selected':'';
                          echo '<option value="'.$kk->id.'" '.$selected.'>'.$kk->kepala_kk.' ('.$kk->no_kk.')</option>';
                        }

                      ?>
                  	</select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">NIK :</label>
                  <div class="controls">
                    <input type="text" class="span11" name="nik" placeholder="Nomor Induk Kependudukan" value="<?= @$nik; ?>" style="max-width:500px"/>
                  </div>
                </div>
                 <div class="control-group">
                  <label class="control-label">NAMA :</label>
                  <div class="controls">
                    <input type="text" class="span11" name="nama" placeholder="Nama Penduduk" value="<?= @$nama; ?>" style="max-width:500px"/>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">JENIS KELAMIN :</label>
                  <div class="controls">
                    <select class="span11" name="jk" value="<?= @$jk;?>" style="max-width:500px"/>
                      <option value="0">Pilih Jenis Kelamin</option>
                      <option value="L">Laki-Laki</option>
                      <option value="P">Perempuan</option>
                      <?php ?>
                    </select>
                  </div>
                </div>
                 <div class="control-group">
                  <label class="control-label">TGL LAHIR :</label>
                  <div class="controls">
                    <input type="date" class="span11" name="tgl_lahir" placeholder="Tanggal Lahir" value="<?= @$tgl_lahir; ?>" style="max-width:500px"/>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Status :</label>
                  <div class="controls">
                    <select name="status_id">
                      <option>Pilih Status</option>
                      <?php 
                        foreach ($list_status as $status) {
                          $selected = ($status->id == $status_id) ? 'selected':'';
                          echo '<option value="'.$status->id.'" '.$selected.'>'.$status->status.'</option>';
                        }

                      ?>
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Hubungan Dalam KK :</label>
                  <div class="controls">
                    <select name="hubungan_id">
                      <option>Pilih Hubungan</option>
                      <?php 
                        foreach ($list_hubungan as $hubungan) {
                          $selected = ($hubungan->id == $hubungan_id) ? 'selected':'';
                          echo '<option value="'.$hubungan->id.'" '.$selected.'>'.$hubungan->hubungan.'</option>';
                        }

                      ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="span6">
                 <div class="control-group">
                  <label class="control-label"> Pekerjaan :</label>
                  <div class="controls">
                    <input type="text" class="span11" name="pekerjaan" placeholder="Pekerjaan" value="<?= @$pekerjaan; ?>" style="max-width:500px"/>
                  </div>
                </div>
                 <div class="control-group">
                  <label class="control-label">AGAMA :</label>
                  <div class="controls">
                  	<select name="agama_id">
                      <?php 
                        foreach ($list_agama as $agama) {
                          $selected = ($agama->id == $agama_id) ? 'selected':'';
                          echo '<option value="'.$agama->id.'" '.$selected.'>'.$agama->agama.'</option>';
                        }

                      ?>
                  	</select>
                  </div>
                </div>
                 <div class="control-group">
                  <label class="control-label">PENDIDIKAN :</label>
                  <div class="controls">
                  	<select name="pendidikan_id">
                  		<?php 
                        foreach ($list_pendidikan as $pend) {
                          $selected = ($pend->id == $pendidikan_id) ? 'selected':'';
                          echo '<option value="'.$pend->id.'" '.$selected.'>'.$pend->pendi.'</option>';
                        }

                      ?>
                  	</select>
                  </div>
                </div>
                 <div class="control-group">
                  <label class="control-label"> ALAMAT DI KTP :</label>
                  <div class="controls">
                    <textarea type="text" class="span11" name="alamat_ktp" placeholder="Alamat DI KTP" value="<?= @$alamat_ktp; ?>" style="max-width:500px"/> <?= @$alamat_ktp; ?></textarea>
                  </div>
                </div>
              </div>
              <div class="span12">
                <div class="form-actions">
                  <input type="hidden" name="id" value="<?= @$id; ?>" />
                  <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan Penduduk</button>
                  <a href="<?= site_url('admin/penduduk'); ?>" class="btn btn-default"><i class="fa fa-undo"></i> Batal</a>
                </div>
              </form>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>
