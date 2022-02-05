<?php  

	include "../fungsi/koneksi.php";

	if(isset($_POST['simpan'])) {

		$no_po = $_POST['no_po'];
		$kode_supplier = $_POST['kode_supplier'];
		$kode_brg = $_POST['kode_brg'];
		$jumlah = $_POST['jumlah'];		
		$tanggal = date('Y-m-d');
		$id_jenis = $_POST['id_jenis'];
		

		$query = "INSERT into sementara_pembelian (no_po, kode_supplier, kode_brg, id_jenis,  jumlah, tanggal ) VALUES 
										('$no_po', '$kode_supplier','$kode_brg', '$id_jenis', '$jumlah', '$tanggal')

			";
		$hasil = mysqli_query($koneksi, $query);
		if ($hasil) {
			header("location:index.php?p=formpembelian");
		} else {
			die("ada kesalahan : " . mysqli_error($koneksi));
		}
	}
?>