<?php  
    session_start();
    $user=$_SESSION['username'];
	include "../fungsi/koneksi.php";
    //mengambil id untuk edit user
	
		// $id = $_GET['id'];
		// $query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = $id ");
		// if (mysqli_num_rows($query)) {
		// 	while($row2 = mysqli_fetch_assoc($query)):
    $pesan = isset($pesan) ? $pesan : '';
    if (isset($_POST['submit'])) {  
        $passbaru=$_POST['passbaru'];
        $konpass=$_POST['konpass'];
        if($passbaru!=$konpass){
            $pesan="<font color='red'>Password dan Konfirmasi Password Tidak Sama !</font>";
        }
        else{
            $query = mysqli_query($koneksi, "UPDATE user SET password=MD5('$passbaru') WHERE username ='$user' ");
    
                if ($query) {
                    header("location:index.php");
                } else {
                    echo 'error' . mysqli_error($koneksi);
                }
        }
    }
?>

<section class="content">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="text-center">Ganti Password <?=$user?></h3>
                </div>                
                <form method="post"  action="" class="form-horizontal">
                    <div class="box-body">
                     
                    	<input type="hidden" name="id" value="<?= $row2['id_user']; ?>">
                        <div class="form-group ">
                            <label for="passbaru" class="col-sm-offset-1 col-sm-3 control-label">Password Baru</label>
                            <div class="col-sm-4">
                                <input type="password"  required class="form-control" name="passbaru"> <?=$pesan;?>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="konpass" class="col-sm-offset-1 col-sm-3 control-label">Konfirmasi Password</label>
                            <div class="col-sm-4">
                                <input class="form-control" required name="konpass" type="password">
                            </div>
                        </div>
                                     
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary col-sm-offset-4 " value="Simpan" > 
                            &nbsp;
                            <input type="reset" class="btn btn-danger" value="Batal">                                                                              
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

