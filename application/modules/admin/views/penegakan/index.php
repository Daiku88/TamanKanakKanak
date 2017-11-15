<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="index.html" title="Go to User" class="tip-bottom"><i class="icon-user"></i>Daftar pegawai</a></div>
  </div>

  <?= get_message(); ?>
  
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box widget-box-header">
          <div class="widget-title">
            
          </div>
          <div class="widget-box">
                            <div class="widget-title">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#tab1">PENEGAKAN</a></li>
                                    <li><a data-toggle="tab" href="#tab2">ATURAN</a></li>
                                    <li><a data-toggle="tab" href="#tab3">JENIS</a></li>
                                </ul>
                            </div>
                             <div class="widget-content tab-content">
                                <div id="tab1" class="tab-pane active">
                                   <span class="icon"><i class="icon-th"></i></span> 
                                        <h5><a class="btn btn-mini btn-success btn-tambah" href="<?= site_url('admin/penegakan/add_penegakan');?>">Tambah Data</a></h5>
                                  <table class="table table-bordered data-table" id="example">
                                    <thead>
                                      <tr>
                                        <th style="width:10px">No.</th>
                                        <th>JENIS</th>
                                        <th>JUMLAH</th>
                                        <th style="width:80px"></th>
                                      </tr>
                                    </thead>
                                  </table>
                                  <script>
                                      $(document).ready(function() {
                                          $('#example').DataTable( {
                                              "bJQueryUI": true,
                                              "sPaginationType": "full_numbers",
                                              "sDom": '<""l>t<"F"fp>',
                                              "pageLength": 25,
                                              "processing": true,
                                              "serverSide": true,
                                              "columns": [
                                                    { "data": "baris" },
                                                    { "data": "jenis" },
                                                    { "data": "jmlh" },
                                                    { "data": "tombol" }
                                                  ],
                                              "ajax": {
                                                "url": "<?= site_url('admin/penegakan/datatable'); ?>"
                                              }
                                          });

                                      });

                                      $(document).on('click','.btn-hapus',function(e){
                                        e.preventDefault();
                                        var href=$(this).attr('href');

                                        swal({
                                        title: "Anda Yakin?",
                                        text: "Sistem akan menghapus data aturan ini!",
                                        type: "warning",
                                        showCancelButton: true,
                                        confirmButtonColor: "#DD6B55",
                                        confirmButtonText: "Yakin, hapus aturan!",
                                        cancelButtonText: "Tidak, batalkan!",
                                        closeOnConfirm: false,
                                        closeOnCancel: true
                                        },
                                        function(isConfirm){
                                          if (isConfirm) {
                                            window.location.href=href;
                                          }
                                        }); 
                                      });
                                    </script>
                                </div>
                                <div id="tab2" class="tab-pane">
                                       <span class="icon"><i class="icon-th"></i></span> 
                                        <h5><a class="btn btn-mini btn-success btn-tambah" href="<?= site_url('admin/penegakan/add_aturan');?>">Tambah Data</a></h5>
                                 <table class="table table-bordered data-table" id="example2">
                                    <thead>
                                      <tr>
                                        <th style="width:10px">No.</th>
                                        <th>WILAYAH</th>
                                        <th>ATURAN</th>
                                        <th style="width:80px"></th>
                                      </tr>
                                    </thead>
                                  </table>
                                  <script>
                                    $(document).ready(function() {
                                        $('#example2').DataTable( {
                                            "bJQueryUI": true,
                                            "sPaginationType": "full_numbers",
                                            "sDom": '<""l>t<"F"fp>',
                                            "pageLength": 25,
                                            "processing": true,
                                            "serverSide": true,
                                            "columns": [
                                                  { "data": "baris" },
                                                  { "data": "wil" },
                                                  { "data": "atur" },
                                                  { "data": "tombol2" }
                                                ],
                                            "ajax": {
                                              "url": "<?= site_url('admin/penegakan/datatable_aturan'); ?>"
                                            }
                                        });

                                    });

                                    $(document).on('click','.btn-hapus',function(e){
                                      e.preventDefault();
                                      var href=$(this).attr('href');

                                      swal({
                                      title: "Anda Yakin?",
                                      text: "Sistem akan menghapus data aturan ini!",
                                      type: "warning",
                                      showCancelButton: true,
                                      confirmButtonColor: "#DD6B55",
                                      confirmButtonText: "Yakin, hapus aturan!",
                                      cancelButtonText: "Tidak, batalkan!",
                                      closeOnConfirm: false,
                                      closeOnCancel: true
                                      },
                                      function(isConfirm){
                                        if (isConfirm) {
                                          window.location.href=href;
                                        }
                                      }); 
                                    });
                                  </script>
                                
                                </div>
                                <div id="tab3" class="tab-pane">
                                       <span class="icon"><i class="icon-th"></i></span> 
                                        <h5><a class="btn btn-mini btn-success btn-tambah" href="<?= site_url('admin/penegakan/add_jenis');?>">Tambah Data</a></h5>
                                  <table class="table table-bordered data-table" id="example3">
                                    <thead>
                                      <tr>
                                        <th style="width:10px">No.</th>
                                        <th>ATURAN</th>
                                        <th>JENIS</th>
                                        <th>SATUAN</th>
                                        <th>INSTANSI TERKAIT</th>
                                        <th style="width:80px"></th>
                                      </tr>
                                    </thead>
                                  </table>
                                    <script>
                                    $(document).ready(function() {
                                        $('#example3').DataTable( {
                                            "bJQueryUI": true,
                                            "sPaginationType": "full_numbers",
                                            "sDom": '<""l>t<"F"fp>',
                                            "pageLength": 25,
                                            "processing": true,
                                            "serverSide": true,
                                            "columns": [
                                                  { "data": "baris" },
                                                  { "data": "aturan" },
                                                  { "data": "jenis" },
                                                  { "data": "satuan" },
                                                  { "data": "instansi" },
                                                  { "data": "tombol2" }
                                                ],
                                            "ajax": {
                                              "url": "<?= site_url('admin/penegakan/datatable_jenis'); ?>"
                                            }
                                        });

                                    });

                                    $(document).on('click','.btn-hapus',function(e){
                                      e.preventDefault();
                                      var href=$(this).attr('href');

                                      swal({
                                      title: "Anda Yakin?",
                                      text: "Sistem akan menghapus data aturan ini!",
                                      type: "warning",
                                      showCancelButton: true,
                                      confirmButtonColor: "#DD6B55",
                                      confirmButtonText: "Yakin, hapus aturan!",
                                      cancelButtonText: "Tidak, batalkan!",
                                      closeOnConfirm: false,
                                      closeOnCancel: true
                                      },
                                      function(isConfirm){
                                        if (isConfirm) {
                                          window.location.href=href;
                                        }
                                      }); 
                                    });
                                  </script>
                                </div>
                            </div>                            
                        </div>
          <div class="widget-content nopadding">
            
          </div>
        </div>
      </div>
    </div>
  </div>

</div>





