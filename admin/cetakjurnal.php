<?php ob_start(); 
//$query = mysqli_query($koneksi, "SELECT * FROM jurnal");
include('../fungsi/fungsi.php');
?>
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
  <p align="center" style="font-weight: bold; font-size: 18px;"><u>JURNAL</u></p>
  <table class="tabel2">
    <thead>
      <tr>
        <th  align="center">Tanggal</th>
        <th  align="center">No. Jurnal</th>                                     
        <th  align="center">No. Ref</th>
        <th  align="center">Prakiraan</th> 
        <th  align="center">Kode Akun</th>                                   
        <th  align="center">Debet</th>
        <th  align="center">Kredit</th>       
      </tr>
    </thead>
    <tbody>
      <?php
           
      $sql = mysqli_query($koneksi, " SELECT * FROM jurnal");  
      $i   = 1;
      $totalkredit=0;
      $totaldebet=0;
      $temp="";
      while($data=mysqli_fetch_array($sql))
      {
         $totalkredit=$totalkredit+$data['kredit'];
         $totaldebet=$totaldebet+$data['debet'];

      ?>
      <tr>
        <!-- <td style="text-align: center; width=15px;"><?php echo $i; ?></td> -->
        <?php if($temp!=$data['no_ref']){ ?> 
        <td style="text-align: center; width=80px;" rowspan="2"><?php echo tanggal_indo($data['tanggal']); ?></td> <?php } ?>
        <td style="text-align: center; width=120px;"><?php echo $data['no_jurnal']; ?></td> 
        <?php if($temp!=$data['no_ref']){ ?> 
        <td style="text-align: center; width=70px;" rowspan="2"><?php echo $data['no_ref']; ?></td> <?php }?>
        <td style="text-align: left; width=70px;"><?php echo $data['keterangan']; ?></td>
        <td style="text-align: center; width=70px;"><?php echo $data['kode_akun']; ?></td>
        <td style="text-align: right; width=70px;"><?php echo number_format($data['debet']); ?></td>
        <td style="text-align: right; width=70px;"><?php echo number_format($data['kredit']); ?></td>
      </tr>
    <?php
    $i++;
    $temp=$data['no_ref'];
    }
    ?>
    <tr>
        <!-- <td style="text-align: center; width=15px;"><?php echo $i; ?></td> -->
        <td style="text-align: center; width=80px;" colspan="5">TOTAL</td>
        
        <td style="text-align: right; width=70px;"><?php echo number_format($totaldebet); ?></td>
        <td style="text-align: right; width=70px;"><?php echo number_format($totalkredit); ?></td> 
      </tr>
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
    $html2pdf->Output('laporan_jurnal.pdf');
}
catch(HTML2PDF_exception $e) {
    echo $e;
    exit;
}
?>