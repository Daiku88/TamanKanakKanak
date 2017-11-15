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
             <span class="icon"><i class="icon-th"></i></span> 
            <h5><a class="btn btn-mini btn-success btn-tambah" href="<?= site_url('admin/pegawai/add');?>">Tambah Data</a></h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table" id="example">
              <thead>
                <tr>
                  <th style="width:10px">No.</th>
                  <th>NIP</th>
                  <th>NAMA</th>
                  <th>JABATAN</th>
                  <th>GOLONGAN</th>
                  <th>STATUS</th>
                  <th>PENDIDIKAN</th>
                  <th>WILAYAH</th>
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
                { "data": "nip" },
                { "data": "nama" },
                { "data": "jabatan" },
                { "data": "gol" },
                { "data": "stat" },
                { "data": "pend" },
                { "data": "wil" },
                { "data": "tombol" }
              ],
          "ajax": {
            "url": "<?= site_url('admin/pegawai/datatable'); ?>"
          }
      });

  });

  $(document).on('click','.btn-hapus',function(e){
    e.preventDefault();
    var href=$(this).attr('href');

    swal({
    title: "Anda Yakin?",
    text: "Sistem akan menghapus data pegawai ini!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Yakin, hapus pegawai!",
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