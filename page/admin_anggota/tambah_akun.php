<?php 
//cek tombol apakah udah dipencet
if(isset($_POST["tambah"])) {
	
	//warning penambahan data berhasil atau tidak
	if(tambah_akun($_POST) > 0){
		echo "
			<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'admin.php?page=data-anggota';
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
                    <h1 class="h3 mb-2 text-gray-800">Tambah akun anggota</h1>
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                        	<form class="user text-center" method="post">
	                        	<div class="row">
	                        		<div class="col-md-4"></div>

	                        		<div class="col-md-4">
			                                <div class="form-group">
			                                    <input type="text" name="username" class="form-control" required placeholder="Username..">
			                                </div>
			                                <div class="form-group">
			                                    <input type="text" name="email" class="form-control" required placeholder="Email..">
			                                </div>
			                                <div class="form-group">
			                                    <input type="text" name="alamat" class="form-control" required placeholder="Alamat..">
			                                </div>
			                                <div class="form-group">
			                                    <input type="password" name="password" class="form-control" required placeholder="Password..">
			                                </div>
			                                <div class="form-group">
			                                    <input type="password" name="repassword" class="form-control" required placeholder="Repeat Password..">
			                                </div>
			                                <div class="form-group">
			                                    <input type="text" name="level" class="form-control" readonly value="anggota">
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


