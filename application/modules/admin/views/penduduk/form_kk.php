<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="index.html" title="Go to User" class="tip-bottom"><i class="icon-user"></i>Daftar Pegawai</a></div>
  </div>

  <?= get_message(); ?>

  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box widget-box-header">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Data KK</h5>
          </div>
          <div class="widget-content nopadding">
            <div class="row-fluid">
            <div class="span12">
              <form action="<?= site_url('admin/penduduk/save_kk'); ?>" method="POST" class="form-horizontal">
                <div class="control-group">
                  <label class="control-label">No KK :</label>
                  <div class="controls">
                    <input type="text" class="span11" name="no_kk" placeholder="Nomor Kartu Keluarga" value="<?= @$no_kk; ?>" style="max-width:500px"/>
                  </div>
                </div>
                 <div class="control-group">
                  <label class="control-label">ALAMAT DI KK :</label>
                  <div class="controls">
                    <input type="text" class="span11" name="alamat_kk" placeholder="Alamat di KK" value="<?= @$alamat_kk; ?>" style="max-width:500px"/>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">KEPALA KELUARGA :</label>
                  <div class="controls">
                    <input type="text" class="span11" name="kepala_kk" placeholder="Nama Kepala Keluarga" value="<?= @$kepala_kk; ?>" style="max-width:500px"/>
                  </div>
                </div>
                 <div class="control-group">
                  <label class="control-label">JUMLAH ANGGOTA KK:</label>
                  <div class="controls">
                    <input type="text" class="span11" name="jmlh_anggota" placeholder="Jumlah Anggota Keluarga" value="<?= @$jmlh_anggota; ?>" style="max-width:500px"/>
                  </div>
                </div>
                 <div class="control-group">
                  <label class="control-label">JENIS TINGGAL :</label>
                  <div class="controls">
                  	<select name="jns_tinggal">
                      <?php 
                        foreach ($list_tinggal as $tinggal) {
                          $selected = ($tinggal->id == $jns_tinggal) ? 'selected':'';
                          echo '<option value="'.$tinggal->id.'" '.$selected.'>'.$tinggal->jenis_tinggal.'</option>';
                        }

                      ?>
                  	</select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">BLOK :</label>
                  <div class="controls">
                  	<select name="blok_id">
                      <?php 
                        foreach ($list_blok as $blok) {
                          $selected = ($blok->id == $blok_id) ? 'selected':'';
                          echo '<option value="'.$blok->id.'" '.$selected.'>'.$blok->blok.'</option>';
                        }

                      ?>
                  	</select>
                  </div>
                </div>
                 <div class="control-group">
                  <label class="control-label"> NOMOR RUMAH :</label>
                  <div class="controls">
                    <input type="text" class="span11" name="no_rmh" placeholder="NOMOR RUMAH" value="<?= @$no_rmh; ?>" style="max-width:500px"/>
                  </div>
                </div>
                <div class="form-actions">
                  <input type="hidden" name="id" value="<?= @$id; ?>" />
                  <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan KK</button>
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
