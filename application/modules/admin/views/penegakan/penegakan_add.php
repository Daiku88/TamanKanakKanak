 <div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="index.html" title="Go to User" class="tip-bottom"><i class="icon-user"></i>Daftar Penegakan</a></div>
  </div>
  <div class="container-fluid">    
        <div class="row-fluid">
            <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Tambah Penegakan</h5>
            <div class="buttons"><a href="#" class="btn btn-mini btn-success"><i class="icon-refresh"></i> Update stats</a></div>
          </div>
    <div class="widget-content nopadding">
        <form role="form" method="POST" action="<?=base_url('admin/penegakan/create')?>" class="form-horizontal">
             <div class="control-group">
                <label class="control-label">Wilayah :</label>
                <div class="controls">
                <?php foreach ($wil->result() as $key) { ?>
                <input type="text" class="span11" disabled="disabled" name="wilayah" value="<?=$key->wil; ?>"/>
            <?php } ?>
                </div>
            </div>
             
              <div class="control-group">
                <label class="control-label">Aturan :</label>
                <div class="controls">
                  <select >
                    <option>First option</option>
                    <option>Second option</option>
                    <option>Third option</option>
                    <option>Fourth option</option>
                    <option>Fifth option</option>
                    <option>Sixth option</option>
                    <option>Seventh option</option>
                    <option>Eighth option</option>
                  </select>
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Jumlah :</label>
                <div class="controls">
                  <input type="password"  class="span11" placeholder="Masukkan Jumlah"  />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Instansi :</label>
                <div class="controls">
                  <input type="text" class="span11" placeholder="Instansi Terkait" />
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Satuan :</label>
                <div class="controls">
                  <input type="text" class="span11" placeholder="Instansi Terkait" />
              </div>
            </div>
              <div class="control-group">
                <label class="control-label">Keterangan</label>
                <div class="controls">
                  <textarea class="span11" ></textarea>
                </div>
              </div>
              <div class="form-actions">
                <button type="submit" class="btn btn-success">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
  </div>
</div>
</div>