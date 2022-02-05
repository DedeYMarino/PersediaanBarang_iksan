<?php ob_start();
	include "../fungsi/fungsi.php";

 ?>
<!-- Setting CSS bagian header/ kop -->
<style type="text/css">
  table.page_header {width: 1020px; border: none; background-color: #3C8DBC; color: #fff; border-bottom: solid 1mm #AAAADD; padding: 2mm }
  table.page_footer {width: 1020px; border: none; background-color: #3C8DBC; border-top: solid 1mm #AAAADD; padding: 2mm}
  h1 {color: #000033}
  h2 {color: #000055}
  h3 {color: #000077}
</style>
<!-- Setting Margin header/ kop -->
  <!-- Setting CSS Tabel data yang akan ditampilkan -->
  <style type="text/css">
  .tabel2 {
    border-collapse: collapse;
    margin-left: 20px;    
  }
  .tabel2 th, .tabel2 td {
      padding: 5px 5px;
      border: 1px solid #959595;
  }

   div.kanan {
     width:300px;
	 float:right;
     margin-left:250px;
     margin-top:-140px;
  }

  div.kiri {
	  width:300px;
	  float:left;
	  margin-left:20px;
	  display:inline;
  }
  
  </style>
  <table>
  <tr>
      <th rowspan="3"><img src="../gambar/logo.png" style="width:100px;height:100px" /></th>
      <td align="center" style="width: 520px;"><font style="font-size: 18px"><b>PT. NUSANTARA SEJAHTERA RAYA </b></font>
      <br><br>Jl. KH. Wahid Hasyim 96.A, Jakarta 10340. Telp (021)31901188. Fax (021)31901144  www.21cineplex.com</td>
      
	  <!--<th rowspan="3"><img src="../gambar/logo.png" style="width:100px;height:80px" /></th>-->
    </tr>
  </table>
  <hr>
  <p align="center" style="font-weight: bold; font-size: 18px;"><u>LAPORAN PEMASUKAN BARANG</u></p>
  <table class="tabel2">
    <thead>
      <tr>
        <td style="text-align: center; "><b>No.</b></td>
		    <td style="text-align: center; "><b>Tanggal Pembelian</b></td>
        <td style="text-align: center; "><b>Suplier</b></td>
        <td style="text-align: center; "><b>No. PO</b></td>
        <td style="text-align: center; "><b>Nama Barang</b></td>
        <td style="text-align: center; "><b>Jumlah</b></td>
      </tr>
    </thead>
    <tbody>
      <?php

       include "../fungsi/koneksi.php";
       $query = mysqli_query($koneksi, "SELECT op.tanggal, op.no_po, s.nama_supplier, sb.kode_brg, sb.nama_brg, sb.satuan, op.jumlah, op.status
                                        FROM order_pembelian op 
                                        INNER JOIN stokbarang sb ON op.kode_brg = sb.kode_brg 
                                        INNER JOIN supplier s ON s.kode_supplier = op.kode_supplier
                                        WHERE op.status=1
                                        ORDER BY tanggal DESC"); 
      $i   = 1;
      while($data=mysqli_fetch_array($query))
      {
      ?>
      <tr>
        <td style="text-align: center; width=15px;"><?php echo $i; ?></td>
		<td style="text-align: center; width=70px;"><?php echo tanggal_indo($data['tanggal']); ?></td>
        <td style="text-align: center; width=70px;"><?php echo $data['nama_supplier']; ?></td>        
        <td style="text-align: center; width=120px;"><?php echo $data['no_po']; ?></td>
        <td style="text-align: center; width=120px;"><?php echo $data['nama_brg']; ?></td>
        <td style="text-align: center; width=50px;"><?php echo $data['jumlah']; ?></td>                   
      </tr>
    <?php
    $i++;
    }
    ?>
    </tbody>
  </table>
  
  <!-- <div class="kiri">
      <p>Mengetahui :<br>Manajer Pengadaan</p>
      <br>
      <br>
      <br>
      <p><b><u>M. Azharuddin, S.T</u><br>NIK : 197810170371</b></p>
  </div>

  <div class="kanan">
      <p>Mengetahui :<br>Asisten Manajer Gudang </p>
      <br>
      <br>
      <br>
      <p><b><u>Irwan Saputra, A.Md</u><br>NIK : 198108300482</b></p>
  </div> -->

<!-- Memanggil fungsi bawaan HTML2PDF -->
<?php
$content = ob_get_clean();
 include '../assets/html2pdf/html2pdf.class.php';
 try
{
    $html2pdf = new HTML2PDF('P', 'A4', 'en', false, 'UTF-8', array(10, 10, 4, 10));
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content);
    $html2pdf->Output('laporan_pengeluaran_barang.pdf');
}
catch(HTML2PDF_exception $e) {
    echo $e;
    exit;
}
?>