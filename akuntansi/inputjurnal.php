<?php  

    include_once "../fungsi/koneksi.php";

    if(isset($_POST['simpan'])) {
        //$no_jurnal = $_POST['no_jurnal'];
        $kode_akun = $_POST['kode_akun'];
        $no_ref = $_POST['no_ref'];
        $tanggal = date('Y-m-d');
        $keterangan = $_POST['keterangan'];
        $debet = $_POST['debet'];        
        $kredit = $_POST['kredit'];

        $query = mysqli_query($koneksi, "INSERT INTO jurnal (kode_akun,no_ref,tanggal,keterangan,debet,kredit) VALUES ('$kode_akun', '$no_ref', '$tanggal', '$keterangan','$debet','$kredit') ");        
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
                    <h3 class="text-center">Input Jurnal</h3>
                </div>
                <form method="post"  action="" class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group ">
                            <label for="no_referensi" class="col-sm-offset-1 col-sm-3 control-label">No. Referensi</label>
                            <div class="col-sm-4">
                                <select id="no_ref" required="isikan dulu" class="form-control" name="no_ref">
                                <option value="">--Pilih No. Referensi--</option>
                                <?php  
                                    include "../fungsi/koneksi.php";
                                    $queryJenis = mysqli_query($koneksi, "SELECT LPAD(id_permintaan,8,0) AS no_po, 'penjualan' AS deskripsi, sb.harga*p.jumlah AS jumlah 
                                        FROM permintaan p
                                        JOIN stokbarang sb ON sb.kode_brg=p.kode_brg
                                        WHERE p.status=1 AND p.id_permintaan NOT IN(SELECT no_ref FROM jurnal)
                                        UNION
                                        SELECT no_po,  'pembelian' AS deskripsi, SUM(sb.harga*op.jumlah) AS jumlah
                                        FROM 
                                        order_pembelian op
                                        JOIN stokbarang sb ON sb.kode_brg=op.kode_brg
                                        WHERE op.status=1 AND op.no_po NOT IN(SELECT no_ref FROM jurnal)
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
                            <label for="paswword"class="col-sm-offset-1 col-sm-3 control-label">Kode_akun</label>
                            <div class="col-sm-4">
                                <input required type="text" class="form-control" name="kode_akun" id="kode_akun" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="no_referensi" class="col-sm-offset-1 col-sm-3 control-label">Keterangan</label>
                            <div class="col-sm-4">
                                <input  required type="text"  class="form-control" name="keterangan">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="asmen" class="col-sm-offset-1 col-sm-3 control-label">Debet</label>
                            <div class="col-sm-4">
                                <input  required type="text"  class="form-control" name="debet" id="debet" readonly="readonly">
                            </div>
                        </div>   
                        <div class="form-group ">
                            <label for="asmen" class="col-sm-offset-1 col-sm-3 control-label">Kredit</label>
                            <div class="col-sm-4">
                                <input  required type="text"  class="form-control" name="kredit" id="kredit" readonly="readonly">
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
  $("#no_ref").change(function() { 
    //alert('x');
     var no_ref = document.getElementById("no_ref").value;
    $.ajax({
      type: "GET",
      dataType: "json",
      url: "http://localhost/inventori_xxi/cekpo.php?no_po="+no_ref+'',
      success: function(result) {        
        var deskripsi = result[0]['deskripsi'];
        var jumlah = result[0]['jumlah'];
        var kode_akun = result[0]['kode_akun'];
        document.getElementById("kode_akun").value=kode_akun;
        if(deskripsi=='penjualan'){
            document.getElementById("kredit").value=jumlah;
            document.getElementById("debet").value="0";
        }
        else{
            document.getElementById("debet").value=jumlah;  
            document.getElementById("kredit").value="0"; 
        }
        }
      
    });
  });
});
</script>


