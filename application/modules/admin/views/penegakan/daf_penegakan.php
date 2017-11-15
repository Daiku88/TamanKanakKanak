<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="index.html" title="Go to User" class="tip-bottom"><i class="icon-user"></i>Daftar Penegakan</a></div>
  </div>
  <div class="container-fluid">    
    <div class="row-fluid">
      <div class="widget-box">
        <div class="widget-title"><span class="icon"><i class="icon-tasks"></i></span>
          <h5>Daftar Penegakan</h5>
          <div class="buttons"><a href="#" class="btn btn-mini btn-success"><i class="icon-refresh"></i> Update stats</a></div>
        </div>
        <div class="widget-content">
          <div class="row-fluid">
            <div class="span12">
                        <div class="widget-box">
                            <div class="widget-title">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#tab1">ATURAN PENEGAKAN</a></li>
                                    <li><a data-toggle="tab" href="#tab2">JENIS ATURAN PENEGAKAN</a></li>
                                    <li><a data-toggle="tab" href="#tab3">PENEGAKAN</a></li>
                                </ul>
                            </div>
                            <div class="widget-content tab-content">
                                
                                <div id="tab1" class="tab-pane active">
                                    <a href="<?= base_url('admin/penegakan/create')?>" type="button" class="btn btn-info"> Tambah Aturan</a>
                                    <a href="#" type="button" class="btn btn-danger pull-right"> Export Pdf</a>
                                    <a href="#" type="button" class="btn btn-danger pull-right"> Export Excel</a>
                                    <div class="dataTable_wrapper" style="padding-top: 10px">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                 <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Wilayah</th>
                                                        <th>Aturan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead> 
                                                <tbody>
                                                       <?php if (count($atur)): ?>
                                                        <?php $no=1; $total=0; foreach ($atur->result() as $list): { ?>
                                                    <tr>
                                                        <td><?php echo $no ?></td>
                                                        <td><?=$list->wil?></td>
                                                        <td><?=$list->aturan?></td>
                                                        <td>
                                                            <a href="<?= base_url('admin/penegakan/edit/'.$list->id) ?>" class="btn btn-info">edit</a>
                                                            <a href="<?= base_url('admin/penegakan/delete_aturan/'.$list->id) ?>" class="btn btn-danger">delete</a>
                                                        </td>
                                                        <?php $no++; } ?>
                                                    </tr>
                                                      <?php endforeach; ?>
                                                      <?php else: ?>
                                                   <tr class="even gradeC">
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


                                <div id="tab2" class="tab-pane">
                                    <a href="<?= base_url('admin/penegakan/create')?>" type="button" class="btn btn-info"> Tambah Jenis</a>
                                    <a href="#" type="button" class="btn btn-danger pull-right"> Export Pdf</a>
                                    <a href="#" type="button" class="btn btn-danger pull-right"> Export Excel</a>
                                    <div class="dataTable_wrapper" style="padding-top: 10px">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                     <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Peraturan Daerah</th>
                                                            <th>Jenis</th>
                                                            <th>Satuan</th>
                                                            <th>Instansi</th>
                                                            <th>Keterangan</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead> 
                                                    <tbody>
                                                           <?php if (count($jenis)): ?>
                                                            <?php $no=1; $total=0; foreach ($jenis->result() as $list): { ?>
                                                        <tr>
                                                            <td><?php echo $no ?></td>
                                                            <td><?=$list->aturan?></td>
                                                            <td><?=$list->jenis?></td>
                                                            <td><?=$list->satuan?></td>
                                                            <td><?=$list->instansi?></td>
                                                            <td></td>
                                                            <td>
                                                                <a href="<?= base_url('admin/penegakan/edit/'.$list->id) ?>" class="btn btn-info">edit</a>
                                                                <a href="<?= base_url('admin/penegakan/delete/'.$list->id) ?>" class="btn btn-danger">delete</a>
                                                            </td>
                                                            <?php $no++; } ?>
                                                        </tr>
                                                          <?php endforeach; ?>
                                                          <?php else: ?>
                                                       <tr class="even gradeC">
                                                            <td>No data</td>
                                                            <td>No data</td>
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


                                <div id="tab3" class="tab-pane">
                                    <a href="<?= base_url('admin/penegakan/create')?>" type="button" class="btn btn-info"> Tambah Penegakan</a>
                                    <a href="#" type="button" class="btn btn-danger pull-right"> Export Pdf</a>
                                    <a href="#" type="button" class="btn btn-danger pull-right"> Export Excel</a>
                                    <div class="dataTable_wrapper" style="padding-top: 10px">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                 <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Peraturan Daerah</th>
                                                        <th>Jenis</th>
                                                        <th>Jumlah</th>
                                                        <th>Satuan</th>
                                                        <th>Keterangan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead> 
                                                <tbody>
                                                       <?php if (count($conf)): ?>
                                                        <?php $no=1; $total=0; foreach ($conf->result() as $list): { ?>
                                                    <tr>
                                                        <td><?php echo $no ?></td>
                                                        <td><?=$list->atur?></td>
                                                        <td><?=$list->jns?></td>
                                                        <td><?=$list->jumlah?></td>
                                                        <td><?=$list->satuan?></td>
                                                        <td></td>
                                                        <td>
                                                            <a href="<?= base_url('admin/penegakan/edit/'.$list->id) ?>" class="btn btn-info">edit</a>
                                                            <a href="<?= base_url('admin/penegakan/delete/'.$list->id) ?>" class="btn btn-danger">delete</a>
                                                        </td>
                                                        <?php $no++; } ?>
                                                    </tr>
                                                      <?php endforeach; ?>
                                                      <?php else: ?>
                                                   <tr class="even gradeC">
                                                        <td>No data</td>
                                                        <td>No data</td>
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
    </div>
</div>
</div>
</div>