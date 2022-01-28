<?php 
	$id_buku = $_GET['id_buku']??1;
?>
            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <!-- DataTales Example -->
                    <div class="row justify-content-center">
                    	<div class="col-xl-8">
		                    <div class="card border-left-success shadow my-4">

		                        <div class="card-body">
		                        	<div class="row justify-content-between p-2">
		                        				<?php 
				                            		$detail_buku = query("SELECT * FROM tb_buku WHERE id_buku = $id_buku");
				                            			foreach ($detail_buku as $buku) :
	        									?>
					                        	<div class="col-lg-6"><img src="./img/<?= $buku['gambar']; ?>" style="width: 350px; height: 475px;"></div>
					                            <div class="col-lg-6">
				                            	
					                            	<div><h4 class="text-primary font-weight-bold"><?= $buku['judul']; ?></h4></div>

					                            	<table class="table table-sm">
			                            		
				                            		<tr>
						                                <td><b>Pengarang</b></td>
						   
						                                <td style="text-align:right"><?= $buku['pengarang']; ?></td>
						                            </tr>
						                            <tr>
						                                <td><b>Penerbit</b></td>
						                                <td style="text-align:right"><?= $buku['penerbit']; ?></td>
						                            </tr>
						                            <tr>
						                                <td><b>Tahun Terbit</b></td>
						                                <td style="text-align:right"><?= $buku['tahun_terbit']; ?></td>
						                            </tr>
						                            <tr class="border-bottom">
						                                <td><b>Stok Buku</b></td>
						                                <td style="text-align:right"><?= $buku['jumlah_buku']; ?></td>
						                            </tr>
						                        <?php endforeach; ?>
			                            	</table>

			                            </div>
		                            </div>
		                        </div>
		                    </div>
	                    </div>

                	</div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

 