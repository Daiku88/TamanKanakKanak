<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="index.html" title="Go to User" class="tip-bottom"><i class="icon-user"></i>Daftar Pemasukan</a></div>
  </div>

  <?= get_message(); ?>

  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box widget-box-header">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Data Pemasukan</h5>
          </div>
          <div class="widget-content nopadding">
            <div class="row-fluid">
            <div class="span12">
              <form action="<?= site_url('admin/pemasukan/save'); ?>" method="POST" class="form-horizontal">
              	<div class="control-group">
                  <label class="control-label">Pilih Pemasukan :</label>
                  <div class="controls">
                  	<select name="jns_id">
                  		<option>Pilih Jenis Pemasukan</option>
                      <?php 
                        foreach ($list_jenis as $jenis) {
                          $selected = ($jenis->id == $jns_id) ? 'selected':'';
                          echo '<option value="'.$jenis->id.'" '.$selected.'>'.$jenis->jns_pemasukan.'</option>';
                        }

                      ?>
                  	</select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Pilih Penduduk (Jika Iuran) :</label>
                  <div class="controls">
                  	<select name="penduduk_id">
                  		<option>Pilih Penduduk</option>
                      <?php 
                        foreach ($list_pendudukan as $penduduk) {
                          $selected = ($penduduk->id == $penduduk_id) ? 'selected':'';
                          echo '<option value="'.$penduduk->id.'" '.$selected.'>'.$penduduk->kepala_kk.'</option>';
                        }

                      ?>
                  	</select>
                  </div>
                </div>
                 <div class="control-group">
                  <label class="control-label">Asal Dana :</label>
                  <div class="controls">
                    <input type="text" class="span11" name="asal_dana" placeholder="asal_dana" value="<?= @$asal_dana; ?>" style="max-width:500px"/>
                  </div>
                </div>
                 <div class="control-group">
                  <label class="control-label">Jumlah Dana :</label>
                  <div class="controls">
                    <input type="number" class="span11" name="jumlah" placeholder="jumlah" value="<?= @$jumlah; ?>" style="max-width:500px"/>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Keterangan :</label>
                  <div class="controls">
                    <input type="text" class="span11" name="keterangan" placeholder="keterangan" value="<?= @$keterangan; ?>" style="max-width:500px"/>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Tanggal :</label>
                  <div class="controls">
                    <input type="date" class="span11" name="tgl" placeholder="tgl" value="<?= @$tgl; ?>" style="max-width:500px"/>
                  </div>
                </div>
                <div class="form-actions">
                  <input type="hidden" name="id" value="<?= @$id; ?>" />
                  <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan Pegawai</button>
                  <a href="<?= site_url('admin/pemasukan'); ?>" class="btn btn-default"><i class="fa fa-undo"></i> Batal</a>
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
