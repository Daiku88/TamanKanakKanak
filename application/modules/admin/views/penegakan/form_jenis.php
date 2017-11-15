<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="index.html" title="Go to User" class="tip-bottom"><i class="icon-user"></i>Daftar Jenis Penegakan</a></div>
  </div>

  <?= get_message(); ?>

  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box widget-box-header">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Data Jenis Penegakan</h5>
          </div>
          <div class="widget-content nopadding">
            <div class="row-fluid">
            <div class="span12">
              <form action="<?= site_url('admin/penegakan/save_jenis'); ?>" method="POST" class="form-horizontal">
                <div class="control-group">
                  <label class="control-label">ATURAN :</label>
                  <div class="controls">
                  	<select name="aturan_penegakan_id">
                      <?php 
                        foreach ($list_aturan as $aturan) {
                          $selected = ($aturan->id == $aturan_penegakan_id) ? 'selected':'';
                          echo '<option value="'.$aturan->id.'" '.$selected.'>'.$aturan->aturan.'</option>';
                        }
                      ?>
                  	</select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">JENIS :</label>
                  <div class="controls">
                    <input type="text" class="span11" name="jenis" placeholder="jenis" value="<?= @$jenis; ?>" style="max-width:500px"/>
                  </div>
                </div>
                 <div class="control-group">
                  <label class="control-label">SATUAN :</label>
                  <div class="controls">
                    <input type="text" class="span11" name="satuan" placeholder="satuan" value="<?= @$satuan; ?>" style="max-width:500px"/>
                  </div>
                </div>
                 <div class="control-group">
                  <label class="control-label">INSTANSI TERKAIT :</label>
                  <div class="controls">
                    <input type="text" class="span11" name="instansi_terkait" placeholder="instansi_terkait" value="<?= @$instansi_terkait; ?>" style="max-width:500px"/>
                  </div>
                </div>
                <div class="form-actions">
                  <input type="hidden" name="id" value="<?= @$id; ?>" />
                  <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan Pegawai</button>
                  <a href="<?= site_url('admin/penegakan'); ?>" class="btn btn-default"><i class="fa fa-undo"></i> Batal</a>
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
