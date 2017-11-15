lks <div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="index.html" title="Go to User" class="tip-bottom"><i class="icon-user"></i>Lokasi Pengamanan</a></div>
  </div>
  <div class="container-fluid">    
    <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title"><span class="icon"><i class="icon-tasks"></i></span>
          <h5>Lokasi Pengamanan</h5>
          <div class="buttons"><a href="#" class="btn btn-mini btn-success"><i class="icon-refresh"></i> Update stats</a></div>
        </div>
        <div class="widget-content">
          <div class="row-fluid">
            <div class="span12">
 <form role="form" method="POST" action="<?=base_url('admin/lokasipengamanan/create')?>">
                                <div class="form-group">
                                    <label>Wilayah</label>
                                    <?php foreach ($lokasi->result() as $key) { ?>
                                    <input type="text" name="wilayah" disabled="disabled" value="<?=$key->wil; ?>">
                                     <?php }
                                    ?>
                                        <label>Lokasi Pengamanan</label>
                                    <input class="form-control" placeholder="Masukkan Lokasi pengamanan" name="lokasi">
                                </div> <br>
                                  <button type="submit" class="btn btn-primary">Submit Button</button>
                                </div>
                                <br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>