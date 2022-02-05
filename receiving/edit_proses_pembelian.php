<?php  
		
	include "../fungsi/koneksi.php";

	if(isset($_POST['update'])){
		$suplier = $_POST['suplier'];
		$tgl = $_POST['tanggal'];
		$id_order_pembelian = $_POST['id_order_pembelian'];
		$jumlah = $_POST['jumlah'];
		
		$query = mysqli_query($koneksi, "UPDATE order_pembelian SET jumlah ='$jumlah', kode_supplier='$suplier' WHERE id_order_pembelian='$id_order_pembelian' ");

		if($query) {
			header("location:index.php?p=detilpembelian&tgl=$tgl");
		} else {
			echo 'gagal';
		}
		
	}

?>