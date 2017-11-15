<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="index.html" title="Go to User" class="tip-bottom"><i class="icon-user"></i>Daftar Penduduk</a></div>
  </div>

  <?= get_message(); ?>

  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box widget-box-header">
          <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
            <h5>Detail Data Penduduk</h5>
          </div>
          <div class="widget-content nopadding">
            <div class="row-fluid">
              <form action="<?= site_url('admin/penduduk/save_penduduk'); ?>" method="POST" class="form-horizontal">
            <div class="span6">
                <div class="control-group">
                  <label class="control-label">NIK :</label>
                  <div class="controls">
                    <div class="textaja"><?= @$nik; ?></div>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">NAMA :</label>
                  <div class="controls">
                    <div class="textaja"><?= @$nama; ?></div>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Jenis Kelamin :</label>
                  <div class="controls">
                    <div class="textaja"><?= @$jk; ?></div>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Pekerjaan :</label>
                  <div class="controls">
                    <div class="textaja"><?= @$pekerjaan; ?></div>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Agama :</label>
                  <div class="controls">
                    <div class="textaja"><?= @$agama_id; ?></div>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">PENDIDIKAN :</label>
                  <div class="controls">
                    <div class="textaja"><?= @$pendidikan_id; ?></div>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Alamat :</label>
                  <div class="controls">
                    <div class="textaja"><?= @$alamat_ktp; ?></div>
                  </div>
                </div>
            </div>
            <div class="row-fluid">
            <div class="span6">
              <div class="control-group">
                  <label class="control-label">Status :</label>
                  <div class="controls">
                    <div class="textaja"><?= @$status; ?></div>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Hubungan :</label>
                  <div class="controls">
                    <div class="textaja"><?= @$hubungan; ?></div>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">No. KK :</label>
                  <div class="controls">
                    <div class="textaja"><?= @$no_kk; ?></div>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Kepala Keluarga :</label>
                  <div class="controls">
                    <div class="textaja"><?= @$kepala_kk; ?></div>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Blok :</label>
                  <div class="controls">
                    <div class="textaja">Blok <?= @$blok; ?> No. <?= @$no_rmh; ?></div>
                  </div>
                </div>
            </div>
            <div class="row-fluid">
            <div class="span12">
                <div class="form-actions">
                  <input type="hidden" name="id" value="<?= @$id; ?>" />
                  <a href="<?= site_url('admin/penduduk/add/'.@$id); ?>" class="btn btn-primary"><i class="fa fa-edit"></i> Edit</a>
                  <a href="<?= site_url('admin/penduduk/delete_penduduk/'.@$id); ?>" class="btn btn-danger btn-hapus"><i class="fa fa-trash"></i> Hapus</a>
                  <a href="<?= site_url('admin/penduduk'); ?>" class="btn btn-default"><i class="fa fa-undo"></i> Kembali Ke Daftar</a>
                </div>
            </div>
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
