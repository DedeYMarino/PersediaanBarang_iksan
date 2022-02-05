<?php  

    include_once "../fungsi/koneksi.php";

    if(isset($_POST['simpan'])) {
        $username = $_POST['kode_akun'];
        $nama_akun = $_POST['nama_akun'];
        $manajer = $_POST['jenis_akun'];

        $query = mysqli_query($koneksi, "INSERT INTO akun VALUES ('$kode_akun', '$nama_akun', '$jenis_akun') ");        
        if ($query) {
            header("location:index.php?p=akun");
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
                    <h3 class="text-center">Tambah Data Akun</h3>
                </div>
                <form method="post"  action="" class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group ">
                            <label for="username" class="col-sm-offset-1 col-sm-3 control-label">Kode Akun</label>
                            <div class="col-sm-4">
                                <input  required type="text"  class="form-control" name="kode_akun">
                            </div>
                        </div>
                        
                        <div class="form-group ">
                            <label for="manajer" class="col-sm-offset-1 col-sm-3 control-label">Nama Akun</label>
                            <div class="col-sm-4">
                                <input  required type="text"  class="form-control" name="nama_akun">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="asmen" class="col-sm-offset-1 col-sm-3 control-label">Jenis Akun</label>
                            <div class="col-sm-4">
                                <input  required type="text"  class="form-control" name="jenis_akun">
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


