<?php  
    include "../fungsi/koneksi.php";
    include "../fungsi/fungsi.php";
    $query = mysqli_query($koneksi, "SELECT tanggal, COUNT(kode_brg) as jumlah_barang FROM order_pembelian WHERE status!=1 GROUP BY tanggal");    
?>
<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-sm-12">
             <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="text-center">APPROVAL ORDER PEMBELIAN</h3>
                </div>                
				
                <div class="box-body"> 
                    <div class="table-responsive">
                        <table id="datapesanan" class="table text-center">
                            <thead  > 
                                <tr>
                                    <th>No</th> 
									<th>Tanggal</th>
                                    <th>Jumlah Barang</th>
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
                                        <td> <?= $row['jumlah_barang']; ?> </td>
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