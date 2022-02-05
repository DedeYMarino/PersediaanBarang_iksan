<?php  
	include "fungsi/koneksi.php";
	$no_po=$_GET['no_po'];
	$myArray = array();
	$query = mysqli_query($koneksi, "SELECT no_po,  SUM(sb.harga*op.jumlah) AS jumlah
                                        FROM 
                                        order_pembelian op
                                        JOIN stokbarang sb ON sb.kode_brg=op.kode_brg
                                        WHERE op.no_po='$no_po' 
                                        GROUP BY no_po");

                                        while($row=mysqli_fetch_array($query)){
                                        	$myArray[] = $row;
                                        }

	echo json_encode($myArray);

?>