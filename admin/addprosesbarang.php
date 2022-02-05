<?php  

	include "../fungsi/koneksi.php";

	if(isset($_POST['simpan'])) {

		$kode_brg = $_POST['kode_brg'];
		$id_jenis = $_POST['id_jenis'];
		$nama_brg = $_POST['nama_brg'];
		$harga = $_POST['harga'];	
		$satuan = $_POST['satuan'];		
		$jumlah = $_POST['jumlah'];
		$tgl_masuk = $_POST['tgl_masuk'];
		$suplier = $_POST['suplier'];
		

		$query = "INSERT into stokbarang (kode_brg, id_jenis, nama_brg, harga,  satuan, stok, keluar, sisa, tgl_masuk, suplier ) VALUES 
										('$kode_brg','$id_jenis', '$nama_brg', '$harga', '$satuan', '$jumlah', '0','$jumlah','$tgl_masuk','$suplier')

			";
		$hasil = mysqli_query($koneksi, $query);
		if ($hasil) {
			header("location:index.php?p=material&jenis=".$id_jenis."");
		} else {
			die("ada kesalahan : " . mysqli_error($koneksi));
		}
	}
?>