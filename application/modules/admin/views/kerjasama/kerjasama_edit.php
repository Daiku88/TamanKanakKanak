 <div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="index.html" title="Go to User" class="tip-bottom"><i class="icon-user"></i>Edit kerjasama</a></div>
  </div>
  <div class="container-fluid">    
    <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title"><span class="icon"><i class="icon-tasks"></i></span>
          <h5>Edit Kerjasama</h5>
          <!-- <div class="buttons"><a href="#" class="btn btn-mini btn-success"><i class="icon-refresh"></i> Update status</a></div> -->
        </div>
        <div class="widget-content">
          <div class="row-fluid">
            <div class="span12">
                <form> <?php echo update('admin/kerjasama/edit/'.$data->['id']);?>
                                <div class="form-group">
                                    <label>KERJASAMA DENGAN</label>
                                    <input class="form-control" placeholder="" id="dengan" name="dengan" value="<?php echo $data['dengan'] ?>">
                                    <label>BIDANG</label>
                                    <input class="form-control" placeholder="" id="bidang" name="bidang">
                                    <label>DIMULAI</label>
                                    <input type="date" class="form-control" placeholder="" id="mulai" name="mulai">
                                    <label>MASIH BERLANGSUNG</label>
                                    <input type="radio" class="form-control" placeholder="" id="radio" name="masih_berlangsung" value="1">Masih Berlangsung<br>
                                    <input type="radio" class="form-control" placeholder="" id="radio" name="masih_berlangsung" value="0">Sudah Berakhir<br>
                                    <label>BERAKHIR</label>
                                    <input type="date" class="form-control" placeholder="" id="akhir" name="akhir">
                                </div>
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