<?php  
	include "../fungsi/koneksi.php";
    //mengambil id untuk edit user
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = $id ");
		if (mysqli_num_rows($query)) {
			while($row2 = mysqli_fetch_assoc($query)):
?>

<section class="content">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="text-center">Edit Data User</h3>
                </div>                
                <form method="post"  action="edituproses.php" class="form-horizontal">
                    <div class="box-body">
                     <div class="row">
                        
                        <br><br>
                    </div>     
                    	<input type="hidden" name="id" value="<?= $row2['id_user']; ?>">
                        <div class="form-group ">
                            <label for="username" class="col-sm-offset-1 col-sm-3 control-label">Username</label>
                            <div class="col-sm-4">
                                <input type="text"  required value="<?= $row2['username']; ?>" class="form-control" name="username">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="password" class="col-sm-offset-1 col-sm-3 control-label">Password</label>
                            <div class="col-sm-4">
                                <input class="form-control" name="pass" type="password">
                            </div>
                        </div>
                         <div class="form-group ">
                            <label for="manajer" class="col-sm-offset-1 col-sm-3 control-label">Manajer</label>
                            <div class="col-sm-4">
                                <input type="text" value="<?= $row2['manajer'];  ?>" required  class="form-control" name="manajer">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="asmen" class="col-sm-offset-1 col-sm-3 control-label">Asisten Manajer</label>
                            <div class="col-sm-4">
                                <input type="text" value="<?= $row2['receiving'];  ?>" required  class="form-control" name="receiving">
                            </div>
                        </div>                       
                         <div class="form-group">
                            <label for="jenis_brg" class="col-sm-offset-1 col-sm-3 control-label">Level</label>
                            <div class="col-sm-4">
                                <select id="jenis_brg" required class="form-control" name="level">
                                <option value="">--Pilih Level--</option>
                                    <option  <?php if($row2['level'] == "gudang") echo "selected"; ?>  value="gudang">Gudang</option>
                                    <option  <?php if($row2['level'] == "bioskop") echo "selected"; ?>  value="bioskop">Bioskop</option>
                                    <option  <?php if($row2['level'] == "pembelian") echo "selected"; ?> value="pembelian">Pembelian</option>
                                    <option  <?php if($row2['level'] == "receiving") echo "selected"; ?> value="receiving">Receiving</option>
                                    <option  <?php if($row2['level'] == "admin") echo "selected"; ?> value="admin">Admin</option>
                                    
                                    
                                </select>
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="kode_bioskop" class="col-sm-offset-1 col-sm-3 control-label">Bioskop</label>
                            <div class="col-sm-4">
                                <select id="kode_bioskop" class="form-control" name="kode_bioskop">
                                <option value="">--Pilih Bioskop--</option>
                                <?php  
                                    //include "../fungsi/koneksi.php";
                                    $queryJenis = mysqli_query($koneksi, "SELECT * FROM bioskop");
                                    if (mysqli_num_rows($queryJenis)) {
                                        while($row=mysqli_fetch_assoc($queryJenis)):
                                    ?>        
                                                                 
                                        <option value="<?= $row['kode_bioskop']; ?>" <?php if($row2['id_bioskop'] == $row['kode_bioskop']) echo "selected"; ?>><?= $row['nama_bioskop']; ?></option>
                                    <?php endwhile; } ?>                                      
                                </select>
                            </div>
                        </div>                      
                        <div class="form-group">
                            <input type="submit" name="update" class="btn btn-primary col-sm-offset-4 " value="Simpan" > 
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

<?php endwhile; } }  ?>