<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
  <div class="container-fluid">
    <div class="quick-actions_homepage">
    <ul class="quick-actions">
          <li> <a href="#"> <i class="icon-wallet"></i> UANG KAS </a> </li>
          <li> <a href="#"> <i class="icon-graph"></i> IURAN WARGA</a> </li>
          <li> <a href="#"> <i class="icon-people"></i> PENDUDUK </a> </li>
          <li> <a href="#"> <i class="icon-book"></i> PENGUMUMAN </a> </li>
          <li> <a href="#"> <i class="icon-user"></i> USER </a> </li>
        </ul>
   </div> 
    <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title"><span class="icon"><i class="icon-tasks"></i></span>
          <h5>Site Analytics</h5>
          <div class="buttons"><a href="#" class="btn btn-mini btn-success"><i class="icon-refresh"></i> Update stats</a></div>
        </div>
        <div class="widget-content">
          <div class="row-fluid">
            <div class="span8">
              <ul class="stat-boxes2">
                <li>
                  <div class="left peity_bar_neutral"><span>Pemasukan</span></div>
                  <div class="right"><a href="<?= site_url('admin/pemasukan'); ?>"> <strong>Rp. <?php echo number_format($pem['masuk']); ?></strong> </a></div>
                </li>
                <li>
                  <div class="left peity_line_neutral"><span>Pengeluaran</span></div>
                  <div class="right"> <a href="<?= site_url('admin/pengeluaran'); ?>"> <strong>Rp. <?php echo number_format($mas['keluar']); ?></strong> </a> </div>
                </li>
                 <li>
                  <div class="left peity_line_neutral"><span>Sisa Kas</span></div>
                  <div class="right"> <strong>Rp. <?php echo number_format($pem['masuk']-$mas['keluar']); ?> </strong> </div>
                </li>
              </ul>
            </div>
            <div class="span4">
              <ul class="stat-boxes2">
                <li>
                  <div class="left peity_line_neutral"><span>Jumlah KK</span></div>
                  <div class="right"> <a href="<?= site_url('admin/penduduk'); ?>"><strong><?php echo $kk['kks']; ?> Keluarga</strong> </a> </div>
                </li>
                <li>
                  <div class="left peity_line_neutral"><span>Penduduk</span></div>
                  <div class="right"> <a href="<?= site_url('admin/penduduk'); ?>"><strong><?php echo $pend['pen']; ?> Orang</strong> </a> </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr>
    
</div>
</div>
</div>