<?php  

include "../fungsi/koneksi.php";

if(isset($_POST['update'])) {
	$id = $_POST['id'];
	
	$username = $_POST['username'];
	$pass = $_POST['pass'];
	$manajer = $_POST['manajer'];
	$receiving = $_POST['receiving'];
	$level = $_POST['level'];
	$kode_bioskop = $_POST['kode_bioskop'];	
	
	if(!empty($pass)){
	$query = mysqli_query($koneksi, "UPDATE user SET username='$username', `password` = MD5('$pass'), manajer='$manajer', receiving='$receiving', level='$level', id_bioskop='$kode_bioskop' WHERE id_user ='$id' ");
	}
	else {
		$query = mysqli_query($koneksi, "UPDATE user SET username='$username', manajer='$manajer', receiving='$receiving', level='$level', id_bioskop='$kode_bioskop' WHERE id_user ='$id' ");
	}
	
	if ($query) {
		header("location:index.php?p=user");
	} else {
		echo 'error' . mysqli_error($koneksi);
	}

}



?>