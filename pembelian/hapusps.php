<?php  

	include "../fungsi/koneksi.php";
	
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = mysqli_query($koneksi, "DELETE FROM sementara_pembelian WHERE id_sementara='$id' ");

		if($query) {
			//header("Location:index.php?p=formpembelian");
			echo "<script>location.href='index.php?p=formpembelian';</script>";
		}
	}


?>