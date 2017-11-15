<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="<?= site_url('admin')?>" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="<?= site_url('admin/pengeluaran_jenis')?>" title="Go to User" class="tip-bottom"><i class="icon-user"></i>Daftar Pengeluaran</a>
    </div>


  <?= get_message(); ?>
  
      <div class="container-fluid">
        <div class="row-fluid">
          <div class="span12">
            <div class="widget-box widget-box-header">
              
              <div class="widget-title">
                <ul class="nav nav-tabs">
                   <li><a data-toggle="tab2" href="<?= site_url('admin/pengeluaran_jenis/index')?>" title="Jenis Pengeluaran" class="tip-bottom">Jenis Pengeluaran</a></li>
                  <li class="active"><a data-toggle="tab3" href="<?= site_url('admin/pengeluaran/index')?>" title="Lokasi Pengeluaran" class="tip-bottom">Pengeluaran</a></li>
                </ul> 
              </div>
              <div id="tab1" class="tab-pane active">
                <div class="widget-title widget-title-active">
                 <span class="icon"><i class="icon-th"></i></span>

                <h5><a class="btn btn-mini btn-success btn-tambah" href="<?= site_url('admin/pengeluaran/add');?>">Tambah Pengeluaran</a></h5>
              </div>
                  <div class="widget-content nopadding">
                    <table class="table table-bordered data-table" id="example">
                      <thead>
                        <tr>
                          <th style="width:10px">No.</th>
                          <th>Jenis Pengeluaran</th>
                          <th>Tahun</th>
                          <th>Penanggung Jawab</th>
                          <th>Jumlah</th>
                          <th>Asal Dana</th>
                          <th>Keterangan</th>
                          <th>Tgl</th>
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
                { "data": "pend" },
                { "data": "jmlh" },
                { "data": "asal" },
                { "data": "ket" },
                { "data": "tgl" },
                { "data": "tombol" }
              ],
          "ajax": {
            "url": "<?= site_url('admin/pengeluaran/datatable'); ?>"
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