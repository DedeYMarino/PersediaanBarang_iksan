<?php
ob_start();
	include "../fungsi/koneksi.php";

	if(isset($_GET['id'])){
		$id=$_GET['id'];
		
	    $query = mysqli_query($koneksi,"delete from bioskop where kode_bioskop='$id'");
	    if ($query) {
	    	echo "<script>location.href='index.php?p=bioskop';</script>";
	    } else {
	    	echo 'gagal';
	    }
	
	}
?>