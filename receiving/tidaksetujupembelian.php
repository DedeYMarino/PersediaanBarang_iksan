<?php  

include "../fungsi/koneksi.php";

if (isset($_GET['id']) && isset($_GET['tgl'])) {
	$id = $_GET['id'];
	$tgl = $_GET['tgl'];

	$query = mysqli_query($koneksi, "UPDATE order_pembelian SET status=2 WHERE id_order_pembelian='$id' ");

	if($query) {
		header("location:index.php?p=datapembelian");
	} else {
		echo "error : " . mysqli_error($koneksi);
	}
}


?>