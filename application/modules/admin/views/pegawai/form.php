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
            <h5>Data Pegawai</h5>
          </div>
          <div class="widget-content nopadding">
            <div class="row-fluid">
            <div class="span12">
              <form action="<?= site_url('admin/pegawai/save'); ?>" method="POST" class="form-horizontal">
                <div class="control-group">
                  <label class="control-label">NIP :</label>
                  <div class="controls">
                    <input type="text" class="span11" name="nip" placeholder="nip" value="<?= @$nip; ?>" style="max-width:500px"/>
                  </div>
                </div>
                 <div class="control-group">
                  <label class="control-label">NAMA :</label>
                  <div class="controls">
                    <input type="text" class="span11" name="nama" placeholder="nama" value="<?= @$nama; ?>" style="max-width:500px"/>
                  </div>
                </div>
                 <div class="control-group">
                  <label class="control-label">JABATAN :</label>
                  <div class="controls">
                    <input type="text" class="span11" name="jabatan" placeholder="jabatan" value="<?= @$jabatan; ?>" style="max-width:500px"/>
                  </div>
                </div>
                 <div class="control-group">
                  <label class="control-label">GOLONGAN :</label>
                  <div class="controls">
                  	<select name="gol">
                      <?php 
                        foreach ($list_golongan as $list_golongan) {
                          $selected = ($list_golongan->id == $golongan_id) ? 'selected':'';
                          echo '<option value="'.$list_golongan->id.'" '.$selected.'>'.$list_golongan->golongan.'</option>';
                        }

                      ?>
                  	</select>
                  </div>
                </div>
                 <div class="control-group">
                  <label class="control-label">STATUS :</label>
                  <div class="controls">
                  	<select name="status">
                  		<?php 
                        foreach ($list_status as $list_status) {
                          $selected = ($list_status->id == $status_id) ? 'selected':'';
                          echo '<option value="'.$list_status->id.'" '.$selected.'>'.$list_status->status.'</option>';
                        }

                      ?>
                  	</select>
                  </div>
                </div>
                 <div class="control-group">
                  <label class="control-label">PENDIDIKAN :</label>
                  <div class="controls">
                  	<select name="pend">
                  		    <?php 
                        foreach ($list_pendidikan as $list_pendidikan) {
                          $selected = ($list_pendidikan->id == $pendidikan_id) ? 'selected':'';
                          echo '<option value="'.$list_pendidikan->id.'" '.$selected.'>'.$list_pendidikan->pendidikan.'</option>';
                        }

                      ?>
                  	</select>
                  </div>
                </div>
                 <div class="control-group">
                  <label class="control-label">ESSELON :</label>
                  <div class="controls">
                    <label>
                    <input type="radio" name="esselon" value="1" <?php echo set_value('esselon', @$is_eselon) == 1 ? "checked" : ""; ?> />
                    YA</label>
                  <label>
                    <input type="radio" name="esselon" value="0" <?php echo set_value('esselon', @$is_eselon) == 0 ? "checked" : ""; ?>/>
                    Tidak</label>
                  </div>
                </div>
                 <div class="control-group">
                  <label class="control-label">PIMPINAN :</label>
                  <div class="controls">
                     <label>
                    <input type="radio" name="pimpinan" value="1" <?php echo set_value('pimpinan', @$is_pimpinan) == 1 ? "checked" : ""; ?>/>
                    YA</label>
                  <label>
                    <input type="radio" name="pimpinan" value="0" <?php echo set_value('pimpinan', @$is_pimpinan) == 0 ? "checked" : ""; ?> />
                    Tidak</label>
                  </div>
                </div>
                <div class="form-actions">
                  <input type="hidden" name="id" value="<?= @$id; ?>" />
                  <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan Pegawai</button>
                  <a href="<?= site_url('admin/pegawai'); ?>" class="btn btn-default"><i class="fa fa-undo"></i> Batal</a>
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
