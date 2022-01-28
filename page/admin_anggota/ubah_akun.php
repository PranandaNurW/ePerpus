<?php 
//ambil data di url
$id = $_GET["id"];

//query data mahasiswa berdasar id
$anggota = query("SELECT * FROM tb_users WHERE id_user=$id AND status = true")[0];

//cek tombol apakah udah dipencet
if(isset($_POST["ubah"])) {
	//warning pengubahan data berhasil atau tidak
	if(ubah_akun($_POST) > 0){
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'admin.php?page=data-anggota';
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
                    <h1 class="h3 mb-2 text-gray-800">Ubah data anggota</h1>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                        	<form class="user text-center" method="post" enctype="multipart/form-data">

                        		<input type="hidden" name="id_user" value="<?= $anggota["id_user"]; ?>">

	                        	<div class="row">
	                        		<div class="col-md-4"></div>

	                        		<div class="col-md-4">
			                                <div class="form-group">
			                                    <input type="text" name="username" class="form-control" required placeholder="Username" value="<?= $anggota["username"]; ?>">
			                                </div>
			                                <div class="form-group">
			                                    <input type="text" name="email" class="form-control" required placeholder="Email.." value="<?= $anggota["email"]; ?>">
			                                </div>
			                                <div class="form-group">
			                                    <input type="text" name="alamat" class="form-control" required placeholder="Alamat.." value="<?= $anggota["alamat"]; ?>">
			                                </div>
			                                <div class="form-group">
			                                    <input type="text" name="level" class="form-control" readonly value="<?= $anggota["level"]; ?>">
			                                </div>
			                                
		                            </div>

		                            <div class="col-md-4"></div>
	                            </div>
	                            <button class="btn btn-info" type="submit" name="ubah"> Ubah </button>
	                        </form>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


