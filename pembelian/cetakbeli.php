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
    
    $query = mysqli_query($koneksi, "SELECT no_po, COUNT(kode_brg)  jumlah_barang
FROM order_pembelian GROUP BY no_po ORDER BY tanggal ASC");   
    
?>

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-sm-12">
             <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="text-center">Cetak Bukti Purchase Order</h3>
                </div>                
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead  > 
                                <tr>
                                    <th>No</th>  
                                    <th>No. PO</th>
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
                                        <td> <?= $row['no_po']; ?> </td>  
                                        <td> <?= $row['jumlah_barang']; ?> </td>    
                                        <td>        
										<a target="_blank" href="cetakpembelian.php?&no_po=<?= $row['no_po']; ?>"><span data-placement='top' data-toggle='tooltip' title='Cetak PO'><button class="btn btn-success"><i class="fa fa-print"> Cetak PO</i></button></span></a>                  
                                        </td>
								</tr>        
								
                            <?php $no++; endwhile; }else {echo "<tr><td colspan=9>Belum ada PO yang akan dicetak</td></tr>";} ?>

                            </tbody>
                        </table>
                    </div>                  
                </div>
            </div>
        </div>
    </div>


</section>

