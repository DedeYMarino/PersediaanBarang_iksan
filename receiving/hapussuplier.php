<?php
ob_start();
	include "../fungsi/koneksi.php";

	if(isset($_GET['id'])){
		$id=$_GET['id'];
		
	    $query = mysqli_query($koneksi,"delete from supplier where kode_supplier='$id'");
	    if ($query) {
	    	echo "<script>location.href='index.php?p=suplier';</script>";
	    } else {
	    	echo 'gagal';
	    }
	
	}
?>