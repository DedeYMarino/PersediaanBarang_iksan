<?php  

	include "../fungsi/koneksi.php";
	$tgl = date('Y-m-d');

	

	$query =  "INSERT INTO order_pembelian SELECT * FROM sementara_pembelian";
	$query2 = "DELETE FROM sementara_pembelian WHERE tanggal='$tgl'";

	

	if(mysqli_query($koneksi, $query)){
			mysqli_query($koneksi, $query2);
			header("Location:index.php?p=datapembelian");
	} else {
		echo "gagal euy" . mysqli_error($koneksi);
	}


?>