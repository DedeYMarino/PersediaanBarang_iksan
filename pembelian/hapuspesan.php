<?php
	include "../fungsi/koneksi.php";

	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$tgl=$_GET['tgl'];
		
	    $query = mysqli_query($koneksi,"delete from order_pembelian where id_order_pembelian='$id'");
	    if ($query) {
			//header("location:index.php?p=datapembelian");
			echo "<script>location.href='index.php?p=detil&tgl=$tgl';</script>";
	    } else {
	    	echo 'gagal';
	    }
	
	}
?>