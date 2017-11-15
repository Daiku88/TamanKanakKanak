<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="index.html" title="Go to User" class="tip-bottom"><i class="icon-list"></i>Laporan Kelembagaan</a></div>
  </div>

  <?= get_message(); ?>
  
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box widget-box-header">
          <div class="widget-title">
             <span class="icon"><i class="icon-th"></i></span> 
            <h5>
              <a class="btn btn-mini btn-danger btn-export" href="<?= site_url('admin/laporan/kelembagaan/pdf');?>"><i class="fa fa-file-pdf-o"></i> Export PDF</a>
              <a class="btn btn-mini btn-success btn-export" href="<?= site_url('admin/laporan/kelembagaan/excel');?>"><i class="fa fa-file-excel-o"></i> Export Excel</a>
            </h5>
          </div>
          <div class="widget-content nopadding">
            <br />
<style type="text/css">
table.frm {
            width: 1000px;
            height: 20px;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: auto;
            border-width: 0px 0px 0px 0px;
            border-spacing: 0px;
            border-style: solid solid solid solid;
            border-color: gray gray gray gray;
            border-collapse: collapse;
            background-color: white;
        }
        table.frm th {
            width: 250px;
            border-width: 1px 1px 1px 1px;
            padding: 1px 1px 1px 1px;
            border-style: solid solid solid solid;
            border-collapse: collapse;
            border-color: gray gray gray gray;
            background-color: white;
            font-size: 16px;
            text-align: center;
      }
        table.frm td {
            border-width: 1px 1px 1px 1px;
            padding: 2px 2px 2px 2px;
            border-style: solid solid solid solid;
            border-collapse: collapse;
            border-color: gray gray gray gray;
            background-color: white;
            font-size: 12px;
        }

table.frm1 {
            width: 1000px;
            height: auto;
            margin-left: auto;
            margin-right: auto;
            background-color: white;
            font-size: 14px;
        }
        table.frm1 th {
            width: auto;
            padding: 1px 1px 1px 1px;
            background-color: white;
      }
        table.frm1 td {
            width: 250px;
            vertical-align: top;
            padding: 2px 2px 2px 2px;
            background-color: white;
        }

.judul_header{ width:100px; text-align: left; margin-bottom: 8px;margin-top: -10px}
.judul{ width:100%; text-align: center;}
.nofak{ width:100%; text-align: left; margin-left: 30px}
.kon_tabel{width:100%;}
.tabel_header{width: 100%;text-align: center;}

.fon{font-size: 14px}
.ttd_1{ width: 490px; border:1px solid #000; height:80px;margin-top:8px;}

</style>

<div class="kon_tabel">
    <div class="tab_tabel">
          <div style="margin-left:30px">
      <table class="frm">
              <tr>
              <th valign="middle">PROV/KOTA/KAB</th>
                <th valign="middle">BENTUK BADAN/DINAS</th>
                 <th valign="middle">NAMA</th>
                  <th valign="middle">JABATAN</th>
              </tr>
              <?php foreach($lembaga->result_array() as $data) { ?>
              <tr>
              <td align="left" style="width: 150px"><?php echo $data['wil'];?></td>
              <td style="width: 150px;border-collapse: collapse;" align="left"><?php echo $data['ins'];?></td>
              <td align="left"><?php echo $data['nama'];?><br>NIP. <?php echo $data['nip'];?></td>
              <td align="left"><?php echo $data['jab'];?></td>
              </tr>
              <?php } ?>
        </table>
        </div>
       
        </div>
        </div>
        <div style="padding-top: 50px;padding-left: 20px">
        <table class="frm1">
         <tr>
           <td align="center">
           </td>
           <td align="center">
           </td>
           <td align="center">
           </td>
            <td align="center">
            	Banda Aceh, <?php $tgl=date('d-m-Y'); echo $tgl;?>
            	<br><?php echo $ttd['jab']; ?>
            	<br><br><br><br><br><br><br>

            		<b><?php echo $ttd['nama']; ?> </b>
            		<br>----------------------------<br>
             		NIP. <?php echo $ttd['nip']; ?> 
             <br><br><br>

           </td>
         </tr>
       </table>
      </div>  


          </div>
        </div>
      </div>
    </div>
  </div>

</div>