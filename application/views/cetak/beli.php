<br />
<style type="text/css">
table.frm {
            width: 500px;
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
            font-size: 9px;
        }
        table.frm th {
            width: auto;
            border-width: 1px 1px 1px 1px;
            padding: 1px 1px 1px 1px;
            border-style: solid solid solid solid;
            border-collapse: collapse;
            border-color: gray gray gray gray;
            background-color: white;
      }
        table.frm td {
            border-width: 1px 1px 1px 1px;
            padding: 2px 2px 2px 2px;
            border-style: solid solid solid solid;
            border-collapse: collapse;
            border-color: gray gray gray gray;
            background-color: white;
        }
        table.frm th {
          font-size: 11px;
           text-align: center;
           vertical-align: middle;
        }

table.frm1 {
            width: 500px;
            height: auto;
            margin-left: auto;
            margin-right: auto;
            border-spacing: 0px;
            border-style: solid solid solid solid;
            border-color: gray gray gray gray;
            border-collapse: collapse;
            background-color: white;
            font-size: 14px;
        }
        table.frm1 th {
            width: auto;
            padding: 1px 1px 1px 1px;
            border-style: solid solid solid solid;
            border-collapse: collapse;
            border-color: gray gray gray gray;
            background-color: white;
      }
        table.frm1 td {
            width: 250px;
            vertical-align: top;
            padding: 2px 2px 2px 2px;
            border-style: solid solid solid solid;
            border-collapse: collapse;
            border-color: gray gray gray gray;
            background-color: white;
        }

.judul_header{ width:300px; text-align: left; margin-bottom: 8px;margin-top: -10px}
.judul{ width:100%; text-align: center;}
.nofak{ width:100%; text-align: left; margin-left: 30px}
.kon_tabel{width:100%; font-size: 9px;}
.tabel_header{width: 100%;text-align: center; font-size: 9px}

.fon{font-size: 14px}
.ttd_1{ width: 490px; border:1px solid #000; height:80px;margin-top:8px;}

</style>
<div class="judul_header">
<table style="padding-top: 50px; padding-left: 100px">
<tr>
<td>
  <b style="font-size:20px; ">CV RIZKI PRATAMA NUSA</b>
  <br />
  <b style="font-size: 16px">Distributor Dagang Umum</b>
  <br/>
  Jl. Yara No. 5-7 Telp/Fax. 0659-92428 Blangpidie ABDYA 
  </td>
  <td style="padding-left: 200px">Blang Pidie, <?php $tgl=date('d-m-Y'); echo $tgl;?>
    <br>
    Kepada Yth,<br>
    <?php echo $header['guds']; ?><br>
    di, <br>
    <?php echo $header['kecname']; ?>
  </td>
  </tr>
  </table>
</div>

<br/>
<div class="judul">
  <h1>FAKTUR <?php echo $header['pname']; ?></h1>
</div>
<div class="nofak">
  Faktur : <?php echo $header['nofaktur']; ?> <?php echo $header['kodetrans']; ?>
</div>
<br>
<div class="kon_tabel">
    <div class="tab_tabel">
          <div style="margin-left:10px">
      <table style="font-size: 9px;" class="frm">
              <tr>
              <th rowspan="2" valign="middle">KODE</th>
                <th rowspan="2" valign="middle">NAMA PRODUK</th>
                 <th colspan="4" valign="middle">JUMLAH BARANG</th>
                  <th colspan="4" valign="middle">HARGA + PPN</th>
                  <th colspan="4" valign="middle">HARGA - PPN</th>
                  <th rowspan="2" valign="middle">DISC</th>
                  <th colspan="4" valign="middle">
                  JUMLAH HARGA<br>
                  SEBELUM PPN</th>
              </tr>
              <tr>
                 <th>Oum 1</th>
                 <th>Oum 2</th>
                 <th>Oum 3</th>
                 <th>Oum 4</th>
                 <th>Oum 1</th>
                 <th>Oum 2</th>
                 <th>Oum 3</th>
                 <th>Oum 4</th>
                 <th>Oum 1</th>
                 <th>Oum 2</th>
                 <th>Oum 3</th>
                 <th>Oum 4</th>
                 <th>Oum 1</th>
                 <th>Oum 2</th>
                 <th>Oum 3</th>
                 <th>Oum 4</th>
              </tr>
              <?php foreach($jual->result_array() as $data) { ?>
              <tr>
              <td align="center"><?php echo $data['code'];?></td>
              <td style="width: 150px;border-collapse: collapse;" align="left"><?php echo $data['iname'];?></td>
              <td align="center"><?php echo $data['qty1'];?></td>
               <td align="center"><?php echo $data['qty2'];?></td>
              <td align="center"><?php echo $data['qty3'];?></td>
              <td align="center"><?php echo $data['qty4'];?></td>
               <td align="right"><?php echo number_format($data['h1']);?></td>
              <td align="right"><?php echo number_format($data['h2']);?></td>
              <td align="right"><?php echo number_format($data['h3']);?></td>
              <td align="right"><?php echo number_format($data['h4']);?></td>
              <td align="right"><?php echo number_format($data['h1']);?></td>
              <td align="right"><?php echo number_format($data['h2']);?></td>
              <td align="right"><?php echo number_format($data['h3']);?></td>
              <td align="right"><?php echo number_format($data['h4']);?></td>
               <td>disc</td>
               <?php 
               $total1=$data['qty1']*$data['h1'];
               $total2=$data['qty2']*$data['h2'];
               $total3=$data['qty3']*$data['h3'];
               $total4=$data['qty4']*$data['h4'];
               ?>
               <td align="right"><?php echo number_format($total1) ?></td>
               <td align="right"><?php echo number_format($total2) ?></td>
               <td align="right"><?php echo number_format($total3) ?></td>
               <td align="right"><?php echo number_format($total4) ?></td>
              </tr>
              <?php } ?>
              <tr>
                <td style="border-style: none solid none none;" colspan="15" align="right"><b>SUB TOTAL</b></td>
                <td align="right"><b><?php echo number_format($header['grand1']); ?></b></td>
                <td align="right"><b><?php echo number_format($header['grand2']); ?></b></td>
                <td align="right"><b><?php echo number_format($header['grand3']); ?></b></td>
                <td align="right"><b><?php echo number_format($header['grand4']); ?></b></td>
              </tr>
              <tr>
              <td style="border-style: none solid none none;font-size: 12px">Note:</td>
              <?php
              $a=$header['grand1']+$header['grand2']+$header['grand3']+$header['grand4'];
              $ppn=$a/'10%';
              $nilais=$a+$ppn;
              $bulat=ceil($nilais);
              if (substr($nilais,-3)>499){
                                $total_harga=round($nilais,-3);
                            } else {
                                $total_harga=round($nilais,-3)+1000;
                            } 
              ?>
              <td colspan="3" style="font-size: 12px;border-style: solid solid solid solid">Barang yang telah di order akan kami kirim apabila Faktur ini telah Lunas</td>
              <td style="border-style: none solid none none;" colspan="13" align="right"><b>Total - PPN</b></td>
            <td colspan="2" align="right"><?php echo number_format($a) ?></td>
          </tr>
            <tr>
            <td style="border-style: none solid none none;" colspan="17" align="right"><b>Disc - 1</b></td>
            <td colspan="2" align="right"></td>
          </tr>
            <tr>
            <td style="border-style: none solid none none;" colspan="17" align="right"><b>JUMLAH</b></td>
            <td colspan="2" align="right"><?php echo number_format($a) ?></td>
          </tr>
           <tr>
           <td style="border-style: none none none none;"></td>
            <td style="border-style: none none none none;font-size: 12px"><b>Tanggal Jatuh Tempo :</b></td>
            <td style="border-style: none solid none none;" colspan="13" align="right"><b>+ PPN 10%</b></td>
            <td colspan="2" align="right"><?php echo number_format($ppn) ?></td>
          </tr>
          <tr>
            <td style="border-style: none solid none none;" colspan="15" align="right"><b>NILAI FAKTUR</b></td>
            <td colspan="4" align="right" style="font-size: 14px">Rp. <?php echo number_format($nilais) ?></td>
          </tr>
           <tr>
            <td style="border-style: none solid none none;" colspan="15" align="right"><b>NILAI FAKTUR SETELAH DIBULATKAN</b></td>
            <td colspan="4" align="right" style="font-size: 14px">Rp. <?php echo number_format($total_harga) ?></td>
          </tr>
        </table>
        </div>
       
        </div>
        </div>
        <div style="padding-top: 50px;padding-left: 50px">
        <table class="frm1">
         <tr>
           <td align="center">
             Barang di terima <br>
             dalam keadaan baik dan lengkap
             <br><br><br>
             ...............
           </td>
           <td align="center">
             KEPALA GUDANG
             <br><br><br>
             ...............<br>
             HP. ...............
           </td>
           <td align="center">
             DELIVERY
             <br><br><br>
             ...............<br>
             Hp. ...............
           </td>
            <td align="center">
             SALESMAN
             <br><br><br>
             ...............<br>
             Hp. ...............
           </td>
         </tr>
       </table>
      </div>  