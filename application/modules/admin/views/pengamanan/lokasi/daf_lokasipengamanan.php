<div id="content">
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
                
                <a href="<?= base_url('admin/lokasipengamanan/create')?>" type="button" class="btn btn-info"> Tambah Lokasi Pengamanan</a>
                        <div class="dataTable_wrapper">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                       <th>Wilayah</th>
                                    <th>Lokasi Pengamanan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($conf)): ?>
                                    <?php foreach ($conf->result() as $list): ?>
                                        <tr class="odd gradeX">
                                            <td><?=$list->wil?></td>
                                            <td><?=$list->lokasi?></td>
                                            <td>
                                                <a href="<?= base_url('admin/lokasipengamanans/edit/'.$list->id) ?>" class="btn btn-info">edit</a>  
                                                <a href="<?= base_url('admin/lokasipengamanans/delete/'.$list->id) ?>" class="btn btn-danger">delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr class="even gradeC">
                                        <td>No data</td>
                                        <td>No data</td>
                                        <td>No data</td>
                                        <td>No data</td>
                                        <td>
                                            <a href="#" class="btn btn-info">edit</a>  
                                            <a href="#" class="btn btn-danger">delete</a>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>