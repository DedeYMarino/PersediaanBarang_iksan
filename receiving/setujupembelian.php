<?php  

	include "../fungsi/koneksi.php";

	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$tanggal = date('Y-m-d');
		
		$query1 = mysqli_query($koneksi, "UPDATE order_pembelian SET status=1 WHERE id_order_pembelian='$id' ");		

		$query2 = mysqli_query($koneksi, "SELECT * FROM order_pembelian WHERE id_order_pembelian='$id'");
		
		$row = mysqli_fetch_assoc($query2);

		// $query3 = mysqli_query($koneksi, "INSERT INTO pemasukan (kode_suplier, kode_brg, jumlah, tgl_keluar)
		// 									VALUES ('$row[kode_brg]', '$row[jumlah]', '$tanggal' ) ");

		$query3 = mysqli_query($koneksi, "UPDATE stokbarang SET stok=stok+".$row['jumlah']." WHERE kode_brg='".$row['kode_brg']."'");

		if($query3) {
			header("location:index.php?p=datapembelian");
		} else {
			echo "ada yang salah" . mysqli_error($koneksi);
		}
	}


?>