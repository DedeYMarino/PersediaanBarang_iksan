<?php  
      include "../fungsi/koneksi.php";
      
	
	$query = mysqli_query($koneksi, "SELECT * FROM pembayaran");	

?>

<!-- Main content -->
<section class="content">
<!-- Small boxes (Stat box) -->
	<div class="row">
		<div class="col-sm-12">
			 <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="text-center">Pembayaran</h3>
                </div>                
                <div class="box-body">
               <div class="row">
                    <div class="col-md-2">
                        <a href="index.php?p=inputpembayaran" class=" btn btn-primary"><i class="fa fa-plus"></i> Input Pembayaran</a> 
                    </div>
                    <br><br>
                </div>                  
                	<div class="table-responsive">
                		<table class="table text-center" id="user">
                			<thead  > 
	                			<tr>
	                				<th>No</th>
	                				<th>Kode Pembayaran</th>
                                    <th>No. PO</th>
                                    <th>Nominal</th>
                                    <th>Tanggal</th>
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
                						<td> <?= $row['kode_pembayaran']; ?> </td>   
                						<td> <?= $row['no_po']; ?> </td>
                                        <td> <?= number_format($row['nominal']); ?> </td>
                                        <td> <?= $row['tanggal']; ?> </td> 
                						
                                         <td>
                                            <a href="cetakpembayaran.php?id=<?= $row['kode_pembayaran'];?>&no_po=<?=$row['no_po'];?>"><span data-placement='top' data-toggle='tooltip' title='Edit'><button  class="btn btn-info">Cetak</button></span></a>                      
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
