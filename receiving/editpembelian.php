<?php  

	include "../fungsi/koneksi.php";
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = mysqli_query($koneksi, "SELECT sp.id_order_pembelian,sp.no_po, sp.tanggal, sup.nama_supplier, jb.jenis_brg, 
                            sb.nama_brg, sb.harga, sp.jumlah, sb.harga*sp.jumlah AS total, sp.status, jb.id_jenis, sp.kode_supplier
                            FROM order_pembelian sp
                            INNER JOIN supplier sup ON sup.kode_supplier=sp.kode_supplier
                            INNER JOIN stokbarang sb ON sp.kode_brg  = sb.kode_brg
                            INNER JOIN jenis_barang jb ON jb.id_jenis=sb.id_jenis 
                            WHERE sp.id_order_pembelian=$id");
		if (mysqli_num_rows($query)) {
			$row2=mysqli_fetch_assoc($query);
        }
    }
?>

<section class="content">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="text-center">Edit Data Pembelian Barang</h3>
                </div>
                <form method="post"  action="edit_proses_pembelian.php" class="form-horizontal">
                    <div class="box-body">
                    	<input type="hidden" name="id" value="<?= $row2['id_permintaan']; ?>">
                    	<input type="hidden" name="tgl_permintaan" value="<?= $row2['tgl_permintaan']; ?>">                    	
                        <div class="form-group ">
                            <label for="nama_brg" class="col-sm-offset-1 col-sm-3 control-label">No. PO</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="<?= $row2['no_po']; ?>" readonly name="no_po">
                                <input type="hidden" class="form-control" value="<?= $row2['id_order_pembelian']; ?>" readonly name="id_order_pembelian">
                            </div>
                        </div>                         
                        <div class="form-group">
                            <label for="nama_brg" class="col-sm-offset-1 col-sm-3 control-label">Tanggal</label>
                            
                            <div class="col-sm-4">
                            	<input class="form-control" type="text" name="tanggal" value="<?= $row2['tanggal']; ?>" readonly>
                                
                            </div>
                        </div>                                                                                                                                                                   
                         <div class="form-group">
                            <label for="jumlah" class="col-sm-offset-1 col-sm-3 control-label">Suplier</label>
                            <div class="col-sm-4">
                                <select id="suplier" required="isikan dulu" class="form-control" name="suplier">
                                <option value="">--Pilih Suplier--</option>
                                <?php  
                                    
                                    $querys = mysqli_query($koneksi, "select * from supplier");
                                    if (mysqli_num_rows($querys)) {
                                        $selected = "";
                                        while($row=mysqli_fetch_assoc($querys)):
                                           
                                    ?>                                        
                                        <option <?php if($row2['kode_supplier']==$row['kode_supplier']) echo "selected"; ?>  value="<?= $row['kode_supplier']; ?>"><?= $row['nama_supplier']; ?></option>
                                    <?php endwhile; } ?>                                      
                                </select>
                            </div>
                        </div>   
                        <div class="form-group">
                            <label for="nama_brg" class="col-sm-offset-1 col-sm-3 control-label">Jenis</label>
                            
                            <div class="col-sm-4">
                                <input class="form-control" type="text" name="nama_jenis" value="<?= $row2['jenis_brg']; ?>" readonly>
                                
                            </div>
                        </div>  
                        <div class="form-group">
                            <label for="nama_brg" class="col-sm-offset-1 col-sm-3 control-label">Nama Barang</label>
                            
                            <div class="col-sm-4">
                                <input class="form-control" type="text" name="nama_barang" value="<?= $row2['nama_brg']; ?>" readonly>
                                
                            </div>
                        </div> 
                        <div class="form-group">
                            <label for="jumlah" class="col-sm-offset-1 col-sm-3 control-label">Jumlah</label>
                            <div class="col-sm-2">
                                <input type="number" value="<?= $row2['jumlah'] ?>"class="form-control" name="jumlah">
                            </div>
                        </div>                      
                        <div class="form-group">
                            <input type="submit" name="update" class="btn btn-primary col-sm-offset-4 " value="Update" > 
                            &nbsp;
                            <input type="reset" class="btn btn-danger" value="Batal">				                                                                              
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>