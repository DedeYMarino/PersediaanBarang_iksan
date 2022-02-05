<?php  

    include_once "../fungsi/koneksi.php";

    if(isset($_POST['simpan'])) {
        //$no_jurnal = $_POST['no_jurnal'];
        $no_po = $_POST['no_po'];
        $nominal = $_POST['nominal'];
        $tanggal = date('Y-m-d');

        $query = mysqli_query($koneksi, "INSERT INTO pembayaran (no_po,nominal) VALUES ('$no_po', '$nominal') "); 
        $query2 = mysqli_query($koneksi, "INSERT INTO jurnal (kode_akun,no_ref,tanggal,keterangan,debet,kredit) VALUES ('500','$no_po','$tanggal','Pembelian', '$nominal','0') ");  
        $query3 = mysqli_query($koneksi, "INSERT INTO jurnal (kode_akun,no_ref,tanggal,keterangan,debet,kredit) VALUES ('111','$no_po','$tanggal','Kas','0','$nominal') ");        
        if ($query) {
            header("location:index.php?p=jurnal");
        } else {
            echo 'gagal : ' . mysqli_error($koneksi);
        }
    }


?>

<section class="content">
    <div class="row">
        <div class="col-sm-12 col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="text-center">Pembayaran</h3>
                </div>
                <form method="post"  action="" class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group ">
                            <label for="no_po" class="col-sm-offset-1 col-sm-3 control-label">No. PO</label>
                            <div class="col-sm-4">
                                <select id="no_po" required="isikan dulu" class="form-control" name="no_po">
                                <option value="">--Pilih No. PO--</option>
                                <?php  
                                    include "../fungsi/koneksi.php";
                                    $queryJenis = mysqli_query($koneksi, "
                                        SELECT no_po,  SUM(sb.harga*op.jumlah) AS jumlah
                                        FROM 
                                        order_pembelian op
                                        JOIN stokbarang sb ON sb.kode_brg=op.kode_brg
                                        WHERE op.status IN (0,1) AND op.no_po NOT IN(SELECT no_po FROM pembayaran)
                                        GROUP BY no_po");
                                    if (mysqli_num_rows($queryJenis)) {
                                        while($row=mysqli_fetch_assoc($queryJenis)):
                                    ?>                                        
                                        <option value="<?= $row['no_po']; ?>"><?= $row['no_po']; ?></option>
                                    <?php endwhile; } ?>                                      
                                </select>
                            </div>
                        </div>                        
                        <div class="form-group ">
                            <label for="asmen" class="col-sm-offset-1 col-sm-3 control-label">Nominal</label>
                            <div class="col-sm-4">
                                <input  required type="text"  class="form-control" name="nominal" id="nominal" readonly="readonly">
                            </div>
                        </div>  
                        <div class="form-group ">
                            <label for="asmen" class="col-sm-offset-1 col-sm-3 control-label">Bank</label>
                            <div class="col-sm-4">
                            <select id="bank" required="isikan dulu" class="form-control" name="bank">
                                <option value="">--Pilih BANK--</option>
                                <option value="MANDIRI">MANDIRI</option>
                                <option value="BNI">BNI</option>
                                <option value="BNI SYARIAH">BNI SYARIAH</option>
                                <option value="BRI">BRI</option>
                                <option value="BCA">BCA</option>
                            </select>
                            </div>
                        </div>                     
                                             
                        <div class="form-group">
                            <input type="submit" name="simpan" class="btn btn-primary col-sm-offset-4 " value="Simpan" > 
                            &nbsp;
                            <input type="reset" class="btn btn-danger" value="Batal">                                                                              
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
$(document).ready(function() {
  $("#no_po").change(function() { 
    //alert('x');
     var no_po = document.getElementById("no_po").value;
    $.ajax({
      type: "GET",
      dataType: "json",
      url: "http://localhost/inventori_xxi/cekpembayaran.php?no_po="+no_po+'',
      success: function(result) {      
        
        var jumlah = result[0]['jumlah'];
        document.getElementById("nominal").value=jumlah;
        
        }
      
    });
  });
});
</script>


