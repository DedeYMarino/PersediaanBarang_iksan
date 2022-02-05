<?php  
    include "../fungsi/koneksi.php";
    include "../fungsi/fungsi.php";

	if (isset($_GET['aksi']) && isset($_GET['tgl'])) {
		//die($id = $_GET['id']);
		$tgl = $_GET['tgl'];
		echo $tgl;

		if ($_GET['aksi'] == 'detil') {
			header("location:?p=detil&tgl=$tgl");
		} 
	}
	
	$query = mysqli_query($koneksi, "SELECT sp.tanggal, COUNT(sb.kode_brg) as kode_brg, SUM(sb.harga*sp.jumlah) AS total
FROM order_pembelian sp
INNER JOIN stokbarang sb ON sp.kode_brg  = sb.kode_brg
GROUP BY sp.tanggal");	
    
?>

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-sm-12">
			 <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="text-center">Data Pembelian Barang</h3>
                </div>                
                <div class="box-body">
                    <!-- <a href="index.php?p=formpembelian" style="margin:10px 15px;" class="btn btn-success"><i class='fa fa-plus'> Form Pembelian Barang</i></a> -->
                	<div class="table-responsive">
                		<table class="table text-center">
                			<thead  > 
	                			<tr>
	                				<th>No</th>	
                                    <th>Tanggal</th>
                                    <th>Jumlah Barang</th>
                                    <th>Total</th>                 				
	                				<th>Aksi</th>
	                			</tr>
                			</thead>
                			<tbody>
                				<tr>
                					<?php 
                						$no =1 ;
                						if (mysqli_num_rows($query)) {
                							while($row=mysqli_fetch_assoc($query)):

                					 ?>
                						<td> <?= $no; ?> </td>
                					    <td> <?= tanggal_indo($row['tanggal']); ?> </td>
                                        <td> <?= $row['kode_brg']; ?> </td>  
                                        <td> <?= number_format($row['total']); ?> </td>   
                						<td>                                                                                                                                                                                                          
											<a href="?p=detilpembelian&tgl=<?= $row['tanggal']; ?>"><span data-placement='top' data-toggle='tooltip' title='Detail Pembelian'><button    class="btn btn-info">Detail Pembelian</button></span></a>                  
                						</td>
								</tr>    
								
                            <?php $no++; endwhile; }else {echo "<tr><td colspan=9>Tidak ada pembelian barang.</td></tr>";} ?>
							
                            </tbody>
                		</table>
                	</div>                	
                </div>
            </div>
		</div>
	</div>


</section>

