<?php 
//cek tombol apakah udah dipencet
if(isset($_POST["tambah"])) {
	
	//warning penambahan data berhasil atau tidak
	if(tambah_buku($_POST) > 0){
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'admin.php?page=data-buku';
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
            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tambah data buku</h1>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                        	<form class="user text-center" method="post" enctype="multipart/form-data">
	                        	<div class="row">
	                        		<div class="col-md-6">
	                        			<div class="form-group">
	                        				<img id="blah" alt="your image" width="125" height="216" />
			                                 <input type="file" name="gambar" id="gambar" required class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
			                            </div>
	                        		</div>

	                        		<div class="col-md-6">
			                                <div class="form-group">
			                                    <input type="text" name="judul" class="form-control" required placeholder="Judul buku..">
			                                </div>
			                                <div class="form-group">
			                                    <input type="text" name="pengarang" class="form-control" required placeholder="Pengarang..">
			                                </div>
			                                <div class="form-group">
			                                    <input type="text" name="penerbit" class="form-control" required placeholder="Penerbit..">
			                                </div>
			                                <div class="form-group">
			                                    <input type="text" name="tahun" class="form-control" required placeholder="Tahun terbit..">
			                                </div>
			                                <div class="form-group">
			                                    <input type="number" name="jumlah" class="form-control" required placeholder="Jumlah buku.." min="1">
			                                </div>
			                                
			                                
		                            </div>
	                            </div>
	                            <button class="btn btn-primary" type="submit" name="tambah"> Tambah </button>
	                        </form>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


