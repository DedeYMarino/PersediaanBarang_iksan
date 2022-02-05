<?php  

    include_once "../fungsi/koneksi.php";

    if(isset($_POST['simpan'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $level = $_POST['level'];
        $manajer = $_POST['manajer'];
        $receiving = $_POST['receiving'];
        $kode_bioskop = $_POST['kode_bioskop'];

        $query = mysqli_query($koneksi, "INSERT INTO user VALUES ('', '$username', '$password', '$level','$manajer','$receiving','$kode_bioskop') ");        
        if ($query) {
            header("location:index.php?p=user");
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
                    <h3 class="text-center">Tambah Data User</h3>
                </div>
                <form method="post"  action="" class="form-horizontal" id="myform">
                    <div class="box-body">
                    <div class="row">
                        
                        <br><br>
                    </div>
                        <div class="form-group ">
                            <label for="username" class="col-sm-offset-1 col-sm-3 control-label">Username</label>
                            <div class="col-sm-4">
                                <input  required type="text"  class="form-control" name="username">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="paswword"class="col-sm-offset-1 col-sm-3 control-label">Password</label>
                            <div class="col-sm-4">
                                <input required type="password" class="form-control" name="password">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="manajer" class="col-sm-offset-1 col-sm-3 control-label">Manajer</label>
                            <div class="col-sm-4">
                                <input  required type="text"  class="form-control" name="manajer">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="asmen" class="col-sm-offset-1 col-sm-3 control-label">Asisten Manajer</label>
                            <div class="col-sm-4">
                                <input  required type="text"  class="form-control" name="receiving">
                            </div>
                        </div>                        
                        <div class="form-group">
                            <label id="tes"for="nama_brg" class="col-sm-offset-1 col-sm-3 control-label">Level</label>
                            <div class="col-sm-4">
                                <select required name="level" class="form-control" id="level"
                                onChange="selectUser()">
                                    <option >--Pilih Level--</option>
                                    <option value="gudang">Gudang</option>
                                    <option value="receiving">Penerimaan</option>
                                    <option value="pembelian">Pembelian</option>
                                    <option value="bioskop">Bioskop</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div> 
                        <!-- <div id="konten_bioskop" style="display:none;"> -->
                        <div class="form-group">
                            <label for="kode_bioskop" class="col-sm-offset-1 col-sm-3 control-label">Bioskop</label>
                            <div class="col-sm-4">
                                <select id="kode_bioskop" class="form-control" name="kode_bioskop">
                                <option value="">--Pilih Bioskop--</option>
                                <?php  
                                    //include "../fungsi/koneksi.php";
                                    $queryJenis = mysqli_query($koneksi, "SELECT * FROM bioskop WHERE kode_bioskop NOT IN (SELECT id_bioskop FROM USER WHERE id_bioskop IS NOT NULL)");
                                    if (mysqli_num_rows($queryJenis)) {
                                        while($row=mysqli_fetch_assoc($queryJenis)):
                                    ?>                                        
                                        <option value="<?= $row['kode_bioskop']; ?>"><?= $row['nama_bioskop']; ?></option>
                                    <?php endwhile; } ?>                                      
                                </select>
                            </div>
                        </div> 
                        <!-- </div>                        -->
                        <div class="form-group">
                            <input type="submit" name="simpan" class="btn btn-primary col-sm-offset-4 " value="Simpan" > 
                            &nbsp;
                            <input type="reset" class="btn btn-danger" value="Batal">
                            &nbsp;
                            <a href="index.php?p=user" class="btn btn-warning"><span>Kembali</span></a>                                                                              
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
  function selectUser(){
    var level = document.getElementById('level').value;
          if(level == "bioskop")  {
              document.getElementById("konten_bioskop").style.display = "block";
          }
          else {
            document.getElementById("konten_bioskop").style.display = "none";
          }
          
  }


