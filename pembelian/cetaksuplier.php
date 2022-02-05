<?php ob_start(); ?>
<!-- Setting CSS bagian header/ kop -->
<style type="text/css">
  table.page_header {width: 1020px; border: none; background-color: #DDDDFF; border-bottom: solid 1mm #AAAADD; padding: 2mm }
  table.page_footer {width: 1020px; border: none; background-color: #DDDDFF; border-top: solid 1mm #AAAADD; padding: 2mm}
  h1 {color: #000033}
  h2 {color: #000055}
  h3 {color: #000077}
</style>
<!-- Setting Margin header/ kop -->
  <!-- Setting CSS Tabel data yang akan ditampilkan -->
  <style type="text/css">
  .tabel2 {
    border-collapse: collapse;
    margin-left: 0px;
    font-size: 10px;
  }
  .tabel2 th, .tabel2 td {
      padding: 5px 5px;
      border: 1px solid #000;
  }

    div.kanan {
     width:300px;
	 float:right;
     margin-left:210px;
     margin-top:-140px;
  }

  div.kiri {
	  width:300px;
	  float:left;
	  margin-left:30px;
	  display:inline;
  }
  
  </style>
  <table>
  <?php 
      include "../fungsi/koneksi.php";
      

   ?>

    <tr>
      <th rowspan="3"><img src="../gambar/logo.png" style="width:100px;height:100px" /></th>
      <td align="center" style="width: 520px;"><font style="font-size: 18px"><b>PT. NUSANTARA SEJAHTERA RAYA </b></font>
      <br><br>Jl. KH. Wahid Hasyim 96.A, Jakarta 10340. Telp (021)31901188. Fax (021)31901144  www.21cineplex.com</td>
      
	  <!--<th rowspan="3"><img src="../gambar/logo.png" style="width:100px;height:80px" /></th>-->
    </tr>
  </table>
  <hr>
  <p align="center" style="font-weight: bold; font-size: 18px;"><u>LAPORAN DATA SUPLIER</u></p>
  <table class="tabel2">
    <thead>
      <tr>
        <td style="text-align: center; "><b>No.</b></td>
        <td style="text-align: center; "><b>Kode Suplier</b></td>
        <td style="text-align: center; "><b>Nama Suplier</b></td>
		    <td style="text-align: center; "><b>Alamat</b></td>
        <td style="text-align: center; "><b>No. Telp</b></td>
        <td style="text-align: center; "><b>No. Fax</b></td>
        <td style="text-align: center; "><b>Email</b></td>        
      </tr>
    </thead>
    <tbody>
      <?php
           
      $sql = mysqli_query($koneksi, "SELECT * FROM supplier");  
      $i   = 1;
      while($data=mysqli_fetch_array($sql))
      {
      ?>
      <tr>
        <td style="text-align: center; width=15px;"><?php echo $i; ?></td>
        <td style="text-align: center; width=50px;"><?php echo $data['kode_supplier']; ?></td>
        <td style="text-align: center; width=150px;"><?php echo $data['nama_supplier']; ?></td>
		    <td style="text-align: center; width=150px;"><?php echo $data['alamat']; ?></td> 
        <td style="text-align: center; width=50px;"><?php echo $data['no_telp']; ?></td>
        <td style="text-align: center; width=50px;"><?php echo $data['no_fax']; ?></td>
        <td style="text-align: center; width=120px;"><?php echo $data['email']; ?></td>       
      </tr>
    <?php
    $i++;
    }
    ?>
    </tbody>
  </table>
  
 

<!-- Memanggil fungsi bawaan HTML2PDF -->
<?php
$content = ob_get_clean();
 include '../assets/html2pdf/html2pdf.class.php';
 try
{
    $html2pdf = new HTML2PDF('P', 'A4', 'en', false, 'UTF-8', array(10, 10, 4, 10));
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content);
    $html2pdf->Output('laporan_data_supplier.pdf');
}
catch(HTML2PDF_exception $e) {
    echo $e;
    exit;
}
?>