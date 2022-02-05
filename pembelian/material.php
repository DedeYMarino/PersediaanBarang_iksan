<?php  
    include "../fungsi/koneksi.php";
	include "../fungsi/fungsi.php";


    if (isset($_GET['aksi']) && isset($_GET['id'])) {
        //die($id = $_GET['id']);
        $id = $_GET['id'];
        echo $id;

        if ($_GET['aksi'] == 'edit') {
            header("location:?p=edit&id=$id");
        } else if ($_GET['aksi'] == 'hapus') {
            header("location:?p=hapus&id=$id");
        } 
    }
	
	if(isset($_GET['id_jenis'])){
        $id_jenis = $_GET['id_jenis'];
        $query = mysqli_query($koneksi, "SELECT stokbarang.*, supplier.nama_supplier FROM stokbarang LEFT JOIN supplier ON supplier.kode_supplier=stokbarang.suplier WHERE id_jenis='$id_jenis' ");    
    } else {
        $query = mysqli_query($koneksi, "SELECT stokbarang.*, supplier.nama_supplier FROM stokbarang LEFT JOIN supplier ON supplier.kode_supplier=stokbarang.suplier");        
    }

	

?>
<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-sm-12">
			 <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="text-center">Olah Data Stok Barang</h3>
                </div>                
                <div class="box-body">
                <div class="row">
                    <div class="col-md-2">
                        <a href="index.php?p=tambahmaterial" class=" btn btn-primary"><i class="fa fa-plus"></i> Tambah Data Barang</a><br>						
                    </div>
					
					<div class="col-md-2 pull-right">
						<!--<a target="_blank" href="cetakstok.php?idjenis=<?= $id_jenis;  ?>" class="btn btn-success"><i class="fa fa-print"></i> Cetak Data barang</a><br>-->
                        <a target="_blank" href="cetakstok.php" class="btn btn-success"><i class="fa fa-print"></i> Cetak Data Barang</a><br>
					</div>
                    <br><br>
                </div>                        
                	<div class="table-responsive">
                		<table class="table text-center" id="material">
                			<thead  > 
	                			<tr>
	                				<th>No</th>	  
									<th>Tanggal Masuk</th>									
                                    <th>Kode Barang</th>        				
	                				<th>Nama Barang</th>
									<th>Satuan</th>
                                    <th>Harga</th>
	                				<th>Stok Awal</th>
                                    <th>Keluar</th>
                                    <th>Sisa</th>
                                    <th>Supplier</th>
                                    
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
										<td> <?= tanggal_indo($row['tgl_masuk']); ?> </td>
                                        <td> <?= $row['kode_brg']; ?> </td>          					
                						<td> <?= $row['nama_brg']; ?> </td>
										<td> <?= $row['satuan']; ?> </td>
                                        <td> <?= $row['harga']; ?> </td>
                						<td> <?= $row['stok']; ?> </td>
                                        <td> <?= $row['keluar']; ?> </td>                                        
                                        <td> <?= $row['sisa']; ?> </td>
                                        <td> <?= $row['nama_supplier']; ?> </td>
                                        
                                        
                						<td>
                                            <a href="?p=editmaterial&id=<?= $row['kode_brg']; ?>"><span data-placement='top' data-toggle='tooltip' title='Update'><button  class="btn btn-info">Update</button></span></a>                     

                                            <a href="?p=hapusmaterial&id=<?= $row['kode_brg']; ?>"><span data-placement='top' data-toggle='tooltip' title='Hapus'><button  class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus ?')">Hapus</button></span></a>                    
                                        </td>              					
                				</tr>
                			<?php $no++; endwhile; } ?>
                			</tbody>
                		</table>
                	</div>                	
                </div>
            </div>
		</div>
	</div>
</section>
<script>
    $(function(){
        $("#material").DataTable({
             "language": {
            "url": "http://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json",
            "sEmptyTable": "Tidak ada data di database"
            }
        });
    });
</script> 