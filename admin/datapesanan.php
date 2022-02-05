<?php  
    include "../fungsi/koneksi.php";
    include "../fungsi/fungsi.php";
    $query = mysqli_query($koneksi, "SELECT distinct(unit), tgl_permintaan, no_order FROM permintaan WHERE status!=1");    
?>
<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-sm-12">
             <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="text-center">Data Order Barang</h3>
                </div>                
				
                <div class="box-body"> 
                    <div class="table-responsive">
                        <table id="datapesanan" class="table text-center">
                            <thead  > 
                                <tr>
                                    <th>No</th> 
									<th>No. Order</th> 
                                    <th>Tanggal Permintaan</th>
                                    <th>Bioskop</th>
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
                                        <td> <?= $row['no_order']; ?> </td>
										<td> <?= tanggal_indo($row['tgl_permintaan']); ?> </td> 									
                                          
                                        <td> <?= $row['unit']; ?> </td>                                      
                                        <td>                                                                                                                                                                                                        
                                        <a href="?p=detil&unit=<?= $row['unit'];?>&tgl=<?= $row['tgl_permintaan']; ?>&no_order=<?= $row['no_order']; ?>"><span data-placement='top' data-toggle='tooltip' title='Detail Permintaan'><button    class="btn btn-info">Detail Order</button></span></a>       
										
										</td>                                                                                            
                            </tr>
                            <?php $no++; endwhile; }else {echo "<tr><td colspan=9>Tidak ada order barang.</td></tr>";} ?>
                            </tbody>
                        </table>
                    </div>                  
                </div>
            </div>
        </div>
    </div>
</section>