<?php  
    include "../fungsi/koneksi.php";
    include "../fungsi/fungsi.php";

    if (isset($_GET['aksi']) && isset($_GET['tgl'])) {
        //die($id = $_GET['id']);
        $tgl = $_GET['tgl'];
        $no_order = $_GET['no_order'];
        echo $tgl;

        if ($_GET['aksi'] == 'detil') {
            header("location:?p=detil&tgl=$tgl");
        } 
    }
    
    $query = mysqli_query($koneksi, "SELECT permintaan.unit, bioskop.nama_bioskop, bioskop.alamat, no_order, tgl_permintaan, COUNT(kode_brg) jumlah  
FROM permintaan
JOIN `user` ON `user`.username=permintaan.unit
JOIN `bioskop` ON `bioskop`.kode_bioskop=`user`.id_bioskop 
WHERE 
STATUS=1  GROUP BY bioskop.nama_bioskop, no_order, tgl_permintaan  ");   
    
?>

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-sm-12">
             <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="text-center">Cetak Tanda Terima Barang</h3>
                </div>                
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead  > 
                                <tr>
                                    <th>No</th>
                                    <th>No. Order</th>
                                    <th>Bioskop</th>  
                                    <th>Alamat</th>                                                                     
                                    <th>Tanggal Order</th>
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
                                        <td> <?= $row['no_order']; ?> </td> 
                                        <td> <?= $row['nama_bioskop']; ?> </td>  
                                        <td> <?= $row['alamat']; ?> </td>                                      
                                        <td> <?= tanggal_indo($row['tgl_permintaan']); ?> </td>  
                                        <td> <?= $row['jumlah']; ?> </td>    
                                        <td>        
										<a target="_blank" href="cetakbuktiterima.php?&tgl=<?= $row['tgl_permintaan']; ?>&unit=<?= $row['unit']; ?>&no_order=<?= $row['no_order']; ?>"><span data-placement='top' data-toggle='tooltip' title='Cetak'><button class="btn btn-success"><i class="fa fa-print"> Cetak</i></button></span></a>                  
                                        </td>
								</tr>        
								
                            <?php $no++; endwhile; }else {echo "<tr><td colspan=9>Belum ada data Order Barang yang akan dicetak</td></tr>";} ?>

                            </tbody>
                        </table>
                    </div>                  
                </div>
            </div>
        </div>
    </div>


</section>

