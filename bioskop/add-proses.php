<?php  

	include "../fungsi/koneksi.php";

	if(isset($_POST['simpan'])) {

		$no_order = $_POST['no_order'];
		$unit = $_POST['unit'];
		$kode_brg = $_POST['kode_brg'];
		$jumlah = $_POST['jumlah'];		
		$tgl_pemesanan = date('Y-m-d');
		$id_jenis = $_POST['id_jenis'];
		$keterangan = $_POST['keterangan'];
		

		$query = "INSERT into sementara (no_order, unit, kode_brg, id_jenis,  jumlah, tgl_permintaan, keterangan ) VALUES 
										('$no_order','$unit', '$kode_brg', '$id_jenis', '$jumlah', '$tgl_pemesanan', '$keterangan')

			";
		$hasil = mysqli_query($koneksi, $query);
		if ($hasil) {
			header("location:index.php?p=formpesan");
		} else {
			die("ada kesalahan : " . mysqli_error($koneksi));
		}
	}
?>