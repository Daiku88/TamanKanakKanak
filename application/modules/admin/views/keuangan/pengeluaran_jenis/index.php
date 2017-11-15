<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?= site_url('admin')?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="<?= site_url('admin/pengeluaran_jenis')?>" title="Go to User" class="tip-bottom"><i class="icon-user"></i>Daftar pengeluaran</a>
    </div>


  <?= get_message(); ?>
  
      <div class="container-fluid">
        <div class="row-fluid">
          <div class="span12">
            <div class="widget-box widget-box-header">
              
              <div class="widget-title">
                <ul class="nav nav-tabs">
                   <li class="active"><a data-toggle="tab2" href="<?= site_url('admin/pengeluaran_jenis/index')?>" title="Jenis Pengeluaran" class="tip-bottom">Jenis Pengeluaran</a></li>
                  <li><a data-toggle="tab3" href="<?= site_url('admin/pengeluaran/index')?>" title="Lokasi Pengeluaran" class="tip-bottom">Pengeluaran</a></li>
                </ul> 
              </div>
              <div id="tab1" class="tab-pane active">
                <div class="widget-title widget-title-active">
                 <span class="icon"><i class="icon-th"></i></span>

                <h5><a class="btn btn-mini btn-success btn-tambah" href="<?= site_url('admin/pengeluaran_jenis/add');?>">Tambah Jenis Pengeluaran</a></h5>
              </div>
                  <div class="widget-content nopadding">
                    <table class="table table-bordered data-table" id="example">
                      <thead>
                        <tr>
                          <th style="width:10px">No.</th>
                          <th>Tahun</th>
                          <th>Jenis</th>
                          <th>Jumlah Pengeluaran</th>
                          <th>Dana Total</th>
                          <th style="width:80px"></th>
                        </tr>
                      </thead>
                    </table>
                  </div> 
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
</div>


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
                { "data": "tahun" },
                { "data": "jmlh",
                     "render": function(data, type, row, meta){
                    if(type === 'display'){
                          data = '<a href="<?= site_url('admin/pengeluaran_jenis/detail_pengeluaran/');?>' + row.id + '">' + data + ' Pengeluaran </a>';
                      }
                      return data;
                      }
                },
                { "data": "dana" },
                { "data": "tombol" }
              ],
          "ajax": {
            "url": "<?= site_url('admin/pengeluaran_jenis/datatable'); ?>"
          }
      });

  });

  $(document).on('click','.btn-hapus',function(e){
    e.preventDefault();
    var href=$(this).attr('href');

    swal({
    title: "Anda Yakin?",
    text: "Sistem akan menghapus data ini!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Yakin, hapus saja!",
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