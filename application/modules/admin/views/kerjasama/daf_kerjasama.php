<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="index.html" title="Go to User" class="tip-bottom"><i class="icon-user"></i>Daftar Kerjasama</a></div>
  </div>
  <div class="container-fluid">    
    <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title"><span class="icon"><i class="icon-tasks"></i></span>
          <h5>Daftar Kerjasama</h5>
          <div class="buttons"><a href="#" class="btn btn-mini btn-success"><i class="icon-refresh"></i> Update stats</a></div>
        </div>
        <div class="widget-content">
          <div class="row-fluid">
            <div class="span12">
            	
            	<a href="<?= base_url('admin/kerjasama/create')?>" type="button" class="btn btn-info"> Tambah Kerjasama</a>
                        <div class="dataTable_wrapper">
                    <div class="table-responsive">
                    <?php if (count($conf)): ?>
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        
                            <thead>
                                <tr>
                                    <th>KERJASAMA DENGAN</th>
                                    <th>BIDANG</th>
                                    <th>DIMULAI</th>
                                    <th>BERAKHIR</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php foreach ($conf as $list): ?>
                                        <tr class="odd gradeX">
                                            <td><?=$list->dengan?></td>
                                            <td><?=$list->bidang?></td>
                                            <td><?=$list->mulai?></td>
                                            <?php if ($list->masih_berlangsung == 1): ?>
                                                <td>masih berlangsung</td>
                                            
                                            <?php else: ?>
                                                <td><?=$list->akhir?></td>
                                            <?php endif; ?>

                                            
                                            <td>
                                                <a href="<?= base_url('admin/kerjasama/edit/'.$list->id) ?>" class="btn btn-info">edit</a>  
                                                <a href="<?= base_url('admin/kerjasama/delete/'.$list->id) ?>" class="btn btn-danger">delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <h5>NO DATA</h5>
                    <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>