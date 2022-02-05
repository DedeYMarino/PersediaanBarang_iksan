<?php  
      include "../fungsi/koneksi.php";
      
	
	$query = mysqli_query($koneksi, "SELECT * FROM jurnal");	

?>

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-sm-12">
			 <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="text-center">Jurnal</h3>
                </div>                
                <div class="box-body">
               <div class="row">
                    <div class="col-md-2">
                        <!-- <a href="index.php?p=inputjurnal" class=" btn btn-primary"><i class="fa fa-plus"></i> Input Jurnal</a> --> 
                    </div>
                    <br><br>
                </div>                  
                	<div class="table-responsive">
                		<table class="table text-center" id="user">
                			<thead  > 
	                			<tr>
	                				<!-- <th>No</th> -->                                    
                                    <th>Tanggal</th>
	                				<th>No. Jurnal</th>                                    
                                    <th>No. Referensi</th>
                                    <th>Keterangan</th> 
                                    <th>Ref</th>                                   
                                    <th>Debet</th>
                                    <th>Kredit</th>
	                				<!-- <th>Aksi</th>	 -->                				
	                			</tr>
                			</thead>
                			<tbody>
                				<tr>
                					<?php 
                						$no =1 ;
                						if (mysqli_num_rows($query)) {
                							while($row=mysqli_fetch_assoc($query)):

                					 ?>
                						<!-- <td> <?= $no; ?> </td> -->

                                        <td> <?= $row['tanggal']; ?> </td>
                						<td> <?= $row['no_jurnal']; ?> </td>
                                        <td> <?= $row['no_ref']; ?> </td> 
                                        <td> <?= $row['keterangan']; ?> </td> 
                                        <td> <?= $row['kode_akun']; ?> </td>
                                        <td> <?= number_format($row['debet']); ?> </td> 
                                        <td> <?= number_format($row['kredit']); ?> </td> 
                						
                                         <!-- <td>
                                            <a href="?p=user&aksi=edit&id=<?= $row['id_user']; ?>"><span data-placement='top' data-toggle='tooltip' title='Edit'><button  class="btn btn-info">Edit</button></span></a>                     

                                            <a href="?p=user&aksi=hapus&id=<?= $row['id_user']; ?>"><span data-placement='top' data-toggle='tooltip' title='Hapus'><button  class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button></span></a>                    
                                        </td>  -->             					
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
