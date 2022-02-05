<?php 
  
  include "../fungsi/koneksi.php";
  include "../fungsi/fungsi.php";

  ob_start(); 
  $no_po  = isset($_GET['no_po']) ? $_GET['no_po'] : false;
    
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
    margin-left: 145px;
    
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
  <table>
  <tr>
      <th rowspan="3"><img src="../gambar/logo.png" style="width:100px;height:100px" /></th>
      <td align="center" style="width: 520px;"><font style="font-size: 18px"><b>PT. NUSANTARA SEJAHTERA RAYA </b></font>
      <br><br>Jl. KH. Wahid Hasyim 96.A, Jakarta 10340. Telp (021)31901188. Fax (021)31901144  www.21cineplex.com</td>
      
	  <!--<th rowspan="3"><img src="../gambar/logo.png" style="width:100px;height:80px" /></th>-->
    </tr>
  </table>
  <hr>
  <p align="center" style="font-weight: bold; font-size: 18px;"><u>PURCHASING ORDER</u></p>
  
  <div class="isi" style="margin: 0 auto;">
    <b>DATA SUPPLIER</b><br><br>
    <?php       
       $query = mysqli_query($koneksi, "SELECT sup.*, (SELECT MAX(tanggal) FROM order_pembelian op WHERE op.no_po='$no_po') AS tanggal
FROM  supplier sup WHERE kode_supplier IN (SELECT DISTINCT(kode_supplier) FROM order_pembelian WHERE no_po='$no_po')"); 
      while($datasup=mysqli_fetch_array($query))
      {
        $kode_supplier=$datasup['kode_supplier'];
        $nama_supplier=$datasup['nama_supplier'];
        $alamat=$datasup['alamat'];
        $no_telp=$datasup['no_telp'];
        $no_fax=$datasup['no_fax'];
        $email=$datasup['email'];
        $tanggal=$datasup['tanggal'];
      }
    ?>
    <table border="0" style="font-size: 12px;">
      <tr>
        <td width="20%">No. PO</td>
        <td width="30%"><?= $no_po ?></td>
        <td width="20%">Tanggal</td>
        <td><?=tanggal_indo($tanggal)?></td>
      </tr>
      <tr>
        <td>Kode Supplier</td>
        <td><?=$kode_supplier?></td>
        <td>No. Telp</td>
        <td><?=$no_telp;?></td>
      </tr>
      <tr>
        <td>Nama Supplier</td>
        <td><?=$nama_supplier;?></td>
        <td>No. Fax</td>
        <td><?=$no_fax?></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td><?=$alamat;?></td>
        <td>Email</td>
        <td><?=$email;?></td>
      </tr>
    </table>
    <b>DATA BARANG</b><br><br>
   <table border="1" cellpadding="0" cellspacing="0">
    <thead>
      <tr>
        <td style="text-align: center; "><b>No.</b></td>        
        <td style="text-align: center; "><b>Kode Barang</b></td>
        <td style="text-align: center; "><b>Nama Barang</b></td>
		    <td style="text-align: center; "><b>Harga</b></td> 
        <td style="text-align: center; "><b>Qty</b></td>   
        <td style="text-align: center; "><b>Jumlah</b></td>                                      
      </tr>
    </thead>
    <tbody>
      <?php       
       $query = mysqli_query($koneksi, "SELECT sp.no_po, sp.tanggal, 
sup.kode_supplier, sup.nama_supplier, sup.alamat, sup.no_telp, sup.email,
jb.jenis_brg, sb.kode_brg, sb.harga, sb.nama_brg, sb.harga, sp.jumlah, sb.harga*sp.jumlah AS total
FROM order_pembelian sp
INNER JOIN supplier sup ON sup.kode_supplier=sp.kode_supplier
INNER JOIN stokbarang sb ON sp.kode_brg  = sb.kode_brg
INNER JOIN jenis_barang jb ON jb.id_jenis=sb.id_jenis
WHERE sp.no_po='$no_po' "); 
      $total_harga   = 0;
      $i=1;
      while($data=mysqli_fetch_array($query))
      {
        $total_harga=$total_harga+$data['total'];
      ?>
      <tr>
        <td style="text-align: center;"><?php echo $i; ?></td>             
        <td style="text-align: center;"><?php echo $data['kode_brg']; ?></td>
        <td style="text-align: center;"><?php echo $data['nama_brg']; ?></td>
		<td style="text-align: center;"><?php echo number_format($data['harga']); ?></td>  
        <td style="text-align: center;"><?php echo $data['jumlah']; ?></td>    
        <td style="text-align: center;"><?php echo number_format($data['total']); ?></td>                        
      </tr>
    <?php
    $i++;
    }
    ?>
    <tr>
        <td style="text-align: center;" colspan="5">TOTAL</td> 
        <td style="text-align: center;"><?php echo number_format($total_harga); ?></td>                        
      </tr>
    </tbody>
  </table>
  
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
    $html2pdf->Output('bukti_permintaan_dan_pengeluaran_barang.pdf');
}
catch(HTML2PDF_exception $e) {
    echo $e;
    exit;
}
?>