<?php 
//cek tombol apakah udah dipencet
if(isset($_POST["tambah"])) {
	
	//warning penambahan data berhasil atau tidak
	if(tambah_peminjaman($_POST) > 0){
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'admin.php?page=data-peminjaman';
			</script>
		";
	}
	else{
		echo "
			<script>
				alert('data gagal ditambahkan!');
			</script>
		";
	}


}
?>
<?php 

$today = date("Y-m-d");
$tujuh_hari = mktime(0, 0, 0, date("n"), date("j")+7, date("y"));
$seminggu = date("Y-m-d", $tujuh_hari);

?>
            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tambah peminjaman</h1>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                        	<form class="user" method="post">
	                        	<div class="row">
	                        		<div class="col-md-3"></div>
	                        		<div class="col-md-6">
			                                <div class="form-group">
			                                	<label>Buku :</label>
			                                   	<select name="id_buku" class="form-control" required>
			                                   			<option value="" selected disabled> -- Pilih Buku -- </option>
			                                    	<?php  
			                                    		$buku = query("SELECT * FROM tb_buku");
			                                    		foreach ($buku as $row) :
			                                    	?>
			                                    			<option value="<?= $row['id_buku']?>"><?= "Stok: ".$row['jumlah_buku'] , ' | ', $row['judul'] ?></option>
			                                    	<?php endforeach;  ?>
			   
			                                    </select>
			                                </div>
			                                <div class="form-group">
			                                    <label>Anggota :</label>
			                                   	<select name="id_user" class="form-control" required>
			                                   		<option value="" selected disabled> -- Pilih Anggota -- </option>
			                                    	<?php  
			                                    		$anggota = query("SELECT * FROM tb_users WHERE level = 'anggota' AND status = true ORDER BY id_user");
			                                    		foreach ($anggota as $row) :
			                                    	?>
			                                    			<option value="<?= $row['id_user']?>"><?= $row['username'], ' - ', $row['alamat'] ?></option>
			                                    	<?php  endforeach; ?>
			   
			                                    </select>
			                                </div>
			                                <div class="form-group">
			                                	<label>Jumlah Buku :</label>
			                                    <input type="number" name="jumlah_buku" class="form-control" min="1" max="3" >
			                                </div>
			                                <div class="form-group">
			                                	<label>Tanggal Pinjam :</label>
			                                    <input type="text" name="tgl_pinjam" class="form-control" readonly value="<?= $today; ?>">
			                                </div>
			                                <div class="form-group">
			                                	<label>Tanggal Kembali :</label>
			                                    <input type="text" name="batas_kembali" class="form-control" readonly value="<?= $seminggu; ?>">
			                                </div> 
			                                <div class="text-center"> 
			                                	<button class="btn btn-primary" type="submit" name="tambah"> Tambah </button>
			                                </div> 
		                            </div>
	                            </div>
	                        </form>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


