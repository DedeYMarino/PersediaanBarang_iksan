<?php 
  
  include "../fungsi/koneksi.php";
  include "../fungsi/fungsi.php";

  ob_start(); 
  $id  = isset($_GET['id']) ? $_GET['id'] : false;


  $unit = $_GET['unit'];
  $tgl= $_GET['tgl'];
  $no_order= $_GET['no_order'];
    
?>
<!-- Setting CSS bagian header/ kop -->
<style type="text/css">
  table.page_header {width: 1020px; border: none; background-color: #DDDDFF; border-bottom: solid 1mm #AAAADD; padding: 2mm }
  table.page_footer {width: 1020px; border: none; background-color: #DDDDFF; border-top: solid 1mm #AAAADD; padding: 2mm}
  
 
</style>
<!-- Setting Margin header/ kop -->
  <!-- Setting CSS Tabel data yang akan ditampilkan -->
  <style type="text/css">
  .tabel2 {
    border-collapse: collapse;
    margin-left: 75px;
    
  }
  .tabel2 th, .tabel2 td {
      padding: 5px 5px;
      border: 1px solid #000;

  }

   table.isi {
    margin: 0 170px;

  }

  .isi td {
    padding: 15px 15px;
  }

  div.kanan {
     position: absolute;
     bottom: 100px;
     right: 50px;
     
  }

  div.tengah {
     position: absolute;
     bottom: 100px;
     right: 330px;
     
  }

  div.kiri {
     position: absolute;
     bottom: 100px;
     left: 10px;     
  }

  </style>
  <?php
       $query = mysqli_query($koneksi, "SELECT permintaan.keterangan, permintaan.kode_brg, unit, jumlah, 
                                        STATUS, tgl_permintaan,
                                        bioskop.nama_bioskop, bioskop.alamat 
                                        FROM permintaan
                                        JOIN `user` ON `user`.username=permintaan.unit
                                        JOIN bioskop ON bioskop.kode_bioskop=`user`.id_bioskop  
                                        WHERE unit='$unit' AND STATUS=1 AND tgl_permintaan='$tgl' AND permintaan.no_order='$no_order' "); 
      $i   = 1;
      while($rows=mysqli_fetch_array($query))
      {
          $nama_bioskop=$rows['nama_bioskop'];
          $alamat=$rows['alamat'];
      }
      ?>
  <table>
  <tr>
      <th rowspan="3"><img src="../gambar/logo.png" style="width:100px;height:100px" /></th>
      <td align="center" style="width: 520px;"><font style="font-size: 18px"><b>PT. NUSANTARA SEJAHTERA RAYA </b></font>
      <br><br>Jl. KH. Wahid Hasyim 96.A, Jakarta 10340. Telp (021)31901188. Fax (021)31901144  www.21cineplex.com</td>
      
	  <!--<th rowspan="3"><img src="../gambar/logo.png" style="width:100px;height:80px" /></th>-->
    </tr>
  </table>
  <hr>
  <p align="center" style="font-weight: bold; font-size: 18px;"><u>TANDA TERIMA BARANG</u></p>
  <br><br>
  <h4 style="color: black; text-align: center;">Pengeluaran Permintaan Barang dari :</h4>
  <p align="center" style="font-weight: bold; font-size: 12px;">Bioskop : <?=$nama_bioskop;?> Alamat : <?=$alamat;?></p>
  <div class="isi" style="margin: 0 auto;">
   <table class="tabel2">
    <thead>
      <tr>
        <td style="text-align: center; "><b>No.</b></td>  
        <td style="text-align: center; "><b>No. Order</b></td>      
        <td style="text-align: center; "><b>Kode Barang</b></td>
        <td style="text-align: center; "><b>Nama Barang</b></td>
		    <td style="text-align: center; "><b>Satuan</b></td>
        <td style="text-align: center; "><b>Keterangan</b></td> 
        <td style="text-align: center; "><b>Jumlah</b></td>                                        
      </tr>
    </thead>
    <tbody>
      <?php
       $query = mysqli_query($koneksi, "SELECT permintaan.keterangan, permintaan.kode_brg, permintaan.no_order, unit, nama_brg, jumlah, satuan, 
                                        STATUS, tgl_permintaan,
                                        bioskop.nama_bioskop, bioskop.alamat 
                                        FROM permintaan 
                                        INNER JOIN stokbarang ON permintaan.kode_brg = stokbarang.kode_brg
                                        JOIN `user` ON `user`.username=permintaan.unit
                                        JOIN bioskop ON bioskop.kode_bioskop=`user`.id_bioskop  
                                        WHERE unit='$unit' AND STATUS=1 AND tgl_permintaan='$tgl' AND permintaan.no_order='$no_order' "); 
      $i   = 1;
      while($data=mysqli_fetch_array($query))
      {
      ?>
      <tr>
        <td style="text-align: center;"><?php echo $i; ?></td>       
        <td style="text-align: center;"><?php echo $data['no_order']; ?></td>      
        <td style="text-align: center;"><?php echo $data['kode_brg']; ?></td>
        <td style="text-align: center;"><?php echo $data['nama_brg']; ?></td>
		    <td style="text-align: center;"><?php echo $data['satuan']; ?></td>
        <td style="text-align: center;"><?php echo $data['keterangan']; ?></td>  
        <td style="text-align: center;"><?php echo $data['jumlah']; ?></td>                            
      </tr>
    <?php
    $i++;
    }
    ?>
    </tbody>
  </table>
  <?php 

  $query2 = mysqli_query($koneksi, "SELECT permintaan.* FROM permintaan WHERE unit='$unit' AND  status=1 AND tgl_permintaan='$tgl' ");  
  $data2 = mysqli_fetch_assoc($query2);

  ?>

<p style="margin-left:75px;">Pada hari ini tanggal : <b> <?=  tanggal_indo($tgl); ?></b> telah dikeluarkan Surat Tanda Terima Barang.</p>
  <p></p>
  </div>
 
  <?php 

      $query2 = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$unit' ");
      if ($query2){                
        $data = mysqli_fetch_assoc($query2);

      } else {
        echo 'gagal';
      }
   ?>

  <div class="kiri">
      <p>Diminta Oleh :<br> </p>
      <br>
      <br>
      <br>
      <b><p><u><?= $data['receiving'] ?></u></p></b>
  </div>

  <div class="tengah">
      <p>Disetujui Oleh :<br>Manajer Bioskop </p>
      <br>
      <br>
      <br>
      <b><p><u><?= $data['manajer'] ?></u></p></b>
  </div>

  <div class="kanan">
      <p>Dikeluarkan Oleh :<br> </p>
      <br>
      <br>
      <br>
      <b><p><u>Receiving</u></p></b>
  </div>

<!-- Memanggil fungsi bawaan HTML2PDF -->
<?php
$content = ob_get_clean();
 include '../assets/html2pdf/html2pdf.class.php';
 try
{
    $html2pdf = new HTML2PDF('P', 'A4', 'en', false, 'UTF-8', array(10, 10, 4, 10));
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content);
    $html2pdf->Output('tandaterima.pdf');
}
catch(HTML2PDF_exception $e) {
    echo $e;
    exit;
}
?>