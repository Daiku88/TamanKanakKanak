<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="index.html" title="Go to User" class="tip-bottom"><i class="icon-user"></i>Daftar Pengurus</a></div>
  </div>

  <?= get_message(); ?>

  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box widget-box-header">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Detail Data Pengurus</h5>
          </div>
          <div class="widget-content nopadding">
            <div class="row-fluid">
            <div class="span12">
              <form action="<?= site_url('admin/pengurus/save'); ?>" method="POST" class="form-horizontal">
                <div class="control-group">
                  <label class="control-label">NAMA :</label>
                  <div class="controls">
                    <div class="textaja"><?= @$nama; ?></div>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">JABATAN :</label>
                  <div class="controls">
                    <div class="textaja"><?= @$jab; ?></div>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">ALAMAT :</label>
                  <div class="controls">
                    <div class="textaja">Blok <?= @$blokk; ?> No.<?= @$nom; ?></div>
                  </div>
                </div>
                <div class="form-actions">
                  <input type="hidden" name="id" value="<?= @$id; ?>" />
                  <a href="<?= site_url('admin/pengurus/add/'.@$id); ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                  <a href="<?= site_url('admin/pengurus/delete/'.@$id); ?>" class="btn btn-danger btn-hapus"><i class="fa fa-trash"></i> Hapus</a>
                  <a href="<?= site_url('admin/pengurus'); ?>" class="btn btn-default"><i class="fa fa-undo"></i> Kembali Ke Daftar</a>
                </div>
              </form>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

<script type="text/javascript">
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
