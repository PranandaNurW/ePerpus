<?php 
//ambil data di url
$id = $_GET["id"];

//query data mahasiswa berdasar id
$buku = query("SELECT * FROM tb_buku WHERE id_buku=$id")[0];

//cek tombol apakah udah dipencet
if(isset($_POST["ubah"])) {
	//warning pengubahan data berhasil atau tidak
	if(ubah_buku($_POST) > 0){
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'admin.php?page=data-buku';
			</script>
		";
	}
	else{
		echo "
			<script>
				alert('data gagal diubah!');
			</script>
		";
	}
}
?>
            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Ubah data buku</h1>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                        	<form class="user text-center" method="post" enctype="multipart/form-data">

                        		<input type="hidden" name="id_buku" value="<?= $buku["id_buku"]; ?>">
								<input type="hidden" name="gambarLama" value="<?= $buku["gambar"]; ?>">

	                        	<div class="row">
	                        		<div class="col-md-6">
	                        			<div class="form-group">
	                        				<img id="blah" src="./img/<?= $buku["gambar"]; ?>" width="125" height="216" />
			                                 <input type="file" name="gambar" id="gambar" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
			                            </div>
	                        		</div>

	                        		<div class="col-md-6">
			                                <div class="form-group">
			                                    <input type="text" name="judul" class="form-control" required placeholder="Judul buku.." value="<?= $buku["judul"]; ?>">
			                                </div>
			                                <div class="form-group">
			                                    <input type="text" name="pengarang" class="form-control" required placeholder="Pengarang.." value="<?= $buku["pengarang"]; ?>">
			                                </div>
			                                <div class="form-group">
			                                    <input type="text" name="penerbit" class="form-control" required placeholder="Penerbit.." value="<?= $buku["penerbit"]; ?>">
			                                </div>
			                                <div class="form-group">
			                                    <input type="text" name="tahun" class="form-control" required placeholder="Tahun terbit.." value="<?= $buku["tahun_terbit"]; ?>">
			                                </div>
			                                <div class="form-group">
			                                    <input type="number" name="jumlah" class="form-control" required placeholder="Jumlah buku.." value="<?= $buku["jumlah_buku"]; ?>">
			                                </div>
			                                
		                            </div>
	                            </div>
	                            <button class="btn btn-info" type="submit" name="ubah"> Ubah </button>
	                        </form>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


