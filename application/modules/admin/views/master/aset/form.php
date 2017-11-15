<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="index.html" title="Go to User" class="tip-bottom"><i class="icon-user"></i>Daftar Aset</a></div>
  </div>

  <?= get_message(); ?>

  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box widget-box-header">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Data Aset</h5>
          </div>
          <div class="widget-content nopadding">
            <div class="row-fluid">
            <div class="span12">
              <form action="<?= site_url('admin/aset/save'); ?>" method="POST" class="form-horizontal">
                <div class="control-group">
                  <label class="control-label">Nama Aset :</label>
                  <div class="controls">
                    <input type="text" class="span11" name="nama" placeholder="nama" value="<?= @$nama; ?>" style="max-width:500px"/>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Jumlah Aset :</label>
                  <div class="controls">
                    <input type="text" class="span11" name="jumlah" placeholder="jumlah" value="<?= @$jumlah; ?>" style="max-width:500px"/>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Satuan Aset :</label>
                  <div class="controls">
                    <input type="text" class="span11" name="satuan" placeholder="satuan" value="<?= @$satuan; ?>" style="max-width:500px"/>
                  </div>
                </div>
                <div class="form-actions">
                  <input type="hidden" name="id" value="<?= @$id; ?>" />
                  <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
                  <a href="<?= site_url('admin/aset'); ?>" class="btn btn-default"><i class="fa fa-undo"></i> Batal</a>
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
