<?php  

    include_once "../fungsi/koneksi.php";

    if(isset($_POST['simpan'])) {
        $kode_bioskop = $_POST['kode_bioskop'];
        $nama_bioskop = $_POST['nama_bioskop'];
        $mgr = $_POST['mgr'];
        $alamat = $_POST['alamat'];
        $no_telp = $_POST['no_telp'];
        $no_fax = $_POST['no_fax'];
        $email = $_POST['email'];
        

        $query = mysqli_query($koneksi, "INSERT INTO bioskop VALUES ('$kode_bioskop', '$nama_bioskop', '$mgr', '$alamat','$no_telp','$no_fax','$email') ");        
        if ($query) {
            echo "<script>location.href='index.php?p=bioskop';</script>";
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
                    <h3 class="text-center">Tambah Data Bioskop</h3>
                </div>
                <form method="post"  action="" class="form-horizontal">
                    <div class="box-body">
                    <div class="row">
                        <div class="col-md-2">
                            <a href="index.php?p=bioskop" class="btn btn-primary"><i class="fa fa-backward"></i> Kembali</a> 
                        </div>
                        <br><br>
                    </div>  
                        <div class="form-group ">
                            <label for="username" class="col-sm-offset-1 col-sm-3 control-label">Kode Bioskop</label>
                            <div class="col-sm-4">
                                <input  required type="text"  class="form-control" name="kode_bioskop">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="username" class="col-sm-offset-1 col-sm-3 control-label">Nama Bioskop</label>
                            <div class="col-sm-4">
                                <input  required type="text"  class="form-control" name="nama_bioskop">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="paswword"class="col-sm-offset-1 col-sm-3 control-label">Manager</label>
                            <div class="col-sm-4">
                                <input required type="text" class="form-control" name="mgr">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="manajer" class="col-sm-offset-1 col-sm-3 control-label">Alamat</label>
                            <div class="col-sm-4">
                                <input  required type="text"  class="form-control" name="alamat">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="asmen" class="col-sm-offset-1 col-sm-3 control-label">No Telp</label>
                            <div class="col-sm-4">
                                <input  required type="text"  class="form-control" name="no_telp">
                            </div>
                        </div> 
                        <div class="form-group ">
                            <label for="asmen" class="col-sm-offset-1 col-sm-3 control-label">No Fax</label>
                            <div class="col-sm-4">
                                <input  required type="text"  class="form-control" name="no_fax">
                            </div>
                        </div>  
                        <div class="form-group ">
                            <label for="asmen" class="col-sm-offset-1 col-sm-3 control-label">Email</label>
                            <div class="col-sm-4">
                                <input  required type="text"  class="form-control" name="email">
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


