
            <!-- Main Content -->
            <div id="daftar-buku">

                
                <!-- Begin Page Content -->
                <div class="container-fluid coba">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between pb-2">
                        <h1 class="h3 mb-0 text-gray-800">Daftar buku</h1>
                    </div>

                    <hr>

                    <!-- Search -->
                    <!-- <div class="text-right">
                        <form class="d-none d-sm-inline-block bg-grey-100 form-inline mr-md-3 my-2 my-md-0 mw-100 pb-3 ml-auto">
                            <div class="input-group">
                                <input type="text" class="form-control border-0 small" placeholder="Search for..."
                                    aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div> -->

                    <div class="row mt-2 mx-2 justify-content-center kotak">
                    <?php $buku = query("SELECT * FROM tb_buku"); ?>

                    <?php foreach($buku as $row) :?>
                        <div class="col-xl-3 col-md-6 mb-4 list-buku">
                            <div class="card border-left-info h-100 py-2">
                                <div class="card-body">
                                    <div class="text-center">
                                        <div>
                                            <a href="<?php printf('%s&id_buku=%s', 'anggota.php?page=daftarbuku&aksi=lihat', $row['id_buku']) ?>"><img src="./img/<?= $row['gambar']??"./img/5cm.jpg"; ?>" alt="buku" class="img-fluid mx-auto" style="width: 213px; height: 289px;"></a>
                                        </div>
                                        <hr>
                                        <div>
                                            <div>
                                                <h5><?= $row['judul']; ?></h5>
                                                <h6>by <?= $row['pengarang']; ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->