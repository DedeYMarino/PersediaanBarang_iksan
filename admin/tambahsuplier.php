<?php  

    include_once "../fungsi/koneksi.php";

    if(isset($_POST['simpan'])) {
        $kode_suplier = $_POST['kode_suplier'];
        $nama_suplier = $_POST['nama_suplier'];
        $alamat = $_POST['alamat'];        
        $no_telp = $_POST['no_telp'];
        $no_fax = $_POST['no_fax'];
        $email = $_POST['email'];

        $query = mysqli_query($koneksi, "INSERT INTO supplier VALUES ('$kode_suplier', '$nama_suplier', '$alamat','$no_telp','$no_fax','$email') ");        
        if ($query) {
            //header("location:index.php?p=suplier");
            echo "<script>location.href='index.php?p=suplier';</script>";
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
                    <h3 class="text-center">Tambah Data Suplier</h3>
                </div>
                <form method="post"  action="" class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group ">
                            <label for="username" class="col-sm-offset-1 col-sm-3 control-label">Kode Suplier</label>
                            <div class="col-sm-4">
                                <input  required type="text"  class="form-control" name="kode_suplier">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="username" class="col-sm-offset-1 col-sm-3 control-label">Nama Suplier</label>
                            <div class="col-sm-4">
                                <input  required type="text"  class="form-control" name="nama_suplier">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="paswword"class="col-sm-offset-1 col-sm-3 control-label">Alamat</label>
                            <div class="col-sm-4">
                                <input required type="text" class="form-control" name="alamat">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="no_telp" class="col-sm-offset-1 col-sm-3 control-label">No Telp</label>
                            <div class="col-sm-4">
                                <input  required type="text"  class="form-control" name="no_telp">
                            </div>
                        </div> 
                        <div class="form-group ">
                            <label for="no_fax" class="col-sm-offset-1 col-sm-3 control-label">No Fax</label>
                            <div class="col-sm-4">
                                <input  required type="text"  class="form-control" name="no_fax">
                            </div>
                        </div>  
                        <div class="form-group ">
                            <label for="email" class="col-sm-offset-1 col-sm-3 control-label">Email</label>
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


