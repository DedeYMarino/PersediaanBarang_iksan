<?php  

include "../fungsi/koneksi.php";

if(isset($_POST['update'])) {
	$id = $_POST['id'];
	
	$kode_suplier = $_POST['kode_suplier'];
	$nama_suplier = $_POST['nama_suplier'];
	$alamat = $_POST['alamat'];	
	$no_telp = $_POST['no_telp'];	
	$no_fax = $_POST['no_fax'];	
	$email = $_POST['email'];	
	
	$query = mysqli_query($koneksi, "UPDATE supplier SET kode_supplier='$kode_suplier', nama_supplier='$nama_suplier', alamat='$alamat', no_telp='$no_telp', no_fax='$no_fax', email='$email' WHERE kode_supplier ='$kode_suplier' ");
	
	if ($query) {
		header("location:index.php?p=suplier");
	} else {
		echo 'error' . mysqli_error($koneksi);
	}

}



?>