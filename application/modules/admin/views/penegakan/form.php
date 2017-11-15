<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="index.html" title="Go to User" class="tip-bottom"><i class="icon-user"></i>Daftar Penegakan Perda</a></div>
  </div>

  <?= get_message(); ?>

  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box widget-box-header">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Data Penegkan</h5>
          </div>
          <div class="widget-content nopadding">
            <div class="row-fluid">
            <div class="span12">
              <form action="<?= site_url('admin/penegakan/save'); ?>" method="POST" class="form-horizontal">
                <div class="control-group">
                  <label class="control-label">ATURAN :</label>
                  <div class="controls">
                    <input type="text" class="span11" name="aturan" placeholder="Aturan" value="<?= @$aturan; ?>" style="max-width:500px"/>
                  </div>
                </div>
                 <div class="control-group">
                  <label class="control-label">JENIS :</label>
                  <div class="controls">
                    <select name="jenis">
                      <?php 
                        foreach ($list_jenis as $list_jenis) {
                          $selected = ($list_jenis->id == $jenis) ? 'selected':'';
                          echo '<option value="'.$list_jenis->id.'" '.$selected.'>'.$list_jenis->jenis.'</option>';
                        }

                      ?>
                    </select>
                  </div>
                </div>
                 <div class="control-group">
                  <label class="control-label">JUMLAH :</label>
                  <div class="controls">
                    <input type="text" class="span11" name="jumlah" placeholder="Jumlah" value="<?= @$jumlah; ?>" style="max-width:500px"/>
                  </div>
                </div>
                 </div>
                </div>
                 <div class="control-group">
                  <label class="control-label">SATUAN :</label>
                  <div class="controls">
                    <input type="text" class="span11" name="satuan" placeholder="Satuan" value="<?= @$satuan; ?>" style="max-width:500px"/>
                  </div>
                </div>
                </div>
                 <div class="control-group">
                  <label class="control-label">KETERANGAN :</label>
                  <div class="controls">
                    <input type="text" class="span11" name="keterangan" placeholder="Keterangan" value="<?= @$keteranfgan; ?>" style="max-width:500px"/>
                  </div>
                </div>
                <div class="form-actions">
                  <input type="hidden" name="id" value="<?= @$id; ?>" />
                  <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan Penegakan</button>
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
