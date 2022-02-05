
<?php  
    include "../fungsi/koneksi.php";
	include "../fungsi/fungsi.php";

    if (isset($_GET['aksi']) && isset($_GET['id'])) {
        //die($id = $_GET['id']);
        $id = $_GET['id'];
        echo $id;

        if ($_GET['konfirmasi'] == 'edit') {
            header("location:?p=edit&id=$id");
        } else if ($_GET['aksi'] == 'hapus') {
            header("location:?p=hapus&id=$id");
        } 
    }

    
    $query = mysqli_query($koneksi, "SELECT op.tanggal, op.no_po, s.nama_supplier, sb.nama_brg, sb.satuan, op.jumlah, op.status
                                        FROM order_pembelian op 
                                        INNER JOIN stokbarang sb ON op.kode_brg = sb.kode_brg 
                                        INNER JOIN supplier s ON s.kode_supplier = op.kode_supplier
                                        WHERE op.status=1
                                        ORDER BY tanggal DESC"); 

    
?>

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-sm-12">
             <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="text-center">Data Pemasukan Barang</h3>
                </div>    
                <div class="box-body"> 
				<a href="cetakpemasukanbarang.php" target="_blank" style="margin:10px;" class="btn btn-success"><i class='fa fa-print'> Cetak Laporan</i></a>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center" id="datapesanan">
                            <thead  > 
                                <tr>
                                    <th>No</th> 
									<th>Tanggal Pembelian</th>
                                    <th>Suplier</th> 
                                    <th>No. PO</th>                                                                
                                    <th>Nama Barang</th>
									<th>Satuan</th>
                                    <th>Jumlah</th>                                                           
                                    <th>Status</th>                                    
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
                                        <td> <?= $row['nama_supplier']; ?> </td>
                                        <td> <?= $row['no_po']; ?> </td> 
                                        <td> <?= $row['nama_brg']; ?> </td>
										<td> <?= $row['satuan']; ?> </td>										
                                        <td> <?= $row['jumlah']; ?> </td>
                                        <td > <?php
                                                if ($row['status'] == 0){
                                                    echo '<span class=text-warning>Belum Disetujui</span>';
                                                } elseif ($row['status'] == 1) {
                                                    echo '<span class=text-primary>Telah Disetujui</span>';
                                                } else {
                                                    echo '<span class=text-danger>Tidak Disetujui</span>';
                                                }
                                               ?> 
                                         </td>     
                                                                                                                                   
                            </tr>
                            <?php $no++; endwhile; }else {echo "<tr><td colspan=9>Belum ada pembelian disetujui</td></tr>" . mysqli_error($koneksi);} ?>
                            </tbody>
                        </table>
                    </div>                  
                </div>
            </div>
        </div>
    </div>



</section>


