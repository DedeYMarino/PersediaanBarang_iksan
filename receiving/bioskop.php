<?php  
      include "../fungsi/koneksi.php";
      if (isset($_GET['aksi']) && isset($_GET['id'])) {
        //die($id = $_GET['id']);
        $id = $_GET['id'];        

        if ($_GET['aksi'] == 'edit') {
            header("location:?p=editbioskop&id=$id");
        } else if ($_GET['aksi'] == 'hapus') {
            header("location:?p=hapusbioskop&id=$id");
        } 
    }
	
	$query = mysqli_query($koneksi, "SELECT * FROM bioskop");	

?>

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-sm-12">
			 <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="text-center">Olah Data Bioskop</h3>
                </div>                
                <div class="box-body">
               <div class="row">
                    <div class="col-md-2">
                        <a href="index.php?p=tambahbioskop" class=" btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a> 
                    </div>
                    <br><br>
                    <div class="col-md-2 pull-right">
                        <a target="_blank" href="cetakbioskop.php" class="btn btn-success"><i class="fa fa-print"></i> Cetak Data Bioskop</a><br>
                    </div>
                    <br><br>
                </div>                  
                	<div class="table-responsive">
                		<table class="table text-center" id="user">
                			<thead  > 
	                			<tr>
	                				<th>No</th>
	                				<th>Kode Bioskop</th>	                					                				
                                    <th>Nama Bioskop</th>
                                    <th>Manager</th>
                                    <th>Alamat</th>
                                    <th>No. Telp</th>
                                    <th>No. Fax</th>
                                    <th>Email</th>
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
                						<td> <?= $row['kode_bioskop']; ?> </td>                                        
                						<td> <?= $row['nama_bioskop']; ?> </td>
                                        <td> <?= $row['mgr']; ?> </td>
                                        <td> <?= $row['alamat']; ?> </td>
                                        <td> <?= $row['no_telp']; ?> </td>
                                        <td> <?= $row['no_fax']; ?> </td>
                                        <td> <?= $row['email']; ?> </td>
                						
                                         <td>
                                            <a href="?p=editbioskop&id=<?= $row['kode_bioskop']; ?>"><span data-placement='top' data-toggle='tooltip' title='Edit'><button  class="btn btn-info">Ubah</button></span></a>                     
                                        <a href="?p=hapusbioskop&id=<?= $row['kode_bioskop']; ?>"><span data-placement='top' data-toggle='tooltip' title='Hapus'><button  class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button></span></a>                    
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
        $("#user").DataTable({
             "language": {
            "url": "http://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json",
            "sEmptyTable": "Tidak ada data di database"
            }
        });
    });
</script> 
