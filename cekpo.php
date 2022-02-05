<?php  
	include "fungsi/koneksi.php";
	$no_po=$_GET['no_po'];
	$myArray = array();
	$query = mysqli_query($koneksi, "SELECT * FROM (SELECT LPAD(id_permintaan,8,0) AS no_po, 'penjualan' AS deskripsi, '201' as kode_akun, sb.harga*p.jumlah AS jumlah 
                                        FROM permintaan p
                                        JOIN stokbarang sb ON sb.kode_brg=p.kode_brg
                                        WHERE p.status=1 AND p.id_permintaan NOT IN(SELECT no_ref FROM jurnal)
                                        UNION
                                        SELECT no_po,  'pembelian' AS deskripsi, '101' as kode_akun, SUM(sb.harga*op.jumlah) AS jumlah
                                        FROM 
                                        order_pembelian op
                                        JOIN stokbarang sb ON sb.kode_brg=op.kode_brg
                                        WHERE op.status=1 AND op.no_po NOT IN(SELECT no_ref FROM jurnal)
                                        GROUP BY no_po) as abc
                                        WHERE abc.no_po='".$no_po."'");

                                        while($row=mysqli_fetch_array($query)){
                                        	$myArray[] = $row;
                                        }

	echo json_encode($myArray);

?>