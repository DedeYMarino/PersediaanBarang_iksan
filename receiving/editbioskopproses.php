<?php  

include "../fungsi/koneksi.php";

if(isset($_POST['update'])) {
	$id = $_POST['id'];
	
	$kode_bioskop = $_POST['kode_bioskop'];
	$nama_bioskop = $_POST['nama_bioskop'];
	$mgr = $_POST['mgr'];	
	$alamat = $_POST['alamat'];	
	$no_telp = $_POST['no_telp'];	
	$no_fax = $_POST['no_fax'];	
	$email = $_POST['email'];	
	
	$query = mysqli_query($koneksi, "UPDATE bioskop SET kode_bioskop='$kode_bioskop', nama_bioskop='$nama_bioskop', mgr='$mgr', alamat='$alamat', no_telp='$no_telp', no_fax='$no_fax', email='$email' WHERE kode_bioskop ='$kode_bioskop' ");
	
	if ($query) {
		header("location:index.php?p=bioskop");
	} else {
		echo 'error' . mysqli_error($koneksi);
	}

}



?>