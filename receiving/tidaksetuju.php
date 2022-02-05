<?php  

include "../fungsi/koneksi.php";

if (isset($_GET['id']) && isset($_GET['tgl']) && isset($_GET['unit'])) {
	$id = $_GET['id'];
	$tgl = $_GET['tgl'];
	$unit = $_GET['unit'];

	$query = mysqli_query($koneksi, "UPDATE permintaan SET status=2 WHERE id_permintaan='$id' ");

	if($query) {
		header("location:index.php?p=datapesanan");
	} else {
		echo "error : " . mysqli_error($koneksi);
	}
}


?>